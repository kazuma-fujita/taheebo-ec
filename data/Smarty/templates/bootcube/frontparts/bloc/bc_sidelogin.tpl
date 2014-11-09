<!--{strip}-->
<div class="block_outer">
	<div id="bc_sidelogin">

		<div class="content_panel">
			<form class="form" name="login_form" id="login_form" method="post" action="<!--{$smarty.const.HTTPS_URL}-->frontparts/login_check.php"<!--{if $tpl_login}--> onsubmit="return eccube.checkLoginFormInputted('login_form')"<!--{/if}-->>
				<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
				<input type="hidden" name="mode" value="login" />
				<input type="hidden" name="url" value="<!--{$smarty.server.REQUEST_URI|h}-->" />

					<!--{if $tpl_login}-->
						<h4 class="title"><i class="fa fa-unlock"></i>　Myページ</h4>
						<div class="item_panel">
							<p>ようこそ<br />
								<span class="user_name"><!--{$tpl_name1|h}--> <!--{$tpl_name2|h}--> 様</span><br />
								<!--{if $smarty.const.USE_POINT !== false}-->
										所持ポイント：<span class="point"> <!--{$tpl_user_point|number_format|default:0}--> pt</span>
								<!--{/if}-->
							</p>
							<!--{if !$tpl_disable_logout}-->
								<div>
									<input type="submit" class="btn btn-default btn-sm" value="ログアウト" onclick="eccube.fnFormModeSubmit('login_form', 'logout', '', ''); return false;" />
								</div>
							<!--{/if}-->
						 </div>
					<!--{else}-->
						<h4 class="title"><span class="icon"><i class="fa fa-lock"></i></span>　ログイン</h4>
						<div class="item_panel">

							<div class="form-group">
								<input type="email" name="login_email" class="form-control" id="login-table-email" value="<!--{$tpl_login_email|h}-->" placeholder="メールアドレス"  style="ime-mode: disabled;" />
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="login_memory" id="login_memory" value="1" <!--{$tpl_login_memory|sfGetChecked:1}--> /> 記憶する
								</label>
							</div>
							<div class="form-group">
								<input type="password" name="login_pass" class="form-control" id="login-table-pass" placeholder="パスワード" />
								<label class="forgot">
									<a href="<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->" onclick="eccube.openWindow('<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->','forget','600','400',{scrollbars:'no',resizable:'no'}); return false;" target="_blank">パスワードを忘れた方</a>
								</label>
							</div>
					
							<div class="btn_login text-center">
								<button type="submit" class="btn btn-primary btn-sm">ログイン</button>
							</div>
							<div class="btn_entry text-center">
								<a href="<!--{$smarty.const.ROOT_URLPATH}-->entry/kiyaku.php" class="btn btn-default btn-sm">新規会員登録</a>
							</div>
							
						</div>
					<!--{/if}-->
 
			</form>
		</div>
	</div>
</div>
<!--{/strip}-->
