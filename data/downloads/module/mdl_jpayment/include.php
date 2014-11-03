<?php
  /**
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version include.php, v2.2.0
   */

define('MDL_JPAYMENT_METHOD_CREDIT', 'クレジットカード決済 by J-Payment');
define('MDL_JPAYMENT_METHOD_CONVENIENCE', 'コンビニ決済 by J-Payment');
define('MDL_JPAYMENT_METHOD_BANK', '銀行振込決済 by J-Payment');

define('MDL_JPAYMENT_CODE', 'mdl_jpayment');
define('MDL_JPAYMENT_TITLE', 'J-Payment決済モジュール');
define ('CHARGE_MAX', 500000);
define ('SEVEN_CHARGE_MAX', 300000);

// 文字数制限
define ("CLIENTIP_LEN", 6);
define ("SEND_LEN", 20);

// 送信先URL クレジット
define ("SECURE_LINK_URL", "https://credit.j-payment.co.jp/gateway/gateway.aspx");
// 送信先URL コンビニ
define ("CONVENIENCE_LINK_URL", "https://credit.j-payment.co.jp/gateway/cvs2.aspx");
// 送信先URL 3D_SECURE
define ("THREE_D_SECURE_LINK_URL","https://credit.j-payment.co.jp/igateway/gateway.aspx");
// 送信先URL 銀行振込
define ("BANK_LINK_URL","https://credit.j-payment.co.jp/gateway/bank.aspx");

// 支払い種別
define("PAY_JPAYMENT_CREDIT", 1);
define("PAY_JPAYMENT_CONVENIENCE", 2);
define("PAY_JPAYMENT_BANK", 3);
define("PAY_JPAYMENT_CREDIT_THREE_D_SECURE", "secure");
define("PAY_JPAYMENT_CREDIT_CAPTURE", "CAPTURE");
define("PAY_JPAYMENT_CREDIT_AUTH", "AUTH");

// 銀行振込STATUS
define("PAY_JPAYMENT_BANK_STATUS_UNDER", 81);
define("PAY_JPAYMENT_BANK_STATUS_OVER", 82);
define("PAY_JPAYMENT_BANK_STATUS_COLOR_UNDER", "#FF0000");
define("PAY_JPAYMENT_BANK_STATUS_COLOR_OVER", "#FF0000");
define("PAY_JPAYMENT_BANK_STATUS_NAME_UNDER", "過少入金");
define("PAY_JPAYMENT_BANK_STATUS_NAME_OVER", "過剰入金");


//決済の種類
$arrPayment = array(
1 => 'クレジット',
2 => 'コンビニ',
3 => '銀行振込'
);

//3Dsecure
$arrSecure = array(
1 => '3Dセキュア'
);

//CVV
$arrCVV = array(
1 => 'CVV'
);

//決済ジョブ
$arrJob = array(
1 => '仮実同時',
2 => '仮売上'
);

// クレジットの種類
$arrCredit = array(
1 => 'VISA, MASTER, Diners',
2 => 'JCB, AMEX'
);

$arrConvenience = array(
'010' => 'セブンイレブン'
,'020' => 'ローソン'
,'030' => 'ファミリーマート'
,'050' => 'デイリーヤマザキ・ヤマザキデイリーストア・タイムリー'
,'060' => 'サークルK・サンクス'
,'080' => 'ミニストップ'
,'110' => 'am/pm'
,'760' => 'セイコーマート'
);

// クレジット分割回数
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
?>
