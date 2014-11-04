<?php
  /**
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version Gateway.php, v2.2.0
   */
require_once(MODULE_REALDIR . 'mdl_jpayment/include.php');
require_once(MODULE_REALDIR . 'mdl_jpayment/class/helper/HelperDB.php');
require_once(MODULE_REALDIR . 'mdl_jpayment/class/Error_JPayment.php');

class Gateway {
  
  function Gateway() {
    
  }
  
  /**
   * クレジットカード決済情報送信処理
   * @param $arrData
   * @param $arrInput
   * @param $Secure_Check
   * @param $Job_Method
   *
   * @return 
   */
  function sfPostPaymentData($arrData, $arrInput, $Secure_Check, $Job_Method) {
    // クイックチャージは利用しない
    $arrPaymentDB = HelperDB::sfGetPaymentDB(MDL_JPAYMENT_CODE);
    $merchant_id = $arrPaymentDB['clientip'];
    
    $arrPost = array
      (
       'aid' => $merchant_id,
       //'jb' => 'CAPTURE',
       'rt' => '1',
       'cod' => $arrData['order_id'],
       'cn' => $arrInput['card_no01'].$arrInput['card_no02'].$arrInput['card_no03'].$arrInput['card_no04'],
       'ed' => $arrInput['card_year'].$arrInput['card_month'],
       'fn' => $arrInput['card_name01'],
       'ln' => $arrInput['card_name02'],
       'em' => $arrData['order_email'],
       'pn' => $arrData['order_tel01'].$arrData['order_tel02'].$arrData['order_tel03'],
       'am' => $arrData['payment_total'],
       'tx' => '0',
       'sf' => '0',
       );
    
    if ($splits = explode("-",$arrInput['payment_class'])) {
      $arrPost['md'] = $splits[0];
      $arrPost['pt'] = $splits[1];
      GC_Utils::gfPrintLog('md:' . $arrPost['md'], DATA_REALDIR . 'logs/test.log');
      GC_Utils::gfPrintLog('pt:' . $arrPost['pt'], DATA_REALDIR . 'logs/test.log');
    } else {
      $arrPost['md'] = $arrInput['payment_class'];
    }
    
    //決済ジョブ種類
    switch ($Job_Method) {
      case PAY_JPAYMENT_CREDIT_AUTH:
        $arrPost['jb'] = PAY_JPAYMENT_CREDIT_AUTH;
        break;
      case PAY_JPAYMENT_CREDIT_CAPTURE:
        $arrPost['jb'] = PAY_JPAYMENT_CREDIT_CAPTURE;
        break;
    }

    // CVV対応
    if(isset($arrInput['card_cvv']) and $arrInput['card_cvv'] > 0) {
      $arrPost['cvv'] = $arrInput['card_cvv'];
    }

    // 3D Secure の利用可否をチェックする
    switch (isset($Secure_Check)) {
      // 3D Secure を利用する場合(dtb_payment の memo05 が 'secure' の場合)
      case PAY_JPAYMENT_CREDIT_THREE_D_SECURE:
        $arrPost["rt"] = 1;
        $arrPost["cod"] = $arrData['order_id'];
        $arrPost["url"] = USER_URL . 'jpayment_3D_recv.php';
        $response = $this->do_post_request(THREE_D_SECURE_LINK_URL, $arrPost, $arrData);
        break;
      // 3D Secure を利用しない場合(dtb_payment の memo05 が NULL の場合)
      case NULL:
        $response = $this->do_post_request(SECURE_LINK_URL, $arrPost, $arrData);
        break;
    }
    
    return $response;
  }
  

  
  function setURLParameter() {
    
  }
  
  function getURL($url, $data) {
    $aid = $data['aid'];
    $jb = $data['jb'];
    $rt = $data['rt'];
    $cod = $data['cod'];
    $cn = $data['cn'];
    $ed = $data['ed'];
    $fn = $data['fn'];
    $ln = $data['ln'];
    $em = $data['em'];
    $pn = $data['pn'];
    $am = $data['am'];
    $tx = $data['tx'];
    $sf = $data['sf'];
    $md = $data['md'];
    $pt = $data['pt'] != "" ? $data['pt'] : "";
    $cvv = $data['cvv'] != "" ? $data['cvv'] : "";

    $url .= "?aid=$aid&jb=$jb&rt=$rt&cod=$cod&cn=$cn&ed=$ed&fn=$fn&ln=$ln&em=$em&pn=$pn&am=$am&tx=$tx&sf=$sf";
    if ($md != '10') {
      $url .= "&md=$md&pt=$pt&bt=0&ba=0";
    }
    if ($cvv != "") {
      $url .= "&cvv=$cvv";
    }
    
    return $url;
  }
  
  
  function do_post_request($url, $data, $arrData, $optional_headers = null) {
    $objQuery = new SC_Query();
    $objPurchase = new SC_Helper_Purchase();
    
    $url = $this->getURL($url, $data);
    $jb = $data['jb'];
    
    //ジョブ種類によって、商品の対応状況が異なる（CAPTURE=入金済み、AUTH=入金待ち）
    switch ($jb) {
      case PAY_JPAYMENT_CREDIT_AUTH:
        // ORDER_PAY_WAIY:2(入金待ち)
        $jb_status = ORDER_PAY_WAIT;
        break;
      case PAY_JPAYMENT_CREDIT_CAPTURE:
        // ORDER_PRE_END:6(入済金み)
        $jb_status = ORDER_PRE_END;
        break;
    }

    switch (isset($data['url'])) {
      case true:
        // 3D Secure を利用する場合
        $secure_url = $data["url"];
        $url .= "&url=$secure_url";
      
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);	
        curl_setopt($ch, CURLOPT_POSTFIELDS, null);
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
      
        $output = curl_exec($ch);
      
        GC_Utils::gfPrintLog("fpread:".$output);
        curl_close($ch);
      
        $reparm = strstr($output, "ER:");
      
        if ($reparm) {
          $retexp = explode(':',$reparm);
          $reterror = trim($retexp[1]);
          // エラー
          $error_jp = Read_Error_Sentence_JPayment($reterror);
          GC_Utils::gfPrintLog("errcode:".$error_jp);
          return $error_jp;
        }
      
        $resstr = strpos($output,"http");
      
        if ($resstr === false) {
          //3Dsecureに対応していないカード
          $result_array = explode(',',$output);
          if ($result_array[1] == 1) {
            // 3Dセキュアに対応していないカードで, 決済に成功した場合
            //order_temp(一時受注テーブル)を更新	
            $sql = "UPDATE dtb_order_temp SET update_date = now(), status = ?,memo03 = ?, memo06 = ?, memo04 = ?,memo07=?  WHERE order_id = ? ";
            $arrRet = $objQuery->query($sql, array($jb_status,$arrData['payment_id'],'secure('.$result_array[2].')',$result_array[0],$jb,$result_array[5]));
            return "OK";
          } else {
            // 3Dセキュアに対応していないカードで, 決済に失敗した場合
            $error_jp = Read_Error_Sentence_JPayment($result_array[3]);
            GC_Utils::gfPrintLog("errcode:".$error_jp);
            return $error_jp;
          }
        } else {
          return $output;
        }
        break;
      
      case false:
        // 3Dセキュアを利用しない場合
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      
        curl_setopt($ch, CURLOPT_POSTFIELDS, null);
        curl_setopt($ch, CURLOPT_POST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
      
        $output = curl_exec($ch);
        GC_Utils::gfPrintLog("fpread:".$output);
        curl_close($ch);
      
        $result_array = explode(',',$output);
      
        if ($result_array[1] == 1) {
	//order_temp(一時受注テーブル)を更新
/// modified start
	///		$sql = "UPDATE dtb_order_temp SET update_date = now(), status = ?,memo03 = ?, memo06 = ?, memo04 = ?,memo07=?  WHERE order_id = ? ";
	///		$arrRet = $objQuery->query($sql, array($jb_status,$arrData['payment_id'],$result_array[2],$result_array[0],$jb,$result_array[5]));
/// modified end
	
          $payment_id = $arrData['payment_id'];
          $jb_type = $jb;
          $order_id = $result_array[5];
	
          $arrData['status'] = $jb_status;
          $arrData['memo01'] = PAY_JPAYMENT_CREDIT;
          $arrData['memo03'] = $payment_id;
          $arrData['memo04'] = $result_array[0];
          $arrData['memo06'] = $result_array[2];
          $arrData['memo07'] = $jb_type;
          // 受注情報を更新
          $objPurchase->registerOrder($order_id, $arrData);
          // 受注ステータスを変更
          $objPurchase->sfUpdateOrderStatus($order_id, $arrData["status"]);
          /// modified end
          return true;
        }
        else {
          $error_jp = Read_Error_Sentence_JPayment($result_array[3]);
          //GC_Utils::gfPrintLog("errcode:".$error_jp , DATA_PATH."logs/test.log");
          GC_Utils::gfPrintLog("errcode:".$error_jp);
          return $error_jp;
        }
        break;
      default:
        break;
    }
  }
  
  
  /***********************************************************************************************
   * 関数名：sfPostConvenienceData
   * 処理内容：コンビニペーパーレス決済データ送信処理
   * 引数1：
   * 引数2：
   * 引数3：
   * 戻り値	：取得結果
   ***********************************************************************************************/
  
  function sfPostConvenienceData($arrSendData){
    $arrPaymentDB = HelperDB::sfGetPaymentDB(MDL_JPAYMENT_CODE);
    
    $arrPost = array
      (
       'aid' => $arrPaymentDB['clientip'],
       'jb' => 'CAPTURE',
       'rt' => '1',
       'cod' => $arrSendData["order_number"],
       'em' => $arrSendData['user_mail_add'],
       'pn' => $arrSendData['user_tel'],
       'am' => $arrSendData['item_price'],
       'tx' => '0',
       'sf' => '0',
       'na' => $arrSendData["user_name_kana"],
       'cv' => $arrSendData['conveni_code'],
       );
    $response = $this->convenience_post_request(CONVENIENCE_LINK_URL, $arrPost);
    return $response;
  }
  
  /***********************************************************************************************
   * 関数名：convenience_post_request
   * 処理内容：POSTする
   * 引数1：w
   * 引数2：
   * 引数3：
   * 戻り値：$response
   ***********************************************************************************************/
  function convenience_post_request($url, $data, $optional_headers = null) {
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);	
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    GC_Utils::gfPrintLog("fpread:".$output);
    curl_close($ch);
    
    
    $ex_array = explode(',',$output);
    $ex2_array = explode('&',$ex_array[12]);
    $ex3_array = explode('=',$ex2_array[0]);
    $ex_cv = $ex3_array[1];
    $ex3_array = explode('=',$ex2_array[1]);
    $ex_no = $ex3_array[1];
    $ex3_array = explode('=',$ex2_array[2]);
    $ex_cu = $ex3_array[1];		
    
    $result_array =array
      (
       'gid' => $ex_array[0],
       'rst' => $ex_array[1],
       'ap' => $ex_array[2],
       'ec' => $ex_array[3],
       'god' => $ex_array[4],
       'cod' => $ex_array[5],
       'am' => $ex_array[6],
       'tx' => $ex_array[7],
       'sf' => $ex_array[8],
       'ta' => $ex_array[9],
       'id' => $ex_array[10],
       'ps' => $ex_array[11],
       'cv' => $ex_cv,
       'no' => $ex_no,
       'cu' => urldecode($ex_cu),
       );
    
    if ($result_array['rst'] == 1) {
      //デコード処理
      return $result_array;
    }
    else {
      $error_jp = Read_Error_Sentence_JPayment($result_array['ec']);
      GC_Utils::gfPrintLog("errcode:".$error_jp);
      return $error_jp;
    }
  }

  /***********************************************************************************************
   * 関数名：sfPostBankData
   * 処理内容：銀行振込決済データ送信処理
   * 引数1：
   * 引数2：
   * 引数3：
   * 戻り値	：取得結果
   ***********************************************************************************************/
  
  function sfPostBankData($arrData, $arrInput){
    $arrPaymentDB = HelperDB::sfGetPaymentDB(MDL_JPAYMENT_CODE);
    
    $arrPost = array
      (
       'aid' => $arrPaymentDB['clientip'],
       'jb' => 'CAPTURE',
       'rt' => '1',
       'cod' => $arrData['order_id'],
       'em' => $arrData['order_email'],
       'pn' => $arrData['order_tel01'].$arrData['order_tel02'].$arrData['order_tel03'],
       'am' => $arrData['payment_total'],
       'tx' => '0',
       'sf' => '0',
       'nmf' => $arrInput['order_nmf'],
       'po' => $arrData['order_zip01'].$arrData['order_zip02']
       );
    $response = $this->bank_post_request(BANK_LINK_URL, $arrPost);
    return $response;
  }
  
  /***********************************************************************************************
   * 関数名：bank_post_request
   * 処理内容：POSTする
   * 引数1：w
   * 引数2：
   * 引数3：
   * 戻り値：$response
   ***********************************************************************************************/
  function bank_post_request($url, $data, $optional_headers = null) {
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);	
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    GC_Utils::gfPrintLog("fpread:".$output);
    curl_close($ch);

    $par = explode(',',$output);

    $ans = array();
    $ans['gid'] = $par[0];
    $ans['rst'] = $par[1];
    $ans['ap'] = $par[2];
    $ans['ec'] = $par[3];
    $ans['god'] = $par[4];
    $ans['cod'] = $par[5];
    $ans['am'] = $par[6];
    $ans['tx'] = $par[7];
    $ans['sf'] = $par[8];
    $ans['ta'] = $par[9];
    $ans['id'] = $par[10];
    $ans['ps'] = $par[11];
    $ans['bank'] = mb_convert_encoding($par[12], 'utf8', 'sjis');
    $ans['exp'] = $par[13];

    $bankpar = explode('.',$ans['bank']);
    $ans['bankcode'] = $bankpar[0];
    $ans['bankname'] = $bankpar[1];
    $ans['branchcode'] = $bankpar[2];
    $ans['branchname'] = $bankpar[3];
    $ans['banktype'] = $bankpar[4];
    $ans['banknumber'] = $bankpar[5];
    $ans['bankaccount'] = $bankpar[6];

    if ($ans['rst'] == 1) {
      return $ans;
    }
    else {
      $error_jp = Read_Error_Sentence_JPayment($ans['ec']);
      GC_Utils::gfPrintLog("errcode:".$error_jp);
      return $error_jp;
    }
  }
  
  /***********************************************************************************************
   * 関数名：sfPostSalesData
   * 処理内容：実売上送信処理
   * 引数1：
   * 引数2：
   * 引数3：
   * 戻り値	：$response
   ***********************************************************************************************/
  
  function sfPostSalesData($order_id){
    
    $objQuery = new SC_Query();   
    $arrPaymentDB = HelperDB::sfGetPaymentDB(MDL_JPAYMENT_CODE);
    
    //決済番号取得
    $arrVal = array($order_id);	
    $arrRet = array();
    $sql = "SELECT status,memo03,memo04,memo07 FROM dtb_order WHERE order_id = ? ";
    $arrRet = $objQuery->getall($sql,array($order_id));
    
    //決済方法取得
    $sql = "SELECT del_flg, memo03 FROM dtb_payment WHERE payment_id = ? ";
    $PaymentMethod = $objQuery->getall($sql,array($arrRet[0]['memo03']));
    $paymentflag = $PaymentMethod[0]['memo03'];
    $del_flg = $PaymentMethod[0]['del_flg'];
    
    $arrPost = array
      (
       'aid' => $arrPaymentDB['clientip'],
       'jb' => 'SALES',
       'rt' => '1',
       'tid' => $arrRet[0]['memo04'],
       );
    
    //カード決済以外の実売上が対象外
    if ($del_flg == 0 && $paymentflag == 1 && $arrRet[0]['memo07'] == "AUTH") {
      //実売上処理
      $response = $this->do_post_requestsales(SECURE_LINK_URL, $arrPost);    	
      
      if ($response == 1) {
        echo " <script> alert( '実売上処理が成功しました。'); </script> ";
        return true;
      } elseif (strpos($response,"ER032") !== false) {
        echo "<script>alert('既に実売上処理が行われておりますので、データ編集のみ行われます。'); </script>";		
        return true;
      } else {
        echo "<script>alert('$response'); </script>";
        return $response;
      }		
    }
    else {
      return;
    }
  }
  
  /***********************************************************************************************
   * 関数名：do_post_requestsales
   * 処理内容:実売上
   * 引数1：
   * 引数2：
   * 引数3：
   * 戻り値：
   ***********************************************************************************************/
  function do_post_requestsales($url, $arrPost, $optional_headers = null) {
    
    $aid = $arrPost['aid'];
    $jb = $arrPost['jb'];
    $rt = $arrPost['rt'];
    $tid = $arrPost['tid'];
    
    $url .= "?aid=$aid&jb=$jb&rt=$rt&tid=$tid";
    
    //クレジットカード決済
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, null);
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
    
    $output = curl_exec($ch);
    GC_Utils::gfPrintLog("fpread:".$output);
    curl_close($ch);
    
    $result_array = explode(',',$output);
    
    if ($result_array[1] == 1) {
      return true;
    }
    else {
      //処理結果を全てログ保存
      $log_path = DATA_PATH . "logs/jpayment_sales.log";
      GC_Utils::gfPrintLog("jpayment_sales  start---------------------------------------------------------", $log_path);
      foreach($result_array as $key => $val) {
        GC_Utils::gfPrintLog( "\t" . $key . " => " . $val, $log_path);
      }
      GC_Utils::gfPrintLog("jpayment_sales  end-----------------------------------------------------------", $log_path);
      
      $error_jp = Read_Error_Sentence_JPayment($result_array[3]);
      //GC_Utils::gfPrintLog("errcode:".$error_jp , DATA_PATH."logs/test.log");
      GC_Utils::gfPrintLog("errcode:".$error_jp);
      return $error_jp;
    }
  }
  
  /***********************************************************************************************
   * 関数名：sfPostCancelData
   * 処理内容：取消送信処理
   * 引数1：
   * 引数2：
   * 引数3：
   * 戻り値	：$response
   ***********************************************************************************************/
  
  function sfPostCancelData($order_id){
    
    $objQuery = new SC_Query();
    $arrPaymentDB = HelperDB::sfGetPaymentDB(MDL_JPAYMENT_CODE);
    
    //決済番号取得
    $arrVal = array($order_id);	
    $arrRet = array();
    $sql = "SELECT status,memo03,memo04 FROM dtb_order WHERE order_id = ? ";
    $arrRet = $objQuery->getall($sql,array($order_id));
    
    //決済方法取得
    $sql = "SELECT del_flg, memo03 FROM dtb_payment WHERE payment_id = ? ";
    $PaymentMethod = $objQuery->getall($sql,array($arrRet[0]['memo03']));
    $paymentflag = $PaymentMethod[0]['memo03'];
    $del_flg = $PaymentMethod[0]['del_flg'];
    
    $arrPost = array
      (
       'aid' => $arrPaymentDB['clientip'],
       'jb' => 'CANCEL',
       'rt' => '1',
       'tid' => $arrRet[0]['memo04'],
       );
    
    //カード決済以外の返金が対象外
    if ($del_flg == 0 && $paymentflag == 1) {	
      //取消処理
      $response = $this->do_post_requestcancle(SECURE_LINK_URL, $arrPost);
      if ($response == 1) {
        echo " <script> alert('取消処理が成功しました。'); </script> ";
        return true;
      } elseif (strpos($response,"ER032") !== false) {
        echo "<script>alert('既に取消処理が行われておりますので、データ編集のみ行われます。'); </script>";		
        return true;
      } else {
        echo " <script> alert('$response'); </script> ";
        return $response;
      }
    }
    else {
      return false;
    }
  }
  
  /***********************************************************************************************
   * 関数名：do_post_requestcancle
   * 処理内容:取消
   * 引数1：
   * 引数2：
   * 引数3：
   * 戻り値：
   ***********************************************************************************************/
  function do_post_requestcancle($url, $arrPost) {
    
    $aid = $arrPost['aid'];
    $jb = $arrPost['jb'];
    $rt = $arrPost['rt'];
    $tid = $arrPost['tid'];
    
    $url .= "?aid=$aid&jb=$jb&rt=$rt&tid=$tid";
    //クレジットカード決済
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, null);
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
    
    $output = curl_exec($ch);
    
    GC_Utils::gfPrintLog("fpread:".$output);
    curl_close($ch);
    
    $result_array = explode(',',$output);
    
    if ($result_array[1] == 1) {
      return true;
    }
    else {
      //処理結果を全てログ保存
      $log_path = DATA_PATH . "logs/jpayment_cancel.log";
      GC_Utils::gfPrintLog("jpayment_cancel  start---------------------------------------------------------", $log_path);
      foreach($result_array as $key => $val) {
        GC_Utils::gfPrintLog( "\t" . $key . " => " . $val, $log_path);
      }
      GC_Utils::gfPrintLog("jpayment_cancel  end-----------------------------------------------------------", $log_path);
      
      $error_jp = Read_Error_Sentence_JPayment($result_array[3]);
      //GC_Utils::gfPrintLog("errcode:".$error_jp , DATA_PATH."logs/test.log");
      GC_Utils::gfPrintLog("errcode:".$error_jp);
      return $error_jp;
    }
  }


  /**
   * コンビニ入金確認処理
   * 
   */
/*
  function lfJpaymentCheck() {		
    if($_GET["rst"] == 1 and $_GET["gid"] != "") {
      //コンビニ
      if($_GET["ap"] == "CPL" || $_GET["ap"] == "CVS_CAN") {
	$sql = "UPDATE dtb_order SET status = 6, update_date = now(), memo06 = ? WHERE memo04 = ? ";
	$this->objQuery->query($sql, array($_GET["ap"],$_GET["gid"]));
	// POSTの内容を全てログ保存
/// modified start
	///				$log_path = DATA_PATH . "logs/jpayment_convenience.log";
	$log_path = DATA_REALDIR . "logs/jpayment_convenience.log";
/// modified end
	gfPrintLog("jpayment conveni start---------------------------------------------------------", $log_path);
	foreach($_GET as $key => $val) {
	  gfPrintLog( "\t" . $key . " => " . $val, $log_path);
	}
	gfPrintLog("jpayment conveni end-----------------------------------------------------------", $log_path);
	//応答結果を表示
	echo "1";
      }
      else {
	//コンビニではない
	echo "2";
      }
    }
    else {
      //エラー
      echo "3";
    }
  }
*/

  /**
   * 3Dsecure決済完了処理
   * 
   */
  function IfJPayment3DCheck() {    			
    if($_GET["rst"] == 1 and $_GET["gid"] != "") {
      //order_temp(一時受注テーブル)を更新
      $sql = "UPDATE dtb_order_temp SET update_date = now(), memo04 = ? WHERE order_id = ? ";
      $this->objQuery->query($sql, array($_GET["gid"],$_GET["cod"]));
      // POSTの内容を全てログ保存
/// modified start
      ///			$log_path = DATA_PATH . "logs/jpayment_3D.log";
      $log_path = DATA_REALDIR . "logs/jpayment_3D.log";
/// modified end
      gfPrintLog("jpayment 3D start---------------------------------------------------------", $log_path);
      foreach($_GET as $key => $val) {
        gfPrintLog( "\t" . $key . " => " . $val, $log_path);
      }
      gfPrintLog("jpayment 3D end-----------------------------------------------------------", $log_path);
      
      // 正常に登録されたことを記録
      $this->objSiteSess = new SC_SiteSession();
      $this->objSiteSess->setRegistFlag();
      if (SC_MobileUserAgent::isMobile()) {
        $this->sendRedirect($this->getLocation(MOBILE_URL_SHOP_COMPLETE), true);
      }
      else {
        $this->sendRedirect($this->getLocation(URL_SHOP_COMPLETE));
      }
    }
    else {
      echo "error";
    }
  }
}
?>