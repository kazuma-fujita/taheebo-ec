<?php /* Smarty version 2.6.27, created on 2014-09-18 15:57:53
         compiled from /var/www/eccube/html/../data/Smarty/templates/bootcube/frontparts/bloc/category.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/eccube/html/../data/Smarty/templates/bootcube/frontparts/bloc/category.tpl', 36, false),)), $this); ?>

<script type="text/javascript">
    $(function(){
        $('#category_area li.level1:last').css('border-bottom', 'none');
    });
</script>

<?php echo '<div class="block_outer"><div id="category_area" class="panel panel-default"><div class="panel-heading"><h4 class="title">商品カテゴリ</h4></div><div class="block_body panel-body">'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."frontparts/bloc/category_tree_fork.tpl", 'smarty_include_vars' => array('children' => ((is_array($_tmp=$this->_tpl_vars['arrTree'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'treeID' => "",'display' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</div></div></div>'; ?>
