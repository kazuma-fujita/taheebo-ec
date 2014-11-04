<section id="undercolumn">

	<h2 class="title"><!--{$tpl_payment_method}--></h2>

	<!--★インフォメーション★-->
	<div class="information end">
		<p>※お申し込みになる場合は、以下の項目をすべてご入力いただき「送信する」ボタンを押してください。</p>
	</div>

<form name="form1" id="form1" method="post" action="./load_payment_module.php" autocomplete="off">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="hidden" name="mode" value="next">

<h3>ご利用内容</h3>

<dl class="form_entry">
	<dt>支払回数</dt>
	<dd>
		<!--{assign var=key1 value="payment_class"}-->
		<span class="attention"><!--{$arrErr[$key1]}--></span>
	
		<select name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" class="boxHarf top data-role-none" />
		  <!--{html_options options=$arrPaymentClass selected=$arrForm[$key1].value}-->
		</select>
		<br /><span class="attention">※一部分割払いに対応していないカードブランドもございます。</span>
	</dd>

	<dt>カード番号</dt>
	<dd>
		<!--{assign var=key1 value="card_no01"}-->
		<!--{assign var=key2 value="card_no02"}-->
		<!--{assign var=key3 value="card_no03"}-->
		<!--{assign var=key4 value="card_no04"}-->
		<span class="attention"><!--{$arrErr[$key1]}--></span>
		<span class="attention"><!--{$arrErr[$key2]}--></span>
		<span class="attention"><!--{$arrErr[$key3]}--></span>
		<span class="attention"><!--{$arrErr[$key4]}--></span>
		<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" class="boxHarf text data-role-none" placeholder="1234" />&nbsp;
		<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" class="boxHarf text data-role-none" placeholder="5678" /><br />
		<input type="text" name="<!--{$key3}-->" value="<!--{$arrForm[$key3].value|escape}-->" maxlength="<!--{$arrForm[$key3].length}-->" class="boxHarf text data-role-none" placeholder="9012" />&nbsp;
		<input type="text" name="<!--{$key4}-->" value="<!--{$arrForm[$key4].value|escape}-->" maxlength="<!--{$arrForm[$key4].length}-->" class="boxHarf text data-role-none" placeholder="3456" />
	</dd>

	<!--{if $tpl_cvv == 1}-->
	<dt>CVV番号</dt>
	<dd>
		<!--{assign var=key1 value="card_cvv"}-->
		<span class="attention"><!--{$arrErr[$key1]}--></span>
		<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" class="boxHarf text data-role-none" placeholder="123" />&nbsp;
	</dd>
	<!--{/if}-->

	<dt>カード有効期限</dt>
	<dd>
		<!--{assign var=key1 value="card_month"}-->
		<!--{assign var=key2 value="card_year"}-->
		<span class="attention"><!--{$arrErr[$key1]}--></span>
		<span class="attention"><!--{$arrErr[$key2]}--></span>
		<span>月</span>
		<select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" class="boxShort data-role-none">
			<option value="">--</option>
			<!--{html_options options=$arrMonth selected=$arrForm[$key1].value}-->
		</select>
		<span>年</span>
		<select name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" class="boxShort data-role-none">
			<option value="">--</option>
			<!--{html_options options=$arrYear selected=$arrForm[$key2].value}--></select>
		<p class="mini">クレジットカードの有効期限を選択してください</p>
	</dd>

	<dt>カード名義（ローマ字氏名）</dt>
	<dd>
		<!--{assign var=key1 value="card_name01"}-->
		<!--{assign var=key2 value="card_name02"}-->
		<span class="attention"><!--{$arrErr[$key1]}--></span>
		<span class="attention"><!--{$arrErr[$key2]}--></span>
		<span>名</span>
		<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" class="boxShort text data-role-none" placeholder="mei" />
		<span>姓</span>
		<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" class="boxShort text data-role-none" placeholder="sei" />
	</dd>
</dl>

<div class="btn_area">
	<p><input type="submit" value="送信する" class="btn data-role-none" /></p>
</div>

</form>
</section>
