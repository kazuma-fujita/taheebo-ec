<section id="undercolumn">

	<h2 class="title"><!--{$tpl_payment_method}--></h2>

	<!--★インフォメーション★-->
	<div class="information end">
		<p>※お申し込みになる場合は、以下の項目をご確認いただき「送信する」ボタンを押してください。</p>
	</div>

<form name="form1" id="form1" method="post" action="./load_payment_module.php" autocomplete="off">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="hidden" name="mode" value="next">

<h3>ご利用内容</h3>

<dl class="form_entry">
	<dt>振込人名義(カナ)</dt>
	<dd>
		<!--{assign var=key value="order_nmf"}-->
		<span class="attention"><!--{$arrErr[$key]}--></span>
		<input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" class="boxShort text data-role-none" placeholder="フリコミニンメイギ" />
		<br /><span class="attention">ご注文確定後に、お振込用の銀行口座が表示されます。</span>
	</dd>
</dl>

<div class="btn_area">
	<p><input type="submit" value="送信する" class="btn data-role-none" /></p>
</div>

</form>
</section>
