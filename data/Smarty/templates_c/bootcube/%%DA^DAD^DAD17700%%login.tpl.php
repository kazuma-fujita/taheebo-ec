<?php /* Smarty version 2.6.27, created on 2014-09-29 15:18:27
         compiled from mypage/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'mypage/login.tpl', 3, false),array('modifier', 'h', 'mypage/login.tpl', 9, false),array('modifier', 'sfGetErrorColor', 'mypage/login.tpl', 21, false),array('modifier', 'sfGetChecked', 'mypage/login.tpl', 29, false),)), $this); ?>
<div id="undercolumn" class="well fs18" style="margin-top:100px;border-radius:50px;">

	<div class="col-sm-offset-3" style="padding:13px;"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/taheebo/iinet_main_logo.png" class='img-responsive' width="60%"/></div>

	<div id="undercolumn_entry">
		<form class="form-horizontal" name="login_mypage" id="login_mypage" method="post" action="<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
frontparts/login_check.php" onsubmit="return eccube.checkLoginFormInputted('login_mypage')">
			<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
			<input type="hidden" name="mode" value="login" />
			<input type="hidden" name="url" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />

			<div class="login_area">
				<div class="inputbox">
					<div class="form-group">
						<?php $this->assign('key', 'login_email'); ?>
						<!--label for="inputEmail3" class="col-sm-3 control-label">メールアドレス&nbsp;：</label-->
						<label for="inputEmail3" class="col-sm-offset-4 control-label" style="padding-left:14px;">メールアドレス</label>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
							<input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_login_email'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
; ime-mode: disabled;" class="box300 form-control" />
						</div>
					</div>
<!--
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-9">
						  <div class="checkbox">
							<label>
							  <input type="checkbox" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="1"<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_login_memory'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, 1) : SC_Utils_Ex::sfGetChecked($_tmp, 1)); ?>
 id="login_memory" />
							<label for="login_memory"> メールアドレスをコンピューターに記憶させる
							</label>
						  </div>
						</div>
					</div>
-->
					<div class="form-group">
						<?php $this->assign('key', 'login_pass'); ?>
						<label for="inputEmail3" class="col-sm-offset-4 control-label" style="padding-left:14px;">パスワード</label>
						<!--label for="inputEmail3" class="col-sm-3 control-label">パスワード&nbsp;：</label-->
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
						<input type="password" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" class="box300 form-control" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-9">
						  <div class="checkbox">
							<label>
							  <input type="checkbox" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="1"<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_login_memory'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, 1) : SC_Utils_Ex::sfGetChecked($_tmp, 1)); ?>
 id="login_memory" />
							<label for="login_memory"> 次回から自動でログイン（未実装）
							</label>
						  </div>
						</div>
					</div>
					<div class="form-group">
						<div class="btn_area">
						<ul class="list-inline">
						    <li>
							<input type="submit" class="btn btn-danger fs18" value="入店" name="log" id="log" />
						    </li>
						    <li>
                                                        <a href="<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
forgot/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
forgot/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
','forget','600','460',{scrollbars:'no',resizable:'no'}); return false;" target="_blank"><input type="button" class="btn btn-default fs18" value="パスワードを忘れた方へ" name="log" id="log" />
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
						<div class="col-sm-offset-5 col-sm-9" style="padding-top:50px;">
							<div class="btn_area">
								<a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
entry/kiyaku.php" class="btn btn-danger fs18">会員登録をする</a>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>