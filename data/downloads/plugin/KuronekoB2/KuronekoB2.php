<?php
class KuronekoB2 extends SC_Plugin_Base {

    public function __construct(array $arrSelfInfo) {
        parent::__construct($arrSelfInfo);
    }

    function install($arrPlugin) {
        if(copy(PLUGIN_UPLOAD_REALDIR . "KuronekoB2/logo.png", PLUGIN_HTML_REALDIR . "KuronekoB2/logo.png") === false);
    }

    function uninstall($arrPlugin) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->delete('dtb_csv','csv_id = ?',array (6));
    }

    function update($arrPlugin) {
    }

    function enable($arrPlugin) {
		$objQuery =& SC_Query_Ex::getSingletonInstance();

        if (DB_TYPE == "mysql") {
        	$dtb_csv_val = array ('no'=>601,'csv_id'=>6,'col'=>'concat(lpad(dtb_shipping.order_id,6,0) , \'_\' , lpad(shipping_id,2,0)) as Y1','disp_name'=>'お客様管理番号','rank'=>1,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        }else{
        	$dtb_csv_val = array ('no'=>601,'csv_id'=>6,'col'=>'(to_char(dtb_shipping.order_id,\'000000\') || \'_\' || to_char(shipping_id,\'00\')) as Y1','disp_name'=>'お客様管理番号','rank'=>1,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        }
        $dtb_csv_val = array ('no'=>602,'csv_id'=>6,'col'=>'(0) as Y2','disp_name'=>'送り状種別','rank'=>2,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>603,'csv_id'=>6,'col'=>'(\'\') as Y3','disp_name'=>'クール区分','rank'=>3,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>604,'csv_id'=>6,'col'=>'(\'\') as Y4','disp_name'=>'伝票番号','rank'=>4,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        if (DB_TYPE == "mysql") { 
	        $dtb_csv_val = array ('no'=>605,'csv_id'=>6,'col'=>'date_format(now(),\'%Y/%m/%d\') as Y5','disp_name'=>'出荷予定日','rank'=>5,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
       		$dtb_csv_val = array ('no'=>606,'csv_id'=>6,'col'=>'date_format(shipping_date,\'%Y/%m/%d\') as Y6','disp_name'=>'お届け予定（指定）日','rank'=>6,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',      'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        }else{
        	$dtb_csv_val = array ('no'=>605,'csv_id'=>6,'col'=>'to_char(now(),\'yyyy/mm/dd\') as Y5','disp_name'=>'出荷予定日','rank'=>5,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>606,'csv_id'=>6,'col'=>'to_char(shipping_date,\'yyyy/mm/dd\') as Y6','disp_name'=>'お届け予定（指定）日','rank'=>6,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        }
        $dtb_csv_val = array ('no'=>607,'csv_id'=>6,'col'=>'shipping_time as Y7','disp_name'=>'配達時間帯','rank'=>7,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>608,'csv_id'=>6,'col'=>'(\'\') as Y8','disp_name'=>'お届け先コード','rank'=>8,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        if (DB_TYPE == "mysql") { 
        	$dtb_csv_val = array ('no'=>609,'csv_id'=>6,'col'=>'concat(shipping_tel01 , \'-\' , shipping_tel02 , \'-\' , shipping_tel03) as Y9','disp_name'=>'お届け先電話番号','rank'=>9,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        }else{
        	$dtb_csv_val = array ('no'=>609,'csv_id'=>6,'col'=>'shipping_tel01 || \'-\' || shipping_tel02 || \'-\' || shipping_tel03 as Y9','disp_name'=>'お届け先電話番号','rank'=>9,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
 		}
        $dtb_csv_val = array ('no'=>610,'csv_id'=>6,'col'=>'(\'\') as Y10','disp_name'=>'お届け先電話番号枝番','rank'=>10,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        if (DB_TYPE == "mysql") { 
        	$dtb_csv_val = array ('no'=>611,'csv_id'=>6,'col'=>'concat(shipping_zip01 , \'-\' , shipping_zip02) as Y11','disp_name'=>'お届け先郵便番号','rank'=>11,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>612,'csv_id'=>6,'col'=>'concat((SELECT name FROM mtb_pref WHERE id = shipping_pref) , shipping_addr01) AS Y12','disp_name'=>'お届け先住所','rank'=>12,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
		}else{
	        	$dtb_csv_val = array ('no'=>611,'csv_id'=>6,'col'=>'(shipping_zip01 || \'-\' || shipping_zip02) as Y11','disp_name'=>'お届け先郵便番号','rank'=>11,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
	        	$dtb_csv_val = array ('no'=>612,'csv_id'=>6,'col'=>'((SELECT name FROM mtb_pref WHERE id = shipping_pref) || shipping_addr01) AS Y12','disp_name'=>'お届け先住所','rank'=>12,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
		}
	        $dtb_csv_val = array ('no'=>613,'csv_id'=>6,'col'=>'shipping_addr02 as Y13','disp_name'=>'お届け先住所（アパートマンション名）','rank'=>13,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
	        $dtb_csv_val = array ('no'=>614,'csv_id'=>6,'col'=>'(\'\') as Y14','disp_name'=>'お届け先会社・部門名１','rank'=>14,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
	        $dtb_csv_val = array ('no'=>615,'csv_id'=>6,'col'=>'(\'\') as Y15','disp_name'=>'お届け先会社・部門名２','rank'=>15,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
		if (DB_TYPE == "mysql") { 
	        	$dtb_csv_val = array ('no'=>616,'csv_id'=>6,'col'=>'concat(shipping_name01 , shipping_name02) as Y16','disp_name'=>'お届け先名','rank'=>16,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
	        	$dtb_csv_val = array ('no'=>617,'csv_id'=>6,'col'=>'concat(shipping_kana01 , shipping_kana02) as Y17','disp_name'=>'お届け先名略称カナ','rank'=>17,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
		}else{
	        	$dtb_csv_val = array ('no'=>616,'csv_id'=>6,'col'=>'(shipping_name01 || shipping_name02) as Y16','disp_name'=>'お届け先名','rank'=>16,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
	        	$dtb_csv_val = array ('no'=>617,'csv_id'=>6,'col'=>'(shipping_kana01 || shipping_kana02) as Y17','disp_name'=>'お届け先名略称カナ','rank'=>17,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
		}
	        $dtb_csv_val = array ('no'=>618,'csv_id'=>6,'col'=>'(\'\') as Y18','disp_name'=>'敬称','rank'=>18,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);

	        $dtb_csv_val = array ('no'=>619,'csv_id'=>6,'col'=>'(\'\') as Y19','disp_name'=>'ご依頼主コード','rank'=>19,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
		if (DB_TYPE == "mysql") { 
        	$dtb_csv_val = array ('no'=>620,'csv_id'=>6,'col'=>'(select concat(tel01 , \'-\', tel02 ,\'-\', tel03) from dtb_baseinfo limit 1) as Y20','disp_name'=>'ご依頼主電話番号','rank'=>20,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
       		$dtb_csv_val = array ('no'=>621,'csv_id'=>6,'col'=>'(\'\') as Y21','disp_name'=>'ご依頼主電話番号枝番','rank'=>21,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>622,'csv_id'=>6,'col'=>'(select concat(zip01 , \'-\' , zip02) from dtb_baseinfo limit 1) as Y22','disp_name'=>'ご依頼主郵便番号','rank'=>22,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>623,'csv_id'=>6,'col'=>'(select concat((select name from mtb_pref where dtb_baseinfo.pref = mtb_pref.id) , dtb_baseinfo.addr01) from dtb_baseinfo limit 1) as Y23','disp_name'=>'ご依頼主住所','rank'=>23,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>624,'csv_id'=>6,'col'=>'(select addr02 from dtb_baseinfo limit 1)  as Y24','disp_name'=>'ご依頼主住所（アパートマンション名）','rank'=>24,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>625,'csv_id'=>6,'col'=>'(select shop_name from dtb_baseinfo limit 1) as Y25','disp_name'=>'ご依頼主名','rank'=>25,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>626,'csv_id'=>6,'col'=>'(select shop_kana from dtb_baseinfo limit 1) as Y26','disp_name'=>'ご依頼主略称カナ','rank'=>26,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
		}else{
        	$dtb_csv_val = array ('no'=>620,'csv_id'=>6,'col'=>'(select (tel01 || \'-\' || tel02 || \'-\' || tel03) from dtb_baseinfo limit 1) as Y20','disp_name'=>'ご依頼主電話番号','rank'=>20,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
       		$dtb_csv_val = array ('no'=>621,'csv_id'=>6,'col'=>'(\'\') as Y21','disp_name'=>'ご依頼主電話番号枝番','rank'=>21,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>622,'csv_id'=>6,'col'=>'(select (zip01 || \'-\' || zip02) from dtb_baseinfo limit 1) as Y22','disp_name'=>'ご依頼主郵便番号','rank'=>22,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>623,'csv_id'=>6,'col'=>'(select ((select name from mtb_pref where dtb_baseinfo.pref = mtb_pref.id) || dtb_baseinfo.addr01) from dtb_baseinfo limit 1)  as Y23','disp_name'=>'ご依頼主住所','rank'=>23,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>624,'csv_id'=>6,'col'=>'(select addr02 from dtb_baseinfo limit 1) as Y24','disp_name'=>'ご依頼主住所（アパートマンション名）','rank'=>24,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>625,'csv_id'=>6,'col'=>'(select shop_name from dtb_baseinfo limit 1) as Y25','disp_name'=>'ご依頼主名','rank'=>25,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        	$dtb_csv_val = array ('no'=>626,'csv_id'=>6,'col'=>'(select shop_kana from dtb_baseinfo limit 1) as Y26','disp_name'=>'ご依頼主略称カナ','rank'=>26,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
		}
		
        $dtb_csv_val = array ('no'=>627,'csv_id'=>6,'col'=>'(\'\') as Y27','disp_name'=>'品名コード１','rank'=>27,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>628,'csv_id'=>6,'col'=>'(select array_to_string(ARRAY(select product_name from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id), \'|\')) as Y28','disp_name'=>'品名１','rank'=>28,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>629,'csv_id'=>6,'col'=>'(\'\') as Y29','disp_name'=>'品名コード２','rank'=>29,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>630,'csv_id'=>6,'col'=>'(\'\') as Y30','disp_name'=>'品名２','rank'=>30,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>631,'csv_id'=>6,'col'=>'(\'\') as Y31','disp_name'=>'荷扱い１','rank'=>31,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>632,'csv_id'=>6,'col'=>'(\'\') as Y32','disp_name'=>'荷扱い２','rank'=>32,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>633,'csv_id'=>6,'col'=>'(\'\') as Y33','disp_name'=>'記事','rank'=>33,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>634,'csv_id'=>6,'col'=>' (select payment_total from dtb_order where  dtb_shipping.order_id = dtb_order.order_id) as Y34','disp_name'=>'コレクト代金引換額（税込）','rank'=>34,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>635,'csv_id'=>6,'col'=>'(\'\') as Y35','disp_name'=>'コレクト内消費税額等','rank'=>35,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>636,'csv_id'=>6,'col'=>'(\'\') as Y36','disp_name'=>'営業所止置き','rank'=>36,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>637,'csv_id'=>6,'col'=>'(\'\') as Y37','disp_name'=>'営業所コード','rank'=>37,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>638,'csv_id'=>6,'col'=>'(\'\') as Y38','disp_name'=>'発行枚数','rank'=>38,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>639,'csv_id'=>6,'col'=>'(\'\') as Y39','disp_name'=>'個数口枠の印字','rank'=>39,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>640,'csv_id'=>6,'col'=>'(select free_field1 from dtb_plugin) as Y40','disp_name'=>'ご請求先顧客コード','rank'=>40,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>641,'csv_id'=>6,'col'=>'(select free_field2 from dtb_plugin) as Y41','disp_name'=>'ご請求先分類コード','rank'=>41,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);
        $dtb_csv_val = array ('no'=>642,'csv_id'=>6,'col'=>'(select free_field3 from dtb_plugin) as Y42','disp_name'=>'運賃管理番号','rank'=>42,'rw_flg'=>1,'status'=>1,'create_date'=>'CURRENT_TIMESTAMP',        'update_date'=>'CURRENT_TIMESTAMP','mb_convert_kana_option'=>'','size_const_type'=>'','error_check_types'=>'') ; $objQuery->insert('dtb_csv',$dtb_csv_val);

    }

    function disable($arrPlugin) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->delete('dtb_csv','csv_id = ?',array (6));
    }

    function kuronekob2($objPage) {
         $objQuery =& SC_Query_Ex::getSingletonInstance();
         $plugin = SC_Plugin_Util_Ex::getPluginByPluginCode("KuronekoB2");

         $arrForm['mailset'] = $plugin['free_field4'];
	 $sqlval['col'] = "('".$arrForm['mailset']."') as Y18";
         $objQuery->update('dtb_csv',$sqlval, 'no = ?',array(618));

         $arrForm['pootno'] = $plugin['free_field1'];
	 $sqlval['col'] = "('".$arrForm['pootno']."') as Y40";
         $objQuery->update('dtb_csv',$sqlval, 'no = ?',array(640));

         $arrForm['genreno'] = $plugin['free_field2'];
	 $sqlval['col'] = "('".$arrForm['genreno']."') as Y41";
         $objQuery->update('dtb_csv',$sqlval, 'no = ?',array(641));

         $arrForm['dootno'] = $plugin['free_field3'];
	 $sqlval['col'] = "('".$arrForm['dootno']."') as Y42";
         $objQuery->update('dtb_csv',$sqlval, 'no = ?',array(642));

	if ($_POST['mode'] == "csv2") { 
       	$objCSV = new SC_Helper_CSV_Ex();
		$objCSV->arrSubnavi[6] = 'kuronekob2';
		$objCSV->arrSubnaviName[6] = 'クロネコ';
		$arrProcuct_id=array();
		$arrProduct_id=$_POST['pdf_order_id'];
                $where = "dtb_shipping.del_flg = 0 AND ";
		if (count($arrProduct_id) > 0) {
			$where = $where." dtb_shipping.order_id in (";
  			$rcnt = 0;
  			foreach($arrProduct_id as $product_id) {
    				if ($rcnt > 0) {
      					$where = $where.",".$product_id;
				}else{
				   	$where = $where.$product_id;
    				}
				$rcnt += 1;
			}
  			$where = $where.")";
		}else{
			$where = "1=1";
		}
		$where = " where ".$where;
		$order = "dtb_shipping.order_id DESC";
  		$csv_id = 6;
   		$is_download = true;
        	// 実行時間を制限しない
        	@set_time_limit(0);
        	// CSV出力タイトル行の作成
        	$arrOutput = SC_Utils_Ex::sfSwapArray($objCSV->sfGetCsvOutput($csv_id, 'status = ' . CSV_COLUMN_STATUS_FLG_ENABLE));
        	if (count($arrOutput) <= 0) return false; // 失敗終了
        	$arrOutputCols = $arrOutput['col'];
        	$objQuery =& SC_Query_Ex::getSingletonInstance();
        	$objQuery->setOrder($order);
        	$cols = SC_Utils_Ex::sfGetCommaList($arrOutputCols, true);
        	$sql = 'SELECT ' . $cols . ' FROM dtb_shipping inner join dtb_order on(dtb_order.order_id = dtb_shipping.order_id and dtb_order.del_flg = 0) ' . $where;
			$this->sfDownloadCsvFromSql($sql, $arrVal, $objCSV->arrSubnavi[$csv_id], $arrOutput['disp_name'], $is_download);
      		exit;
       } 
    }

    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
        $objTransform = new SC_Helper_Transform($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . 'KuronekoB2/templates/';
        switch($objPage->arrPageLayout['device_type_id']){
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                break;
            case DEVICE_TYPE_ADMIN:
            default:
                if (strpos($filename, 'order/index.tpl') !== false) {
			$objTransform->select('div.btn a.btn-normal',1)->insertAfter(file_get_contents($template_dir . 'plg_admin_order_btn.tpl'));
                }
                break;
        }
        $source = $objTransform->getHTML();
    }

    function register(SC_Helper_Plugin $objHelperPlugin) {
        $objHelperPlugin->addAction('LC_Page_Admin_Order_action_before', array($this, 'kuronekob2'), $this->arrSelfInfo['priority']);
        $objHelperPlugin->addAction('prefilterTransform', array(&$this, 'prefilterTransform'), $this->arrSelfInfo['priority']);
    }

	/**
     * SQL文からクエリ実行し CSVファイルを送信する
     *
     * @param  integer $sql         SQL文
     * @param  array   $arrVal      プリペアドステートメントの実行時に使用される配列。配列の要素数は、クエリ内のプレースホルダの数と同じでなければなりません。
     * @param  string  $file_head   ファイル名の頭に付ける文字列
     * @param  array   $arrHeader   ヘッダ出力列配列
     * @param  boolean $is_download true:ダウンロード用出力までさせる false:CSVの内容を返す(旧方式、メモリを食います。）
     * @return mixed   $is_download = true時 成功失敗フラグ(boolean) 、$is_downalod = false時 string
     */
	function sfDownloadCsvFromSql($sql, $arrVal = array(), $file_head = 'csv', $arrHeader = array(), $is_download = false)
    {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $objCSV = new SC_Helper_CSV_Ex();

        // ヘッダ構築
        if (is_array($arrHeader)) {
            $header = $objCSV->sfArrayToCSV($arrHeader);
            $header = mb_convert_encoding($header, 'SJIS-Win');
            $header .= "\r\n";
        }

        //テンポラリファイル作成
        // TODO: パフォーマンス向上には、ストリームを使うようにすると良い
        //  環境要件がPHPバージョン5.1以上になったら使うように変えても良いかと
        //  fopen('php://temp/maxmemory:'. (5*1024*1024), 'r+');
        $tmp_filename = tempnam(CSV_TEMP_REALDIR, $file_head . '_csv');
        $this->fpOutput = fopen($tmp_filename, 'w+');
        fwrite($this->fpOutput, $header);
        $objQuery->doCallbackAll(array(&$this, 'cbOutputCSV'), $sql, $arrVal);

        fclose($this->fpOutput);

        if ($is_download) {
            // CSVを送信する。
            $objCSV->lfDownloadCSVFile($tmp_filename, $file_head . '_');
            $res = true;
        } else {
            $res = SC_Helper_FileManager_Ex::sfReadFile($tmp_filename);
        }

        //テンポラリファイル削除
        unlink($tmp_filename);

        return $res;
    }

    /**
     * CSV作成 テンポラリファイル出力 コールバック関数
     *
     * @param mixed $data 出力データ
     * @return boolean true (true:固定 false:中断)
     */
    function cbOutputCSV($data) {
    	$objCSV = new SC_Helper_CSV_Ex();

		$data["y17"] = mb_convert_kana($data["y17"], "k");
    	$data["y26"] = mb_convert_kana($data["y26"], "k");
		
		$deliverytime = $data["y7"];
		
		if($deliverytime == "指定無し"){
			$data["y7"] = "";
		} else if($deliverytime == "午前中"){
			$data["y7"] = "0812";
		} else if($deliverytime == "午前10時まで"){
			$data["y7"] = "0010";
		} else if($deliverytime == "午後17時まで"){
			$data["y7"] = "0017";
		} else {
			preg_match_all('/[0-9]+/', $deliverytime, $result);
			$data["y7"] = $result[0][0] . $result[0][1];
		}
		
		$line = $objCSV->sfArrayToCSV($data);
        $line = mb_convert_encoding($line, 'SJIS-Win');
        $line .= "\r\n";
        fwrite($this->fpOutput, $line);
        SC_Utils_Ex::extendTimeOut();

        return true;
    }
    
    /**
     * 1次元配列を1行のCSVとして返す
     * 参考: http://jp.php.net/fputcsv
     *
     * @param array $fields データ1次元配列
     * @param string $delimiter
     * @param string $enclosure
     * @param string $arrayDelimiter
     * @return string 結果行
     */
    function sfArrayToCsv($fields, $delimiter = ',', $enclosure = '"', $arrayDelimiter = '|') {
        if (strlen($delimiter) != 1) {
            trigger_error('delimiter must be a single character', E_USER_WARNING);
            return '';
        }
        if (strlen($enclosure) < 1) {
            trigger_error('enclosure must be a single character', E_USER_WARNING);
            return '';
        }

        foreach ($fields as $key => $value) {
            $field =& $fields[$key];

            // 配列を「|」区切りの文字列に変換する
            if (is_array($field)) {
                $field = implode($arrayDelimiter, $field);
            }

            /* enclose a field that contains a delimiter, an enclosure character, or a newline */
            if (is_string($field)
                && preg_match('/[' . preg_quote($delimiter) . preg_quote($enclosure) . '\\s]/', $field)
            ) {
                $field = $enclosure . preg_replace('/' . preg_quote($enclosure) . '/', $enclosure . $enclosure, $field) . $enclosure;
            }
        }
        return implode($delimiter, $fields);
    }
}
?>