<div id="undercolumn" class="well col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">

	<div class="col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10"><img src="<!--{$TPL_URLPATH}-->img/taheebo/iinet_main_logo.png" class='img-responsive'/><br></div>

	<div id="undercolumn_entry">
		<form class="form-horizontal" name="login_mypage" id="login_mypage" method="post" action="<!--{$smarty.const.HTTPS_URL}-->frontparts/login_check.php" onsubmit="return eccube.checkLoginFormInputted('login_mypage')">
			<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
			<input type="hidden" name="mode" value="login" />
			<input type="hidden" name="url" value="<!--{$smarty.server.REQUEST_URI|h}-->" />

			<div class="login_area">
				<div class="inputbox">
					<div class="form-group">
						<!--{assign var=key value="login_email"}-->
						<!--label for="inputEmail3" class="col-sm-3 control-label">メールアドレス&nbsp;：</label-->
						<label for="inputEmail3" class="col-sm-4 control-label"">メールアドレス</label>
						<div class="col-sm-6">
							<span class="attention"><!--{$arrErr[$key]}--></span>
							<input type="text" name="<!--{$key}-->" value="<!--{$tpl_login_email|h}-->" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->; ime-mode: disabled;" class="box300 form-control" />
						</div>
					</div>
<!--
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-9">
						  <div class="checkbox">
							<label>
							  <input type="checkbox" name="<!--{$key}-->" value="1"<!--{$tpl_login_memory|sfGetChecked:1}--> id="login_memory" />
							<label for="login_memory"> メールアドレスをコンピューターに記憶させる
							</label>
						  </div>
						</div>
					</div>
-->


					<div class="form-group">
						<!--{assign var=key value="login_pass"}-->
						<label for="inputEmail3" class="col-sm-4 control-label">パスワード</label>
						<!--label for="inputEmail3" class="col-sm-offset-1 col-sm-3 control-label">パスワード&nbsp;：</label-->
						<div class="col-sm-6">
							<span class="attention"><!--{$arrErr[$key]}--></span>
						<input type="password" name="<!--{$key}-->" maxlength="<!--{$arrForm[$key].length}-->" style="<!--{$arrErr[$key]|sfGetErrorColor}-->" class="box300 form-control" />
						</div>
					</div>

					<div class="form-group" style="display:none;">
						<div class="col-sm-offset-4 col-sm-9">
						  <div class="checkbox">
							<label>
<!--{if false}-->
							  <input type="checkbox" name="<!--{$key}-->" value="1"<!--{$tpl_login_memory|sfGetChecked:1}--> id="login_memory" />
<!--{/if}-->
							  <input type="checkbox" name="<!--{$key}-->" value="1" id="login_memory"/>
							<label for="login_memory"> 次回から自動でログイン（未実装）
							</label>
						  </div>
						</div>
					</div>

					<div class="form-group">
						<div class="btn_area">
							<input type="submit" class="btn btn-info fs18" value="入店する" name="log" id="log" />
                                                        <a href="<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->" onclick="eccube.openWindow('<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->','forget','600','460',{scrollbars:'no',resizable:'no'}); return false;" target="_blank"><input type="button" class="btn btn-default fs18" value="パスワードを忘れた" name="log" id="log" />
                                                        </a>
						</div>
					</div>
				</div>
			</div>

		</form>

					<div class="form-group">
							<div class="btn_area">
								<a href="<!--{$smarty.const.ROOT_URLPATH}-->entry/kiyaku.php" class="btn btn-lg btn-danger fs24">新規会員登録をする</a>
							</div>
					</div>
	</div>
</div>
