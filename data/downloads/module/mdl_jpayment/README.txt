[概要]
- J-Payment 接続(決済)モジュール for EC-CUBE 2.13.1
[更新日]
- 2014/01/08 Wed.
[実装機能]
1. J-Payment クレジットカード決済(仮売上, 仮実同時)
2. EC-CUBE 管理画面による実売上, 取消処理
3. EC-CUBE 2.13 設置マシンと J-Payment 決済システム間での決済情報通信
4. コンビニ決済
5. キックバック通知受信処理
6. 3Dセキュア対応
7. モバイル対応
8. CVV対応
9. 銀行振込（バンクチェック）対応
10. スマートフォン対応
[未実装機能]

[システム要件]
- PHP 動作環境
- PHP における cURL モジュール動作環境
 - 確認方法: $ php -m | grep -i curl
[動作確認環境]
マシン環境: CentOS 5.5
言語: PHP 5.3.6

[ファイル構成]
d: append/ (追加ファイル群保存先)
 -: jpayment_3D_recv.php (3Dセキュア 画面遷移処理)
 -: jpayment_recv.php (キックバック通知受信処理)
d: class/ (各種クラス保存先)
 -: Error_JPayment.php (J-Payment 決済システムにおけるエラーコード)
 -: LC_Page_Mdl_JPayment_Bank.php (クラス:銀行振込決済機能)
 -: LC_Page_Mdl_JPayment_Config.php (クラス:EC-CUBE 管理画面機能)
 -: LC_Page_Mdl_JPayment_Convenience.php (クラス:コンビニ決済機能)
 -: LC_Page_Mdl_JPayment_Payment.php (クラス:クレジットカード決済機能)
 d: helper/ (helper保存先)
  -: HelperDB.php (クラス:DB接続機能)
d: module/ (モジュール保存ディレクトリ)
 -: Gateway.php (cURL を用いた通信モジュール)
d: replace/ (置換ファイル群保存先)
 -: LC_Page_Admin_Order_Edit.php (クラス: 受注管理編集機能)
 -: LC_Page_Shopping_Complete_Ex.php (クラス: 決済完了画面)
d: backup/ (置換ファイルのバックアップ先)
d: template/
 -: config.tpl (EC-CUBE 管理画面テンプレート)
 -: jpayment_bank.tpl (銀行振込決済 for PC テンプレート)
 -: jpayment_bank_mobile.tpl (銀行振込決済 for Mobile テンプレート)
 -: jpayment_bank_sphone.tpl (銀行振込決済 for スマートフォン テンプレート)
 -: jpayment_convenience.tpl (コンビニ決済 for PC テンプレート)
 -: jpayment_convenience_mobile.tpl (コンビニ決済 for Mobile テンプレート)
 -: jpayment_convenience_sphone.tpl (コンビニ決済 for スマートフォン テンプレート)
 -: jpayment_credit.tpl (クレジットカード決済 for PC テンプレート)
 -: jpayment_credit_mobile.tpl (クレジットカード決済 for Mobile テンプレート)
 -: jpayment_credit_sphone.tpl (クレジットカード決済 for スマートフォン テンプレート)
 -: config.php (EC-CUBE 管理画面機能)
 -: include.php (各種定義)ファイル
 -: payment_bank.php (銀行振込決済機能)
 -: payment_convenience.php (コンビニ決済機能)
 -: payment_credit.php (クレジットカード決済)
 -: README.txt
