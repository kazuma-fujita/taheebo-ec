<?php
  /**
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version Error_JPayment.php, v2.2.0
   */
function Read_Error_Sentence_JPayment($ecode) {
  $errcode = "";
  switch($ecode){
  case 'ER000':
    $errcode = "ER000 : 決済システム内部エラーです。";
    break;
  case 'ER001':
    $errcode = "ER001 : リクエストエラーです。";
    break;
  case 'ER002':
    $errcode = "ER002 : 決済送信元URLエラーです。";
    break;
  case 'ER003':
    $errcode = "ER003 : 決済送信元IPエラーです。";
    break;
  case 'ER004':
    $errcode = "ER004 : 未登録店舗エラーです。";
    break;
  case 'ER005':
    $errcode = "ER005 : 未登録商品エラーです。";
    break;
  case 'ER006':
    $errcode = "ER006 : 発行可能ID/PWなしです。";
    break;
  case 'ER010':
    $errcode = "ER010 : 決済処理が込み合ってます。";
    break;
  case 'ER011':
    $errcode = "ER011 : 決済拒否-IP アドレスです。";
    break;
  case 'ER012':
    $errcode = "ER012 : 決済拒否-メールアドレスです。";
    break;
  case 'ER013':
    $errcode = "ER013 : 決済拒否-カード番号です。";
    break;
  case 'ER014':
    $errcode = "ER014 : クレジットカードチェックデジットエラーです。";
    break;
  case 'ER015':
    $errcode = "ER015 : 未取り扱いカード( カードタイプエラー)です。";
    break;
  case 'ER016':
    $errcode = "ER016 : ご利用可能金額上限です。";
    break;
  case 'ER017':
    $errcode = "ER017 : お取り扱いできない金額(決済金額下限)です。";
    break;
  case 'ER018':
    $errcode = "ER018 : お取り扱いできない金額(決済金額上限)です。";
    break;
  case 'ER019':
    $errcode = "ER019 : 分割：分割できない金額です。";
    break;
  case 'ER020':
    $errcode = "ER020 : 分割：ボーナス額オーバー（決済金額の50%以上)です。";
    break;
  case 'ER021':
    $errcode = "ER021 : ワンタッチ課金：決済条件エラーです。";
    break;
  case 'ER022':
    $errcode = "ER022 : クイックチャージ：決済条件エラーです。";
    break;
  case 'ER023':
    $errcode = "ER023 : カード情報変更：情報変更可能条件エラー(課金停止済み)です。";
    break;
  case 'ER030':
    $errcode = "ER030 : 決済失敗(すべて)です。";
    break;
  case 'ER031':
    $errcode = "ER031 : 有効性確認失敗(CEHCK)です。";
    break;
  case 'ER032':
    $errcode = "ER032 : 実売上失敗(SALES)です。";
    break;
  case 'ER033':
    $errcode = "ER033 : 取消失敗(CANCEL,RETURN,RETURNX)です。";
    break;
  case 'ER050':
    $errcode = "ER050 : 店舗IDエラーです。";
    break;
  case 'ER051':
    $errcode = "ER051 : ジョブコードエラーです。";
    break;
  case 'ER052':
    $errcode = "ER052 : 決済結果通知方法エラーです。";
    break;
  case 'ER053':
    $errcode = "ER053 : 決済番号エラーです。";
    break;
  case 'ER054':
    $errcode = "ER054 : オーダーコードエラーです。";
    break;
  case 'ER055':
    $errcode = "ER055 : クレジットカード番号エラーです。";
    break;
  case 'ER056':
    $errcode = "ER056 : 有効期限エラーです。";
    break;
  case 'ER057':
    $errcode = "ER057 : 名前エラーです。";
    break;
  case 'ER058':
    $errcode = "ER058 : 苗字エラーです。";
    break;
  case 'ER059':
    $errcode = "ER059 : メールアドレスエラーです。";
    break;
  case 'ER060':
    $errcode = "ER060 : 電話番号エラーです。";
    break;
  case 'ER061':
    $errcode = "ER061 : 商品金額エラーです。";
    break;
  case 'ER062':
    $errcode = "ER062 : 税金額エラーです。";
    break;
  case 'ER063':
    $errcode = "ER063 : 送料エラーです。";
    break;
  case 'ER064':
    $errcode = "ER064 : 支払い方法エラーです。";
    break;
  case 'ER065':
    $errcode = "ER065 : 分割回数エラーです。";
    break;
  case 'ER066':
    $errcode = "ER066 : ボーナス回数エラーです。";
    break;
  case 'ER067':
    $errcode = "ER067 : ボーナス金額エラーです。";
    break;
  case 'ER068':
    $errcode = "ER068 : 商品コードエラーです。";
    break;
  case 'ER069':
    $errcode = "ER069 : コマンドコードエラーです。";
    break;
  case 'ER071':
    $errcode = "ER071 : 発行PWエラーです。";
    break;
  case 'ER072':
    $errcode = "ER072 : 自動課金番号エラーです。";
    break;
  case 'ER073':
    $errcode = "ER073 : 郵便番号エラーです。";
    break;
  case 'ER074':
    $errcode = "ER074 : 住所エラーです。";
    break;
  case 'ER075':
    $errcode = "ER075 : 住所（フリガナ）エラーです。";
    break;
  case 'ER076':
    $errcode = "ER076 : FAX番号エラーです。";
    break;
  case 'ER077':
    $errcode = "ER077 : 支払期限エラーです。";
    break;
  case 'ER079':
    $errcode = "ER079 : CVVパラメータエラーです。";
    break;
  case 'ER100':
    $errcode = "ER100 : CMD取得エラーです。";
    break;
  case 'ER101':
    $errcode = "ER101 : ID/PW発行時オーダー情報取得エラーです。";
    break;
  case 'ER102':
    $errcode = "ER102 : IP/PW発行時オーダー情報取得エラー(CMD=0)です。";
    break;
  case 'ER103':
    $errcode = "ER103 : コントロール読込みエラーです。";
    break;
  case 'ER104':
    $errcode = "ER104 : ジョブ設定エラーです。";
    break;
  case 'ER105':
    $errcode = "ER105 : セッション変数呼出順路確認エラーです。";
    break;
  case 'ER106':
    $errcode = "ER106 : セッション変数受取エラーです。";
    break;
  case 'ER107':
    $errcode = "ER107 : リクエストメソッドエラーです。";
    break;
  case 'ER108':
    $errcode = "ER108 : 確定時ID/PWオーダー情報取得エラーです。";
    break;
  case 'ER109':
    $errcode = "ER109 : 確定時コントロール読込みエラーです。";
    break;
  case 'ER110':
    $errcode = "ER110 : 確定時パラメタエラーです。";
    break;
  case 'ER111':
    $errcode = "ER111 : 確定時店舗情報読込みエラーです。";
    break;
  case 'ER112':
    $errcode = "ER112 : 確定時店舗設定読込みエラーです。";
    break;
  case 'ER113':
    $errcode = "ER113 : 自動課金情報取得エラーです。";
    break;
  case 'ER114':
    $errcode = "ER114 : 店舗IDエラーです。";
    break;
  case 'ER115':
    $errcode = "ER115 : 店舗データ読込みエラーです。";
    break;
  case 'ER116':
    $errcode = "ER116 : 店舗フォーム設定読込みエラーです。";
    break;
  case 'ER117':
    $errcode = "ER117 : 店舗情報取得エラーです。";
    break;
  case 'ER118':
    $errcode = "ER118 : 店舗情報読込みエラーです。";
    break;
  case 'ER119':
    $errcode = "ER119 : 店舗設定読込みエラーです。";
    break;
  case 'ER701':
    $errcode = "ER701 : 口座番号発行エラーです。";
    break;
  case 'ER702':
    $errcode = "ER702 : 口座番号重複発行エラーです。";
    break;
  case 'ER703':
    $errcode = "ER703 : 空き口座番号なしエラーです。";
    break;
  case 'ER799':
    $errcode = "ER799 : 口座番号発行内部エラーです。";
    break;
  case 'ER900':
    $errcode = "ER900 : ご利用になるクレジットカードが3Dセキュアに対応しているかをご確認ください。※カード発行会社が3Dセキュアに対応していない場合はご利用いただけませんのでご了承ください。";
    break;
  case 'ER901':
    $errcode = "ER901 : ご利用になるクレジットカードが3Dセキュアに対応しているかをご確認ください。※カード発行会社が3Dセキュアに対応していない場合はご利用いただけませんのでご了承ください。";
    break;
  case 'ER902':
    $errcode = "ER902 : 郵便番号エラーです。";
    break;
  case 'ER903':
    $errcode = "ER903 : 名前エラーです。";
    break;
  case 'ER904':
    $errcode = "ER904 : 住所エラーです。";
    break;
  case 'ER905':
    $errcode = "ER905 : 支払期限制限エラーです。";
    break;
  case 'ER910':
    $errcode = "ER910 : ペーパーレスエラーです。";
    break;
  case 'ER911':
    $errcode = "ER911 : CVSコードエラーです。";
    break;
  case 'ER998':
    $errcode = "ER998 : 都合によりお取り扱いできません。";
    break;
  case 'ER999':
    $errcode = "ER999 : メンテナンス中です。";
    break;
    
  default:
    $errcode = "ER : 認証に失敗しました。お手数ですが入力内容をご確認ください。";
  }
  return $errcode;
}
?>