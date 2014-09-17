<?php /* Smarty version 2.6.27, created on 2014-09-08 11:00:23
         compiled from /var/www/eccube/html/../data/Smarty/templates/bootcube/mypage/refusal.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/eccube/html/../data/Smarty/templates/bootcube/mypage/refusal.tpl', 28, false),array('modifier', 'h', '/var/www/eccube/html/../data/Smarty/templates/bootcube/mypage/refusal.tpl', 29, false),)), $this); ?>

<div id="undercolumn">

		<ol class="breadcrumb">
			<li><a href="<?php echo ((is_array($_tmp=@TOP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">トップ</a></li>
			<li class="active"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</li>
		</ol>

	<h2 class="cat_title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_navi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<div id="mycontents_area">
		<h3 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h3>
		<form name="form1" id="form1" method="post" action="?">
			<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
			<input type="hidden" name="mode" value="confirm" />
			<div id="complete_area">
				<div class="message">会員を退会された場合には、現在保存されている購入履歴や、<br />
				お届け先などの情報は、全て削除されますがよろしいでしょうか？</div>
				<div class="message_area">
					<p>退会手続きが完了した時点で、現在保存されている購入履歴や、<br />
					お届け先等の情報は全てなくなりますのでご注意ください。</p>
					<div class="btn_area">
						<ul class="list-inline">
							<li>
								<input type="submit" class="btn btn-default btn-sm" value="会員退会手続きへ" name="refusal" id="refusal" />
							</li>
						</ul>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>