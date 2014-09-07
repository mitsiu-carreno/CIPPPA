<?php
class User_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->library("rb");
    }
    
    function get_type_by_iduser($iduser){
        $user = R::load('user', $iduser);
        $tipo = $user ->tipouser_id;
        return $tipo;
    }
}

