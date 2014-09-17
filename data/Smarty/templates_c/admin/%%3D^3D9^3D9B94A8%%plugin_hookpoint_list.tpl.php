<?php /* Smarty version 2.6.27, created on 2014-09-03 11:38:11
         compiled from ownersstore/plugin_hookpoint_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'ownersstore/plugin_hookpoint_list.tpl', 58, false),array('modifier', 'count', 'ownersstore/plugin_hookpoint_list.tpl', 81, false),array('function', 'html_radios', 'ownersstore/plugin_hookpoint_list.tpl', 95, false),)), $this); ?>

<script type="text/javascript">//<![CDATA[
    $(function() {

        /**
         * 「有効/有効にする」チェックボタン押下時
         */
        $('input[name^=plugin_hookpoint_use]').change(function(event) {
            // モード(有効 or 無効)
            var value = event.target.value;
            var id = event.target.id;

            if(value === '0') {
                result = window.confirm('無効にしても宜しいですか？');
                if(result === false) {
                    //$(event.target).attr("checked", "checked");
                    event.target.value = '1';
                }
            } else if(value === '1') {
                result = window.confirm('有効にしても宜しいですか？');
                if(result === false) {
                    //$(event.target).attr("checked", "checked");
                    event.target.value = '0';
                }
            }
            // プラグインフックID
            eccube.setModeAndSubmit('update_use', 'plugin_hookpoint_id', id);
        });
    });

//]]></script>

<!--<form name="form1" id="form1" method="post" action="?">-->
<form name="form1" id="form1" method="post" action="?">
<input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
<input type="hidden" name="mode" value="conflict_check" />
<input type="hidden" name="plugin_hookpoint_id" value="" />
<div id="system" class="contents-main">
    <!--▼プラグイン一覧ここから-->
    <h2>フックポイント別プラグイン一覧</h2>
    <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrHookPoint'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>

        <span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr']['plugin_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
        <table class="system-plugin" width="900">
            <col width="40%" />
            <col width="5" />
            <col width="40%" />
            <col width="15%" />
            <tr>
                <th>フックポイント</th>
                <th>優先度</th>
                <th>プラグイン名</th>
                <th>利用ON/OFF</th>
            </tr>
    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrHookPoint'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hookpoint']):
?>
    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['hookpoint'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['plugin'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['plugin']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['val']):
        $this->_foreach['plugin']['iteration']++;
?>
            <tr>
                <?php if (count(((is_array($_tmp=$this->_tpl_vars['hookpoint'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) > 0 && ((is_array($_tmp=$this->_foreach['plugin']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '1'): ?>
                <td <?php if (in_array ( ((is_array($_tmp=$this->_tpl_vars['val']['hook_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) , ((is_array($_tmp=$this->_tpl_vars['arrConflict'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>bgcolor="pink"<?php endif; ?> rowspan="<?php echo count(((is_array($_tmp=$this->_tpl_vars['hookpoint'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))); ?>
">
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['val']['hook_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

                    <?php if (in_array ( ((is_array($_tmp=$this->_tpl_vars['val']['hook_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) , ((is_array($_tmp=$this->_tpl_vars['arrConflict'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?><br /><span class="attention">※ 競合中</span><?php endif; ?>
                </td>
                <?php elseif (! ((is_array($_tmp=$this->_foreach['plugin']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 1): ?>
                <td <?php if (in_array ( ((is_array($_tmp=$this->_tpl_vars['val']['hook_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) , ((is_array($_tmp=$this->_tpl_vars['arrConflict'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?>bgcolor="pink"<?php endif; ?>>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['val']['hook_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

                    <?php if (in_array ( ((is_array($_tmp=$this->_tpl_vars['val']['hook_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) , ((is_array($_tmp=$this->_tpl_vars['arrConflict'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) )): ?><br /><span class="attention">※ 競合中</span><?php endif; ?>
                </td>
                <?php endif; ?>
                <td<?php if (((is_array($_tmp=$this->_tpl_vars['val']['use_flg'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '0'): ?> bgcolor="grey"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['val']['priority'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                <td<?php if (((is_array($_tmp=$this->_tpl_vars['val']['use_flg'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '0'): ?> bgcolor="grey"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['val']['plugin_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                <td<?php if (((is_array($_tmp=$this->_tpl_vars['val']['use_flg'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '0'): ?> bgcolor="grey"<?php endif; ?>>
                <?php echo smarty_function_html_radios(array('name' => "plugin_hookpoint_use[".($this->_tpl_vars['val']['plugin_hookpoint_id'])."]",'options' => ((is_array($_tmp=$this->_tpl_vars['arrUse'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['val']['use_flg'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'id' => ((is_array($_tmp=$this->_tpl_vars['val']['plugin_hookpoint_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                </td>
            </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php endforeach; endif; unset($_from); ?>
        </table>
    <?php else: ?>
        <span>登録されているプラグインはありません。</span>
    <?php endif; ?>
</div>
</form>