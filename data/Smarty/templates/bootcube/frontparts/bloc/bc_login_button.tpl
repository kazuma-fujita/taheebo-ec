<!--{strip}-->
<div class="block_outer">
<div class="container">

	<div id="bc_login_button">
		<form name="header_login_form" id="header_login_form" 
					method="post" 
					action="<!--{$smarty.const.HTTPS_URL}-->frontparts/login_check.php"
					<!--{if !$tpl_login}-->
						onsubmit="return eccube.checkLoginFormInputted('header_login_form')"
					<!--{/if}-->
		>
			<input type="hidden" name="mode" value="login" />
			<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
			<input type="hidden" name="url" value="<!--{$smarty.server.REQUEST_URI|h}-->" />
			
			<ul class="login_btn list-unstyled">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<!--{if $tpl_login}-->
							<span class="user_name">ようこそ <!--{$tpl_name1|h}--><!--{$tpl_name2|h}--> さん</span><br>
							<span class="title">Myページ</span>
						<!--{else}-->
							<span class="user_name">ようこそ ゲスト さん</span><br>
							<span class="title">ログイン</span>
						<!--{/if}-->
					</a>
					<i class="fa fa-angle-down"></i>
					<ul class="dropdown-menu">
						<!--{if $tpl_login}-->
							<li class="account">
								<!--{if $smarty.const.USE_POINT !== false}-->
									所持ポイント: <span class="point"> <!--{$tpl_user_point|number_format|default:0}--> pt</span>
								<!--{/if}-->
							</li>
							<li>
								<a href="<!--{$smarty.const.HTTPS_URL}-->mypage/login.php">Myページ</a>
							</li>
							<li class="logout">
								<!--{if !$tpl_disable_logout}-->
									<input type="submit" class="btn btn-default btn-sm" value="ログアウト" onclick="eccube.fnFormModeSubmit('header_login_form', 'logout', '', ''); return false;" />
								<!--{/if}-->
							</li>
						<!--{else}-->
							<li>
								<a href="<!--{$smarty.const.HTTPS_URL}-->mypage/login.php">
									ログイン
								</a>
							</li>
							<li>
								<a href="<!--{$smarty.const.ROOT_URLPATH}-->entry/kiyaku.php">
									新規会員登録
								</a>
							</li>
						<!--{/if}-->
					</ul>
				</li>
			</ul>

		</form>
	</div>
	<!-- /bc_login_button -->

</div>
<!-- /container -->
</div>
<!-- /bloc_outer -->
<!--{/strip}-->
