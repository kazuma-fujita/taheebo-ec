<?php /* Smarty version 2.6.27, created on 2014-10-06 10:43:07
         compiled from /var/www/html/../data/Smarty/templates/bootcube/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/../data/Smarty/templates/bootcube/footer.tpl', 30, false),array('modifier', 'date_format', '/var/www/html/../data/Smarty/templates/bootcube/footer.tpl', 47, false),)), $this); ?>

<!--▼FOOTER-->
<?php echo '<div id="footer_wrap"><div id="footer" class="container"><div id="guide_list"><ul class="list-inline"><li><a href="'; ?><?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'abouts/'; ?><?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" class="'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['tpl_page_class_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'LC_Page_Abouts'): ?><?php echo 'selected'; ?><?php endif; ?><?php echo '">当サイトについて</a></li><li><a href="'; ?><?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'contact/'; ?><?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" class="'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['tpl_page_class_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'LC_Page_Contact' || ((is_array($_tmp=$this->_tpl_vars['tpl_page_class_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'LC_Page_Contact_Complete'): ?><?php echo 'selected'; ?><?php endif; ?><?php echo '">お問い合わせ</a></li><li><a href="'; ?><?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'order/'; ?><?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" class="'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['tpl_page_class_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'LC_Page_Order'): ?><?php echo 'selected'; ?><?php endif; ?><?php echo '">ご利用ガイド</a></li><li><a href="'; ?><?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'guide/privacy.php" class="'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['tpl_page_class_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'LC_Page_Guide_Privacy'): ?><?php echo 'selected'; ?><?php endif; ?><?php echo '">プライバシーポリシー</a></li></ul></div><!--div id="pagetop" class="text-right"><a href="#top"><img src="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'img/taheebo/scrollup.gif"/></a></div--><div id="pagetop" class="text-right"><a href="#top" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-arrow-up"></span></a></div><div id="copyright" class="text-center">Copyright ©&nbsp;'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=time())) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?><?php echo '&nbsp;いいねっと All rights reserved.</div></div></div>'; ?>

<!--▲FOOTER-->