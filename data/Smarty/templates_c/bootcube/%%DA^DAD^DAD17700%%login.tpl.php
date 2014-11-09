<?php /* Smarty version 2.6.27, created on 2014-11-10 01:20:37
         compiled from mypage/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'mypage/login.tpl', 5, false),array('modifier', 'h', 'mypage/login.tpl', 8, false),array('modifier', 'sfGetChecked', 'mypage/login.tpl', 32, false),)), $this); ?>
<div class="block_outer col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12">
	<div id="bc_sidelogin">

		<div class="content_panel">
			<form class="form" name="login_form" id="login_form" method="post" action="<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
frontparts/login_check.php"<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> onsubmit="return eccube.checkLoginFormInputted('login_form')"<?php endif; ?>>
				<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
				<input type="hidden" name="mode" value="login" />
				<input type="hidden" name="url" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />

						<div class="col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/taheebo/iinet_main_logo.png" class="img-responsive"/></div>
						<div class="col-xs-12 col-sm-10 col-sm-offset-1"><h4 class="title"><span class="icon"><i class="fa fa-lock"></i></span>　ログイン</h4></div>


						
						<div class="item_panel col-xs-12 col-sm-10 col-sm-offset-1">

							<div class="form-group">
								<label>メールアドレス</label>
								<input type="email" name="login_email" class="form-control" id="login-table-email" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_login_email'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" placeholder="メールアドレス"  style="ime-mode: disabled;" />
								
							</div>

							<div class="form-group">
								<label>パスワード</label>
								<input type="password" name="login_pass" class="form-control" id="login-table-pass" placeholder="パスワード" />
								<label class="forgot">
									<a href="<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
forgot/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" onclick="eccube.openWindow('<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
forgot/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
','forget','600','400',{scrollbars:'no',resizable:'no'}); return false;" target="_blank">パスワードを忘れた方</a>
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="login_memory" id="login_memory" value="1" <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_login_memory'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetChecked', true, $_tmp, 1) : SC_Utils_Ex::sfGetChecked($_tmp, 1)); ?>
 /> 次回から記憶する
								</label>
							</div>
					
							<div class="btn_login text-center">
								<button type="submit" class="btn btn-primary btn-lg">入店する</button>
							</div>
							<div class="btn_entry text-center">
								<a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
entry/kiyaku.php" class="btn btn-danger btn-lg">新規会員登録</a>
							</div>
							
						</div>
 
			</form>
		</div>
	</div>
</div>