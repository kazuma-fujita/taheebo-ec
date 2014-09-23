<?php
// {{{ requires
require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

/**
 * 管理画面表示制御の設定クラス
 */
class LC_Page_Plugin_BbAdminViewsControl_Config extends LC_Page_Admin_Ex {
    
    var $arrForm = array();

    /**
     * 初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $masterData         = new SC_DB_MasterData_Ex();
        $this->arrAuthority = $masterData->getMasterData('mtb_authority');
        $this->tpl_mainpage = PLUGIN_UPLOAD_REALDIR ."BbAdminViewsControl/templates/config.tpl";
        $this->tpl_subtitle = "管理画面表示制御 コンフィグ画面";
    }

    /**
     * プロセス.
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {
        $objFormParam = new SC_FormParam_Ex();
        $this->lfInitParam($objFormParam);
        $objFormParam->setParam($_POST);
        $objFormParam->convParam();
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();

        //選択中の管理者IDを取得
        $this->authority_id = isset($_GET['authority_id']) ? htmlspecialchars($_GET['authority_id']) : 0;

        $arrForm = array();

        switch ($this->getMode()) {
        case 'edit':
            $arrForm = $objFormParam->getHashArray();
            $this->arrErr = $objFormParam->checkError();
            // エラーなしの場合にはデータを更新
            if (count($this->arrErr) == 0) {
                // データ更新
                $AdminViewsControl = $objQuery->select('*', 'ptb_bb_admin_views_control', "authority_id = ".$arrForm['authority_id']);
                if(count($AdminViewsControl) > 0){
                    $this->arrErr = $this->updateData($arrForm);
                }else{
                    $this->arrErr = $this->insertData($arrForm);
                }
                if (count($this->arrErr) == 0) {
                    $this->tpl_onload = "alert('登録が完了しました。');";
                }
            }
            $this->arrForm = $arrForm;
            break;
        default:
           //選択された管理者の権限状況取得
            $arrForm = $objQuery->select('*', 'ptb_bb_admin_views_control', "authority_id = ".$this->authority_id);
            $this->arrForm = $arrForm[0];
            break;
        }

        //全管理者の設定状況取得
        $arrAuth = $objQuery->select('*', 'mtb_authority');
        foreach($arrAuth as $auth){
            $AdminViewsControl = $objQuery->select('*', 'ptb_bb_admin_views_control', "authority_id = ".$auth['id']);
            $arrAdminViewsControl[$auth['id']] = $AdminViewsControl[0];
        }
        $objQuery->commit();
        $this->arrAdminViewsControl = $arrAdminViewsControl;

        //プラグインIDの取得
        $plugin = SC_Plugin_Util_Ex::getPluginByPluginCode("BbAdminViewsControl");
        $this->plugin_id = $plugin['plugin_id'];

        //テンプレートの設定
        $this->setTemplate($this->tpl_mainpage);
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }
    
    /**
     * パラメーター情報の初期化
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function lfInitParam(&$objFormParam) {
        $objFormParam->addParam('権限ID', 'authority_id', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('基本情報管理', 'basis_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('商品管理', 'products_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('会員管理', 'customer_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('受注管理', 'order_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('売上集計', 'total_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('メルマガ管理', 'mail_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('コンテンツ管理', 'contents_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('デザイン管理', 'design_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('システム設定', 'system_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('オーナーズストア', 'ownersstore_page', INT_LEN, 'n', array('EXIST_CHECK', 'NUM_CHECK'));
   }

    /**
     * UPDATE
     */
    function updateData($arrData) {
        $arrErr = array();
        
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();
        // UPDATEする値を作成する。
        $sqlval = array();
        $sqlval['basis_page']    = $arrData['basis_page'];
        $sqlval['products_page'] = $arrData['products_page'];
        $sqlval['customer_page'] = $arrData['customer_page'];
        $sqlval['order_page']    = $arrData['order_page'];
        $sqlval['total_page']    = $arrData['total_page'];
        $sqlval['mail_page']     = $arrData['mail_page'];
        $sqlval['contents_page'] = $arrData['contents_page'];
        $sqlval['design_page']   = $arrData['design_page'];
        $sqlval['system_page']   = $arrData['system_page'];
        $sqlval['ownersstore_page'] = $arrData['ownersstore_page'];
        $sqlval['update_date'] = 'CURRENT_TIMESTAMP';
        $where = "authority_id = ".$arrData['authority_id'];
        // UPDATEの実行
        $objQuery->update('ptb_bb_admin_views_control', $sqlval, $where);
        $objQuery->commit();
        return $arrErr;
    }

    /**
     * INSERT
     */
    function insertData($arrData) {
        $arrErr = array();
        
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();
        // INSERTする値を作成する。
        $sqlval = array();
        $sqlval['authority_id']  = $arrData['authority_id'];
        $sqlval['basis_page']    = $arrData['basis_page'];
        $sqlval['products_page'] = $arrData['products_page'];
        $sqlval['customer_page'] = $arrData['customer_page'];
        $sqlval['order_page']    = $arrData['order_page'];
        $sqlval['total_page']    = $arrData['total_page'];
        $sqlval['mail_page']     = $arrData['mail_page'];
        $sqlval['contents_page'] = $arrData['contents_page'];
        $sqlval['design_page']   = $arrData['design_page'];
        $sqlval['system_page']   = $arrData['system_page'];
        $sqlval['ownersstore_page'] = $arrData['ownersstore_page'];
        $sqlval['update_date'] = 'CURRENT_TIMESTAMP';
        // INSERTの実行
        $objQuery->insert('ptb_bb_admin_views_control', $sqlval);
        $objQuery->commit();
        return $arrErr;
    }

}
?>
