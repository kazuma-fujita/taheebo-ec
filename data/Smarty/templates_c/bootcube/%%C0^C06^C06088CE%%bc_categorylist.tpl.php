<?php /* Smarty version 2.6.27, created on 2014-11-19 22:00:45
         compiled from /var/www/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_categorylist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_categorylist.tpl', 9, false),array('modifier', 'h', '/var/www/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_categorylist.tpl', 13, false),)), $this); ?>
<?php echo '<div class="block_outer"><div id="bc_categoryList"><h4 class="title">カテゴリ一覧</h4><div class="block_body"><ul class="list_group list-unstyled">'; ?><?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrCatLevel1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat1']):
?><?php echo '<li class="list_item"><a href="'; ?><?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'products/list.php?category_id='; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '"><i class="fa fa-angle-right"></i>　'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cat1']['category_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo '</a>'; ?><?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrCatLevel2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat2']):
?><?php echo ''; ?><?php if (((is_array($_tmp=$this->_tpl_vars['cat1']['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['cat2']['parent_category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<ul class="level2 list-unstyled"><li><a href="'; ?><?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'products/list.php?category_id='; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cat2']['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '"><i class="fa fa-angle-right"></i>　'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cat2']['category_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo '</a>'; ?><?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrCatLevel3'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat3']):
?><?php echo ''; ?><?php if (((is_array($_tmp=$this->_tpl_vars['cat2']['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=$this->_tpl_vars['cat3']['parent_category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo '<ul class="level3 list-unstyled"><li><a href="'; ?><?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'products/list.php?category_id='; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cat3']['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '"><i class="fa fa-angle-right"></i>　'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cat3']['category_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?><?php echo '</a></li></ul>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</li></ul>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</li>'; ?><?php endforeach; endif; unset($_from); ?><?php echo '</ul></div></div><!-- /bc_categoryList --></div>'; ?>
