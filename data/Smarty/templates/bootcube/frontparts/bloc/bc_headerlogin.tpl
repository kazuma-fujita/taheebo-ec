<!--{strip}-->
<div id="header_navi" class="text-right">
	<form name="header_login_form" id="header_login_form" 
				method="post" 
				action="<!--{$smarty.const.HTTPS_URL}-->frontparts/login_check.php"
				<!--{if !$tpl_login}--> onsubmit="return eccube.checkLoginFormInputted('header_login_form')"<!--{/if}-->
	>
		<input type="hidden" name="mode" value="login" />
		<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
		<input type="hidden" name="url" value="<!--{$smarty.server.REQUEST_URI|h}-->" />
		<div class="block_body clearfix">
			<!--{if $tpl_login}-->
				<ul class="list-inline">
					<li class="account">
						ようこそ <span class="user_name"><!--{$tpl_name1|h}--> <!--{$tpl_name2|h}--> 様</span>
						<!--{if $smarty.const.USE_POINT !== false}-->
							<br>所持ポイント: <span class="point"> <!--{$tpl_user_point|number_format|default:0}--> pt</span>
						<!--{/if}-->
					</li>
					<li class="logout">
						<!--{if !$tpl_disable_logout}-->
							<input type="submit" class="btn btn-default" value="ログアウト" onclick="eccube.fnFormModeSubmit('header_login_form', 'logout', '', ''); return false;" />
						<!--{/if}-->
					</li>
				</ul>
			<!--{else}-->
				<div class="btn-group">
					<a href="<!--{$smarty.const.HTTPS_URL}-->mypage/login.php" class="btn btn-default">ログイン</a>
					<a href="<!--{$smarty.const.ROOT_URLPATH}-->entry/kiyaku.php" class="btn btn-default">新規会員登録</a>
				</div>
			<!--{/if}-->
		</div>
	</form>
</div>
<!--{/strip}-->
