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
    
    <!--<table summary="お届け先の指定">-->
    <form name="form1" id="form1" method="post" action="./load_payment_module.php" autocomplete="off">
	<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
    <input type="hidden" name="mode" value="send">
        <tr>
          <th>コンビニ選択</th>
          <td class="lefttd">
          <!--{foreach key=key item=item from=$arrConv}-->
              <input type="radio" name="convenience" id="<!--{$key}-->" value="<!--{$key}-->" style="<!--{$arrErr.convenience|sfGetErrorColor}-->" <!--{if $smarty.post.convenience == $key}-->checked<!--{/if}-->><label for="<!--{$key}-->"><!--{$item|escape}--></label><br />
          <!--{/foreach}-->
          </td>
        </tr>
        <tr>
            <th>利用者名(カナ)</th>
            <td class="lefttd">
            <!--{assign var=key1 value="order_kana01"}-->
            <!--{assign var=key2 value="order_kana02"}-->
            <span class="attention"><!--{$arrErr[$key1]}--></span>
            <span class="attention"><!--{$arrErr[$key2]}--></span>
            セイ&nbsp;<input type="text" name="<!--{$key1}-->" size="15" class="box15" value="<!--{$arrForm[$key1].value|escape}-->" maxlength="<!--{$arrForm[$key1].length}-->" style="<!--{$arrErr[$key1]|sfGetErrorColor}-->" />　メイ&nbsp;<input type="text" name="<!--{$key2}-->" size="15" class="box15" value="<!--{$arrForm[$key2].value|escape}-->" maxlength="<!--{$arrForm[$key2].length}-->" style="<!--{$arrErr[$key2]|sfGetErrorColor}-->" />
           </td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td class="lefttd">
            <!--{assign var=key3 value="order_tel01"}-->
            <!--{assign var=key4 value="order_tel02"}-->
            <!--{assign var=key5 value="order_tel03"}-->
            <span class="attention"><!--{$arrErr[$key3]}--></span>
            <span class="attention"><!--{$arrErr[$key4]}--></span>
            <span class="attention"><!--{$arrErr[$key5]}--></span>
            <input type="text" name="<!--{$key3}-->" size="6" value="<!--{$arrForm[$key3].value|escape}-->" maxlength="<!--{$arrForm[$key3].length}-->" style="<!--{$arrErr[$key3]|sfGetErrorColor}-->" />&nbsp;-&nbsp;<input type="text" name="<!--{$key4}-->" size="6" value="<!--{$arrForm[$key4].value|escape}-->" maxlength="<!--{$arrForm[$key4].length}-->" style="<!--{$arrErr[$key4]|sfGetErrorColor}-->" />&nbsp;-&nbsp;<input type="text" name="<!--{$key5}-->" size="6" value="<!--{$arrForm[$key5].value|escape}-->" maxlength="<!--{$arrForm[$key5].length}-->" style="<!--{$arrErr[$key5]|sfGetErrorColor}-->" />
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
