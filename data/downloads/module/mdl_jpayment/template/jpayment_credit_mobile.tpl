<!--{*
/*
 * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
 * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
 * @version jpayment_credit_mobile.tpl, v2.2.0
 */
*}-->
<center>クレジット決済</center>
<hr>
<!--{* 決済時のエラーを表示 *}-->
<font color="red"><!--{$tpl_error}--></font>

<form name="form1" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
<input type="hidden" name="mode" value="next">
<input type="hidden" name="uniqid" value="<!--{$tpl_uniqid}-->">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->">

■お支払い回数<br>
<font size="2"><font color="#ff6600">一部分割払いに対応していないカードブランドもございます。</font><br>
<!--{assign var=key1 value="payment_class"}-->
<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
<select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" >
<!--{html_options options=$arrPaymentClass selected=$arrForm[$key1].value}-->
</select>
<br><br>

■カード番号<br>
<font size="2"><font color="#ff6600">ご本人名義のカードをご使用ください。</font><br>
半角入力（例：1234-5678-9012-3456）</font><br>
<!--{assign var=key1 value="card_no01"}-->
<!--{assign var=key2 value="card_no02"}-->
<!--{assign var=key3 value="card_no03"}-->
<!--{assign var=key4 value="card_no04"}-->
<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
<font color="#ff0000"><!--{$arrErr[$key2]}--></font>
<font color="#ff0000"><!--{$arrErr[$key3]}--></font>
<font color="#ff0000"><!--{$arrErr[$key4]}--></font>
<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" size="6" istyle="4">-
<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" size="6" istyle="4">-
<input type="text" name="<!--{$key3}-->" value="<!--{$arrForm[$key3].value|escape}-->" maxlength="<!--{$arrForm[$key3].length}-->" size="6" istyle="4">-
<input type="text" name="<!--{$key4}-->" value="<!--{$arrForm[$key4].value|escape}-->" maxlength="<!--{$arrForm[$key4].length}-->" size="6" istyle="4">
<br><br>

<!--{if $tpl_cvv == 1}-->
■CVV番号<br>
半角入力（例：123）</font><br>
<!--{assign var=key1 value="card_cvv"}-->
<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" size="6" istyle="4">
<br><br>
<!--{/if}-->

■有効期限<br>
<!--{assign var=key1 value="card_month"}-->
<!--{assign var=key2 value="card_year"}-->
<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
<font color="#ff0000"><!--{$arrErr[$key2]}--></font>
<select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->">
<option value="">--</option>
<!--{html_options options=$arrMonth selected=$arrForm[$key1].value}-->
</select>月/
<select name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->">
<option value="">--</option>
<!--{html_options options=$arrYear selected=$arrForm[$key2].value}-->
</select>年
<br><br>

■ローマ字氏名<br>
<font size="2">半角入力（例：TARO YAMADA）</font><br>
<!--{assign var=key1 value="card_name01"}-->
<!--{assign var=key2 value="card_name02"}-->
<font color="#ff0000"><!--{$arrErr[$key1]}--></font>
<font color="#ff0000"><!--{$arrErr[$key2]}--></font>
名<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" istyle="3" size="15"><br>
姓<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" istyle="3" size="15">
<br><br>

<font size="2"><font color="#ff6600">以上の内容で間違いなければ、下記「送信」ボタンをクリックしてください。</font><br>
<font size="2"><font color="#ff0000">※画面が切り替るまで少々時間がかかる場合がございますが、そのままお待ちください。</font><br><br>


<center><input type="submit" name="next" value="送信"></center>
</form>

<form name="form2" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
<input type="hidden" name="mode" value="return">
<center><input type="submit" name="return" value="戻る"></center>
</form>

<br>
<hr>
