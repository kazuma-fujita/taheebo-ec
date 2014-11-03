<section id="undercolumn">

	<h2 class="title"><!--{$tpl_payment_method}--></h2>

	<!--★インフォメーション★-->
	<div class="information end">
		<p>※お申し込みになる場合は、以下の項目をすべてご入力いただき「送信する」ボタンを押してください。</p>
	</div>

<form name="form1" id="form1" method="post" action="./load_payment_module.php" autocomplete="off">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="hidden" name="mode" value="send">

<h3>ご利用内容</h3>

<dl class="form_entry">
	<dt>コンビニ選択</dt>
	<dd>
		<!--{assign var=key1 value="convenience"}-->
		<span class="attention"><!--{$arrErr[$key1]}--></span>
	
		<select name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" class="boxHarf top data-role-none" />
		  <!--{html_options options=$arrConv selected=$arrForm[$key1].value}-->
		</select>
	</dd>

	<dt>利用者名(カナ)</dt>
	<dd>
		<!--{assign var=key1 value="order_kana01"}-->
		<!--{assign var=key2 value="order_kana02"}-->
		<span class="attention"><!--{$arrErr[$key1]}--></span>
		<span class="attention"><!--{$arrErr[$key2]}--></span>
		<span>セイ</span>
		<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" class="boxShort text data-role-none" placeholder="セイ" />
		<span>メイ</span>
		<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" class="boxShort text data-role-none" placeholder="メイ" />
	</dd>

	<dt>電話番号</dt>
	<dd>
		<!--{assign var=key1 value="order_tel01"}-->
		<!--{assign var=key2 value="order_tel02"}-->
		<!--{assign var=key3 value="order_tel03"}-->
		<span class="attention"><!--{$arrErr[$key1]}--></span>
		<span class="attention"><!--{$arrErr[$key2]}--></span>
		<span class="attention"><!--{$arrErr[$key3]}--></span>
		<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" class="boxHarf text data-role-none" placeholder="00" />&nbsp;
		<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" class="boxHarf text data-role-none" placeholder="0000" /><br />
		<input type="text" name="<!--{$key3}-->" value="<!--{$arrForm[$key3].value|escape}-->" maxlength="<!--{$arrForm[$key3].length}-->" class="boxHarf text data-role-none" placeholder="0000" />&nbsp;
	</dd>

</dl>

<div class="btn_area">
	<p><input type="submit" value="送信する" class="btn data-role-none" /></p>
</div>

</form>
</section>
