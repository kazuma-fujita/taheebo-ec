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


function fnCheckPayment(){
	var fm = document.form1;
	var val = 0;
	list = new Array('card_no01','card_no02','card_no03','card_no04','card_month','card_year','card_name01','card_name02');
	if(fm.getElementById("cvvcheck").value == 1){
		list.push('card_cvv');
	}
	if(fm['quick_check'].checked){
		fnChangeDisabled(list);
	}else{
		fnChangeDisabled(list, false);
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

  <table summary="お支払詳細入力" class="delivname">
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
      <!--{if $tpl_payment_image != ""}-->
      <tr>
        <th>ご利用いただけるカードの種類</th>
        <td class="lefttd">
          <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$tpl_payment_image}-->">
        </td>
      </tr>
      <!--{/if}-->
      <tr>
        <th>支払回数</th>
        <td class="lefttd">
          <!--{assign var=key1 value="payment_class"}-->
          <span class="attention"><!--{$arrErr[$key1]}--></span>

          <select name="<!--{$key1}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->">
          <!--{html_options options=$arrPaymentClass selected=$arrForm[$key1].value}--> 
         </select>
          <br /><span class="attention">※一部分割払いに対応していないカードブランドもございます。</span>
        </td>
      </tr>

      <tr>
        <th>カード番号</th>
        <td class="lefttd">
          <!--{assign var=key1 value="card_no01"}-->
          <!--{assign var=key2 value="card_no02"}-->
          <!--{assign var=key3 value="card_no03"}-->
          <!--{assign var=key4 value="card_no04"}-->
          <span class="attention"><!--{$arrErr[$key1]}--></span>
          <span class="attention"><!--{$arrErr[$key2]}--></span>
          <span class="attention"><!--{$arrErr[$key3]}--></span>
          <span class="attention"><!--{$arrErr[$key4]}--></span>
          <input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key1]|sfGetErrorColor}-->"  size="6">&nbsp;-&nbsp;
          <input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key2]|sfGetErrorColor}-->"  size="6">&nbsp;-&nbsp;
          <input type="text" name="<!--{$key3}-->" value="<!--{$arrForm[$key3].value|escape}-->" maxlength="<!--{$arrForm[$key3].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key3]|sfGetErrorColor}-->"  size="6">&nbsp;-&nbsp;
          <input type="text" name="<!--{$key4}-->" value="<!--{$arrForm[$key4].value|escape}-->" maxlength="<!--{$arrForm[$key4].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key4]|sfGetErrorColor}-->"  size="6">
          <br /><span class="attention">※ご本人名義のカードをご使用ください。</span><br /><p class="mini">半角入力（例：1234-5678-9012-3456）</p>
        </td>
      </tr>
      <!--{if $tpl_cvv == 1}-->
      <tr>
        <th>CVV番号</th>
        <td class="lefttd">
          <!--{assign var=key1 value="card_cvv"}-->
          <span class="attention"><!--{$arrErr[$key1]}--></span>
          <input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="ime-mode: disabled; <!--{$arrErr[$key1]|sfGetErrorColor}-->"  size="6">
          <input type="hidden" name="cvvcheck" value="1" />
          <br /><p class="mini">半角入力（例：123）</p>
        </td>
      </tr>
      <!--{/if}-->
      <tr>
        <th>有効期限</th>
        <td class="lefttd">
          <!--{assign var=key1 value="card_month"}-->
          <!--{assign var=key2 value="card_year"}-->
          <span class="attention"><!--{$arrErr[$key1]}--></span>
          <span class="attention"><!--{$arrErr[$key2]}--></span>
          <select name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->">
          <option value="">--</option>
          <!--{html_options options=$arrMonth selected=$arrForm[$key1].value}-->
          </select>月/
          <select name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" >
          <option value="">--</option>
          <!--{html_options options=$arrYear selected=$arrForm[$key2].value}-->
          </select>年
        </td>
      </tr>
      <tr>
        <th>カード名義（ローマ字氏名）</th>
        <td class="lefttd">
          <!--{assign var=key1 value="card_name01"}-->
          <!--{assign var=key2 value="card_name02"}-->
          <span class="attention"><!--{$arrErr[$key1]}--></span>
          <span class="attention"><!--{$arrErr[$key2]}--></span>
                    名&nbsp;<input type="text" name="<!--{$key1}-->" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" size="20" class="bo20">&nbsp;&nbsp;
                    姓&nbsp;<input type="text" name="<!--{$key2}-->" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" size="20" class="bo20">
          <br /><p class="mini">半角入力（例：TARO YAMADA）</p>
        </td>
      </tr>
    </tbody>
  </table>

  <table>
    <tr>
      <td class="lefttd">
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