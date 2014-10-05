<?php
//設定ファイル
// {{{ requires
require_once PLUGIN_UPLOAD_REALDIR .  'KuronekoB2/LC_Page_Plugin_KuronekoB2_Config.php';

// }}}
// {{{ generate page
$objPage = new LC_Page_Plugin_KuronekoB2_Config();
register_shutdown_function(array($objPage, 'destroy'));
$objPage->init();
$objPage->process();
?>