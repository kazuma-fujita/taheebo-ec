<?php
  /**
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version jpayment_credit.php, v2.2.0
   */
require_once(MODULE_REALDIR . 'mdl_jpayment/class/LC_Page_Mdl_JPayment_Payment.php');

$objPage = new LC_Page_Mdl_JPayment_Payment();
$objPage->init();
$objPage->process();
?>
