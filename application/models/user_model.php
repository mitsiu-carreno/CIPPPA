<?php
class User_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->library("rb");
    }
    
    function login ($correo, $pass){
        $user = R::findOne('user', 'correo_institucion like ? AND password = MD5(?)',  array($correo, $pass));
       	if($user){
            $id = $user->id;
            return $id;
        }
    }
}

