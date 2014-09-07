<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    function index(){
    	$sessioninf = $this->session->userdata("userid");
        var_dump($sessioninf);
    }

    function info_personal(){
    	$sessioninf = $this->session->userdata("userid");
        var_dump($sessioninf);
    }