<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2013 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

//require_once CLASS_EX_REALDIR . 'page_extends/frontparts/bloc/LC_Page_FrontParts_Bloc_Ex.php';

/**
 * ランキング のページクラス.
 *
 * @package Page
 * @author Designup.jp
 * @version 1.1
 */
class LC_Page_FrontParts_Bloc_BcList extends LC_Page_FrontParts_Bloc_Ex
{
    /**
     * Page を初期化する.
     *
     * @return void
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    public function process()
    {
echo "etst !!!!!";
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    public function action()
    {

echo "etst !!!!!";

        require_once CLASS_REALDIR . 'SC_Product.php';
        require_once CLASS_REALDIR . 'pages/products/LC_Page_Products_List.php';
        $objProduct = new SC_Product();
        $productList = new LC_Page_Products_List();
        $productList->orderby = 'date';
        // add
        $this->arrProducts  = $productList->lfGetProductsList($arrSearchCondition, 100, 0, $objProduct);

GC_Utils_Ex::gfDebugLog("object list".var_dump($this->arrProducts));

echo var_dump($this->arrProducts);
    }

}
