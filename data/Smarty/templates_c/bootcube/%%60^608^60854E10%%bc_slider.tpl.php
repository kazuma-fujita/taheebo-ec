<?php /* Smarty version 2.6.27, created on 2014-11-10 04:00:48
         compiled from /var/www/eccube/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_slider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/eccube/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_slider.tpl', 13, false),)), $this); ?>
<?php echo '<div class="container"> '; ?><?php echo '<div id="bc_slider" class="slider slide col-xs-12" data-ride="carousel"><div class="row"><ol class="carousel-indicators"><li data-target="#bc_slider" data-slide-to="0" class="active"></li><li data-target="#bc_slider" data-slide-to="1" class=""></li><li data-target="#bc_slider" data-slide-to="2" class=""></li></ol><div class="carousel-inner"><div class="item active"><img alt="slider1" src="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'test-img/iinet_slider1.jpg"></div><div class="item"><img alt="slider2" src="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'test-img/iinet_slider2.png"></div><div class="item"><img alt="slider3" src="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'test-img/iinet_slider1.jpg"></div></div><a class="left carousel-control" href="#bc_slider" data-slide="prev"><i class="fa fa-angle-left"></i></a><a class="right carousel-control" href="#bc_slider" data-slide="next"><i class="fa fa-angle-right"></i></a></div></div></div> '; ?><?php echo '<!-- /container -->'; ?>
