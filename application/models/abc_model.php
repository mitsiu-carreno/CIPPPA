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

    //Crea tablas iniciales para que funcione el sistema :) 
    function initial_tables(){
        //Destruye toda la basde de datos 
        R::wipe('user'); //HANDLE WITH CARE!!!! <-FOR TESTING POURPUSES ONLY

        /*Tabla user
        $bean = R ::dispense('user');
        $bean->nombre=null;
        $bean->apellido_paterno=null;
        $bean->apellido_materno=null;
        $bean->correo_institucion=null;
        $bean->correo_personal=null;
        $bean->password=null;
        $bean->fecha_registro=null;
        $bean->fecha_actualizacion=null;
        $bean->tipouser_id=null;
        $bean->fecha_nacimiento=null;
        $bean->edo_civil=null;
        $bean->tel=null;
        $bean->tel_oficina=null;
        $bean->celular=null;
        $bean->cod_postal=null;
        $bean->fracc=null;
        $bean->calle=null;
        $bean->num_exterior_domicilio=null;
        $bean->num_interior_domicilio=null;
        $bean->curp=null;
        $bean->rfc=null;
        $bean->nacionalidad=null;
        $bean->imss=null;
        $bean->profesor_id=null;
        $bean->municipio=null;
        $bean->estado=null;
        $bean->puesto_solicitado=null;
        R::store($bean);
        R::wipe('user');


        //Tabla tipouser
        $bean = R::dispense('tipouser');
        $bean->tipo_usuario = 'usuario';
        R::store($bean);
        $bean = R::dispense('tipouser');
        $bean->tipo_usuario = 'evaluador';
        R::store($bean);
        $bean = R::dispense('tipouser');
        $bean->tipo_usuario = 'administrador';
        R::store($bean);
        */
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
    
    function get_bean($table, $id){
        $bean = R::load($table, $id);
        if($bean){
            return $bean->export();
        }
        
    }

    function get_field_from_bean($table, $field, $id){
        $bean = R::load($table, $id);
        if($bean){
            $value = $bean->$field;
            return $value;
        }
    }
    
    function update_bean($table, $id, $data){
        //var_dump("model_pre");
        //var_dump($data);
        $bean = R::load($table, $id);
        $bean->import($data);
        R::store($bean);
        //var_dump("model_pos");
        //var_dump($bean->export());
        return $bean->export();
    }
    
    function test(){
        $table = "user";
        $field = "apellido_paterno";
        $value = "carreño";
        $bean = R:: findOne($table, "apellido_paterno like ?", array($value));
        //$bean = R::findOne($table, "apellido_paterno like ?", array($value));  //<--AVANCE
        //$bean = R::findOne("user", "apellido_paterno like 'carreño'");
        
    
        var_dump($bean);
        //return $bean->export();
    }
    
    
}