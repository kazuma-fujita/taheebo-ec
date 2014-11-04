<?php
  /**
   * キックバック通知受信処理
   *
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version jpayment_recv.php, v2.2.0
   */
require_once '../require.php';
require_once(MODULE_REALDIR . "mdl_jpayment/include.php");
require_once(MODULE_REALDIR . "mdl_jpayment/class/LC_Page_Mdl_JPayment_Config.php");

$objJpayment = new LC_Page_Mdl_Jpayment_Config();
$objJpayment->IfJPaymentRecv();
?>