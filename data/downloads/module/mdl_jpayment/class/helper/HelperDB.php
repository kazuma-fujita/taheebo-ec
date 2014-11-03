<?php
  /**
   * @project J-Payment Inc. Payment Module for EC-CUBE 2.12.2
   * @package mdl_jpayment
   * @author J-Payment Inc.
   * @copyright Copyright(C) J-Payment Inc. All Rights Reserved.
   * @version HelperDB.php, v2.2.0
   */  
class HelperDB {

  function HelperDB() {
    
  }

  function insertTable($tableName, $data) {
    $objQuery =& SC_Query_Ex::getSingletonInstance();
    $result = $objQuery->insert($tableName, $data);

    return $result;
  }

  function updateTable($tableName, $data, $where = '', $placeHolder) {
    $objQuery =& SC_Query_Ex::getSingletonInstance();
    $objQuery->update($tableName, $data, $where, $placeHolder);
  }

  function selectTable($column, $tableName, $where, $placeHolder) {
    $objQuery =& SC_Query_Ex::getSingletonInstance();
    $result = $objQuery->select($column, $tableName, $where, $placeHolder);
    
    return $result;
  }

  function getAll($query, $placeHolder) {
    $objQuery =& SC_Query_Ex::getSingletonInstance();
    $result = $objQuery->getall($query, $placeHolder);

    return $result;
  }
  


  function sfGetPaymentDB($module_code, $where = "", $arrWhereVal = array()) {
    $objQuery =& SC_Query_Ex::getSingletonInstance();
    
    $arrVal = array($module_code);
    $arrVal = array_merge($arrVal, $arrWhereVal);
    
    $arrRet = array();
    $sql = "SELECT module_code, payment_id, memo01 as clientip,memo03 FROM dtb_payment WHERE module_code = ? ". $where;
    $arrRet = $objQuery->getall($sql, $arrVal);
    return $arrRet[0];
  }
  

  function getPaymentDB($type) {
    $objQuery =& SC_Query_Ex::getSingletonInstance();
    $arrRet = array();
    $module_name = 'mdl_jpayment';

    $sql = "SELECT module_code, memo05, memo06
                FROM dtb_payment WHERE module_code = ? AND memo03 = ?";
    $arrRet = $objQuery->getall($sql, array($module_name, $type));
    return $arrRet;
  }


  
  /**
   * dtb_payment における rank の最大値を取得する
   *
   * @return $max_rank
   */
  function getMaxRank() {
    $objQuery =& SC_Query_Ex::getSingletonInstance();

    $query = 'SELECT max(rank) FROM dtb_payment';
    $max_rank = $objQuery->getone($query);
    
    return $max_rank;
  }
  
  /**
   * ペイメント ID のシーケンス番号を取得
   *
   * @return $sequence
   */
  function getPaymentIdSequence() {
    $objQuery =& SC_Query_Ex::getSingletonInstance();
    $sequence =$objQuery->nextVal('dtb_payment_payment_id');

    return $sequence;
  }

  /**
   * mtb_order_status における rank の最大値を取得する
   *
   * @return $max_rank
   */
  function getMaxRankOrder() {
    $objQuery =& SC_Query_Ex::getSingletonInstance();

    $query = 'SELECT max(rank) FROM mtb_order_status';
    $max_rank = $objQuery->getone($query);
    
    return $max_rank;
  }
  
  /**
   * mtb_order_status_color における rank の最大値を取得する
   *
   * @return $max_rank
   */
  function getMaxRankOrderColor() {
    $objQuery =& SC_Query_Ex::getSingletonInstance();

    $query = 'SELECT max(rank) FROM mtb_order_status_color';
    $max_rank = $objQuery->getone($query);
    
    return $max_rank;
  }
  
}

?>