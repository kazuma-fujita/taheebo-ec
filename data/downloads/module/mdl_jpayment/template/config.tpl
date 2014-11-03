<!--{*
/*
 * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
 * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
 * @version config.tpl, v2.2.0
 */
*}-->
<!-- /// modified -->
<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_header.tpl"}-->
<style type="text/css">

body {
	font-size: 110%;
}
</style>

<script type="text/javascript">
<!--
self.moveTo(20,20);self.focus();
self.resizeTo(650,860);

function lfnCheckPayment(){
	var fm = document.form1;
	var val = 0;
	
	payment = new Array('payment[]');

	for(pi = 0; pi < payment.length; pi++) {
	
		list = new Array('secure[]','job');
		if(fm[payment[pi]][0].checked){
			fnChangeDisabled(list, false);
		}else{
			fnChangeDisabled(list);
		}
	
		list = new Array('convenience[]');
		if(fm[payment[pi]][1].checked){
			fnChangeDisabled(list, false);
		}else{
			fnChangeDisabled(list);
		}
	}
}

function fnChangeDisabled(list, disable) {
	len = list.length;

	if(disable == null) { disable = true; }
	
	for(i = 0; i < len; i++) {
		if(document.form1[list[i]]) {
			// ラジオボタン、チェックボックス等の配列に対応
			max = document.form1[list[i]].length
			if(max > 1) {
				for(j = 0; j < max; j++) {
					// 有効、無効の切り替え
					document.form1[list[i]][j].disabled = disable;
				}
			} else {
				// 有効、無効の切り替え
				document.form1[list[i]].disabled = disable;
			}
		}
	}
}

function win_open(URL){
	var WIN;
	WIN = window.open(URL);
	WIN.focus();
}
//-->
</script>

<h2><!--{$tpl_subtitle}--></h2>

<div align="center">
<!--★★メインコンテンツ★★-->

<form name="form1" id="form1" method="post" action="<!--{$smarty.server.REQUEST_URI|escape}-->">
  <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
  <input type="hidden" name="mode" value="edit">
    <!--▼登録テーブルここから-->
    <!--メインエリア-->
	
    <table width="442" border="0" cellspacing="1" cellpadding="8" summary=" ">
      <tr class="fs12n">
	  <td bgcolor="#ffffff">
        J-Payment決済モジュールをご利用頂く為には、<br />
		ユーザ様ご自身で株式会社J-Payment様とご契約を行っていただく必要があります。 <br />
        お申し込みにつきましては、下記のページから、お申し込みを行って下さい。<br />
        <a href="#" onClick="win03('http://www.j-payment.co.jp/service/payment/card/')" > ＞＞ J-Payment決済システムについて</a>
        </td>
      </tr>
    </table>

    <table width="442" border="0" cellspacing="1" cellpadding="8" summary=" ">
      <tr class="fs12n">
        <td colspan="2" width="100" bgcolor="#f3f3f3">▼Secure Link</td>
      </tr>
      <tr class="fs12n">
        <td width="" bgcolor="#f3f3f3">店舗ID<span class="red">※必須</span></td>
        <td width="300" bgcolor="#ffffff">
          <!--{assign var=key value="clientip"}-->
          <span class="red"><!--{$arrErr[$key]}--></span>
            <input type="text" name="<!--{$key}-->" style="ime-mode:disabled; <!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value}-->" class="box10" maxlength="<!--{$arrForm[$key].length}-->">
        </td>
      </tr>

      <tr class="fs12n">
        <td width="100" bgcolor="#f3f3f3">接続先URL</td>
        <td width="337" bgcolor="#ffffff">
          <!--{$smarty.const.SECURE_LINK_URL}-->
        </td>
      </tr>

      <tr class="fs12n">
        <td width="100" bgcolor="#f3f3f3">利用決済<span class="red">※必須</span></td>
        <td width="337" bgcolor="#ffffff">
          <!--{assign var=key value="payment"}-->
            <span class="red"><!--{$arrErr[$key]}--></span>
              <!--{html_checkboxes_ex name="$key" options=$arrPayment selected=$arrForm[$key].value style=$arrErr[$key]|sfGetErrorColor onclick="lfnCheckPayment();"}--><br />
            <span class="red">※ご利用の場合は、各決済毎にご契約が必要でございます。</span>
        </td>
      </tr>

      <tr class="fs12n">
        <td colspan="2" width="90" bgcolor="#f3f3f3">▼クレジット決済設定</td>
      </tr>

      <tr class="fs12n">
        <td width="90" bgcolor="#f3f3f3">3Dセキュア</td>
        <td width="337" bgcolor="#ffffff">
          <!--{assign var=key value="secure"}-->
          <span class="red12"><!--{$arrErr[$key]}--></span>
          <!--{html_checkboxes_ex name="$key" options=$arrSecure selected=$arrForm[$key].value style=$arrErr[$key]|sfGetErrorColor}-->
          <span class="red">※別途、ご契約が必要でございます。</span>
        </td>
      </tr>

      <tr class="fs12n">
        <td width="90" bgcolor="#f3f3f3">CVV</td>
        <td width="337" bgcolor="#ffffff">
          <!--{assign var=key value="cvv"}-->
          <span class="red12"><!--{$arrErr[$key]}--></span>
          <!--{html_checkboxes_ex name="$key" options=$arrCVV selected=$arrForm[$key].value style=$arrErr[$key]|sfGetErrorColor}-->
          <span class="red">※別途、ご契約が必要でございます。</span>
        </td>
      </tr>

      <tr class="fs12n">
        <td width="90" bgcolor="#f3f3f3">決済ジョブ</td>
        <td width="337" bgcolor="#ffffff">
          <!--{assign var=key value="job"}-->
          <span class="red12"><!--{$arrErr[$key]}--></span>
          <!--{html_radios_ex name="$key" options=$arrJob selected=$arrForm[$key].value style=$arrErr[$key]|sfGetErrorColor}-->
        </td>
      </tr>


      <tr class="fs12n">
        <td colspan="2" width="90" bgcolor="#f3f3f3">▼コンビニ決済設定</td>
      </tr>

      <tr class="fs12n">
        <td width="90" bgcolor="#f3f3f3">利用コンビニ</td>
        <td width="337" bgcolor="#ffffff">
          <!--{assign var=key value="convenience"}-->
          <span class="red12"><!--{$arrErr[$key]}--></span>
          <!--{html_checkboxes_ex name="$key" options=$arrConvenience selected=$arrForm[$key].value style=$arrErr[$key]|sfGetErrorColor}-->
        </td>
      </tr>

    </table>

    <!--メインエリア-->
    <!--▲登録テーブルここまで-->

    <div class="btn-area">
      <ul>
        <li><a class="btn-action" href="javascript:;" onclick="document.body.style.cursor = 'wait';document.form1.submit(); return false;"><span class="btn-next">この内容で登録する</span></a></li>
      </ul>
    </div>

</form>
<!--★★メインコンテンツ★★-->

<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_footer.tpl"}-->
