<?php
  /**
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version LC_Page_Mdl_JPayment_Payment.php, v2.2.0
   */
require_once(MODULE_REALDIR . "mdl_jpayment/module/Gateway.php");

class LC_Page_Mdl_JPayment_Payment extends LC_Page_Ex {
  var $objFormParam;
  var $objQuery;
  var $arrPaymentClass;
  var $message;
  var $objHelperDB;
  var $arrPaymentData;
  var $objPurchase;
  var $objGateway;
  
  /**
   * コンストラクタ
   * 
   * @return void
   */
  function LC_Page_Mdl_JPayment_Payment() {
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
      $this->tpl_mainpage = MODULE_REALDIR . MDL_JPAYMENT_CODE . "/template/jpayment_credit_mobile.tpl";
    } elseif(SC_SmartphoneUserAgent::isSmartphone()) {
      $this->tpl_mainpage = MODULE_REALDIR . MDL_JPAYMENT_CODE . "/template/jpayment_credit_sphone.tpl";
    } else {
      $this->tpl_mainpage = MODULE_REALDIR . MDL_JPAYMENT_CODE . "/template/jpayment_credit.tpl";
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

/// modified start
    // 一時受注テーブルの読込
    $order_id = $_SESSION['order_id'];
    //$orderTempData = $objPurchase->getOrderTempByOrderId($order_id);
    $arrData = $this->objPurchase->getOrder($order_id);
/// modified end
    //$uniqid = $this->objSiteSess->getUniqId();
    $uniqid = $arrData["order_temp_id"];
    $this->tpl_uniqid = $uniqid;
    
    // パラメータ情報の初期化
    //$this->initParam($arrData);
    $this->initParam($arrData);
    
    // 支払方法データを取得
    $arrPaymentData = HelperDB::getPaymentDB('1');
    
    // POST値の取得
    $this->objFormParam->setParam($_POST);
    
    // 支払い情報を取得
    
    $arrPayment = $this->objQuery->getall("SELECT payment_id, memo01, memo02, memo03, memo04, memo05, memo06, memo07, memo08, memo09, memo10 FROM dtb_payment WHERE payment_id = ? ", array($arrData["payment_id"]));
    
    switch (isset($_POST['mode']) ? $_POST['mode'] : "") {
		// 戻る
		case 'return':
			// 正常な推移であることを記録しておく
			$this->objSiteSess->setRegistFlag();
			$this->cleanupOrderTable($arrData['order_id']);
			SC_Response::sendRedirect(SHOPPING_CONFIRM_URLPATH);
			exit;
			break;
		case 'next':
			// 入力値の変換
			$this->objFormParam->convParam();
			$this->arrErr = $this->checkError($arrRet);
			// 3Dsecureチェック
			$Secure_Check = $arrPaymentData[0]["memo05"];
			$Job_Method = $arrPaymentData[0]["memo06"];
			
			if($Secure_Check == "secure") {
				if(count($this->arrErr) == 0) {
					// 正常な推移であることを記録しておく
					$this->objSiteSess->setRegistFlag();
					
					// 入力データの取得を行う
					$arrInput = $this->objFormParam->getHashArray();
					// 電文送信
					$ret = $this->objGateway->sfPostPaymentData($arrData, $arrInput, $Secure_Check,$Job_Method);
					// 3Dsecure対応ではないカードを入力する場合 => クレジットカード決済処理
					if(trim($ret)=="OK") {
						$ret = true;
						$this->sendData($ret);
					} elseif ($res = strstr($ret,"ER")) {
						$this->sendData($ret);
					} else {
						$arrModule['module_id'] = $this->lfSetConvMSG("モジュールタイプ",PAY_JPAYMENT_CREDIT_THREE_D_SECURE);
						$arrModule['payment_total'] = $this->lfSetConvMSG("合計金額",$arrData["payment_total"]);
						$arrModule['payment_id'] = $this->lfSetConvMSG("決済タイプ", PAY_JPAYMENT_CREDIT);
						
						// ステータス
						if ($arrPayment[0]["memo06"] == "CAPTURE") {
							$arrVal['status'] = 6;
						} elseif ($arrPayment[0]["memo06"] == "AUTH") {
							$arrVal['status'] = 2;
						}
						
						// 3Dsecure情報格納
						$arrVal['order_name01'] = $_POST['card_name01'];
						$arrVal['order_name02'] = $_POST['card_name02'];
						
						$arrVal['memo01'] = PAY_JPAYMENT_CREDIT;
						$arrVal["memo03"] = $arrPayment[0]["payment_id"];
						$arrVal['memo06'] = $arrPayment[0]["memo05"];
						$arrVal['memo07'] = $arrPayment[0]["memo06"];

						$arrValOrder['memo01'] = PAY_JPAYMENT_CREDIT;
						$arrValOrder["memo03"] = $arrPayment[0]["payment_id"];
						$arrValOrder['memo06'] = $arrPayment[0]["memo05"];
						$arrValOrder['memo07'] = $arrPayment[0]["memo06"];
						
						// 不要文字の削除
						$arrRet = split('.aspx',$ret);
						$url = $arrRet[0].".aspx";
						$arrVal['memo09'] = $url;

						$arrValOrder['memo09'] = $url;
						
						// 受注テーブル更新
						$this->objPurchase->registerOrder($order_id, $arrValOrder);

						// 受注一時テーブルに更新
						$this->objPurchase->saveOrderTemp($uniqid, $arrVal, $this->objCustomer);
						//SC_Response_Ex::sendRedirect($ret);
						header("Location: $url");
						exit;
					}
				}
			} else {
				// 入力エラーなしの場合
				if(count($this->arrErr) == 0) {
					// 入力データの取得を行う
					$arrInput = $this->objFormParam->getHashArray();
					// 電文送信
					$ret = $this->objGateway->sfPostPaymentData($arrData, $arrInput, $Secure_Check, $Job_Method);
					$this->sendData($ret);
				}
			}
			break;
		default:
			break;
	}
    // 表示準備
/// modified start
    ///        $this->dispData($_SESSION["payment_id"]);
    $this->dispData($arrData["payment_id"]);
/// modified end
    $this->arrForm = $this->objFormParam->getFormParamList();
    
    $objView->assignobj($this);
  }
    
  /* パラメータ情報の初期化 */
  function initParam($arrData) {
    $this->objFormParam->addParam("支払回数", "payment_class", INT_LEN, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
    $this->objFormParam->addParam("カード番号1", "card_no01", 5, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
    $this->objFormParam->addParam("カード番号2", "card_no02", 5, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
    $this->objFormParam->addParam("カード番号3", "card_no03", 5, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
    $this->objFormParam->addParam("カード番号4", "card_no04", 5, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
    $this->objFormParam->addParam("カード期限年", "card_year", 2, "n", array("EXIST_CHECK", "NUM_COUNT_CHECK", "NUM_CHECK"));
    $this->objFormParam->addParam("カード期限月", "card_month", 2, "n", array("EXIST_CHECK", "NUM_COUNT_CHECK", "NUM_CHECK"));
    $this->objFormParam->addParam("名", "card_name01", STEXT_LEN, "KVa", array("EXIST_CHECK", "MAX_LENGTH_CHECK", "ALPHA_CHECK"));
    $this->objFormParam->addParam("姓", "card_name02", STEXT_LEN, "KVa", array("EXIST_CHECK", "MAX_LENGTH_CHECK", "ALPHA_CHECK"));
    // CVV対応
    $memo07 = $this->objQuery->get("memo07", "dtb_payment", "payment_id = ? ", array($arrData["payment_id"]));
    if($memo07){
      $this->objFormParam->addParam("CVV番号", "card_cvv", 4, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
    }
  }
  
  /* 入力内容のチェック */
  function checkError() {
    $arrErr = $this->objFormParam->checkError();
    return $arrErr;
  }
  
  /**
   * データ送信
   */
  function sendData($ret) {
    // 成功
    if ($ret === true) {
      // 正常に登録されたことを記録
      $this->objSiteSess->setRegistFlag();
      $this->objPurchase->sendOrderMail($_SESSION['order_id']);
      if (SC_MobileUserAgent::isMobile()) {
        SC_Response::sendRedirect(MOBILE_SHOPPING_COMPLETE_URLPATH);
      } else {
        SC_Response::sendRedirect(SHOPPING_COMPLETE_URLPATH);
      }
    }
    // 失敗
    else {
      GC_Utils::gfPrintLog("errcode2:".$ret);
      $this->tpl_error = $ret;
    }
  }
  
  /**
   * 表示処理
   */
  function dispData($payment_id) {
    // 支払方法の説明画像を取得
    //$arrRet = $this->objQuery->select("payment_method, payment_image", "dtb_payment", "payment_id = ?", array($payment_id));
    $arrRet = $this->objQuery->select("payment_method, payment_image, memo07", "dtb_payment", "payment_id = ?", array($payment_id));
    $this->tpl_title = $arrRet[0]['payment_method'];
    $this->tpl_payment_method = $arrRet[0]['payment_method'];
    $this->tpl_payment_image = $arrRet[0]['payment_image'];
    
    // クレジット支払回数
/// modified start
///    global $arrPaymentClass;
    $arrPaymentClass = array
      (
       '10' => '一括払い',
       '61-3' => '分割3回払い',
       '61-5' => '分割5回払い',
       '61-6' => '分割6回払い',
       '61-10' => '分割10回払い',
       '61-12' => '分割12回払い',
       '61-15' => '分割15回払い',
       '61-18' => '分割18回払い',
       '61-20' => '分割20回払い',
       '61-24' => '分割24回払い',
       '80-0' => 'リボ払い'
       );
/// modified end
    $this->arrPaymentClass = $arrPaymentClass;
    
    // 月日配列
    $objDate = new SC_Date();
    
/// modified start
    ///$objDate->setStartYear(RELEASE_YEAR);
    ///$objDate->setEndYear(RELEASE_YEAR + CREDIT_ADD_YEAR);
    $year = date('Y');
    $objDate->setStartYear($year);
    $objDate->setEndYear($year + CREDIT_ADD_YEAR);
/// modified end
    $this->arrYear = $objDate->getZeroYear();
    $this->arrMonth = $objDate->getZeroMonth();
    
    // CVV対応
    $this->tpl_cvv = $arrRet[0]['memo07'];
    
  }
  
  function lfSetConvMSG($name, $value) {
    return array("name" => $name, "value" => $value);
  }

  function cleanupOrderTable($order_id) {
    $this->objPurchase->rollbackOrder($order_id);
    $placeHolder = array('del_flg' => 1);
    $this->objPurchase->registerOrder($order_id, $placeHolder);
  }
  
}
?>