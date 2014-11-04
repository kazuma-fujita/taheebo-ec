<?php
  /**
   * J-Payment決済モジュールのページクラス.
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version LC_Page_Mdl_JPayment_Config.php, v2.2.0
   */
require_once(MODULE_REALDIR . "mdl_jpayment/include.php");
require_once(MODULE_REALDIR . "mdl_jpayment/class/helper/HelperDB.php");
require_once(CLASS_REALDIR . "pages/shopping/LC_Page_Shopping_Complete.php");

class LC_Page_Mdl_JPayment_Config extends LC_Page_Ex {
	var $objFormParam;
	var $arrErr;
	var $module_name;
	var $module_title;
	var $arrUpdateFile;

  /**
   * コンストラクタ
   *
   * @return void
   */
  function LC_Page_Mdl_JPayment_Config()
  {
    $this->module_name = MDL_JPAYMENT_CODE;
    $this->module_title = MDL_JPAYMENT_TITLE;
    $this->objSess = new SC_Session();
    $this->objFormParam = new SC_FormParam();
    $this->setUpdateFile();
  }
  
  /**
   * Page を初期化する.
   *
   * @return void
   */
  function init()
  {
    parent::init();
    $this->tpl_mainpage = MODULE_REALDIR . $this->module_name. "/template/config.tpl";
    $this->tpl_subtitle = $this->module_title;
    $this->arrErr = array();
    global $arrPayment;
    $this->arrPayment = $arrPayment;
    global $arrSecure;
    $this->arrSecure = $arrSecure;
    global $arrCVV;
    $this->arrCVV = $arrCVV;
    global $arrJob;
    $this->arrJob = $arrJob;		
    global $arrConvenience;
    $this->arrConvenience = $arrConvenience;
    // 不足しているカラムがあれば追加する。
    $this->updateTable();
  }
  
  function process() {
    $this->action();
  }

  function action() {
    $objView = new SC_AdminView();
    
    // パラメータ管理クラス
    $this->initParam();
    
    // POST値の取得
    $this->objFormParam->setParam($_POST);
    
    switch (isset($_POST['mode']) ? $_POST['mode'] : "") {
    case 'edit':
      // 入力エラー判定
      $this->arrErr = $this->checkError();
      
      // エラーなしの場合にはデータを更新
      if (count($this->arrErr) == 0) {
        // 支払い方法登録
        $this->setPaymentDB();
        // 設定情報登録
        $this->setConfig();
        
        $this->backupFile();
        
        if ($this->updateFile()) {
          // javascript実行
          $this->tpl_onload = 'alert("登録完了しました。\n基本情報＞支払方法設定より詳細設定をしてください。"); window.close();';
        }
        else {
          // javascript実行
          foreach($this->arrUpdateFile as $array) {
            if(!is_writable($array['dst'])) {
              $alert = $array['dst'] . "に書き込み権限を与えてください。";
              $this->tpl_onload.= "alert(\"". $alert. "\");";
            }
          }
        }
      }
      break;
    case 'module_del':
      // 汎用項目の存在チェック
      $objDB = new SC_Helper_DB_Ex();
      if ($objDB->sfColumnExists("dtb_payment", "memo01")) {
        // 支払方法の削除フラグを立てる
        $table = 'dtb_payment';
        $deleteFlag = array('del_flg' => "1");
        $where = 'module_code = ?';
        $placeHolder = array($this->module_name);
        HelperDB::updateTable($table, $deleteFlag, $where, $placeHolder);
      }
      break;
    default:
      // データのロード
      $arrConfig = $this->getConfig();
      $this->objFormParam->setParam($arrConfig);
      break;
    }
    $this->arrForm = $this->objFormParam->getFormParamList();
    
    $objView->assignobj($this);                    //変数をテンプレートにアサインする
    $objView->display($this->tpl_mainpage);        //テンプレートの出力
  }
  
  /**
   * デストラクタ.
   *
   * @return void
   */
  function destroy() {
    parent::destroy();
  }
  
  /**
   *  パラメータ情報の初期化
   */
  function initParam() {
    $this->objFormParam->addParam("店舗ID", "clientip", INT_LEN, "n", array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
    $this->objFormParam->addParam("利用決済", "payment", "", "", array("EXIST_CHECK"));
    $this->objFormParam->addParam("3Dセキュア", "secure");
    $this->objFormParam->addParam("CVV", "cvv");
    $this->objFormParam->addParam("決済ジョブ", "job","","",array(),1);
    $this->objFormParam->addParam("利用コンビニ", "convenience");
  }
  
  /**
   * エラーチェック
   */
  function checkError() {
    $arrErr = $this->objFormParam->checkError();
    // 利用クレジット、利用コンビニのエラーチェック
    $arrChkPay = $_POST["payment"];
    foreach((array)$arrChkPay as $key => $val) {
      // 利用コンビニ
      if($val == 2 and count($_POST["convenience"]) <= 0) {
	$arrErr["convenience"] = "利用コンビニが選択されていません。<br />";
      }
    }
    return $arrErr;
  }

  
  /**
   * 設定を保存
   */
  function setConfig() {
    $table = 'dtb_module';
    $arrConfig = $this->objFormParam->getHashArray();
    $data = array('sub_data' => serialize($arrConfig));
    $where = 'module_code = ?';
    $placeHolder = array($this->module_name);
    
    HelperDB::updateTable($table, $data, $where, $placeHolder);
  }
  
  /**
   * 設定を取得
   */
  function getConfig() {
    $column = 'sub_data';
    $table = 'dtb_module';
    $where = 'module_code = ?';
    $placeHolder = array($this->module_name);
    
    $result = HelperDB::selectTable($column, $table, $where, $placeHolder);
    $sub_data = unserialize($result[0]['sub_data']);

    return $sub_data;
  }
  
  /**
   * 支払方法DBからデータを取得
   */
  function getPaymentDB($type) {
    $query = 'SELECT module_code, memo05, memo06 FROM dtb_payment WHERE module_code = ? AND memo03 = ?';
    $placeHolder = array($this->module_name, $type);
    
    $result = HelperDB::getAll($query, $placeHolder);

    return $result;
  }
  
  /**
   * データの更新処理
   */
  function setPaymentDB() {
    // 関連する支払方法の削除フラグを立てる
    $table = 'dtb_payment';
    $deleteFlag = array('del_flg' => "1");
    $where = 'module_code = ?';
    $placeHolder = array($this->module_name);
    HelperDB::updateTable($table, $deleteFlag, $where, $placeHolder);
    
    // データ登録
    foreach($_POST["payment"] as $key => $val) {
      // 支払方法データを取得
      //$arrPaymentData = $this->GetPaymentDB("AND memo03 = ?", array($val));

      $arrData = $this->buildColumnToDtbPayment($val, $_POST);
      
      // 支払方法データを取得
      $arrPayment = $this->getPaymentDB($val);

      // 支払方法データが存在する場合, UPDATE 処理を実行
      if (count($arrPayment) > 0) {
        $table = 'dtb_payment';
        $where = 'module_code = ? AND memo03 = ?';
        $placeHolder = array($this->module_name, $val);

        unset($arrData['upper_rule']);

        HelperDB::updateTable($table, $arrData, $where, $placeHolder);
      }
      // 支払方法データが存在しない場合, INSERT 処理を実行
      else {
        // ランクの最大値を取得
        $max_rank = HelperDB::getMaxRank();
        $arrData["rank"] = $max_rank + 1;
        // ペイメント ID のシーケンス番号を取得
        $payment_id_sequence = HelperDB::getPaymentIdSequence();
        $arrData['payment_id'] = $payment_id_sequence;

        $table = 'dtb_payment';
        HelperDB::insertTable($table, $arrData);
      }

      // 銀行振込の際にmtb_order_statusに追加
      if($val == PAY_JPAYMENT_BANK){
        // 決済状態を取得
        $query = 'SELECT id, name, rank FROM mtb_order_status WHERE id = ? OR id = ?';
        $placeHolder = array(PAY_JPAYMENT_BANK_STATUS_UNDER, PAY_JPAYMENT_BANK_STATUS_OVER);
        $arrStatus = HelperDB::getAll($query, $placeHolder);
        if(!count($arrStatus)){
          // mtb_order_status
          $arrDataOrder = array();

          // 過少入金 mtb_order_status
          $arrDataOrder[PAY_JPAYMENT_BANK_STATUS_UNDER] = PAY_JPAYMENT_BANK_STATUS_NAME_UNDER;

          // 過剰入金 mtb_order_status
          $arrDataOrder[PAY_JPAYMENT_BANK_STATUS_OVER] = PAY_JPAYMENT_BANK_STATUS_NAME_OVER;

          // mtb_order_status登録
          $table = 'mtb_order_status';
          $masterData1 = new SC_DB_MasterData_Ex();
          $masterData1->objQuery =& SC_Query_Ex::getSingletonInstance();
          $masterData1->objQuery->begin();
          $masterData1->registMasterData($table, array('id', 'name', 'rank'), $arrDataOrder, false);
          $masterData1->objQuery->commit();

          // mtb_order_status_color
          $arrDataOrderColor = array();

          // 過少入金 mtb_order_status_color
          $arrDataOrderColor[PAY_JPAYMENT_BANK_STATUS_UNDER] = PAY_JPAYMENT_BANK_STATUS_COLOR_UNDER;

          // 過剰入金 mtb_order_status_color
          $arrDataOrderColor[PAY_JPAYMENT_BANK_STATUS_OVER] = PAY_JPAYMENT_BANK_STATUS_COLOR_OVER;

          // mtb_order_status_color登録
          $table = 'mtb_order_status_color';
          $masterData2 = new SC_DB_MasterData_Ex();
          $masterData2->objQuery =& SC_Query_Ex::getSingletonInstance();
          $masterData2->objQuery->begin();
          $masterData2->registMasterData($table, array('id', 'name', 'rank'), $arrDataOrderColor, false);
          $masterData2->objQuery->commit();

        }
      }

    }
  }
  
  /**
   * テーブルを更新
   */
  function updateTable() {
    $objDB = new SC_Helper_DB_Ex();
    $objDB->sfColumnExists('dtb_payment', 'module_code', 'text', "", $add = true);
  }

  /**
   * バックアップ
   *
   * 
   */
  function backupFile() {
    $source = CLASS_REALDIR . 'pages/admin/order/' . 'LC_Page_Admin_Order_Edit.php';
    
    $modified_time = date('YmdHis');
    $destination = MODULE_REALDIR . 'mdl_jpayment/backup/' . $modified_time . '_' . 'LC_Page_Admin_Order_Edit.php';

    if (copy($source, $destination)) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * append/|replace/ から, 各種ディレクトリにコピー・置換するファイルを設定する
   *
   * @return void
   */
  function setUpdateFile() {
    $this->arrUpdateFile = array
      (
       array("src" => MODULE_REALDIR . $this->module_name . "/append/jpayment_3D_recv.php",
	     "dst" => USER_REALDIR . '/jpayment_3D_recv.php'),
       array("src" => MODULE_REALDIR . $this->module_name . "/append/jpayment_recv.php",
	     "dst" => USER_REALDIR . '/jpayment_recv.php'),
       array("src" => MODULE_REALDIR . $this->module_name . "/replace/LC_Page_Admin_Order_Edit.php",
	     "dst" => CLASS_REALDIR . 'pages/admin/order/LC_Page_Admin_Order_Edit.php'),
       array("src" => MODULE_REALDIR . $this->module_name . "/replace/LC_Page_Shopping_Complete_Ex.php",
	     "dst" => CLASS_EX_REALDIR . 'page_extends/shopping/LC_Page_Shopping_Complete_Ex.php'),
       );
  }
    
  /**
   * ファイルを更新
   */
  function updateFile() {
    foreach ($this->arrUpdateFile as $array) {
      $dst_file = $array['dst'];
      $src_file = $array['src'];

      // ファイルが異なる場合
      if (!file_exists($dst_file) || sha1_file($src_file) != sha1_file($dst_file)) {
	if (is_writable($dst_file) || is_writable(dirname($dst_file))) {
	  copy($src_file, $dst_file);
	}
	else {
	  return false;
	}
      }
    }
    return true;
  }


  function buildColumnToDtbPayment($payment_method, $data) {
    $clientip = $data['clientip']; // 店舗ID を取得する

    switch ($payment_method) {
      // 1 ⇒ 「クレジットカード決済」に必要な値を dtb_payment のカラムに沿って設定する
      case 1:
        $strIsSecure = $data['secure'];
        $strIsJobType = $data['job'];
        $strIsCVV = $data['cvv'];
        
        if (isset($strIsSecure)) {
	      // 3D セキュアを利用する場合
          $arrData = array
          (
          "payment_method" => MDL_JPAYMENT_METHOD_CREDIT,
          "fix" => 3,
          "module_code" => $this->module_name,
          "module_path" => MODULE_REALDIR . "mdl_jpayment/jpayment_credit.php",
          "creator_id" => $this->objSess->member_id,
          "create_date" => "now()",
          "update_date" => "now()",
          "memo01" => $clientip,
          "memo02" => THREE_D_SECURE_LINK_URL,
          "memo03" => PAY_JPAYMENT_CREDIT,
          "memo05" => PAY_JPAYMENT_CREDIT_THREE_D_SECURE,
          "upper_rule" => CHARGE_MAX,
          "del_flg" => "0",
          "charge_flg" => "1",
          "upper_rule_max" => CHARGE_MAX
          );
        } else {
          // 3D セキュアを利用しない場合
          $arrData = array
          (
          "payment_method" => MDL_JPAYMENT_METHOD_CREDIT,
          "fix" => 3,
          "module_code" => $this->module_name,
          "module_path" => MODULE_REALDIR . "mdl_jpayment/jpayment_credit.php",
          "creator_id" => $this->objSess->member_id,
          "create_date" => "now()",
          "update_date" => "now()",
          "memo01" => $clientip,
          "memo02" => SECURE_LINK_URL,
          "memo03" => PAY_JPAYMENT_CREDIT,
          "memo05" => NULL,
          "upper_rule" => CHARGE_MAX,
          "del_flg" => "0",
          "charge_flg" => "1",
          "upper_rule_max" => CHARGE_MAX
          );
        }
        
        // 利用するジョブタイプ(AUTH|CAPTURE)に応じて値を設定
        if ($strIsJobType == 1) {
          $arrData['memo06'] = PAY_JPAYMENT_CREDIT_CAPTURE;
        } else {
          $arrData['memo06'] = PAY_JPAYMENT_CREDIT_AUTH;
        }
        
        // CVVを利用する
        if (isset($strIsCVV)) {
          $arrData['memo07'] = 1;
        } else {
          $arrData['memo07'] = 0;
        }
        
        break;
      
      // 2 ⇒ 「コンビニ決済」に必要な値を dtb_payment のカラムに沿って設定する
      case 2:
        //$arrAmount = setMaximumAmountForConvenience($_POST, $arrPaymentData);
        $arrAmount = $this->setMaximumAmountForConvenience($_POST, $arrPaymentData);
        $upper_rule = $arrAmount['upper_rule'];
        $upper_rule_max = $arrAmount['upper_rule_max'];

        // 利用コンビニにチェックが入っている場合には、ハイフン区切りに編集する
        $convCnt = count($data["convenience"]);
        if ($convCnt > 0) {
          $convenience = $data["convenience"][0];
          for ($i = 1 ; $i < $convCnt ; $i++) {
            $convenience .= "-" . $data["convenience"][$i];
          }
        }
      
        $arrData = array
        (
        "payment_method" => MDL_JPAYMENT_METHOD_CONVENIENCE
        ,"fix" => 3
        ,"creator_id" => $this->objSess->member_id
        ,"create_date" => "now()"
        ,"update_date" => "now()"
        ,"upper_rule" => $upper_rule
        ,"module_id" => "0"
        ,"module_code" => $this->module_name
        ,"module_path" => MODULE_REALDIR . "mdl_jpayment/jpayment_convenience.php"
        ,"memo01" => $clientip
        ,"memo02" => CONVENIENCE_LINK_URL
        ,"memo03" => PAY_JPAYMENT_CONVENIENCE
        ,"memo04" => "00100-0000-00000"
        ,"memo05" => $convenience
        ,"del_flg" => "0"
        ,"charge_flg" => "1"
        ,"upper_rule_max" => $upper_rule_max
        );
        
        break;

      // 3 ⇒ 「銀行振込決済」に必要な値を dtb_payment のカラムに沿って設定する
      case 3:
        $arrData = array
        (
        "payment_method" => MDL_JPAYMENT_METHOD_BANK
        ,"fix" => 3
        ,"creator_id" => $this->objSess->member_id
        ,"create_date" => "now()"
        ,"update_date" => "now()"
        ,"upper_rule" => CHARGE_MAX
        ,"module_code" => $this->module_name
        ,"module_path" => MODULE_REALDIR . "mdl_jpayment/jpayment_bank.php"
        ,"memo01" => $clientip
        ,"memo02" => BANK_LINK_URL
        ,"memo03" => PAY_JPAYMENT_BANK
        ,"del_flg" => "0"
        ,"charge_flg" => "1"
        ,"upper_rule_max" => CHARGE_MAX
        );

        break;

      default:
        break;
    }
    
    return $arrData;
  }

  function setMaximumAmountForConvenience($inputData, $paymentData) {
    if($inputData['convenience'] == 1 and $inputData['convenience'][0] == 11) {
      $upper_rule_max = SEVEN_CHARGE_MAX;
      ($paymentData['upper_rule'] > $upper_rule_max or $paymentData['upper_rule'] == '') ? $upper_rule = $upper_rule_max : $upper_rule = $paymentData['upper_rule'];
    } else {
      $upper_rule_max = CHARGE_MAX;
      $upper_rule = $upper_rule_max;
    }
    
    $arrAmount = array(
		       'upper_rule' => $upper_rule,
		       'upper_rule_max' => $upper_rule_max
		       );
    
    return $arrAmount;
  }

  /**
   * 3Dsecure決済完了処理
   * 
   */
  function IfJPayment3DCheck() {
    if($_GET["rst"] == 1 and $_GET["gid"] != "") {
/*
      //order_temp(一時受注テーブル)を更新
      $sql = "UPDATE dtb_order_temp SET update_date = now(), memo04 = ? WHERE order_id = ? ";
      $this->objQuery->query($sql, array($_GET["gid"],$_GET["cod"]));
*/
      // POSTの内容を全てログ保存
      $log_path = DATA_REALDIR . "logs/jpayment_3D.log";
      GC_Utils_Ex::gfPrintLog("jpayment 3D start---------------------------------------------------------", $log_path);
      foreach($_GET as $key => $val) {
      	GC_Utils_Ex::gfPrintLog( "\t" . $key . " => " . $val, $log_path);
      }
      GC_Utils_Ex::gfPrintLog("jpayment 3D end-----------------------------------------------------------", $log_path);
      
      // 正常に登録されたことを記録
      $this->objSiteSess = new SC_SiteSession();
      
      // 決済情報を取得
      $objQuery = new SC_Query();
      $arrResults = $objQuery->getAll("SELECT memo07 FROM dtb_order WHERE order_id = ? ", array($_GET["cod"]));
      $objPurchase = new SC_Helper_Purchase();
      if (count($arrResults) > 0) {
        if (isset($arrResults[0]["memo07"]) && $arrResults[0]["memo07"]=="CAPTURE") {
          // 受注データ更新
          $objPurchase->sfUpdateOrderStatus($_GET["cod"], ORDER_PRE_END);
        } elseif (isset($arrResults[0]["memo07"]) && $arrResults[0]["memo07"]=="AUTH") {
          // 受注データ更新
          $objPurchase->sfUpdateOrderStatus($_GET["cod"], ORDER_PAY_WAIT);
        }
      }
      $_SESSION['order_id'] = $_GET["cod"];
      
      $this->objSiteSess->setRegistFlag();
      $objPurchase->sendOrderMail($_SESSION['order_id']);
      if (SC_MobileUserAgent::isMobile()) {
      	SC_Response::sendRedirect(MOBILE_SHOPPING_COMPLETE_URLPATH);
      } else {
      	SC_Response::sendRedirect(SHOPPING_COMPLETE_URLPATH);
      }
    } else {
    }
  }
  
  /**
   * キックバック通知受信処理
   * 
   */
  function IfJPaymentRecv() {
    if($_GET["rst"] == 1 and $_GET["gid"] != "" and $_GET["cod"] != "") {
      // POSTの内容を全てログ保存
      $log_path = DATA_REALDIR . "logs/jpayment_recv.log";
      GC_Utils_Ex::gfPrintLog("jpayment Recv start---------------------------------------------------------", $log_path);
      foreach($_GET as $key => $val) {
      	GC_Utils_Ex::gfPrintLog( "\t" . $key . " => " . $val, $log_path);
      }
      GC_Utils_Ex::gfPrintLog("jpayment Recv end-----------------------------------------------------------", $log_path);
      
      // 正常に登録されたことを記録
      $this->objSiteSess = new SC_SiteSession();
      
      // 決済情報を取得
      $objQuery = new SC_Query();
      $arrResults = $objQuery->getAll("SELECT memo04 FROM dtb_order WHERE order_id = ? ", array($_GET["cod"]));
      $objPurchase = new SC_Helper_Purchase();
      if (count($arrResults) > 0 and $arrResults[0]["memo04"] == $_GET["gid"]) {
        switch ($_GET["ap"]) {
          case "CPL":
            // コンビニ入金確定
            // 受注データ更新
            $objPurchase->sfUpdateOrderStatus($_GET["cod"], ORDER_PRE_END);
            break;
          
          case "CVS_CAN":
            // コンビニ入金取消
            // 受注データ更新
            $objPurchase->sfUpdateOrderStatus($_GET["cod"], ORDER_CANCEL);
            break;
          
          case "BAN_SAL":
            // 銀行振込
            switch ($_GET["mf"]) {
              case 1:
                // マッチ
                // 受注データ更新
                $objPurchase->sfUpdateOrderStatus($_GET["cod"], ORDER_PRE_END);
                break;
              
              case 2:
                // 過少
                // 受注データ更新
                $objPurchase->sfUpdateOrderStatus($_GET["cod"], PAY_JPAYMENT_BANK_STATUS_UNDER);
                break;
              
              case 3:
                // 過剰
                // 受注データ更新
                $objPurchase->sfUpdateOrderStatus($_GET["cod"], PAY_JPAYMENT_BANK_STATUS_OVER);
                break;
              
              default:
                break;
              
            }
            break;
          
          default:
            break;
        }
      }
    }
    echo "ok";
  }
  
}
?>