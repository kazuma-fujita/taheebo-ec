<!--{*
/*
 * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
 * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
 * @version jpayment_bank_mobile.tpl, v2.2.0
 */
*}-->
<center>銀行振込</center>
<hr>
<!--{* 決済時のエラーを表示 *}-->
<font color="red"><!--{$tpl_error}--></font>

<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
<input type="hidden" name="mode" value="next">
<input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->">

■振込人名義(カナ)<br>
<!--{assign var=key value="order_nmf"}-->
<font size="2"><font color="#ff0000"><!--{$arrErr.order_nmf}--></font>
<input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" istyle="2" size="15"><br>
<br><br>

<font size="2"><font color="#ff6600">ご注文確定後に、お振込用の銀行口座が表示されます。</font><br>
<font size="2"><font color="#ff6600">以上の内容で間違いなければ、下記「次へ」ボタンをクリックしてください。</font><br>
<font size="2"><font color="#ff0000">※画面が切り替るまで少々時間がかかる場合がございますが、そのままお待ちください。</font><br><br>
  
      <center><input type="submit" name="next" value="次へ"></center>
    </form>
	
    <form name="form2" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
      <input type="hidden" name="mode" value="return">
      <center><input type="submit" name="return" value="戻る"></center>	  
    </form>

	
<br>
<hr>
