<?php /* Smarty version 2.6.27, created on 2014-09-08 14:43:28
         compiled from products/review_complete.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."popup_header.tpl", 'smarty_include_vars' => array('subtitle' => "お客様の声書き込み（完了ページ）")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="window_area" class="container">
	<h2 class="title">お客様の声書き込み</h2>
	<div id="completebox">
		<p class="message">登録が完了しました。ご利用ありがとうございました。</p>
		<p>弊社にて登録内容を確認後、ホームページに反映させていただきます。<br />
			今しばらくお待ちくださいませ。</p>
	</div>
	<div class="btn_area">
		<ul class="list-inline">
			<li>
				<a href="javascript:window.close()" class="btn btn-default">閉じる</a>
			</li>
		</ul>
	</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."popup_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>