<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    /*+++++++++++++++++++++++++++++
    NOTA para variables globales
    1.-Definir var $var_glob;
    2.-En constructor:
        $this->var_glob = "asignar valor";
    3.-Llamar la variable en función X
        $var_glob = $this->id;
    +++++++++++++++++++++++++++++*/
    //variable global que tiene el id del usuario
    var $id;
    var $data;

    function __construct() {
        parent::__construct();
        if($this->session->userdata("userid")){
            $this->id= $this->session->userdata("userid");
            $this->load->model("abc_model");
            $this->data["user_info"] = $this->abc_model->get_bean("user", $this->id);
            if($this->data["user_info"]["fracc"]==null){
                $this->data["user_info"]["first_steps_process"]=true;
            }
            else{
                $this->data["user_info"]["first_steps_process"]=false;
            }
        }
        else{
            redirect("login");
        }
    }
    

    function index(){
    	$data = $this->data;
        if($data["user_info"]["fecha_registro"]==$data["user_info"]["fecha_actualizacion"]){  //Si el usuario acaba de registrarse
            $data["user_info"]["new"]=true;
            $this->first_steps($data);
        }
        else{  //El usuario ha entrado al menos una vez
            $data["user_info"]["new"]=false;    //No mostrar modal de bienvenida
            if($data["user_info"]["first_steps_process"]){  //Si esta en proceso de first steps
                $this->first_steps($data);
            }
            else{
                $this->info_personal($data);  //Login al sistema completo    
            }
        }

        
        //var_dump($data["user_info"]);
        //$this->load->view("header");
        //$this->load->view("usuario/info_personal_new");
        //$this->load->view("welcome_message");
        
    }

    function first_steps($data){
        echo 'first_steps';
        var_dump($data);
        $this->load->view("header");
        $this->load->view("usuario/first_steps");
        $this->load->view("usuario/info_personal", $data);
        $this->load->view("footer");
    }

    function info_personal($data){	
        echo 'info_personal';
        var_dump($data);
        //$id=$this->id;
        //$this->load->model("abc_model");
        //$data["user_info"]=$this->abc_model->get_bean("user", $id);
        $this->load->view("header");
        $this->load->view("menu/usuario", $data);
        $this->load->view("usuario/info_personal", $data["user_info"]);
        $this->load->view("footer");
        
    }

}