<?php
  /**
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version LC_Page_Mdl_JPayment_Bank.php, v2.2.0
   */
require_once(MODULE_REALDIR . "mdl_jpayment/module/Gateway.php");

class LC_Page_Mdl_JPayment_Bank extends LC_Page_Ex {
  var $objFormParam;
  var $objQuery;
  var $message;
  var $objHelperDB;
  var $objPurchase;
  var $objGateway;
  
  /**
   * コンストラクタ
   * 
   * @return void
   */
  function LC_Page_Mdl_JPayment_Bank() {
    $this->objQuery = new SC_Query();
    $this->objHelperDB = new SC_Helper_DB();
    $this->objFormParam = new SC_FormParam();
    $this->objPurchase = new SC_Helper_Purchase();
    $this->objGateway = new Gateway();
  }
  
  function destroy() {
    parent::destroy();
  }
  
  /**
   * Page を初期化する.
   *
   * @return void
   */
  function init() {
    parent::init();
    $this->tpl_column_num = 1;
    
    if(SC_MobileUserAgent::isMobile()){
      $this->tpl_mainpage = MODULE_REALDIR . MDL_JPAYMENT_CODE . "/template/jpayment_bank_mobile.tpl";
    } elseif(SC_SmartphoneUserAgent::isSmartphone()) {
      $this->tpl_mainpage = MODULE_REALDIR . MDL_JPAYMENT_CODE . "/template/jpayment_bank_sphone.tpl";
    } else {
      $this->tpl_mainpage = MODULE_REALDIR . MDL_JPAYMENT_CODE . "/template/jpayment_bank.tpl";
    }
    $this->allowClientCache();
  }
  
  function process() {
    parent::process();
    $this->action();
    $this->sendResponse();
  }
  
  /**
   * Page のプロセス.
   *
   * @return void
   */
  function action() {
    $objView = (SC_MobileUserAgent::isMobile()) ? new SC_MobileView() : new SC_SiteView();
    $this->objCartSess = new SC_CartSession();
    $this->objSiteSess = new SC_SiteSession();
    $this->objCustomer = new SC_Customer();
    
    // パラメータ情報の初期化
    $this->initParam($arrData);
    
    // 一時受注テーブルの読込
    $order_id = $_SESSION['order_id'];
    $arrData = $this->objPurchase->getOrder($order_id);
    $arrData['order_nmf'] = $arrData['order_kana01'].$arrData['order_kana02'];
    $uniqid = $arrData["order_temp_id"];
    $this->tpl_uniqid = $uniqid;
    
    // POST値の取得
    $this->objFormParam->setParam($_POST);
    
    // 支払い情報を取得
    $arrPayment = $this->objQuery->getall("SELECT payment_id, memo01, memo02, memo03, memo04, memo05, memo06, memo07, memo08, memo09, memo10 FROM dtb_payment WHERE payment_id = ? ", array($arrData["payment_id"]));
    
    switch (isset($_POST['mode']) ? $_POST['mode'] : "") {
      // 戻る
      case 'return':
        // 正常な推移であることを記録しておく
        $this->objSiteSess->setRegistFlag();
        if (SC_MobileUserAgent::isMobile()) {
          $url = $this->getLocation(MOBILE_SHOPPING_CONFIRM_URLPATH);
          SC_Response_Ex::sendRedirect($url, true);
        } else {
          $url = $this->getLocation(SHOPPING_CONFIRM_URLPATH);
          SC_Response_Ex::sendRedirect($url);
        }
        exit;
        break;
      case 'next':
        // 入力値の変換
        $this->objFormParam->convParam();
        $this->arrErr = $this->checkError($arrRet);
        
        if(count($this->arrErr) == 0) {
          // 正常な推移であることを記録しておく
          $this->objSiteSess->setRegistFlag();
          
          // 入力データの取得を行う
          $arrInput = $this->objFormParam->getHashArray();
          // 電文送信
          $ret = $this->objGateway->sfPostBankData($arrData, $arrInput);

          if($ret['rst'] == 1) {

            $arrMes['bk_code'] = $this->lfSetBankMSG("振込先銀行コード",$ret['bankcode']);
            $arrMes['bk_name'] = $this->lfSetBankMSG("振込先銀行",$ret['bankname']);
            $arrMes['bk_branchcode'] = $this->lfSetBankMSG("支店コード",$ret['branchcode']);
            $arrMes['bk_branchname'] = $this->lfSetBankMSG("支店",$ret['branchname']);
            $arrMes['bk_type'] = $this->lfSetBankMSG("口座種別",$ret['banktype']);
            $arrMes['bk_number'] = $this->lfSetBankMSG("口座番号",$ret['banknumber']);
            $arrMes['bk_account'] = $this->lfSetBankMSG("口座名義",$ret['bankaccount']);
            $arrMes['bk_nmf'] = $this->lfSetBankMSG("振込人名義",$arrInput['order_nmf']);
            $arrMes['bk_limit'] = $this->lfSetBankMSG("振込期日",date('Y年n月j日',strtotime($ret['exp'])));

            $gid =  $ret["gid"];	// 決済番号

            // タイトル
            $arrMes['title'] = $this->lfSetBankMSG("銀行振込決済", true);

            // 決済送信データ作成
            $arrModule['module_id'] = PAY_JPAYMENT_BANK;
            $arrModule['payment_total'] = $arrData["payment_total"];
            $arrModule['payment_id'] = PAY_JPAYMENT_BANK;

            // ステータスは未入金にする
            $arrVal['status'] = 2;
            $arrValOrder['status'] = 2;

            //銀行振込決済情報を格納
            $arrVal['order_nmf'] = $_POST["order_nmf"];
            $arrVal['memo01'] = PAY_JPAYMENT_BANK;
            $arrVal['memo02'] = serialize($arrMes);
            $arrVal["memo03"] = $arrPayment[0]["payment_id"];
            $arrVal["memo04"] = $gid;
            $arrVal['memo05'] = serialize($arrModule);

            $arrValOrder['memo01'] = PAY_JPAYMENT_BANK;
            $arrValOrder['memo02'] = serialize($arrMes);
            $arrValOrder["memo03"] = $arrPayment[0]["payment_id"];
            $arrValOrder["memo04"] = $gid;
            $arrValOrder['memo05'] = serialize($arrModule);

            // 受注テーブル更新
            $this->objPurchase->registerOrder($order_id, $arrValOrder);

            // 受注一時テーブル更新
		    $this->objPurchase->saveOrderTemp($uniqid, $arrVal, $this->objCustomer);

		    $this->objPurchase->sendOrderMail($order_id);

            if (is_callable("SC_MobileUserAgent", "isMobile") && SC_MobileUserAgent::isMobile()) {
              $url = $this->getLocation(MOBILE_SHOPPING_COMPLETE_URLPATH);
              SC_Response_Ex::sendRedirect($url, true);
            } else {
              $url = $this->getLocation(SHOPPING_COMPLETE_URLPATH);
              SC_Response_Ex::sendRedirect($url);
            }

          }
          else {
            GC_Utils::gfPrintLog("errcode2:".$ret);
            $this->tpl_error = $ret;
            break;
          }
        }
        break;
      default:
        $this->objFormParam->setParam($arrData);
        break;
	}
    // 表示準備
    $this->arrForm = $this->objFormParam->getFormParamList();

    $arrRet = $this->objQuery->select("payment_method, payment_image", "dtb_payment", "payment_id = ?", array($arrPayment[0]["payment_id"]));

    $this->tpl_title = $arrRet[0]['payment_method'];
    $this->tpl_payment_method = $arrRet[0]['payment_method'];
    $objView->assignobj($this);
  }
    
  /* パラメータ情報の初期化 */
  function initParam($arrData) {
    $this->objFormParam = new SC_FormParam();
    $this->objFormParam->addParam("振込人名義", "order_nmf", STEXT_LEN, "KVCa", array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK","KANA_CHECK"));
  }
  
  /* 入力内容のチェック */
  function checkError() {
    $arrErr = $this->objFormParam->checkError();
    return $arrErr;
  }
  
  function lfSetBankMSG($name, $value) {
    return array("name" => $name, "value" => $value);
  }

}
?>