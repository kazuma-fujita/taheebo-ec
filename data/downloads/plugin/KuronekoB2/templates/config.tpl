<!--{*
* クロネコヤマト送り状発行ソフトB2対応CSVダウンロード
* Copyright (C) 2014/04/28 BOKUBLOCK.INC TAKAHIRO SUEMITSU
* http://www.bokublock.jp / ec-cube@bokublock.jp
*}-->

<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_header.tpl"}-->
<script type="text/javascript">
</script>

<h2><!--{$tpl_subtitle}--></h2>
<form name="form1" id="form1" method="post" action="<!--{$smarty.server.REQUEST_URI|h}-->">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="hidden" name="mode" value="edit">
<p>クロネコヤマト初期設定<br/>
    <br/>
</p>

<table border="0" cellspacing="1" cellpadding="8" summary=" ">
    <tr >
        <td bgcolor="#f3f3f3">ご請求先顧客コード</td>
        <td>
        	<!--{assign var=key value="pootno"}-->
        	<input type="text" name="pootno" value="<!--{$arrForm[$key]|h}-->">
        </td>
    </tr>
    <tr >
        <td bgcolor="#f3f3f3">ご請求先分類コード</td>
        <td>
        	<!--{assign var=key value="genreno"}-->
        	<input type="text" name="genreno" value="<!--{$arrForm[$key]|h}-->">
        </td>
    </tr>
    <tr >
        <td bgcolor="#f3f3f3">運賃管理番号</td>
        <td>
        	<!--{assign var=key value="dootno"}-->
        	<input type="text" name="dootno" value="<!--{$arrForm[$key]|h}-->">
        </td>
    </tr>
    <tr >
        <td bgcolor="#f3f3f3">メール便・敬称（例：様、御中、行き）</td>
        <td>
        	<!--{assign var=key value="mailset"}-->
        	<input type="text" name="mailset" value="<!--{$arrForm[$key]|h}-->">
        </td>
    </tr>
</table>


<div class="btn-area">
    <ul>
        <li>
            <a class="btn-action" href="javascript:;" onclick="document.form1.submit();return false;"><span class="btn-next">この内容で登録する</span></a>
        </li>
    </ul>
</div>

</form>
<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_footer.tpl"}-->
