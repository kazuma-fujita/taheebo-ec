<?php /* Smarty version 2.6.27, created on 2014-09-01 23:58:44
         compiled from error.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'error.tpl', 28, false),)), $this); ?>

<?php echo '<div id="undercolumn"><div id="undercolumn_error"><div class="message_area"><!--★エラーメッセージ--><p class="error">'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '</p></div><div class="btn_area"><ul class="list-inline"><li>'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['return_top'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<a href="'; ?><?php echo ((is_array($_tmp=@TOP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" class="btn btn-default">トップページへ</a>'; ?><?php else: ?><?php echo '<a href="javascript:history.back()" class="btn btn-default">戻る</a>'; ?><?php endif; ?><?php echo '</li></ul></div></div></div>'; ?>
