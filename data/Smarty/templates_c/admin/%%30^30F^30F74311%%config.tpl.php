<?php /* Smarty version 2.6.27, created on 2014-11-17 20:07:41
         compiled from /var/www/eccube/html/../data/downloads/module/mdl_jpayment/template/config.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/eccube/html/../data/downloads/module/mdl_jpayment/template/config.tpl', 76, false),array('modifier', 'escape', '/var/www/eccube/html/../data/downloads/module/mdl_jpayment/template/config.tpl', 81, false),array('modifier', 'sfGetErrorColor', '/var/www/eccube/html/../data/downloads/module/mdl_jpayment/template/config.tpl', 107, false),array('function', 'html_checkboxes_ex', '/var/www/eccube/html/../data/downloads/module/mdl_jpayment/template/config.tpl', 123, false),array('function', 'html_radios_ex', '/var/www/eccube/html/../data/downloads/module/mdl_jpayment/template/config.tpl', 157, false),)), $this); ?>
<!-- /// modified -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_ADMIN_REALDIR)."admin_popup_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style type="text/css">

body {
	font-size: 110%;
}
</style>

<script type="text/javascript">
<!--
self.moveTo(20,20);self.focus();
self.resizeTo(650,860);

function lfnCheckPayment(){
	var fm = document.form1;
	var val = 0;
	
	payment = new Array('payment[]');

	for(pi = 0; pi < payment.length; pi++) {
	
		list = new Array('secure[]','job');
		if(fm[payment[pi]][0].checked){
			fnChangeDisabled(list, false);
		}else{
			fnChangeDisabled(list);
		}
	
		list = new Array('convenience[]');
		if(fm[payment[pi]][1].checked){
			fnChangeDisabled(list, false);
		}else{
			fnChangeDisabled(list);
		}
	}
}

function fnChangeDisabled(list, disable) {
	len = list.length;

	if(disable == null) { disable = true; }
	
	for(i = 0; i < len; i++) {
		if(document.form1[list[i]]) {
			// ラジオボタン、チェックボックス等の配列に対応
			max = document.form1[list[i]].length
			if(max > 1) {
				for(j = 0; j < max; j++) {
					// 有効、無効の切り替え
					document.form1[list[i]][j].disabled = disable;
				}
			} else {
				// 有効、無効の切り替え
				document.form1[list[i]].disabled = disable;
			}
		}
	}
}

function win_open(URL){
	var WIN;
	WIN = window.open(URL);
	WIN.focus();
}
//-->
</script>

<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</h2>

<div align="center">
<!--★★メインコンテンツ★★-->

<form name="form1" id="form1" method="post" action="<?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
  <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
  <input type="hidden" name="mode" value="edit">
    <!--▼登録テーブルここから-->
    <!--メインエリア-->
	
    <table width="442" border="0" cellspacing="1" cellpadding="8" summary=" ">
      <tr class="fs12n">
	  <td bgcolor="#ffffff">
        J-Payment決済モジュールをご利用頂く為には、<br />
		ユーザ様ご自身で株式会社J-Payment様とご契約を行っていただく必要があります。 <br />
        お申し込みにつきましては、下記のページから、お申し込みを行って下さい。<br />
        <a href="#" onClick="win03('http://www.j-payment.co.jp/service/payment/card/')" > ＞＞ J-Payment決済システムについて</a>
        </td>
      </tr>
    </table>

    <table width="442" border="0" cellspacing="1" cellpadding="8" summary=" ">
      <tr class="fs12n">
        <td colspan="2" width="100" bgcolor="#f3f3f3">▼Secure Link</td>
      </tr>
      <tr class="fs12n">
        <td width="" bgcolor="#f3f3f3">店舗ID<span class="red">※必須</span></td>
        <td width="300" bgcolor="#ffffff">
          <?php $this->assign('key', 'clientip'); ?>
          <span class="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
            <input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="ime-mode:disabled; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="box10" maxlength="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['length'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
        </td>
      </tr>

      <tr class="fs12n">
        <td width="100" bgcolor="#f3f3f3">接続先URL</td>
        <td width="337" bgcolor="#ffffff">
          <?php echo ((is_array($_tmp=@SECURE_LINK_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

        </td>
      </tr>

      <tr class="fs12n">
        <td width="100" bgcolor="#f3f3f3">利用決済<span class="red">※必須</span></td>
        <td width="337" bgcolor="#ffffff">
          <?php $this->assign('key', 'payment'); ?>
            <span class="red"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
              <?php echo smarty_function_html_checkboxes_ex(array('name' => ($this->_tpl_vars['key']),'options' => ((is_array($_tmp=$this->_tpl_vars['arrPayment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'style' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)),'onclick' => "lfnCheckPayment();"), $this);?>
<br />
            <span class="red">※ご利用の場合は、各決済毎にご契約が必要でございます。</span>
        </td>
      </tr>

      <tr class="fs12n">
        <td colspan="2" width="90" bgcolor="#f3f3f3">▼クレジット決済設定</td>
      </tr>

      <tr class="fs12n">
        <td width="90" bgcolor="#f3f3f3">3Dセキュア</td>
        <td width="337" bgcolor="#ffffff">
          <?php $this->assign('key', 'secure'); ?>
          <span class="red12"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
          <?php echo smarty_function_html_checkboxes_ex(array('name' => ($this->_tpl_vars['key']),'options' => ((is_array($_tmp=$this->_tpl_vars['arrSecure'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'style' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp))), $this);?>

          <span class="red">※別途、ご契約が必要でございます。</span>
        </td>
      </tr>

      <tr class="fs12n">
        <td width="90" bgcolor="#f3f3f3">CVV</td>
        <td width="337" bgcolor="#ffffff">
          <?php $this->assign('key', 'cvv'); ?>
          <span class="red12"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
          <?php echo smarty_function_html_checkboxes_ex(array('name' => ($this->_tpl_vars['key']),'options' => ((is_array($_tmp=$this->_tpl_vars['arrCVV'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'style' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp))), $this);?>

          <span class="red">※別途、ご契約が必要でございます。</span>
        </td>
      </tr>

      <tr class="fs12n">
        <td width="90" bgcolor="#f3f3f3">決済ジョブ</td>
        <td width="337" bgcolor="#ffffff">
          <?php $this->assign('key', 'job'); ?>
          <span class="red12"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
          <?php echo smarty_function_html_radios_ex(array('name' => ($this->_tpl_vars['key']),'options' => ((is_array($_tmp=$this->_tpl_vars['arrJob'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'style' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp))), $this);?>

        </td>
      </tr>


      <tr class="fs12n">
        <td colspan="2" width="90" bgcolor="#f3f3f3">▼コンビニ決済設定</td>
      </tr>

      <tr class="fs12n">
        <td width="90" bgcolor="#f3f3f3">利用コンビニ</td>
        <td width="337" bgcolor="#ffffff">
          <?php $this->assign('key', 'convenience'); ?>
          <span class="red12"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
          <?php echo smarty_function_html_checkboxes_ex(array('name' => ($this->_tpl_vars['key']),'options' => ((is_array($_tmp=$this->_tpl_vars['arrConvenience'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'style' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp))), $this);?>

        </td>
      </tr>

    </table>

    <!--メインエリア-->
    <!--▲登録テーブルここまで-->

    <div class="btn-area">
      <ul>
        <li><a class="btn-action" href="javascript:;" onclick="document.body.style.cursor = 'wait';document.form1.submit(); return false;"><span class="btn-next">この内容で登録する</span></a></li>
      </ul>
    </div>

</form>
<!--★★メインコンテンツ★★-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_ADMIN_REALDIR)."admin_popup_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>