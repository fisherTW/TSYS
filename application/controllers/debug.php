<?php
/*
* File:			teacher.php
* Version:		-
* Last changed:	2014/12/29
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2014
* Product:		TSYS
*/
class Debug extends MY_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();
	}
	
	public function index() {
//		echo '['.$this->db->last_query().']';

//echo phpinfo();return;
/*
$this->load->library('email');

$this->email->from('fisher@mlb.com', 'MLB Manager');
$this->email->to('fisher.liao@gmail.com'); 

$this->email->subject('Email Test 中文 我好愛你');
$this->email->message('你怎麼那麼帥<br />你怎麼那麼帥<br />你怎麼那麼帥<br />你怎麼那麼帥<br />'); 

$this->email->send();

echo $this->email->print_debugger();		
*/

	}
}