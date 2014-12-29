<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Api extends REST_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('teacher_model');
		$this->load->helper('url');
	}

	function teacher_get() {
		if(!$this->get('id')) {
			$this->response(NULL, 400);
		}

		$user = $this->teacher_model->get_teacher( $this->get('id') );

		if($user) {
			$this->response($user, 200); // 200 being the HTTP response code
		} else {
			$this->response(NULL, 404);
		}
	}

	function teacher_post() {
		if(FALSE) {	// for validate
			$this->response(NULL, 400);
		}

		$res = $this->teacher_model->set_teacher();

		if($res !== FALSE) {
			$this->response(NULL, 200);
		} else {
			$this->response(NULL, 404);	
		}
	}

	function teacher_put() {
		if(!$this->put('id')) {
			$this->response(NULL, 400);
		}


		$data = array(
			'title' => $this->put('title'),
			'text' => $this->put('text'),
			'country' => $this->put('country')
		);

		$result = $this->teacher_model->edit_teacher( $this->put('id'), $data);

		if($res !== FALSE) {
			$this->response(NULL, 200);
		} else {
			$this->response(NULL, 404);	
		}
	}

	function teacher_delete() {
		if(!$this->delete('id')) {
			$this->response(NULL, 400);
		}

		$res = $this->teacher_model->del_teacher( $this->delete('id') );
	
		if($res !== FALSE) {
			$this->response(NULL, 200);
		} else {
			$this->response(NULL, 404);	
		}
	}

	function teachers_get() {
		$data = $this->teacher_model->get_teacher();

		if($data) {
			$this->response($data, 200);
		} else {
			$this->response(NULL, 404);
		}
	}
}
?>