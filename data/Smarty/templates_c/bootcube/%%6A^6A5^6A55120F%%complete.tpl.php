<?php /* Smarty version 2.6.27, created on 2014-09-03 15:53:58
         compiled from /var/www/eccube/html/../data/Smarty/templates/bootcube/entry/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/eccube/html/../data/Smarty/templates/bootcube/entry/complete.tpl', 27, false),array('modifier', 'h', '/var/www/eccube/html/../data/Smarty/templates/bootcube/entry/complete.tpl', 28, false),array('modifier', 'escape', '/var/www/eccube/html/../data/Smarty/templates/bootcube/entry/complete.tpl', 60, false),)), $this); ?>

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
		
		<div id="complete_area">
			<p class="message">会員登録の受付が完了いたしました。</p>
			<p>現在<span class="attention">仮会員</span>の状態です。<br />
					ご入力いただいたメールアドレス宛てに、ご連絡が届いておりますので、本会員登録になった上でお買い物をお楽しみください。<br />
					今後ともご愛顧賜りますようよろしくお願い申し上げます。
			</p>

			<div class="shop_information">
				<table class="table table-bordered" summary="お問い合わせ">
					<col width="30%" />
					<col width="70%" />
					<?php if (((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
						<tr>
							<th>会社名</th>
							<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
						</tr>
					<?php endif; ?>
					<tr>
						<th>TEL</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

								<?php if (((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
								(受付時間/<?php echo ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['business_hour'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
)
								<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th>Email</th>
						<td><a href="mailto:<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hex') : smarty_modifier_escape($_tmp, 'hex')); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['email02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'hexentity') : smarty_modifier_escape($_tmp, 'hexentity')); ?>
</a></td>
					</tr>
				</table>
			</div>

			<div class="btn_area">
				<ul class="list-inline">
					<li>
						<a href="<?php echo ((is_array($_tmp=@TOP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="btn btn-default">トップページへ</a>
					</li>
				</ul>
			</div>
		</div>
		
	</div>
</div>