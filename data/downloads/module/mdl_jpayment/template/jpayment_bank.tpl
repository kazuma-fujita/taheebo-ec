<script type="text/javascript">
<!--
function next(now, next) {
	if (now.value.length >= now.getAttribute('maxlength')) {
	next.focus();
	}
}
var send = true;

function fnCheckSubmit() {
	if(send) {
		send = false;
		return true;
	} else {
		alert("只今、処理中です。しばらくお待ち下さい。");
		return false;
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
//-->
</script>

<!--▼CONTENTS-->
<div id="undercolumn">
<div id="undercolumn_shopping">
  <p class="flow_area"><img src="<!--{$TPL_URLPATH}-->img/picture/img_flow_03.jpg" alt="購入手続きの流れ" /></p>

  <table summary="お支払詳細確認" class="delivname">
    <thead>
      <tr>
        <th colspan="2"><strong>▼<!--{$tpl_payment_method}--></strong></th>
      </tr>
    </thead>
    <tbody>
      <!--{if $tpl_error != ""}-->
      <tr>
        <td class="lefttd" colspan="2">
          <span class="attention"><!--{$tpl_error}--></span>
        </td>
      </tr>
      <!--{/if}-->
      
      <form name="form1" id="form1" method="post" action="./load_payment_module.php" autocomplete="off">
      <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
      <input type="hidden" name="mode" value="next">
        <tr>
            <th>振込人名義(カナ)</th>
            <td class="lefttd">
            <!--{assign var=key value="order_nmf"}-->
            <span class="attention"><!--{$arrErr[$key]}--></span>
            <input type="text" name="<!--{$key}-->" size="15" class="box15" value="<!--{$arrForm[$key].value|escape}-->" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" />
           </td>
        </tr>
    </tbody>
  </table>

  <table>
    <tr>
      <td class="lefttd">
                ご注文確定後に、お振込用の銀行口座が表示されます。<br />
                以上の内容で間違いなければ、下記「次へ」ボタンをクリックしてください。<br />
        <span class="attention">※画面が切り替るまで少々時間がかかる場合がございますが、そのままお待ちください。</span>
      </td>
    </tr>
  </table>

  <div class="btn_area">
    <ul>
    <li>
      <a href="#" onclick="document.form2.submit(); return false;" onmouseover="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_back_on.jpg', back03);" onmouseout="chgImg('<!--{$TPL_URLPATH}-->img/button/btn_back.jpg',back03);"><img src="<!--{$TPL_URLPATH}-->img/button/btn_back.jpg" alt="戻る" name="back03" id="back03" /></a>
    </li>
    <li>
      <input type="image" onclick="return fnCheckSubmit();" onmouseover="chgImgImageSubmit('<!--{$TPL_URLPATH}-->img/button/btn_next_on.jpg',this)" onmouseout="chgImgImageSubmit('<!--{$TPL_URLPATH}-->img/button/btn_next.jpg',this)" src="<!--{$TPL_URLPATH}-->img/button/btn_next.jpg" alt="次へ" name="next" id="next" />
    </li>
    </ul>
  </div>
  </form>

  <form name="form2" id="form2" method="post" action="<!--{$smarty.server.PHP_SELF|escape}-->">
    <input type="hidden" name="transactionid" value="<!--{$transactionid|escape}-->" />
    <input type="hidden" name="mode" value="return" />
  </form>


</div>
</div>
<!--▲CONTENTS-->