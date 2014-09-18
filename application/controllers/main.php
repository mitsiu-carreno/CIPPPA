<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct() {
        parent::__construct();
        if($this->session->userdata("userid")){
            $id= $this->session->userdata("userid");
        }
        else{
            redirect("login");
        }
    }

    function index(){
    	$sessioninf["userid"] = $this->session->userdata("userid");
        //var_dump($sessioninf);
        $this->load->view("header");
        $this->load->view("usuario/info_personal", $sessioninf);
        $this->load->view("welcome_message");
        // $this->session->sess_destroy();
        //redirect("login");
    }

    function info_personal(){
    	//$sessioninf = $this->session->userdata("userid");
        //var_dump($sessioninf);
        $this->load->model("abc_model");
        $data["user_info"]=$this->abc_model->get_bean("user", $id);
        var_dump($data["user_info"]);
        $this->load->view("header");
        $this->load->view("usuaio/info_personal", $data);
         //$this->session->sess_destroy();
        //redirect("login");


        //$this->load->view("usuario/info_personal")
    }

}