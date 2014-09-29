<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        if($this->session->userdata("userid")>0){
            $id=$this->session->userdata("userid");
            $this->load->model("abc_model");
            $data["tipo"] = $this->abc_model->get_field_from_bean("user", "tipouser_id", $id);
            //var_dump($data["tipo"]);
            if($data["tipo"]==1){
                redirect("main");
            }
            else{
                //FALTA COMPLETAR!!!
            }
        }
        $this->load->view("header"); 
        $this->load->view("login/login");
        $this->load->view("footer");
        
    }
    
    //Crea una sesión y accesa al sistema
    public function in(){
        $correo_institucion = $this->input->post("correo_institucion");
        $correo = explode('@', trim($correo_institucion)); //borra @dominio <--some times users are kind of stupid!!
        $this->load->model("user_model");
        $id = $this->user_model->login($correo[0],$this->input->post("password"));
        if($id){
            $this->session->set_userdata("userid", $id);
            echo $id;
        }
        else{
            echo "null";
        }
    }
    
    //Crea un nuevo registro
    public function registro(){
        $this->load->model("abc_model");
        $data["registro"]=$this->input->post();
        //en caso que no tenga un correo institucional se le crea uno
        if($data["registro"]["correo_institucion"]== null){
            //convierte los nombres y apellido en minusculas
            $data["registro"]["nombre"] = strtolower($data["registro"]["nombre"]);
            $data["registro"]["apellido_paterno"] = strtolower($data["registro"]["apellido_paterno"]);
            //Se separa los nombres en cada espacio (nombres compuestos)
            $first_name = explode(' ',trim($data["registro"]["nombre"]));
            $correo =$first_name[0] . "." . $data["registro"]["apellido_paterno"];
            $data["registro"]["correo_institucion"]=$correo;
        }
        else{   //verificar que no haya repetido "@upa.edu.mx" <--some times users are kind of stupid!!
            $data["registro"]["correo_institucion"] = explode('@', trim($data["registro"]["correo_institucion"]));
            $data["registro"]["correo_institucion"]=$data["registro"]["correo_institucion"][0];
        }
        $data["registro"]["password"] = md5($data["registro"]["password"]);
        $data["registro"]["fecha_registro"] = date("Y/m/d G:i:s");
        $data["registro"]["fecha_actualizacion"] = date("Y/m/d G:i:s");
        unset($data["registro"]["password2"]);
        $id = $this->abc_model->insert_with_foreign_key("tipouser","user", $data["registro"],1);
        $this->session->set_userdata("userid", $id);
        echo $id;
    }
    
    //Destruye session y regresa a inicio
    public function out(){
        $this->session->sess_destroy();
        redirect("login");
    }

    public function testing(){
        $this->load->model("abc_model");
        $this->abc_model->initial_tables();
    }
}
