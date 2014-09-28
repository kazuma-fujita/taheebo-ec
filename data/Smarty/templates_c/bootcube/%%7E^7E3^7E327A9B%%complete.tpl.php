<?php /* Smarty version 2.6.27, created on 2014-09-29 04:27:06
         compiled from /var/www/html/../data/Smarty/templates/bootcube/shopping/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/html/../data/Smarty/templates/bootcube/shopping/complete.tpl', 26, false),array('modifier', 'h', '/var/www/html/../data/Smarty/templates/bootcube/shopping/complete.tpl', 28, false),array('modifier', 'nl2br', '/var/www/html/../data/Smarty/templates/bootcube/shopping/complete.tpl', 38, false),array('modifier', 'escape', '/var/www/html/../data/Smarty/templates/bootcube/shopping/complete.tpl', 71, false),)), $this); ?>

<div id="undercolumn">
	<div id="undercolumn_shopping">
		<p class="flow_area">
			<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/picture/img_flow_04.jpg" alt="購入手続きの流れ" />
		</p>
		<h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>

		<!-- ▼その他決済情報を表示する場合は表示 -->
		<?php if (((is_array($_tmp=$this->_tpl_vars['arrOther']['title']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
			<p><span class="attention">■<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOther']['title']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
情報</span><br />
				<?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrOther'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
					<?php if (((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != 'title'): ?>
						<?php if (((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：
						<?php endif; ?>
							<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br />
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</p>
		<?php endif; ?>
		<!-- ▲コンビに決済の場合には表示 -->

		<div id="complete_area">
			<p class="message"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
の商品をご購入いただき、ありがとうございました。</p>
			<p>ただいま、ご注文の確認メールをお送りさせていただきました。<br />
				万一、ご確認メールが届かない場合は、トラブルの可能性もありますので大変お手数ではございますがもう一度お問い合わせいただくか、お電話にてお問い合わせくださいませ。<br />
				今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>

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