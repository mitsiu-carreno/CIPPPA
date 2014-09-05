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
    }
    
    function insert_foreign_key(){
        $shop = R::dispense('shop');
        $shop->name = 'Antiques';
        
        $vase = R::dispense('product');
        $vase->price = 25;
        $shop->ownProductList[] = $vase;
        R::store($shop);
    } 
    //$table, $table2, $data, $id
    function insert_under_foreign_key($table, $table2, $data, $id){
        $table='shop';
        $table2 ='product';
        $id=1;
        
        $bean = R::load($table, $id);
        $bean2 = R::dispense($table2);
        $test = "ownProductList[]";
        //$bean2->import($data);
        $bean2->price= 90;
        $bean->ownBeanList[] = $bean2;
        //$bean->ownBeanList[] =$bean2;
        R::store($bean);
//        $shop = R::load( 'shop', 1 );
//        $vase = R::dispense('product');
//        $vase->price= 50;
//        $shop->ownProductList[] = $vase;
//        //echo $shop;
//        R::store($shop);
    }
}