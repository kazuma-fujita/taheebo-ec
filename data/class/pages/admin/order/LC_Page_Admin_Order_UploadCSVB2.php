<?php

require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

class LC_Page_Admin_Order_UploadCSVB2 extends LC_Page_Admin_Ex {

    /** 登録フォームカラム情報 * */
    var $arrFormKeyList;
    var $arrRowErr;
    var $arrRowResult;
    private $_checkOrderIds;

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_mainpage = 'order/upload_csv_b2.tpl';
        $this->tpl_mainno = 'order';
        $this->tpl_subno = 'upload_csv_b2';
        $this->tpl_maintitle = '受注管理';
        $this->tpl_subtitle = '出荷登録';
        $this->csv_id = '7';

        $masterData = new SC_DB_MasterData_Ex();
        $this->arrDISP = $masterData->getMasterData('mtb_disp');
        $this->arrSTATUS = $masterData->getMasterData('mtb_status');
        $this->arrDELIVERYDATE = $masterData->getMasterData('mtb_delivery_date');
        $this->arrProductType = $masterData->getMasterData('mtb_product_type');
        $this->arrPayments = SC_Helper_DB_Ex::sfGetIDValueList('dtb_payment', 'payment_id', 'payment_method');
        $this->arrInfo = SC_Helper_DB_Ex::sfGetBasisData();
        $this->arrAllowedTag = $masterData->getMasterData('mtb_allowed_tag');
        $this->arrTagCheckItem = array();
    }

    /**
     * Page のプロセス.
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
        $this->objDb = new SC_Helper_DB_Ex();

        // CSV管理ヘルパー
        $objCSV = new SC_Helper_CSV_Ex();
        // CSV構造読み込み
        $arrCSVFrame = $objCSV->sfGetCsvOutput($this->csv_id);

        // CSV構造がインポート可能かのチェック
        if (!$objCSV->sfIsImportCSVFrame($arrCSVFrame)) {
            // 無効なフォーマットなので初期状態に強制変更
            $arrCSVFrame = $objCSV->sfGetCsvOutput($this->csv_id, '', array(), 'no');
            $this->tpl_is_format_default = true;
        }
        // CSV構造は更新可能なフォーマットかのフラグ取得
        $this->tpl_is_update = $objCSV->sfIsUpdateCSVFrame($arrCSVFrame);

        // CSVファイルアップロード情報の初期化
        $objUpFile = new SC_UploadFile_Ex(IMAGE_TEMP_REALDIR, IMAGE_SAVE_REALDIR);
        $this->lfInitFile($objUpFile);

        // パラメーター情報の初期化
        $objFormParam = new SC_FormParam_Ex();
        $this->lfInitParam($objFormParam, $arrCSVFrame);

        $objFormParam->setHtmlDispNameArray();
        $this->arrTitle = $objFormParam->getHtmlDispNameArray();

        switch ($this->getMode()) {
            case 'csv_upload':
                $this->doUploadCsv($objFormParam, $objUpFile);
                break;
            default:
                break;
        }
    }

    /**
     * 登録/編集結果のメッセージをプロパティへ追加する
     *
     * @param integer $line_count 行数
     * @param stirng $message メッセージ
     * @return void
     */
    function addRowResult($line_count, $message) {
        $this->arrRowResult[] = $line_count . '行目：' . $message;
    }

    /**
     * 登録/編集結果のエラーメッセージをプロパティへ追加する
     *
     * @param integer $line_count 行数
     * @param stirng $message メッセージ
     * @return void
     */
    function addRowErr($line_count, $message) {
        $this->arrRowErr[] = $line_count . '行目：' . $message;
    }

    /**
     * CSVアップロードを実行します.
     *
     * @return void
     */
    function doUploadCsv(&$objFormParam, &$objUpFile) {
        // ファイルアップロードのチェック
        $objUpFile->makeTempFile('csv_file');
        $arrErr = $objUpFile->checkExists();
        if (count($arrErr) > 0) {
            $this->arrErr = $arrErr;
            return;
        }
        // 一時ファイル名の取得
        $filepath = $objUpFile->getTempFilePath('csv_file');
        // CSVファイルの文字コード変換
        $enc_filepath = SC_Utils_Ex::sfEncodeFile($filepath, CHAR_CODE, CSV_TEMP_REALDIR);
        // CSVファイルのオープン
        $fp = fopen($enc_filepath, 'r');
        // 失敗した場合はエラー表示
        if (!$fp) {
            SC_Utils_Ex::sfDispError('');
        }

        // 登録先テーブル カラム情報の初期化
        $this->lfInitTableInfo();

        // 登録フォーム カラム情報
        $this->arrFormKeyList = $objFormParam->getKeyList();

        // 登録対象の列数
        $col_max_count = $objFormParam->getCount();
        // 行数
        $line_count = 0;

        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $objQuery->begin();

        $errFlag = false;
        $all_line_checked = false;
        $deliv_order_ids = array();
        while (!feof($fp)) {
            $arrCSV = fgetcsv($fp, CSV_LINE_MAX);

            // 全行入力チェック後に、ファイルポインターを先頭に戻す
            if (feof($fp) && !$all_line_checked) {
                rewind($fp);
                $line_count = 0;
                $all_line_checked = true;
                continue;
            }

            // 行カウント
            $line_count++;
            // ヘッダ行はスキップ
            if ($line_count == 1) {
                $this->_checkOrderIds = array(); //初期化
                if (is_numeric($arrCSV[0])) {
                    $this->addRowErr($line_count, 'ヘッダー（項目名）がセットされているか確認してください。');
                    $errFlag = true;
                    break;
                }

                continue;
            }
            // 空行はスキップ
            if (empty($arrCSV)) {
                continue;
            }
            // 列数が異なる場合はエラー
            $col_count = count($arrCSV);
            if ($col_max_count != $col_count) {
                $this->addRowErr($line_count, '※ 項目数が' . $col_count . '個検出されました。項目数は' . $col_max_count . '個になります。');
                $errFlag = true;
                break;
            }

            // シーケンス配列を格納する。
            $objFormParam->setParam($arrCSV, true);
            $arrRet = $objFormParam->getHashArray();
            $objFormParam->setParam($arrRet);
            // 入力値の変換
            $objFormParam->convParam();
            // &lt;br>なしでエラー取得する。
            $arrCSVErr = $this->lfCheckError($objFormParam);

            // 入力エラーチェック
            if (count($arrCSVErr) > 0) {
                foreach ($arrCSVErr as $err) {
                    $this->addRowErr($line_count, $err);
                }
                $errFlag = true;
                break;
            }

            if ($all_line_checked) {
                $this->lfRegistOrder($objQuery, $line_count, $objFormParam);
                $arrParam = $objFormParam->getHashArray();
                if ($arrParam['order_id'] && !in_array($arrParam['order_id'], $deliv_order_ids)) {
                    $deliv_order_ids[] = $arrParam['order_id'];
                }
                $this->addRowResult($line_count, '受注ID：' . $arrParam['order_id'] . ' / お届け先名：' . $arrParam['shipping_name']);
            }
        }

        // 実行結果画面を表示
        $this->tpl_mainpage = 'order/upload_csv_b2_complete.tpl';

        fclose($fp);

        if ($errFlag) {
            $objQuery->rollback();
        } else {
            $objQuery->commit();
            if (count($deliv_order_ids)) {
                $objMail = new SC_Helper_Mail_Ex();

                foreach ($deliv_order_ids as $deliv_order_id) {
                    $objSendMail = $objMail->sfSendOrderMail($deliv_order_id, '9');
                }
            }
        }

        return;
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
     * ファイル情報の初期化を行う.
     *
     * @return void
     */
    function lfInitFile(&$objUpFile) {
        $objUpFile->addFile('CSVファイル', 'csv_file', array('csv'), CSV_SIZE, true, 0, 0, false);
    }

    /**
     * 入力情報の初期化を行う.
     *
     * @param array CSV構造設定配列
     * @return void
     */
    function lfInitParam(&$objFormParam, &$arrCSVFrame) {

        // CSV項目毎の処理
        foreach ($arrCSVFrame as $item) {
            if ($item['status'] == CSV_COLUMN_STATUS_FLG_DISABLE)
                continue;
            //サブクエリ構造の場合は AS名 を使用
            if (preg_match_all('/\(.+\)\s+as\s+(.+)$/i', $item['col'], $match, PREG_SET_ORDER)) {
                $col = $match[0][1];
            } else {
                $col = $item['col'];
            }
            // HTML_TAG_CHECKは別途実行なので除去し、別保存しておく
            if (strpos(strtoupper($item['error_check_types']), 'HTML_TAG_CHECK') !== FALSE) {
                $this->arrTagCheckItem[] = $item;
                $error_check_types = str_replace('HTML_TAG_CHECK', '', $item['error_check_types']);
            } else {
                $error_check_types = $item['error_check_types'];
            }
            $arrErrorCheckTypes = explode(',', $error_check_types);
            foreach ($arrErrorCheckTypes as $key => $val) {
                if (trim($val) == '') {
                    unset($arrErrorCheckTypes[$key]);
                } else {
                    $arrErrorCheckTypes[$key] = trim($val);
                }
            }
            // パラメーター登録
            $objFormParam->addParam(
                            $item['disp_name']
                            , $col
                            , constant($item['size_const_type'])
                            , $item['mb_convert_kana_option']
                            , $arrErrorCheckTypes
                            , $item['default']
                            , ($item['rw_flg'] != CSV_COLUMN_RW_FLG_READ_ONLY) ? true : false
            );
        }
    }

    /**
     * 入力チェックを行う.
     *
     * @return void
     */
    function lfCheckError(&$objFormParam) {
        // 入力データを渡す。
        $arrRet = $objFormParam->getHashArray();

        $objErr = new SC_CheckError_Ex($arrRet);
        $objErr->arrErr = $objFormParam->checkError(false);
        // HTMLタグチェックの実行
        foreach ($this->arrTagCheckItem as $item) {
            $objErr->doFunc(array($item['disp_name'], $item['col'], $this->arrAllowedTag), array('HTML_TAG_CHECK'));
        }
        // このフォーム特有の複雑系のエラーチェックを行う
        if (count($objErr->arrErr) == 0) {
            $objErr->arrErr = $this->lfCheckErrorDetail($arrRet, $objErr->arrErr);
        }
        return $objErr->arrErr;
    }

    /**
     * 保存先テーブル情報の初期化を行う.
     *
     * @return void
     */
    function lfInitTableInfo() {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
    }

    /**
     * 受注登録を行う.
     *
     *
     * @param SC_Query $objQuery SC_Queryインスタンス
     * @param string|integer $line 処理中の行数
     * @return void
     */
    function lfRegistOrder($objQuery, $line = '', &$objFormParam) {
        // 登録データ対象取得
        $arrList = $objFormParam->getHashArray();
        // 登録時間を生成(DBのCURRENT_TIMESTAMPだとcommitした際、すべて同一の時間になってしまう)
        $sqlval = array();
        $sqlval['commit_date'] = $this->lfGetDbFormatTimeWithLine($line);
        $sqlval['update_date'] = $this->lfGetDbFormatTimeWithLine($line);
        $sqlval['deliv_number'] = $arrList['deliv_number'];
        $sqlval['status'] = ORDER_DELIV;
        $where = 'order_id=?';
        $objQuery->update('dtb_order', $sqlval, $where, array($arrList['order_id']));
    }

    /**
     * このフォーム特有の複雑な入力チェックを行う.
     *
     * @param array 確認対象データ
     * @param array エラー配列
     * @return array エラー配列
     */
    function lfCheckErrorDetail($item, $arrErr) {
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $table = 'dtb_shipping';
        $table .= ' left outer join dtb_order on dtb_shipping.order_id=dtb_order.order_id';
        $col = 'dtb_order.*,dtb_shipping.*';
        $where = 'dtb_order.del_flg = 0 and dtb_shipping.del_flg=0 ';
        $where.= ' AND dtb_order.order_id=?';
        $arrval = array();
        $arrval[] = $item['order_id'];
        $order = $objQuery->getRow($col, $table, $where, $arrval);
        if (!$order) {
            $arrErr['order_id'] = '※ 指定の受注IDはすでに削除されています。';
            return $arrErr;
        } else {
            if (in_array($order['order_id'], $this->_checkOrderIds)) {
                $arrErr['order_id'] = '※ 指定の受注IDは同じ受注番号で送り状が２枚以上発行されています。';
            } else {
                $this->_checkOrderIds[] = $order['order_id'];
            }
        }

        if ($order['status'] == ORDER_CANCEL) {
            $arrErr['status'] = '※ 指定の受注IDは対応状況がキャンセルのため発送できません。';
        } else
        if ($order['status'] == ORDER_DELIV) {
            $arrErr['status'] = '※ 指定の受注IDは対応状況が発送済みのため発送できません。';
        } else
        if ($order['status'] == ORDER_PENDING) {
            $arrErr['status'] = '※ 指定の受注IDは対応状況が決済処理中のため発送できません。';
        }
        $deliv_times = array(
                array(
                        'b2' => '',
                        'eccube' => '',
                ),
                array(
                        'b2' => '0000',
                        'eccube' => '',
                ),
                array(
                        'b2' => '0812',
                        'eccube' => '午前',
                ),
                array(
                        'b2' => '1214',
                        'eccube' => '12-14時',
                ),
                array(
                        'b2' => '1416',
                        'eccube' => '14-16時',
                ),
                array(
                        'b2' => '1618',
                        'eccube' => '16-18時',
                ),
                array(
                        'b2' => '1820',
                        'eccube' => '18-20時',
                ),
                array(
                        'b2' => '2021',
                        'eccube' => '20-21時',
                ),
        );
        $time_error = false;
        $loop_error = true;
        foreach ($deliv_times as $deliv_time) {
            if (strval($item['b2_shipping_time']) === $deliv_time['b2']) {
                if (strval($order['shipping_time']) !== $deliv_time['eccube']) {
                    $time_error = true;
                    $arrErr['b2_shipping_time'] = '※ 指定の受注IDの配送時間帯がB2のデータと違うため発送できません。';
                }
                $loop_error = false;
                break;
            }
        }
        if ($loop_error) {
            $arrErr['b2_shipping_time'] = '※ B2の配送時間帯データが正しくないため発送できません。';
        }

        $b2_kind = null;
        if ($order['deliv_id'] == 3) {
            $b2_kind = '3';
        } else {
            if ($order['payment_id'] == 4) {
                $b2_kind = '2';
            } else {
                $b2_kind = '0';
            }
        }
        if (strval($item['b2_kind']) !== $b2_kind) {
            $arrErr['b2_kind'] = '※ 指定の受注IDの配送方法・お支払い方法ががB2の送り状種別と内容が違うため発送できません。';
        }
        if (strval($item['b2_kind']) === '2') { //代引限定
            if ($order['total'] != $item['collect_price']) {
                $arrErr['collect_price'] = '※ 指定の受注IDの代金引換の金額が違うため発送できません。';
            }
        }

        return $arrErr;
    }

    // TODO: ここから下のルーチンは汎用ルーチンとして移動が望ましい

    /**
     * 指定された行番号をmicrotimeに付与してDB保存用の時間を生成する。
     * トランザクション内のCURRENT_TIMESTAMPは全てcommit()時の時間に統一されてしまう為。
     *
     * @param string $line_no 行番号
     * @return string $time DB保存用の時間文字列
     */
    function lfGetDbFormatTimeWithLine($line_no = '') {
        $time = date('Y-m-d H:i:s');
        // 秒以下を生成
        if ($line_no != '') {
            $microtime = sprintf('%06d', $line_no);
            $time .= '.$microtime';
        }
        return $time;
    }

    /**
     * 指定されたキーと複数値の有効性の配列内確認
     *
     * @param string $arr チェック対象配列
     * @param string $keyname フォームキー名
     * @param array  $item 入力データ配列
     * @param string $delimiter 分割文字
     * @return boolean true:有効なデータがある false:有効ではない
     */
    function lfIsArrayRecordMulti($arr, $keyname, $item, $delimiter = ',') {
        if (array_search($keyname, $this->arrFormKeyList) === FALSE) {
            return true;
        }
        if ($item[$keyname] == '') {
            return true;
        }
        $arrItems = explode($delimiter, $item[$keyname]);
        //空項目のチェック 1つでも空指定があったら不正とする。
        if (array_search('', $arrItems) !== FALSE) {
            return false;
        }
        //キー項目への存在チェック
        foreach ($arrItems as $item) {
            if (!array_key_exists($item, $arr)) {
                return false;
            }
        }
        return true;
    }

    /**
     * 指定されたキーと複数値の有効性のDB確認
     *
     * @param string $table テーブル名
     * @param string $tblkey テーブルキー名
     * @param string $keyname フォームキー名
     * @param array  $item 入力データ配列
     * @param string $delimiter 分割文字
     * @return boolean true:有効なデータがある false:有効ではない
     */
    function lfIsDbRecordMulti($table, $tblkey, $keyname, $item, $delimiter = ',') {
        if (array_search($keyname, $this->arrFormKeyList) === FALSE) {
            return true;
        }
        if ($item[$keyname] == '') {
            return true;
        }
        $arrItems = explode($delimiter, $item[$keyname]);
        //空項目のチェック 1つでも空指定があったら不正とする。
        if (array_search('', $arrItems) !== FALSE) {
            return false;
        }
        $count = count($arrItems);
        $where = $tblkey . ' IN (' . implode(',', array_fill(0, $count, '?')) . ')';

        $objQuery = & SC_Query_Ex::getSingletonInstance();
        $db_count = $objQuery->count($table, $where, $arrItems);
        if ($count != $db_count) {
            return false;
        }
        return true;
    }

    /**
     * 指定されたキーと値の有効性のDB確認
     *
     * @param string $table テーブル名
     * @param string $keyname キー名
     * @param array  $item 入力データ配列
     * @return boolean true:有効なデータがある false:有効ではない
     */
    function lfIsDbRecord($table, $keyname, $item) {
        if (array_search($keyname, $this->arrFormKeyList) !== FALSE //入力対象である
                        and $item[$keyname] != '' // 空ではない
                        and !$this->objDb->sfIsRecord($table, $keyname, (array) $item[$keyname]) //DBに存在するか
        ) {
            return false;
        }
        return true;
    }

    /**
     * 指定されたキーと値の有効性の配列内確認
     *
     * @param string $arr チェック対象配列
     * @param string $keyname キー名
     * @param array  $item 入力データ配列
     * @return boolean true:有効なデータがある false:有効ではない
     */
    function lfIsArrayRecord($arr, $keyname, $item) {
        if (array_search($keyname, $this->arrFormKeyList) !== FALSE //入力対象である
                        and $item[$keyname] != '' // 空ではない
                        and !array_key_exists($item[$keyname], $arr) //配列に存在するか
        ) {
            return false;
        }
        return true;
    }
}

