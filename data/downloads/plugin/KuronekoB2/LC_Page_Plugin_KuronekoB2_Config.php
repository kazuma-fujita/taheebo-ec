<?php
require_once CLASS_REALDIR . 'pages/admin/LC_Page_Admin.php';
class LC_Page_Plugin_KuronekoB2_Config extends LC_Page_Admin {
    
    var $arrForm = array();

    /**
     * 初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_mainpage = PLUGIN_UPLOAD_REALDIR ."KuronekoB2/templates/config.tpl";
        $this->tpl_subtitle = "クロネコ送り状発行ソフトB2";
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
        
        $css_file_path = PLUGIN_HTML_REALDIR . "KuronekoB2/media/KuronekoB2.css";
        $arrForm = array();
        
        switch ($this->getMode()) {
        case 'edit':
            $arrForm = $objFormParam->getHashArray();
            $this->arrErr = $objFormParam->checkError();
            // エラーなしの場合にはデータを更新
            if (count($this->arrErr) == 0) {
                // データ更新
                $this->arrErr = $this->updateData($arrForm, $css_file_path);
                if (count($this->arrErr) == 0) {
                    $this->tpl_onload = "alert('登録が完了しました。');";
                }
            }
            break;
        default:
            // プラグイン情報を取得.
            $plugin = SC_Plugin_Util_Ex::getPluginByPluginCode("KuronekoB2");
            $arrForm['pootno'] = $plugin['free_field1'];
            $arrForm['genreno'] = $plugin['free_field2'];
            $arrForm['dootno'] = $plugin['free_field3'];
            $arrForm['mailset'] = $plugin['free_field4'];
            break;
        }
        $this->arrForm = $arrForm;
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
        $objFormParam->addParam('ご請求先顧客コード', 'pootno', LTEXT_LEN, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('ご請求先分類コード', 'genreno', LTEXT_LEN, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('運賃管理番号', 'dootno', LTEXT_LEN, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('メール便(メール便速達サービス)敬称<br/>※入力例：様、御中、殿、行き（全角2文字以内）', 'mailset', LTEXT_LEN, '', array('MAX_LENGTH_CHECK'));
    }
    
    /**
     * ファイルパラメーター初期化.
     *
     * @param SC_UploadFile_Ex $objUpFile SC_UploadFileのインスタンス.
     * @param string $key 登録するキー.
     * @return void
     */
    function initUploadFile(&$objUpFile, $key) {
        $objUpFile->addFile('B2WEB', $key, explode(',', "gif"), FILE_SIZE, true, 0, 0, false);
    }

    /**
     * ページデータを取得する.
     *
     * @param integer $device_type_id 端末種別ID
     * @param integer $page_id ページID
     * @param SC_Helper_PageLayout $objLayout SC_Helper_PageLayout インスタンス
     * @return array ページデータの配列
     */
    function getTplMainpage($file_path) {

        if (file_exists($file_path)) {
            $arrfileData = file_get_contents($file_path);
        }
        return $arrfileData;
    }
    
    /**
     *
     * @param type $arrData
     * @return type 
     */
    function updateData($arrData, $css_file_path) {
        $arrErr = array();
        
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();
        // UPDATEする値を作成する。
        $sqlval = array();
        $sqlval['free_field1'] = $arrData['pootno'];
        $sqlval['free_field2'] = $arrData['genreno'];
        $sqlval['free_field3'] = $arrData['dootno'];
        $sqlval['free_field4'] = $arrData['mailset'];
        $sqlval['update_date'] = 'CURRENT_TIMESTAMP';
        $where = "plugin_code = 'KuronekoB2'";
        // UPDATEの実行
        $objQuery->update('dtb_plugin', $sqlval, $where);
        $objQuery->commit();
        return $arrErr;
    }
}
?>
