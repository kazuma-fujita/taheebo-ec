<?php
// {{{ requires
require_once PLUGIN_UPLOAD_REALDIR .  'BbAdminViewsControl/LC_Page_Plugin_BbAdminViewsControl_Config.php';

// }}}
// {{{ generate page
$objPage = new LC_Page_Plugin_BbAdminViewsControl_Config();
register_shutdown_function(array($objPage, 'destroy'));
$objPage->init();
$objPage->process();
?>
