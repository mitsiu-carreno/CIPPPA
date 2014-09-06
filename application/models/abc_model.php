<?php
class Abc_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
    }
    
    //Inserta en una tabla en especifico
    function insert($table, $data){     
        $bean = R::dispense($table);
        $bean->import($data);
        $id=R::store($bean);
        return $id;
    }
    
//    function insert_foreign_key(){
//        $shop = R::dispense('shop');
//        $shop->name = 'Antiques';
//        
//        $vase = R::dispense('product');
//        $vase->price = 25;
//        $shop->ownProductList[] = $vase;
//        R::store($shop);
//    } 
    //$table, $table2, $data, $id
    function insert_under_foreign_key($table, $table2, $data, $id){
        $bean = R::load($table, $id);
        $bean2 = R::dispense($table2);
        $bean2->import($data);
        $bean->ownBeanList[] = $bean2;
        $id = R::store($bean);
    }
    
    function get_bean($table, $field, $id){
     $bean = R::load($table, $id);
     if($bean){
         return $bean;
     }
    }
}