<?php
class User_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->library("rb");
    }
    
    function login ($nombre, $password){
        $user = R::findOne('user', 'nombre like ? AND password = MD5(?)',  array($nombre, $pass));
        return $user;
    }
}

