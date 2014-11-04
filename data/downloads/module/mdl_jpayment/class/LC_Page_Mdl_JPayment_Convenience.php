<?php
  /**
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version LC_Page_Mdl_JPayment_Convenience.php, v2.2.0
   */
require_once(MODULE_REALDIR . "mdl_jpayment/module/Gateway.php");

class LC_Page_Mdl_JPayment_Convenience extends LC_Page_Ex {
  var $objFormParam;
  var $objQuery;
  var $message;
  var $objHelperDB;
  var $arrConv;
  var $objPurchase;
  var $objGateway;
    
    /**
     * コンストラクタ
     * 
     * @return void
     */
  function LC_Page_Mdl_JPayment_Convenience() {
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
      $this->tpl_mainpage = MODULE_REALDIR . MDL_JPAYMENT_CODE . "/template/jpayment_convenience_mobile.tpl";
    } elseif(SC_SmartphoneUserAgent::isSmartphone()) {
      $this->tpl_mainpage = MODULE_REALDIR . MDL_JPAYMENT_CODE . "/template/jpayment_convenience_sphone.tpl";
    } else {
      $this->tpl_mainpage = MODULE_REALDIR . MDL_JPAYMENT_CODE . "/template/jpayment_convenience.tpl";
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
    $objSiteInfo = $objView->objSiteInfo;
    $this->arrInfo = $objSiteInfo->data;
    $this->objCartSess = new SC_CartSession();
    $this->objSiteSess = new SC_SiteSession();
    $this->objCustomer = new SC_Customer();
    //global $arrConvenience;
    $arrConvenience  = array(
      '010' => 'セブンイレブン'
      ,'020' => 'ローソン'
      ,'030' => 'ファミリーマート'
      ,'050' => 'デイリーヤマザキ・ヤマザキデイリーストア・タイムリー'
      ,'060' => 'サークルK・サンクス'
      ,'080' => 'ミニストップ'
      ,'110' => 'am/pm'
      ,'760' => 'セイコーマート'
    );
    //global $arrConveni_message;
    $arrConveni_message = array(
'010' => "
上記のページをプリントアウトして頂くか、もしくは払込票番号をメモして頂き,
お支払い期限までに、最寄りのセブンイレブンにて代金をお支払いください。
"
,'030' =>"
ファミリーマート店頭にございます
Famiポート／ファミネットにて上記の払込票番号の「企業コード-注文番号」を入力し、
申込券を印字後、お支払い期限までに代金をお支払い下さい。
"
,'020' =>"
＜お支払い方法＞
1. ローソンの店内に設置してあるLoppiのトップ画面の中から、
  「インターネット受付」をお選びください。

2. 次画面のジャンルの中から「インターネット受付」をお選びください。

3. 画面に従って「お支払い受付番号」と、ご注文いただいた際の
  「電話番号」をご入力下さい。→Loppiより「申込券」が発券されます。 
    ※申込券の有効時間は30分間です。お早めにレジへお持ち下さい。

4. 申込券に現金またはクレジットカードを添えてレジにて代金を
   お支払い下さい。

5. 代金と引換に「領収書」をお渡しいたします。領収書は大切に保管
   してください。代金払込の証書となります。
"
   ,'760' =>"
＜お支払い方法＞
1.　セイコーマートの店内に設置してあるセイコーマートクラブステーション
   （情報端末）のトップ画面の中から、「インターネット受付」をお選び下さい。

2.  画面に従って「お支払い受付番号」と、お申し込み時の「電話番号」を
　　ご入力いただくとセイコーマートクラブステーションより「決済サービス
　　払込取扱票・払込票兼受領証・領収書（計3枚）」が発券されます。

3.  発券された「決済サービス払込取扱票・払込票兼受領証・領収書（計3枚）」
　　をお持ちの上、レジにて代金をお支払い下さい。 
"
,'080' =>"
上記URLから振込票を印刷し、
　全国のミニストップ・デイリーヤマザキ・ヤマザキデイリーストアにてお支払いください。
"
,'050' =>"
上記URLから振込票を印刷し、
　全国のミニストップ・デイリーヤマザキ・ヤマザキデイリーストアにてお支払いください。
"
,'060' =>"
上記URLから振込票を印刷、もしくはケータイ決済番号を紙などに控えて、
全国のサークルKサンクスにてお支払い下さい。
"
,'110' =>"
上記URLにアクセスし、画面に表記されている内容に基づき、
(am/pm)店頭にてお支払い下さい。
"
   );
    // パラメータ情報の初期化
    $this->initParam($arrData);

    // 支払方法データを取得
    $arrPaymentData = HelperDB::getPaymentDB('2');

    // POST値の取得
    $this->objFormParam->setParam($_POST);

    // カート集計処理
    //$this->objHelperDB->sfTotalCart($this, $this->objCartSess, $this->arrInfo);
    // ユーザユニークIDの取得と購入状態の正当性をチェック
    //$uniqid = SC_Utils_Ex::sfCheckNormalAccess($this->objSiteSess, $this->objCartSess);
    //$uniqid = $this->objSiteSess->getUniqId();
    // 一時受注テーブルの読込
    //$arrData = $this->objHelperDB->sfGetOrderTemp($uniqid);
    $order_id = $_SESSION['order_id'];
    // カート集計を元に最終計算
    //$arrData = $this->objHelperDB->sfTotalConfirm($arrData, $this, $this->objCartSess, $this->arrInfo);
    $arrData = $this->objPurchase->getOrder($order_id);
    $uniqid = $arrData["order_temp_id"];
    $this->tpl_uniqid = $uniqid;

    // 代表商品情報
//        $arrMainProduct = $this->arrProductsClass[0];
    // 支払い情報を取得
    $arrPayment = $this->objQuery->getall("SELECT payment_id, memo01, memo02, memo03, memo04, memo05, memo06, memo07, memo08, memo09, memo10 FROM dtb_payment WHERE payment_id = ? ", array($arrData["payment_id"]));

    // データ送信先CGI
//		$order_url = $arrPayment[0]["memo02"];

    switch (isset($_POST['mode']) ? $_POST['mode'] : "") {
      //戻る
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

      case "send":
        $this->objFormParam->convParam();
        $this->arrErr = $this->checkError($arrRet);
		
        if(count($this->arrErr) <= 0){
          // 正常な推移であることを記録しておく
          $this->objSiteSess->setRegistFlag();

          // 送信データ生成
          $arrSendData = array(
            'user_mail_add' => $arrData["order_email"],							// メールアドレス
            'order_number' => $arrData["order_id"],								// オーダー番号
            'item_price' => $arrData["payment_total"],							// 商品価格(税込み総額)
            'conveni_code' => $_POST["convenience"],							// コンビニコード
            'user_tel' => $_POST["order_tel01"].$_POST["order_tel02"].$_POST["order_tel03"],	// 電話番号
            'user_name_kana' => mb_convert_kana($_POST["order_kana01"].$_POST["order_kana02"],"KVSA")		// 変換後=>氏名(カナ)
            //'user_name_kana' => $_POST["order_kana01"].$_POST["order_kana02"]		// 変換後=>氏名(カナ)
            //'user_name_kana' => $this->objFormParam->param[1].$this->objFormParam->param[2],		// 変換後=>氏名(カナ)

/*
				'contract_code' => $arrPayment[0]["memo01"],						// 契約コード
				'user_id' => $user_id ,												// ユーザID
				'user_name' => $arrData["order_name01"].$arrData["order_name02"],	// ユーザ名
				'user_mail_add' => $arrData["order_email"],							// メールアドレス
				'order_number' => $arrData["order_id"],								// オーダー番号
				'item_code' => $arrMainProduct["product_code"],						// 商品コード(代表)
				'item_name' => $item_name,											// 商品名(代表)
				'item_price' => $arrData["payment_total"],							// 商品価格(税込み総額)
				'st_code' => $arrPayment[0]["memo04"],								// 決済区分
				'mission_code' => '1',												// 課金区分(固定)
				'process_code' => '1',												// 処理区分(固定)
				'xml' => '1',														// 応答形式(固定)
				'conveni_code' => $_POST["convenience"],							// コンビニコード
				'user_tel' => $_POST["order_tel01"].$_POST["order_tel02"].$_POST["order_tel03"],	// 電話番号
				//'user_name_kana' => $_POST["order_kana01"].$_POST["order_kana02"],					// 氏名(カナ)
				'user_name_kana' => $this->objFormParam->param[1].$this->objFormParam->param[2],		// 変換後=>氏名(カナ)
				'haraikomi_mail' => 0,												// 払込メール(送信しない)
				'memo1' => "",														// 予備01
				'memo2' => ECCUBE_PAYMENT . "_" . date("YmdHis"),					// 予備02
*/
          );
			
          // データ送信
          $ret = $this->objGateway->sfPostConvenienceData($arrSendData);

          if($ret['rst'] == 1) {
            // 正常な推移であることを記録しておく
            $this->objSiteSess->setRegistFlag();

            $conveni_code = $ret['cv'];			// コンビニコード
            $conveni_type = $this->lfSetConvMSG("コンビニの種類",$arrConvenience[$ret['cv']]);		// コンビニの種類
            $receipt_no   = $this->lfSetConvMSG("払込票番号",$ret['no']);		// 払込票番号
            $payment_url = $this->lfSetConvMSG("払込票URL",$ret['cu']);			// 払込票URL
            $order_no = $this->lfSetConvMSG("受付番号",$arrData["order_id"]);	// 受付番号
            $tel = $this->lfSetConvMSG("電話番号",$_POST["order_tel01"]."-".$_POST["order_tel02"]."-".$_POST["order_tel03"]);	// 電話番号
            $gid =  $ret["gid"];	// 決済番号
            $ap = $ret["ap"];		// 識別コード

            //コンビニの種類				
            switch($conveni_code) {
              //セブンイレブン
              case '010':
                $arrRet['cv_type'] = $conveni_type;			//コンビニの種類
                $arrRet['cv_payment_url'] = $payment_url;	//払込票URL(PC)
                $arrRet['cv_receipt_no'] = $receipt_no;		//払込票番号
                $arrRet['cv_message'] = $this->lfSetConvMSG("",$arrConveni_message[$conveni_code]);
                break;

              //ファミリーマート
              case '030':
                $arrRet['cv_type'] = $conveni_type;			//コンビニの種類
                $arrRet['cv_order_no'] = $receipt_no;		//受付番号
                $arrRet['cv_message'] = $this->lfSetConvMSG("",$arrConveni_message[$conveni_code]);
                break;

              //ローソン
              case '020':
                $arrRet['cv_type'] = $conveni_type;			//コンビニの種類
                $arrRet['cv_payment_url'] = $payment_url;	//払込票URL(PC)
                $arrRet['cv_receipt_no'] = $receipt_no;		//払込票番号
                $arrRet['cv_tel'] = $tel;					//電話番号
                $arrRet['cv_message'] = $this->lfSetConvMSG("",$arrConveni_message[$conveni_code]);
                break;

              //デイリーヤマザキ・ヤマザキデイリーストア・タイムリー
              case '050':
                $arrRet['cv_type'] = $conveni_type;			//コンビニの種類
                $arrRet['cv_payment_url'] = $payment_url;	//払込票URL(PC)
                $arrRet['cv_order_no'] = $receipt_no;		//受付番号
                $arrRet['cv_message'] = $this->lfSetConvMSG("",$arrConveni_message[$conveni_code]);
                break;

              //サークルK・サンクス	
              case '060':
                $arrRet['cv_type'] = $conveni_type;			//コンビニの種類
                $arrRet['cv_payment_url'] = $payment_url;	//払込票URL(PC)
                $arrRet['cv_order_no'] = $receipt_no;		//受付番号
                $arrRet['cv_message'] = $this->lfSetConvMSG("",$arrConveni_message[$conveni_code]);
                break;

              //ミニストップ
              case '080':
                $arrRet['cv_type'] = $conveni_type;			//コンビニの種類
                $arrRet['cv_payment_url'] = $payment_url;	//払込票URL(PC)
                $arrRet['cv_order_no'] = $receipt_no;		//受付番号
                $arrRet['cv_message'] = $this->lfSetConvMSG("",$arrConveni_message[$conveni_code]);
                break;

              //am/pm	
              case '110':
                $arrRet['cv_type'] = $conveni_type;			//コンビニの種類
                $arrRet['cv_payment_url'] = $payment_url;	//払込票URL(PC)
                $arrRet['cv_order_no'] = $receipt_no;		//受付番号
                $arrRet['cv_message'] = $this->lfSetConvMSG("",$arrConveni_message[$conveni_code]);
                break;

              //セイコーマート
              case '760':
                $arrRet['cv_type'] =$conveni_type;			//コンビニの種類
                $arrRet['cv_payment_url'] = $payment_url;	//払込票URL(PC)
                $arrRet['cv_receipt_no'] = $receipt_no;		//払込票番号
                $arrRet['cv_tel'] = $tel;					//電話番号
                $arrRet['cv_message'] = $this->lfSetConvMSG("",$arrConveni_message[$conveni_code]);
                break;
            }

            // タイトル
            $arrRet['title'] = $this->lfSetConvMSG("コンビニ決済", true);

            // 決済送信データ作成
            $arrModule['module_id'] = PAY_JPAYMENT_CONVENIENCE;
            $arrModule['payment_total'] = $arrData["payment_total"];
            $arrModule['payment_id'] = PAY_JPAYMENT_CONVENIENCE;

            // ステータスは未入金にする
            $arrVal['status'] = 2;
            $arrValOrder['status'] = 2;

            //コンビニ決済情報を格納
            $arrVal['order_tel01'] = $_POST["order_tel01"];
            $arrVal['order_tel02'] = $_POST["order_tel02"];
            $arrVal['order_tel03'] = $_POST["order_tel03"];
            $arrVal['order_kana01'] = $_POST["order_kana01"];
            $arrVal['order_kana02'] = $_POST["order_kana02"];
            $arrVal['conveni_data'] = serialize($arrRet);
            $arrVal['memo01'] = PAY_JPAYMENT_CONVENIENCE;
            $arrVal['memo02'] = serialize($arrRet);
            $arrVal["memo03"] = $arrPayment[0]["payment_id"];
            $arrVal["memo04"] = $gid;
            $arrVal['memo05'] = serialize($arrModule);
            $arrVal['memo06'] = $ap;

            $arrValOrder['memo01'] = PAY_JPAYMENT_CONVENIENCE;
            $arrValOrder['memo02'] = serialize($arrRet);
            $arrValOrder["memo03"] = $arrPayment[0]["payment_id"];
            $arrValOrder["memo04"] = $gid;
            $arrValOrder['memo05'] = serialize($arrModule);
            $arrValOrder['memo06'] = $ap;

            // 受注テーブル更新
            $this->objPurchase->registerOrder($order_id, $arrValOrder);

            // 受注一時テーブル更新
            //$this->objHelperDB->sfRegistTempOrder($arrData['order_temp_id'], $arrVal);
		    //$uniqid = $this->objSiteSess->getUniqId();
		    //$uniqid = SC_Utils_Ex::sfCheckNormalAccess($objSiteSess, $objCartSess);
		    //$uniqid = $_POST['uniqid'];
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

    // 利用可能コンビニ
    $this->objFormParam->setValue("convenience", $arrPayment[0]["memo05"]);
    $this->objFormParam->splitParamCheckBoxes("convenience");
    $arrUseConv = $this->objFormParam->getValue("convenience");

    foreach($arrUseConv as $key => $val){
      $arrConv[$val] = $arrConvenience[$val];
    }

    // 購入金額が30万より大きければセブンイレブンは利用不可
    if($arrData["payment_total"] > SEVEN_CHARGE_MAX) {
      unset($arrConv[11]);
    }
	
    //　表示準備
    $this->arrConv = $arrConv;

    //$this->dispData($arrData["payment_id"]);
	//$this->arrForm = $this->objFormParam->getHashArray();
    $this->arrForm = $this->objFormParam->getFormParamList();

    $arrRet = $this->objQuery->select("payment_method, payment_image", "dtb_payment", "payment_id = ?", array($arrPayment[0]["payment_id"]));

    $this->tpl_title = $arrRet[0]['payment_method'];
    $this->tpl_payment_method = $arrRet[0]['payment_method'];
    $objView->assignobj($this);
  }

	//---------------------------------------------------------------------------------------------------------------------------------------------------------
	//パラメータの初期化
  function initParam($arrData) {
    $this->objFormParam = new SC_FormParam();
    $this->objFormParam->addParam("コンビニの種類", "convenience", INT_LEN, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
    $this->objFormParam->addParam("お名前(セイ)", "order_kana01", STEXT_LEN, "KVCa", array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK","KANA_CHECK"));
    $this->objFormParam->addParam("お名前(メイ)", "order_kana02", STEXT_LEN, "KVCa", array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK","KANA_CHECK"));
    $this->objFormParam->addParam("お電話番号1", "order_tel01", TEL_ITEM_LEN, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK" ,"NUM_CHECK"));
    $this->objFormParam->addParam("お電話番号2", "order_tel02", TEL_ITEM_LEN, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK" ,"NUM_CHECK"));
    $this->objFormParam->addParam("お電話番号3", "order_tel03", TEL_ITEM_LEN, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK" ,"NUM_CHECK"));
  }

  /* 入力内容のチェック */
  function checkError() {
    $arrErr = $this->objFormParam->checkError();
    return $arrErr;
  }

  function lfSetConvMSG($name, $value) {
    return array("name" => $name, "value" => $value);
  }

}
?>