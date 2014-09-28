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
        if($data["user_info"]["fecha_registro"]==$data["user_info"]["fecha_actualizacion"]){
            $data["user_info"]["new"]=true;
            $this->info_personal($data);
        }
        else{
            $data["user_info"]["new"]=false;
            $this->info_personal($data);
        }
        //var_dump($data["user_info"]);
        //$this->load->view("header");
        //$this->load->view("usuario/info_personal_new");
        //$this->load->view("welcome_message");
        
    }

    function info_personal($data){	
        var_dump($data);
        //$id=$this->id;
        //$this->load->model("abc_model");
        //$data["user_info"]=$this->abc_model->get_bean("user", $id);
        $this->load->view("header", $data);
        $this->load->view("usuario/info_personal", $data["user_info"]);
        $this->load->view("footer");
        
    }

}