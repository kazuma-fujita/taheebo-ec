<?php /* Smarty version 2.6.27, created on 2014-11-17 19:40:17
         compiled from ownersstore/log_detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'ownersstore/log_detail.tpl', 26, false),array('modifier', 'h', 'ownersstore/log_detail.tpl', 34, false),array('modifier', 'sfDispDBDate', 'ownersstore/log_detail.tpl', 42, false),array('modifier', 'wordwrap', 'ownersstore/log_detail.tpl', 46, false),array('modifier', 'nl2br', 'ownersstore/log_detail.tpl', 46, false),)), $this); ?>

<form name="form1" id="form1" method="post" action="?">
    <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
    <input type="hidden" name="mode" value="register" />

    <div id="ownersstore" class="contents-main">

        <table class="form">
            <tr>
                <th>モジュール名</th>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrLogDetail']['module_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
            </tr>
            <tr>
                <th>ステータス</th>
                <td><?php if (((is_array($_tmp=$this->_tpl_vars['arrLogDetail']['error_flg'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>失敗<?php else: ?>成功<?php endif; ?></td>
            </tr>
            <tr>
                <th>日時</th>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrLogDetail']['update_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
            </tr>
            <tr>
                <th>バックアップパス</th>
                <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrLogDetail']['buckup_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 100, "\n", true) : smarty_modifier_wordwrap($_tmp, 100, "\n", true)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
            </tr>
            <tr>
                <th>詳細</th>
                <td>
                    <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrLogDetail']['error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 100, "\n", true) : smarty_modifier_wordwrap($_tmp, 100, "\n", true)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

                    <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrLogDetail']['ok'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 100, "\n", true) : smarty_modifier_wordwrap($_tmp, 100, "\n", true)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

                </td>
            </tr>
        </table>
        <div class="btn">
            <a class="btn-action" href='./log.php'><span class="btn-prev">一覧へ戻る</span></a>
        </div>
    </div>
</form>