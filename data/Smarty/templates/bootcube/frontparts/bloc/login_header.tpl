<!--{if $tpl_login}-->
<!--{strip}-->
    <div class="block_outer">
        <div id="header_login_area" class="clearfix">
            <div class="block_body clearfix">
		        <div class="btn-group">
			        <a class="btn" href="/mypage/">ﾏｲﾍﾟｰｼﾞ</a>
		        </div>
		        <div class="btn-group">
			        <!--{if $smarty.const.USE_POINT !== false}-->
				        <a class="btn btn-primary" disabled="disabled"><!--{$tpl_user_point|number_format|default:0}-->P</a>
			        <!--{/if}-->
			        <a class="btn btn-danger" href="<!--{$smarty.const.CART_URL}-->">\<!--{$arrCartList.0.ProductsTotal|number_format|default:0}--> 購入</a>
	            </div>
            </div>
        </div>
    </div>
<!--{/strip}-->

<!--{/if}-->
