<?php
  /**
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version config.php, v2.2.0
   */
require_once(MODULE_REALDIR . "mdl_jpayment/class/LC_Page_Mdl_JPayment_Config.php");

$objPage = new LC_Page_Mdl_JPayment_Config();
$objPage->init();
$objPage->process();
register_shutdown_function(array($objPage, "destroy"));
?>
