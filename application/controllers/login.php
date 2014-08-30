<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view("header");
        $this->load->view("welcome_message");
        //$this->load->view("login");
        //$this->load->view("footer");
    }
    
    public function test_RB(){
        var_dump("test_4");
        $this->load->model("log_model");
        $this->log_model->insert('mitsiu', 'contrasena');
        
        $this->load->view("welcome_message");
        
//        $this->load->view("header");
//        $this->load->view("login");
//        $this->load->view("footer");
    }
}