<?php /* Smarty version 2.6.27, created on 2014-09-01 22:02:23
         compiled from /var/www/eccube/html/../data/Smarty/templates/bootcube/guide/privacy.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/eccube/html/../data/Smarty/templates/bootcube/guide/privacy.tpl', 29, false),array('modifier', 'h', '/var/www/eccube/html/../data/Smarty/templates/bootcube/guide/privacy.tpl', 30, false),)), $this); ?>

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
		<p>
			<?php if (((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ''): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
は、<?php endif; ?>
			個人情報保護の重要性に鑑み、「個人情報の保護に関する法律」及び本プライバシーポリシーを遵守し、お客さまのプライバシー保護に努めます。
		</p>
		<br />
		<p class="message">個人情報の定義</p>
		<p>お客さま個人に関する情報(以下「個人情報」といいます)であって、お客さまのお名前、住所、電話番号など当該お客さま個人を識別することができる情報をさします。他の情報と組み合わせて照合することにより個人を識別することができる情報も含まれます。</p>

	</div>
</div>