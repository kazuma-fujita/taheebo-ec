<div id="undercolumn" class="well fs18" style="margin-top:100px;border-radius:50px;">

	<div class="col-sm-offset-3" style="padding:13px;"><img src="<!--{$TPL_URLPATH}-->img/taheebo/iinet_main_logo.png" class='img-responsive' width="60%"/></div>

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
						<label for="inputEmail3" class="col-sm-offset-4 control-label" style="padding-left:14px;">メールアドレス</label>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
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
						<label for="inputEmail3" class="col-sm-offset-4 control-label" style="padding-left:14px;">パスワード</label>
						<!--label for="inputEmail3" class="col-sm-3 control-label">パスワード&nbsp;：</label-->
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
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

					<div class="form-group" style="margin-top:30px;">
						<div class="btn_area">
						<ul class="list-inline">
						    <li>
							<input type="submit" class="btn btn-danger fs18" value="入店" name="log" id="log" />
						    </li>
						    <li>
                                                        <a href="<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->" onclick="eccube.openWindow('<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->','forget','600','460',{scrollbars:'no',resizable:'no'}); return false;" target="_blank"><input type="button" class="btn btn-default fs18" value="パスワードを忘れた" name="log" id="log" />
                                                        </a>
						    </li>
						</div>
					</div>
				</div>
			</div>

		</form>
	</div>
			<div class="login_area">
				<div class="inputbox">
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-9" style="padding-top:50px;">
							<div class="btn_area">
								<a href="<!--{$smarty.const.ROOT_URLPATH}-->entry/kiyaku.php" class="btn btn-danger fs24" style="padding:15px;">新規会員登録をする</a>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
