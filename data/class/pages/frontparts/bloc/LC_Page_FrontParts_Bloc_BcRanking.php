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

require_once CLASS_EX_REALDIR . 'page_extends/frontparts/bloc/LC_Page_FrontParts_Bloc_Ex.php';

/**
 * ランキング のページクラス.
 *
 * @package Page
 * @author Designup.jp
 * @version 1.1
 */
class LC_Page_FrontParts_Bloc_BcRanking extends LC_Page_FrontParts_Bloc_Ex
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
        // 基本情報を渡す
        // $objSiteInfo = SC_Helper_DB_Ex::sfGetBasisData();
        // $this->arrInfo = $objSiteInfo->data;

        //売上ランキング取得
        $this->arrBestProducts = $this->lfGetRanking();
        //売上ランキング取得、8位まで
        $this->arrBestProducts8 = $this->lfGetRanking(8);

        //商品レビュー情報を取得
        $this->arrReviewList = $this->getReviewList();

        //メーカー情報を取得
        $this->arrMakerList = $this->getMakerList();
    }

    /**
     * おすすめ商品検索.
     *
     * @return array $arrBestProducts 検索結果配列
     */
    public function lfGetRanking($getNumber = 10)
    {
        // $objRecommend = new SC_Helper_BestProducts_Ex();

        // 売上ランキング取得、デフォルトは５位まで取得
        $arrRanking = $this -> getList($getNumber);

        $response = array();
        if (count($arrRanking) > 0) {
            // 商品一覧を取得
            $objQuery =& SC_Query_Ex::getSingletonInstance();
            $objProduct = new SC_Product_Ex();
            // where条件生成&セット
            $arrProductId = array();
            foreach ($arrRanking as $key => $val) {
                $arrProductId[] = $val['product_id'];
            }
            $arrProducts = $objProduct->getListByProductIds($objQuery, $arrProductId);

            // 税込金額を設定する
            SC_Product_Ex::setIncTaxToProducts($arrProducts);

            // 売上ランキング情報にマージ
            foreach ($arrRanking as $key => $value) {
                if (isset($arrProducts[$value['product_id']])) {
                    $product = $arrProducts[$value['product_id']];
                    if ($product['status'] == 1 && (!NOSTOCK_HIDDEN || ($product['stock_max'] >= 1 || $product['stock_unlimited_max'] == 1))) {
                        $response[] = array_merge($value, $arrProducts[$value['product_id']]);
                    }
                } else {
                    // 削除済み商品は除外
                    unset($arrRanking[$key]);
                }
            }
        }

        return $response;
    }

    /**
     * 商品情報を取得
     *
     * @return array $arrNewProducts 検索結果配列
     */
    public function getList($dispNumber = 0, $pageNumber = 0, $has_deleted = false)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $col = 'product_id,price,SUM(quantity),SUM(quantity)*price';
        $table = 'dtb_order_detail';
        $where = '';
        $objQuery->setGroupBy('product_id,price');
        $objQuery->setOrder('SUM(quantity)*price DESC');

        if ($dispNumber > 0) {
            if ($pageNumber > 0) {
                $objQuery->setLimitOffset($dispNumber, (($pageNumber - 1) * $dispNumber));
            } else {
                $objQuery->setLimit($dispNumber);
            }
        }
        $arrRet = $objQuery->select($col, $table, $where);

        // データの中身の表示テスト
        // echo "<pre>";
        // var_dump($arrRet);
        // echo "</pre>";

        return $arrRet;
    }

    /**
     * 商品のレビューと商品情報を結合した情報を取得
     * 商品ごとに集計、小数点以下切り捨て
     *
     * @return array $arrReviewList 検索結果配列
     */
    public function getReviewList($dispNumber = 0, $pageNumber = 0, $has_deleted = false)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $col = 'product_id,TRUNC(AVG(recommend_level),0) AS recommend_level,COUNT(*) AS recommend_count';
        $table = 'dtb_review';
        $where = '';
        $objQuery->setGroupBy('product_id');
        $objQuery->setOrder('product_id DESC');

        if ($dispNumber > 0) {
            if ($pageNumber > 0) {
                $objQuery->setLimitOffset($dispNumber, (($pageNumber - 1) * $dispNumber));
            } else {
                $objQuery->setLimit($dispNumber);
            }
        }
        $arrRet = $objQuery->select($col, $table, $where);

        // データの中身の表示テスト
        // echo "<pre>";
        // var_dump($arrRet);
        // echo "</pre>";

        return $arrRet;
    }

    /**
     * メーカー情報の取得
     *
     * @return array $arrMakerList 検索結果配列
     */
    public function getMakerList($dispNumber = 0, $pageNumber = 0, $has_deleted = false)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $col = '*';
        $table = 'dtb_maker';
        $where = '';

        if ($dispNumber > 0) {
            if ($pageNumber > 0) {
                $objQuery->setLimitOffset($dispNumber, (($pageNumber - 1) * $dispNumber));
            } else {
                $objQuery->setLimit($dispNumber);
            }
        }
        $arrRet = $objQuery->select($col, $table, $where);

        // データの中身の表示テスト
        // echo "<pre>";
        // var_dump($arrRet);
        // echo "</pre>";

        return $arrRet;
    }
}
