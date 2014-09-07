<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        if($this->session->userdata("userid")>0){
            $id=$this->session->userdata("userid");
            $this->load->model("user_model");
            $data["tipo"]= $this->user_model->get_type_by_iduser($id);
            echo $data;
        }
        var_dump("test_9");
        $this->load->view("header");
        $this->load->view("login/login");
        
    }
    
    //Crea una sesión y accesa al sistema
    public function in(){
        $this->load->model("user_model");
        $user = $this->log_model->in($this->input->post("nombre"),$this->input->post("password"));
        if(!is_null($user)){
            $this->session->set_userdata("userid", $user->id);
            echo $user->id;
        } else
            echo "null";    
    }
//    public function test_RB(){
//        var_dump("test_4");
//        $this->load->model("log_model");
//        $this->log_model->insert('mitsiu', 'contrasena');
//        
//        $this->load->view("welcome_message");
//        
////        $this->load->view("header");
////        $this->load->view("login");
////        $this->load->view("footer");
//    }
    
    //Crea un nuevo registro
    public function registro(){
        $this->load->model("log_model");
        $this->load->model("abc_model");
        $data["registro"]=$this->input->post();
        $this->abc_model->insert_under_foreign_key();
        //FIN-TEST


        //$id = $this->log_model->insert($this->input->post("nombre"), $this->input->post("password"));
        //$this->session->set_userdata("userid", $id);
        //$sessioninf = $this->session->userdata("userid");
        //var_dump($sessioninf);
        //redirect("main");
    }
    
    //Destruye session y regresa a inicio
    public function out(){
        $this->session->sess_destroy();
        redirect("login/login");
    }
}
