<?php /* Smarty version 2.6.27, created on 2014-11-10 11:35:22
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
		<hr>
		<p class="message">個人情報の定義</p>
		<p>当社は、以下の目的のため、その範囲内においてのみ、個人情報を収集・利用いたします。当社による 個人情報の収集・利用は、お客様の自発的な提供によるものであり、お客様が個人情報を提供された場合は、当社が本方針に則って個人情報を利用することをお客様が承諾したものとします。</p>
		<hr>
		<p class="message">各種のお問い合わせ対応</p>
		<p>業務遂行上で必要となる当社からの問い合わせ、確認、およびサービス向上のための意見収集新商品の案内などお客様に有益かつ必要と思われる情報の提供</p>
		<hr>
		<p class="message">個人情報の第三者提供</p>
		<p>当社は、法令に基づく場合等正当な理由によらない限り、事前に本人の同意を得ることなく、個人情報を第三者に開示・提供することはありません。</p>
		<hr>
		<p class="message">個人情報の管理</p>
		<p>当社は、個人情報の漏洩、滅失、毀損等を防止するために、個人情報保護管理責任者を設置し、十分な安全保護に努め、また、個人情報を正確に、また最新なものに保つよう、お預かりした個人情報の適切な管理を行います。</p>
		<hr>
		<p class="message">情報内容の照会、修正または削除</p>
		<p>当社は、お客様が当社にご提供いただいた個人情報の照会、修正または削除を希望される場合は、ご本人であることを確認させていただいたうえで、合理的な範囲ですみやかに対応させていただきます。</p>

	</div>
</div>