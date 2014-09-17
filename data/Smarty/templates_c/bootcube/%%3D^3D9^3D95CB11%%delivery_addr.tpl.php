<?php /* Smarty version 2.6.27, created on 2014-09-03 09:44:48
         compiled from mypage/delivery_addr.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'mypage/delivery_addr.tpl', 27, false),array('modifier', 'h', 'mypage/delivery_addr.tpl', 27, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."popup_header.tpl", 'smarty_include_vars' => array('subtitle' => "新しいお届け先の追加・変更")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="window_area" class="container">
	<h2 class="cat_title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
	<p>下記項目にご入力ください。「<span class="attention">※</span>」印は入力必須項目です。<br />
		入力後、一番下の「登録する」ボタンをクリックしてください。</p>

	<form class="form-inline" name="form1" id="form1" method="post" action="?" onsubmit="return false;">
		<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
		<input type="hidden" name="mode" value="edit" />
		<input type="hidden" name="other_deliv_id" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$_SESSION['other_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" />
		<input type="hidden" name="ParentPage" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ParentPage'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />

		<table class="table table-bordered" summary="お届け先登録">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."frontparts/form_personal_input.tpl", 'smarty_include_vars' => array('flgFields' => 1,'emailMobile' => false,'prefix' => "")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</table>
		<div class="btn_area">
			<ul class="list-inline">
				<li>
					<a class="btn btn-default" href="javascript:" onclick="eccube.setValueAndSubmit('form1', 'mode', 'edit'); return false;">登録する</a>
				</li>
			</ul>
		</div>
	</form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."popup_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>