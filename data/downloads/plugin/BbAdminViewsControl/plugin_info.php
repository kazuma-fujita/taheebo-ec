<?php

class plugin_info{
    const PLUGIN_CODE       = "BbAdminViewsControl";
    const PLUGIN_NAME       = "管理画面表示制御プラグイン 2.13版";
    const PLUGIN_VERSION    = "1.0";
    const COMPLIANT_VERSION = "2.13.2";
    const AUTHOR            = "ボクブロック株式会社";
    const DESCRIPTION       = "管理者権限別に管理画面で表示されるページを変更することが出来ます。(有効化直後はナビゲーションが非表示になります。)";
    const AUTHOR_SITE_URL   = "http://www.bokublock.jp/";
    const CLASS_NAME        = "BbAdminViewsControl";
    const HOOK_POINTS       = "LC_Page_preProcess,prefilterTransform";
    const LICENSE           = "LGPL";
}

?>
