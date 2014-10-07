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
        }
        else{
            redirect("login");
        }
    }
    

    function index(){
    	$data = $this->data;
        if($data["user_info"]["fracc"]==null){  //Si el usuario completo first steps
            if($data["user_info"]["fecha_registro"]==$data["user_info"]["fecha_actualizacion"]){  //Si el usuario acaba de registrarse
                $data["user_info"]["new"]=1; //Mostrar modal
            }
            else{
                $data["user_info"]["new"]=0; //Ocultar modal
            }
            $this->first_steps($data);
        }
        else{
             $data["user_info"]["new"]=0; //Ocultar modal
            $this->info_personal($data); //login al sistema completo
        }


        
        //var_dump($data["user_info"]);
        //$this->load->view("header");
        //$this->load->view("usuario/info_personal_new");
        //$this->load->view("welcome_message");
        
    }

    function first_steps($data){
        //echo 'first_steps';
        //var_dump($data);
        $this->load->view("header");
        $this->load->view("usuario/first_steps", $data);
        $this->load->view("usuario/info_personal", $data);
        $this->load->view("footer");
    }

    function info_personal($data){	
        //echo 'info_personal';
        //var_dump($data);
        //$id=$this->id;
        //$this->load->model("abc_model");
        //$data["user_info"]=$this->abc_model->get_bean("user", $id);
        $this->load->view("header");
        $this->load->view("menu/usuario", $data);
        $this->load->view("usuario/info_personal", $data);
        $this->load->view("footer");
        
    }

    function set_info_personal(){
        $id = $this->id;
        $this->load->model("abc_model");
        $data["info_personal"]= $this->input->post();
        var_dump($data["info_personal"]);
        $data["info_personal"]["fecha_actualizacion"] = date("d/m/Y G:i:s");
        $data["info_personal"]= $this->abc_model->update_bean("user", $id, $data["info_personal"]);
        //if($data["info_personal"]){
        //    echo 1;
        //}
        //else{
            echo 0;
            var_dump($data["info_personal"]);
        //}
    }

}