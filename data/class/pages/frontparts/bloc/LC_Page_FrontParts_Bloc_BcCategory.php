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
 * カテゴリ のページクラス.
 *
 * @package Page
 * @author Designup.jp
 * @version 1.1
 */
class LC_Page_FrontParts_Bloc_BcCategory extends LC_Page_FrontParts_Bloc_Ex
{
    public $arrParentID;

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
        // モバイル判定
        switch (SC_Display_Ex::detectDevice()) {
            case DEVICE_TYPE_MOBILE:
                // メインカテゴリの取得
                $this->arrCat = $this->lfGetMainCat(true);
                break;
            default:
                // 選択中のカテゴリID
                $this->tpl_category_id = $this->lfGetSelectedCategoryId($_GET);
                // カテゴリツリーの取得
                $this->arrTree = $this->lfGetCatTree($this->tpl_category_id, true);
                // カテゴリ一覧の取得
                $this->arrCatList = $this->GetCatList();
                break;
        }

        //カテゴリーレベルが1のカテゴリを全て取得
        $this->arrCatLevel1 = $this->GetCatLevel(1);

        //カテゴリーレベルが2のカテゴリを全て取得
        $this->arrCatLevel2 = $this->GetCatLevel(2);

        //カテゴリーレベルが3のカテゴリを全て取得
        $this->arrCatLevel3 = $this->GetCatLevel(3);

        //さらに下のレベルを取得する場合はパラメータの値を変更して以下をコピー
        // $this->arrCatLevel4 = $this->GetCatLevel(4);

    }

    /**
     * カテゴリー一覧をレベル別に取得する、パラメータでレベルを変更、デフォルトは１
     * @param  int $cat_level 取得したいカテゴリレベル
     * @return $arrCatLevel カテゴリレベルごとのカテゴリ一覧
     */
    public function GetCatLevel($cat_level = 1)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $col = '*';
        $table = 'dtb_category';
        $where = 'level = '.$cat_level.'';
        $objQuery->setOrder('category_id');

        $arrRet = $objQuery->select($col, $table, $where);

        // データの中身の表示テスト
        // echo "<pre>";
        // var_dump($arrRet);
        // echo "</pre>";

        return $arrRet;
    }

    /**
     * カテゴリ一覧の取得
     * @return $arrCatList カテゴリー一覧の配列
     */
    public function GetCatList()
    {
        // $objCategory = new SC_Helper_Category_Ex($count_check);
        // $arrCatList = $objCategory->getList(true);

        $arrCatList = $this -> getList(true);

        //テスト用
        // echo "<pre>";
        // echo var_dump($arrCatList);
        // echo "</pre>";

        return $arrCatList;
    }

    /**
     * カテゴリー一覧の取得.
     *
     * @param  boolean $cid_to_key 配列のキーをカテゴリーIDにする場合はtrue
     * @return array   カテゴリー一覧の配列
     */
    public function getList($cid_to_key = FALSE)
    {
        static $arrCategory = array(), $cidIsKey = array();

        if (!isset($arrCategory[$this->count_check])) {
            $objQuery =& SC_Query_Ex::getSingletonInstance();
            $col = 'dtb_category.*, dtb_category_total_count.product_count';
            $from = 'dtb_category left join dtb_category_total_count ON dtb_category.category_id = dtb_category_total_count.category_id';
            // 登録商品数のチェック
            if ($this->count_check) {
                $where = 'del_flg = 0 AND product_count > 0';
            } else {
                $where = 'del_flg = 0';
            }

            //order by : rank -> category_id
            $objQuery->setOption('ORDER BY category_id');
            $arrTmp = $objQuery->select($col, $from, $where);

            $arrCategory[$this->count_check] = $arrTmp;
        }

        if ($cid_to_key) {
            if (!isset($cidIsKey[$this->count_check])) {
                // 配列のキーをカテゴリーIDに
                $cidIsKey[$this->count_check] = SC_Utils_Ex::makeArrayIDToKey('category_id', $arrCategory[$this->count_check]);
            }

            return $cidIsKey[$this->count_check];
        }

        return $arrCategory[$this->count_check];
    }


    /**
     * 選択中のカテゴリIDを取得する.
     *
     * @param  array $arrRequest リクエスト配列
     * @return array $arrCategoryId 選択中のカテゴリID
     */
    public function lfGetSelectedCategoryId($arrRequest)
    {
            // 商品ID取得
        $product_id = '';
        if (isset($arrRequest['product_id']) && $arrRequest['product_id'] != '' && is_numeric($arrRequest['product_id'])) {
            $product_id = $arrRequest['product_id'];
        }
        // カテゴリID取得
        $category_id = '';
        if (isset($arrRequest['category_id']) && $arrRequest['category_id'] != '' && is_numeric($arrRequest['category_id'])) {
            $category_id = $arrRequest['category_id'];
        }
        // 選択中のカテゴリIDを判定する
        $objDb = new SC_Helper_DB_Ex();
        $arrCategoryId = $objDb->sfGetCategoryId($product_id, $category_id);
        if (empty($arrCategoryId)) {
            $arrCategoryId = array(0);
        }

        return $arrCategoryId;
    }

    /**
     * カテゴリツリーの取得.
     *
     * @param  array   $arrParentCategoryId 親カテゴリの配列
     * @param  boolean $count_check         登録商品数をチェックする場合はtrue
     * @return array   $arrRet カテゴリツリーの配列を返す
     */
    public function lfGetCatTree($arrParentCategoryId, $count_check = false)
    {
        $objCategory = new SC_Helper_Category_Ex($count_check);
        $arrTree = $objCategory->getTree();

        $this->arrParentID = array();
        foreach ($arrParentCategoryId as $category_id) {
            $arrParentID = $objCategory->getTreeTrail($category_id);
            $this->arrParentID = array_merge($this->arrParentID, $arrParentID);
            $this->root_parent_id[] = $arrParentID[0];
        }

        return $arrTree;
    }

    /**
     * メインカテゴリの取得.
     *
     * @param  boolean $count_check 登録商品数をチェックする場合はtrue
     * @return array   $arrMainCat メインカテゴリの配列を返す
     */
    public function lfGetMainCat($count_check = false)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $col = '*';
        $from = 'dtb_category left join dtb_category_total_count ON dtb_category.category_id = dtb_category_total_count.category_id';
        // メインカテゴリとその直下のカテゴリを取得する。
        $where = 'level <= 2 AND del_flg = 0';
        // 登録商品数のチェック
        if ($count_check) {
            $where .= ' AND product_count > 0';
        }
        $objQuery->setOption('ORDER BY rank DESC');
        $arrRet = $objQuery->select($col, $from, $where);
        // メインカテゴリを抽出する。
        $arrMainCat = array();
        foreach ($arrRet as $cat) {
            if ($cat['level'] != 1) {
                continue;
            }
            // 子カテゴリを持つかどうかを調べる。
            $arrChildrenID = SC_Utils_Ex::sfGetUnderChildrenArray(
                $arrRet,
                'parent_category_id',
                'category_id',
                $cat['category_id']
            );
            $cat['has_children'] = count($arrChildrenID) > 0;
            $arrMainCat[] = $cat;
        }

        return $arrMainCat;
    }
}
