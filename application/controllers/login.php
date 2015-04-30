<?php
/*
* File:			login.php
* Version:		-
* Last changed:	2015/02/12
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		TSYS
*/
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//$this->lang->load("message","english");
		$this->load->helper('url');
		$this->load->helper('language');
	}

	public function index() {
		$data['title'] = 'Login';
		$data['func'] = 'login';
		$this->load->view('templates/header',$data);
		$this->load->view('teacher/login',$data);
		$this->load->view('templates/footer');
	}
}

?>