<div class="block_outer col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
	<div id="bc_sidelogin">

		<div class="content_panel">
			<form class="form" name="login_form" id="login_form" method="post" action="<!--{$smarty.const.HTTPS_URL}-->frontparts/login_check.php"<!--{if $tpl_login}--> onsubmit="return eccube.checkLoginFormInputted('login_form')"<!--{/if}-->>
				<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
				<input type="hidden" name="mode" value="login" />
				<input type="hidden" name="url" value="<!--{$smarty.server.REQUEST_URI|h}-->" />

						<div class="col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8"><img src="<!--{$TPL_URLPATH}-->img/taheebo/iinet_main_logo.png" class="img-responsive"/></div>
						<div class="col-xs-12 col-sm-10 col-sm-offset-1"><h4 class="title"><span class="icon"><i class="fa fa-lock"></i></span>　ログイン</h4></div>


						
						<div class="item_panel col-xs-12 col-sm-10 col-sm-offset-1">

							<div class="form-group">
								<label>メールアドレス</label>
								<input type="email" name="login_email" class="form-control" id="login-table-email" value="<!--{$tpl_login_email|h}-->" placeholder="メールアドレス"  style="ime-mode: disabled;" />
								
							</div>

							<div class="form-group">
								<label>パスワード</label>
								<input type="password" name="login_pass" class="form-control" id="login-table-pass" placeholder="パスワード" />
								<label class="forgot">
									<a href="<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->" onclick="eccube.openWindow('<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->','forget','600','400',{scrollbars:'no',resizable:'no'}); return false;" target="_blank">パスワードを忘れた方</a>
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="login_memory" id="login_memory" value="1" <!--{$tpl_login_memory|sfGetChecked:1}--> /> 次回から記憶する
								</label>
							</div>
					
							<div class="btn_login text-center">
								<button type="submit" class="btn btn-primary btn-lg">入店する</button>
							</div>
							<div class="btn_entry text-center">
								<a href="<!--{$smarty.const.ROOT_URLPATH}-->entry/kiyaku.php" class="btn btn-danger btn-lg">新規会員登録</a>
							</div>
							
						</div>
 
			</form>
		</div>
	</div>
</div>
