<?php
/*
 *
 * Copyright(c) 2000-2011 LOCKON CO.,LTD. All Rights Reserved.
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
require_once(MODULE_REALDIR . 'mdl_pg_mulpay/inc/include.php');
require_once(MDL_PG_MULPAY_CLASSEX_PATH . 'plugin_extends/LC_PgMulpayUtils_Ex.php');

/**
 * 補助追加機能プラグイン
 *
 * @package PgMulpayUtils
 * @author GMO Payment Gateway, Inc.
 * @version $Id: $
 */
class PgMulpayUtils extends SC_Plugin_Base {

    /**
     * コンストラクタ
     */
    public function __construct(array $arrSelfInfo) {
        parent::__construct($arrSelfInfo);
    }

    /**
     * インストール
     * installはプラグインのインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin plugin_infoを元にDBに登録されたプラグイン情報(dtb_plugin)
     * @return void
     */
    function install($arrPlugin) {
        // 必要なファイルをコピーします.
        if (is_file(MDL_PG_MULPAY_PATH . "media/logo.png", PLUGIN_HTML_REALDIR . "PgMulpayCore/logo.png")) {
            copy(MDL_PG_MULPAY_PATH . "media/logo.png", PLUGIN_HTML_REALDIR . "PgMulpayCore/logo.png");
        }
    }

    /**
     * アンインストール
     * uninstallはアンインストール時に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function uninstall($arrPlugin) {
    }

    /**
     * 稼働
     * enableはプラグインを有効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function enable($arrPlugin) {
        copy(PLUGIN_UPLOAD_REALDIR . "PgMulpayUtils/admin/plg_pgmulpayutils_payment_status.php", HTML_REALDIR . ADMIN_DIR . "order/plg_pgmulpayutils_payment_status.php");
        copy(PLUGIN_UPLOAD_REALDIR . "PgMulpayUtils/change_card.php", HTML_REALDIR . "mypage/change_card.php");
        
        $page_name = 'MYページ/カード情報編集';
        $url = 'mypage/change_card.php';
        $filename = 'mypage/change_card';
        $tpl_data = file_get_contents(MDL_PG_MULPAY_TEMPLATE_PATH . 'default/change_card.tpl');
        $device_type_id = DEVICE_TYPE_PC;
        $is_force = true;
        $page_id = SC_Util_PG_MULPAY_Ex::setPageData($tpl_data, $page_name, $url, $filename, $device_type_id, $is_force);

        $tpl_data = file_get_contents(MDL_PG_MULPAY_TEMPLATE_PATH . 'sphone/change_card.tpl');
        $device_type_id = DEVICE_TYPE_SMARTPHONE;
        $is_force = true;
        $page_id = SC_Util_PG_MULPAY_Ex::setPageData($tpl_data, $page_name, $url, $filename, $device_type_id, $is_force);

        $tpl_data = file_get_contents(MDL_PG_MULPAY_TEMPLATE_PATH . 'mobile/change_card.tpl');
        $device_type_id = DEVICE_TYPE_MOBILE;
        $is_force = true;
        $page_id = SC_Util_PG_MULPAY_Ex::setPageData($tpl_data, $page_name, $url, $filename, $device_type_id, $is_force);
    }

    /**
     * 停止
     * disableはプラグインを無効にした際に実行されます.
     * 引数にはdtb_pluginのプラグイン情報が渡されます.
     *
     * @param array $arrPlugin プラグイン情報の連想配列(dtb_plugin)
     * @return void
     */
    function disable($arrPlugin) {
        // nop
    }

    /**
     * 処理の介入箇所とコールバック関数を設定
     * registerはプラグインインスタンス生成時に実行されます
     *
     * @param SC_Helper_Plugin $objHelperPlugin
     */
    function register(SC_Helper_Plugin $objHelperPlugin) {
        return parent::register($objHelperPlugin, $priority);
    }

    // プラグイン独自の設定データを追加
    function insertFreeField() {
    }

    function insertBloc($arrPlugin) {
    }

    /**
     * プレフィルタコールバック関数
     *
     * @param string &$source テンプレートのHTMLソース
     * @param LC_Page_Ex $objPage ページオブジェクト
     * @param string $filename テンプレートのファイル名
     * @return void
     */
    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
        $class_name = get_class($objPage);
        $obj = new LC_PgMulpayUtils_Ex();
        $obj->actionPrefilterTransform($class_name, $source, $objPage, $filename, $this);
    }

    function hookActionBefore(LC_Page_Ex $objPage) {
        $this->callHookAction('before', $objPage);
    }

    function hookActionAfter(LC_Page_Ex $objPage) {
        $this->callHookAction('after', $objPage);
    }

    function hookActionMode(LC_Page_Ex $objPage) {
        $this->callHookAction('mode', $objPage);
    }

    function callHookAction($hook_point, &$objPage) {
        $class_name = get_class($objPage);
        $obj = new LC_PgMulpayUtils_Ex();
        $obj->actionHook($class_name, $hook_point, $objPage, $this);
    }

}
?>
