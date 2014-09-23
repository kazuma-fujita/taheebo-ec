<?php
class BbAdminViewsControl extends SC_Plugin_Base {

    /**
     * 
    **/
    public function __construct(array $arrSelfInfo) {
        parent::__construct($arrSelfInfo);
    }

    function install($arrPlugin) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $sql = "CREATE TABLE ptb_bb_admin_views_control (
                    authority_id int NOT NULL,
                    basis_page int,
                    products_page int,
                    customer_page int,
                    order_page int,
                    total_page int,
                    mail_page int,
                    contents_page int,
                    design_page int,
                    system_page int,
                    ownersstore_page int,
                    create_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    update_date timestamp NOT NULL,
                    del_flg smallint,
                    PRIMARY KEY (authority_id)
                );";
        $objQuery->query($sql);
        $sql = "INSERT INTO ptb_bb_admin_views_control (
                    authority_id,
                    basis_page,
                    products_page,
                    customer_page,
                    order_page,
                    total_page,
                    mail_page,
                    contents_page,
                    design_page,
                    system_page,
                    ownersstore_page,
                    create_date,
                    update_date
                )
                VALUES(
                    0,1,1,1,1,1,1,1,1,1,1,now(),now()
                );";
        $objQuery->query($sql);
        //プラグイン専用テーブルにデフォルト値を設定(店舗管理者)
        $sql = "INSERT INTO ptb_bb_admin_views_control (
                    authority_id,
                    basis_page,
                    products_page,
                    customer_page,
                    order_page,
                    total_page,
                    mail_page,
                    contents_page,
                    design_page,
                    create_date,
                    update_date
                )
                VALUES(
                    1,1,1,1,1,1,1,1,1,now(),now()
                );";
        $objQuery->query($sql);

        if(copy(PLUGIN_UPLOAD_REALDIR . "BbAdminViewsControl/logo.png",PLUGIN_HTML_REALDIR . "BbAdminViewsControl/logo.png") === false);

    }

    /**
     * uninstallはアンインストール時に実行されます。[必須]
    **/
    function uninstall($arrPlugin) {
        //プラグイン専用テーブルの削除
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $sql = "DROP TABLE ptb_bb_admin_views_control;";
        $objQuery->query($sql);
        if(SC_Helper_FileManager_Ex::deleteFile(PLUGIN_HTML_REALDIR . "BbAdminViewsControl") === false);
    }

    /**
     * updateはアップデート時に実行されます。[必須]
    **/
    function update($arrPlugin) {
        // nop
    }

    /**
     * enableはプラグインを有効にした際に実行されます。
    **/
    function enable($arrPlugin) {
        // nop
    }

    /**
     * disableはプラグインを無効にした際に実行されます。
    **/
    function disable($arrPlugin) {
        // nop
    }

    /**
     * registはプラグインインスタンス生成時に実行されます。フックポイントの登録はここで行います。
    **/
    function register(SC_Helper_Plugin $objHelperPlugin) {
        $objHelperPlugin->addAction('LC_Page_preProcess', array(&$this, 'AdminViewsControlFunction'));
        $objHelperPlugin->addAction('prefilterTransform', array(&$this, 'prefilterTransform'),1);
    }

    /**
     *全ての管理画面ページ処理の最後に実行される
    **/
    function AdminViewsControlFunction($objPage) {

        //管理者権限に対応する各ページの表示フラグを取得する
        $objPage->arrViewsPages = $this->getViewsPages($objPage->tpl_authority);

    }

    /**
     *管理者権限に対応する各ページの表示フラグを取得する
    **/
    function getViewsPages($authority_id) {

        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $getViewsPages = $objQuery->getRow("*","ptb_bb_admin_views_control", "del_flg IS NULL AND authority_id = ?", array($authority_id));

        $arrViewsPages = array("basis"=>$getViewsPages['basis_page'],
                               "products"=>$getViewsPages['products_page'],
                               "customer"=>$getViewsPages['customer_page'],
                               "order"=>$getViewsPages['order_page'],
                               "total"=>$getViewsPages['total_page'],
                               "mail"=>$getViewsPages['mail_page'],
                               "contents"=>$getViewsPages['contents_page'],
                               "design"=>$getViewsPages['design_page'],
                               "system"=>$getViewsPages['system_page'],
                               "ownersstore"=>$getViewsPages['ownersstore_page']);

        return $arrViewsPages;
    }

    /**
     * テンプレートコンパイル時に呼び出される関数
    **/
    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
        $objTransform = new SC_Helper_Transform($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . 'BbAdminViewsControl/templates/';
        switch($objPage->arrPageLayout['device_type_id']){
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                break;
            case DEVICE_TYPE_ADMIN:
            default:
                if (strpos($filename, 'main_frame.tpl') !== false) {
                    $objTransform->select('html')->replaceElement(file_get_contents($template_dir . 'admin_views_control_navi.tpl'));
                }
                break;
        }
        $source = $objTransform->getHTML();
    }
}
?>
