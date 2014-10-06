<?php /* Smarty version 2.6.27, created on 2014-10-06 03:17:16
         compiled from /var/www/html/../data/Smarty/templates/bootcube/entry/kiyaku.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/../data/Smarty/templates/bootcube/entry/kiyaku.tpl', 27, false),array('modifier', 'h', '/var/www/html/../data/Smarty/templates/bootcube/entry/kiyaku.tpl', 28, false),)), $this); ?>

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
		
		<p class="message">【重要】 会員登録をされる前に、下記ご利用規約をよくお読みください。</p>
		<p>規約には、本サービスを使用するに当たってのあなたの権利と義務が規定されております。<br />
			「同意して会員登録へ」ボタンをクリックすると、あなたが本規約の全ての条件に同意したことになります。
		</p>

		<form name="form1" id="form1" method="post" action="?">
			<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
			<textarea name="textfield" class="kiyaku_text" cols="80" rows="30" readonly="readonly"><?php echo "\n"; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_text'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</textarea>

			<div class="btn_area">
				<ul class="list-inline">
					<li>
						<a href="<?php echo ((is_array($_tmp=@TOP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="btn btn-default">同意しない</a>
					</li>
					<li>
						<a href="<?php echo ((is_array($_tmp=@ENTRY_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="btn btn-primary">同意して会員登録へ</a>
					</li>
				</ul>
			</div>

		</form>
	</div>
</div>