<?php

// {{{ requires
require_once(CLASS_EX_REALDIR . "page_extends/frontparts/bloc/LC_Page_FrontParts_Bloc_Product_List_Ex.php");

// }}}
// {{{ generate page

$objPage = new LC_Page_FrontParts_Bloc_Product_List_Ex();
register_shutdown_function(array($objPage, "destroy"));
$objPage->init();
$objPage->process();

?>

