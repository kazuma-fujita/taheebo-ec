<?php /* Smarty version 2.6.27, created on 2014-09-19 16:18:00
         compiled from /var/www/eccube/html/../data/Smarty/templates/bootcube/popup_footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/eccube/html/../data/Smarty/templates/bootcube/popup_footer.tpl', 26, false),)), $this); ?>

</div>
<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/custom.js"></script>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/jquery-1.4.2.min.js"></script>
</body>
</html>