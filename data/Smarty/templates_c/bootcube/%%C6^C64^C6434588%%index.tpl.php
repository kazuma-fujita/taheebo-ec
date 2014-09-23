<?php /* Smarty version 2.6.27, created on 2014-09-23 14:39:42
         compiled from /var/www/html/../data/Smarty/templates/bootcube/entry/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/../data/Smarty/templates/bootcube/entry/index.tpl', 27, false),array('modifier', 'h', '/var/www/html/../data/Smarty/templates/bootcube/entry/index.tpl', 28, false),)), $this); ?>

<div id="undercolumn">
	<div id="undercolumn_entry">
	
		<ol class="breadcrumb">
			<li><a href="<?php echo ((is_array($_tmp=@TOP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">トップ</a></li>
			<li class="active"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</li>
		</ol>
	
		<h2 class="cat_title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
		
		<?php if (((is_array($_tmp=@CUSTOMER_CONFIRM_MAIL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
			<p>ご登録されますと、まずは仮会員となります。<br />
				入力されたメールアドレスに、ご連絡が届きますので、本会員になった上でお買い物をお楽しみください。</p>
		<?php endif; ?>
		<form class="form-inline" name="form1" id="form1" method="post" action="?">
			<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
			<input type="hidden" name="mode" value="confirm" />

			<table class="table table-bordered" summary="会員登録フォーム">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."frontparts/form_personal_input.tpl", 'smarty_include_vars' => array('flgFields' => 3,'emailMobile' => false,'prefix' => "")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</table>

			<div class="btn_area">
				<ul class="list-inline">
					<li>
						<input type="submit" class="btn btn-primary" value="確認ページへ" name="confirm" id="confirm" />
					</li>
				</ul>
			</div>

		</form>
	</div>
</div>