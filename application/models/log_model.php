<?php
class Log_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
        
    }
    
    function insert($email, $pass){
        $usuario = R::dispense('user');
        $usuario->email = $email;
        $usuario->password = md5($pass);
        $id = R::store($usuario); 
//        $data = array(
//        'email' => 'My title' ,
//        'pass' => 'My Name' 
//        );
//
//        $this->db->insert('user', $data); 
//        $q = $this->db->query("select * from user");
//        return $q->result_Array();
        
    }
}