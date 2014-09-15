<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        if($this->session->userdata("userid")>0){
            $id=$this->session->userdata("userid");
            //TAMBIEN SIRVE <----
            //$this->load->model("user_model");
            //$data["tipo"]= $this->user_model->get_type_by_iduser($id);
            //var_dump($data);

            $this->load->model("abc_model");
            $data["tipo"] = $this->abc_model->get_field_from_bean("user", "tipouser_id", $id);
            var_dump($data["tipo"]);
            redirect("main");
        }
        $this->load->view("header");
        $this->load->view("login/login");
        
    }
    
    //Crea una sesión y accesa al sistema
    public function in(){
        //$this->load->model("user_model");
        //$user = $this->user_model->in($this->input->post("nombre"),$this->input->post("password"));

        $this->load->model("abc_model");
        $user= $this->abc_model->get_bean("user", "correo_institucion", "mitsiu.carreno");
        if(!is_null($user)){
            $this->session->set_userdata("userid", $user->id);
            echo $user->id;
        } else
            echo "null";    
    }
    
    //Crea un nuevo registro
    public function registro(){
        //$this->load->model("log_model");
        $this->load->model("abc_model");
        $data["registro"]=$this->input->post();
        $data["registro"]["password"] = md5($data["registro"]["password"]);
        $data["registro"]["fecha_registro"] = date("Y/m/d G:i:s");
        $data["registro"]["fecha_actualizacion"] = date("Y/m/d G:i:s");
        unset($data["registro"]["password2"]);
        $id = $this->abc_model->insert_with_foreign_key("tipouser","user", $data["registro"],1);
        $this->session->set_userdata("userid", $id);
        echo $id;
        

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
