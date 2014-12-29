<?php
class Teacher extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('teacher_model');

		$this->load->model('country_model');
		$this->ary_cou = $this->country_model->get();
	}
	
	public function index() {
		$data['title'] = 'Teacher Data';
		$data['ary_cou'] = $this->ary_cou;
		
		$this->load->view('templates/header',$data);
		$this->load->view('teacher/index',$data);
		$this->load->view('templates/footer',$data);
	}

	public function login() {
		$data['title'] = '';
		$this->load->view('templates/header',$data);
		$this->load->view('teacher/login',$data);
		$this->load->view('templates/footer');
	}
	
	public function edit($id) {
		$data['teacher'] = $this->teacher_model->get_teacher($id);
		if(empty($data['teacher'])) {
			show_404();
		}
		
		$data['id'] = $data['teacher']['id'];
		$data['title'] = $data['teacher']['title'];
		$data['text'] = $data['teacher']['text'];
		$data['ary_cou'] = $this->ary_cou;

		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title','標題','required');
		$this->form_validation->set_rules('text','內文','required');
		
			$this->load->view('templates/header',$data);
			$this->load->view('teacher/edit',$data);
			$this->load->view('templates/footer');
	}

	public function create() {
		$this->load->helper('form');
		$data['title'] = 'Create a new item';
		$data['ary_cou'] = $this->ary_cou;
		
		$this->load->view('templates/header',$data);
		$this->load->view('teacher/create');
		$this->load->view('templates/footer');
	}
}