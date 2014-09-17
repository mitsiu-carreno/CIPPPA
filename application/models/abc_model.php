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

    
    function initial_tables(){
        $bean = R::dispense('tipouser');
        $bean->tipo_usuario = 'usuario';
        R::store($bean);
        $bean = R::dispense('tipouser');
        $bean->tipo_usuario = 'evaluador';
        R::store($bean);
        $bean = R::dispense('tipouser');
        $bean->tipo_usuario = 'administrador';
        R::store($bean);
    } 
    //$table=tabla llave padre, $table2= tabla llave foranea, $data=datos del tabla hijo, $id = llave padre a la que se liga
    function insert_with_foreign_key($table, $table2, $data, $id){
        $bean = R::load($table, $id);
        $bean2 = R::dispense($table2);
        $bean2->import($data);
        $bean->ownBeanList[] = $bean2;
        $id = R::store($bean);
        $new_id = $bean2->id;
        return $new_id;
    }
    
    function get_bean($table, $field, $value){
        /*
        $bean = R::load($table, $id);
        if($bean){
            return $bean;
        }
        */
        //$bean = R::findOne('user', 'nombre like Mitsiu Alejandro';
        //$user = R::findOne('user', 'nombre like ? AND password = MD5(?)',  array($nombre, $pass));
        //return $bean;
    }

    function get_field_from_bean($table, $field, $id){
        $bean = R::load($table, $id);
        if($bean){
            $value = $bean->$field;
            return $value;
        }
    }
    
    
    function test(){
        $table = "user";
        $field = "apellido_paterno";
        $value = "carreño";
        $bean = R::findOne($table, "apellido_paterno like ?", array($value));  //<--AVANCE
        //$bean = R::findOne("user", "apellido_paterno like 'carreño'");
        
        
        var_dump($bean);
        
    }
    
    
}