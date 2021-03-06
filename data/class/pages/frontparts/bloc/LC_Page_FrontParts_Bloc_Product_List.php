<?php

// {{{ requires
require_once CLASS_REALDIR . 'pages/frontparts/bloc/LC_Page_FrontParts_Bloc.php';

/**
 * Product_List のページクラス.
 *
 * @package Page
 */
class LC_Page_FrontParts_Bloc_Product_List extends LC_Page_FrontParts_Bloc {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $bloc_file = 'product_list.tpl';
        $this->setTplMainpage($bloc_file);
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        if (defined("MOBILE_SITE") && MOBILE_SITE) {
            $objView = new SC_MobileView();
        } else {
            $objView = new SC_SiteView();
        }

        //require_once CLASS_REALDIR . 'SC_Product.php';
        require_once CLASS_REALDIR . 'pages/products/LC_Page_Products_List.php';
        //$objProduct = new SC_Product();
        $productList = new LC_Page_Products_List();
/*
        $arrSearchData = array(
            'category_id'   => $this->lfGetCategoryId(intval($this->arrForm['category_id'])),
            'maker_id'      => intval($this->arrForm['maker_id']),
            'name'          => $this->arrForm['name']
        );
        $arrSearchCondition = $this->lfGetSearchCondition($this->arrSearchData);
*/
        //$productList->orderby = 'date';
        // add
       // $this->arrProducts  = $productList->lfGetProductsList($arrSearchCondition, 100, 0, $objProduct);

        $productList->action();

        $this->tpl_stock_find       = $productList->tpl_stock_find;
        $this->tpl_product_class_id = $productList->tpl_product_class_id;
        $this->tpl_product_type     = $productList->tpl_product_type;

        $this->arrProducts = $productList->arrProducts;

        //$objQuery = new SC_Query_Ex();
        //$objProduct = new SC_Product_Ex();

        //$objQuery->setLimitOffset(10);
        //$objQuery->setOrder("update_date desc");
        //$this->arrProducts = $objProduct->lists($objQuery);

        $objView->assignobj($this);
        $objView->display($this->tpl_mainpage);
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
/*
    function destroy() {
        parent::destroy();
    }
*/
}

?>

