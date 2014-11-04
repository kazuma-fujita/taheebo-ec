<!--{*
/*
 * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
 * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
 * @version jpayment_convinience_mobile.tpl, v2.2.0
 */
*}-->
<center>コンビニ</center>
<hr>
<!--{* 決済時のエラーを表示 *}-->
<font color="red"><!--{$tpl_error}--></font>

<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
<input type="hidden" name="mode" value="send">
<input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->">

■コンビニ選択<br>
<!--{assign var=key1 value="convenience"}-->
<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
<select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" >
<!--{html_options options=$arrConv selected=$arrForm[$key1].value}-->
</select>
<br><br>

■利用者名(カナ)<br>
<!--{assign var=key1 value="order_kana01"}-->
<!--{assign var=key2 value="order_kana02"}-->
<font size="2"><font color="#ff0000"><!--{$arrErr[$key1]}--></font>
<font size="2"><font color="#ff0000"><!--{$arrErr[$key2]}--></font>
セイ&nbsp;<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" istyle="2" size="15"><br>
メイ&nbsp;<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" istyle="2" size="15">
<br><br>

■電話番号<br>
<!--{assign var=key1 value="order_tel01"}-->
<!--{assign var=key2 value="order_tel02"}-->
<!--{assign var=key3 value="order_tel03"}-->
<font size="2"><font color="#ff0000"><!--{$arrErr[$key1]}--><!--{$arrErr[$key2]}--><!--{$arrErr[$key3]}--></font>
<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" istyle="4" size="6">&nbsp;-
<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" istyle="4" size="6">&nbsp;-
<input type="text" name="<!--{$key3}-->" value="<!--{$arrForm[$key3].value|escape}-->" istyle="4" size="6">
<br><br>

<font size="2"><font color="#ff6600">以上の内容で間違いなければ、下記「次へ」ボタンをクリックしてください。</font><br>
<font size="2"><font color="#ff0000">※画面が切り替るまで少々時間がかかる場合がございますが、そのままお待ちください。</font><br><br>
  
      <center><input type="submit" name="send" value="次へ"></center>
    </form>
	
    <form name="form2" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
      <input type="hidden" name="mode" value="return">
      <center><input type="submit" name="return" value="戻る"></center>	  
    </form>

	
<br>
<hr>
