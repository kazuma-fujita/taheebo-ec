<?php /* Smarty version 2.6.27, created on 2014-11-10 04:00:48
         compiled from /var/www/eccube/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_infomation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/var/www/eccube/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_infomation.tpl', 7, false),array('modifier', 'explode', '/var/www/eccube/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_infomation.tpl', 13, false),array('modifier', 'h', '/var/www/eccube/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_infomation.tpl', 24, false),array('modifier', 'nl2br', '/var/www/eccube/html/../data/Smarty/templates/bootcube/frontparts/bloc/bc_infomation.tpl', 24, false),)), $this); ?>
<?php echo '<div class="block_outer"><div id="bc_infomation"><h4 class="title">新着情報　<span class="rss"><a href="'; ?><?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo 'rss/'; ?><?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" target="_blank"><i class="fa fa-rss"></i></a></span></h4><div class="block_body"><div class="news_contents">'; ?><?php unset($this->_sections['data']);
$this->_sections['data']['name'] = 'data';
$this->_sections['data']['loop'] = is_array($_loop=2) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['data']['show'] = true;
$this->_sections['data']['max'] = $this->_sections['data']['loop'];
$this->_sections['data']['step'] = 1;
$this->_sections['data']['start'] = $this->_sections['data']['step'] > 0 ? 0 : $this->_sections['data']['loop']-1;
if ($this->_sections['data']['show']) {
    $this->_sections['data']['total'] = $this->_sections['data']['loop'];
    if ($this->_sections['data']['total'] == 0)
        $this->_sections['data']['show'] = false;
} else
    $this->_sections['data']['total'] = 0;
if ($this->_sections['data']['show']):

            for ($this->_sections['data']['index'] = $this->_sections['data']['start'], $this->_sections['data']['iteration'] = 1;
                 $this->_sections['data']['iteration'] <= $this->_sections['data']['total'];
                 $this->_sections['data']['index'] += $this->_sections['data']['step'], $this->_sections['data']['iteration']++):
$this->_sections['data']['rownum'] = $this->_sections['data']['iteration'];
$this->_sections['data']['index_prev'] = $this->_sections['data']['index'] - $this->_sections['data']['step'];
$this->_sections['data']['index_next'] = $this->_sections['data']['index'] + $this->_sections['data']['step'];
$this->_sections['data']['first']      = ($this->_sections['data']['iteration'] == 1);
$this->_sections['data']['last']       = ($this->_sections['data']['iteration'] == $this->_sections['data']['total']);
?><?php echo ''; ?><?php $this->assign('date_array', ((is_array($_tmp="-")) ? $this->_run_mod_handler('explode', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['cast_news_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : explode($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['cast_news_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))))); ?><?php echo '<dl class="newslist"><dt class="date">'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['date_array'][0])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '年'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['date_array'][1])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '月'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['date_array'][2])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '日</dt><dt class="text"><a'; ?><?php if (((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ' href="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?><?php echo '" '; ?><?php if (((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['link_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '2'): ?><?php echo ' target="_blank"'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '>'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?><?php echo '</a></dt><dd class="mini">'; ?><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrNews'][$this->_sections['data']['index']]['news_comment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?><?php echo '</dd></dl>'; ?><?php endfor; endif; ?><?php echo '</div></div></div></div>'; ?>
