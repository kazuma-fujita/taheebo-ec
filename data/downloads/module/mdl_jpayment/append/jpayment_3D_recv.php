<?php
  /**
   * 3Dセキュア利用時の画面遷移制御(test required.)
   *
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version jpayment_3D_recv.php, v2.2.0
   */
require_once '../require.php';
///require_once(DATA_PATH. 'module/Request.php');
require_once(MODULE_REALDIR . "mdl_jpayment/include.php");
require_once(MODULE_REALDIR . "mdl_jpayment/class/LC_Page_Mdl_JPayment_Config.php");
require_once(CLASS_EX_REALDIR . "page_extends/shopping/LC_Page_Shopping_Complete_Ex.php");
require_once(MODULE_REALDIR . "mdl_jpayment/module/Gateway.php");

//function gfPrintLog($msg, $log_path) 
//{
//	GC_Utils :: gfPrintLog($msg, $log_path);
//}
$objJpayment = new LC_Page_Mdl_Jpayment_Config();
$objJpayment->IfJPayment3DCheck();
?>