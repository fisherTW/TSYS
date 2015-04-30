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
class Teacher extends MY_Controller {
	public function __construct() {
		parent::__construct();
		//$this->lang->load("message","english");
		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->model('teacher_model');

		$this->load->model('country_model');
		$this->ary_cou = $this->country_model->get();

		$this->ary_e = json_decode($this->get_employee(),true);

		$this->ary_current_employment_status = array(
			1 => 'Employed in Taiwan',
			2 => 'Employed in other country',
			3 => 'Self-Employed',
			4 => 'Unemployed',
			5 => 'Student'
		);

		$this->ary_sex = array(
			'f' => 'female',
			'm' => 'male'
		);
		$this->pos_seeking = array(
			'full' => 'Fulltime',
			'part' => 'Part-time'
		);
		$this->teaching_preference = array(
			1 	=> 'Senior high school (G10-12)',
			2 	=> 'Junior high school  (G7-9)',
			4 	=> 'Elementary school (G1-6)',
			8 	=> 'Language School',
			16  => '企業講師',
			32 	=> '大學'
		);
	}
	
	public function index() {
		$this->load->helper('form');

		$this->load->model('visa_model');
		$this->ary_visa = $this->visa_model->get();

		$data['title'] = 'Teacher Data';
		$data['func']	= 'index';
		$data['ary_cou'] = $this->ary_cou;

		$data['lang'] = $this->lang;
		$data['site_lang'] = $this->session->userdata('site_lang');
		$data['u_s'] = json_decode($this->session->userdata('u_s'));

		if($this->session->userdata('u_s') === FALSE) {
			show_error('',401);
		}
		if($data['u_s']->prev->func_t_list == 0) {
			show_error('',401);
		}

		$this->load->model('personality_model');
		$data['ary_personality'] = $this->personality_model->get();
		$this->load->model('good_model');
		$data['ary_good'] = $this->good_model->get();
		$this->load->model('interest_model');
		$data['ary_interest'] = $this->interest_model->get();
		$this->load->model('lang_model');
		$this->load->model('degree_model');
		
		$ary_tmp = $this->ary_e;
		$ary_tmp[0] = '--- select ---';
		asort($ary_tmp);
		$data['ary_e'] = $ary_tmp;

		$ary_tmp = $this->ary_sex;
		array_unshift($ary_tmp,'--- select ---');
		$data['ary_sex'] = $ary_tmp;
		$ary_tmp = $this->ary_visa;
		array_unshift($ary_tmp,'--- select ---');
		$data['ary_visa'] = $ary_tmp;
		$ary_tmp = $this->pos_seeking;
		array_unshift($ary_tmp,'--- select ---');
		$data['pos_seeking'] = $ary_tmp;

		$ary_tmp = $this->teaching_preference;
		$ary_tmp[0] = '--- select ---';
		ksort($ary_tmp);
		$data['teaching_preference'] = $ary_tmp;

		$ary_tmp = $this->ary_cou;
		array_unshift($ary_tmp,'--- select ---');
		$data['ary_cou'] = $ary_tmp;
		$ary_tmp = $this->ary_current_employment_status;
		array_unshift($ary_tmp,'--- select ---');
		$data['ary_current_employment_status'] = $ary_tmp;
		$ary_tmp = $this->lang_model->get();
		array_unshift($ary_tmp,'--- select ---');
		$data['ary_lang'] = $ary_tmp;
		$ary_tmp = $this->degree_model->get();
		array_unshift($ary_tmp,'--- select ---');
		$data['ary_degree'] = $ary_tmp;

		$this->load->view('templates/header',$data);
		$this->load->view('teacher/index',$data);
		$this->load->view('templates/footer',$data);
	}

	public function app() {
		$data['title'] = '';
		$this->load->view('templates/header',$data);
		$this->load->view('teacher/app',$data);
		$this->load->view('templates/footer');
	}
	
	// public function edit($id) {
	// 	$data['teacher'] = $this->teacher_model->get_teacher($id);
	// 	if(empty($data['teacher'])) {
	// 		show_404();
	// 	}
		
	// 	$data['id'] = $data['teacher']['id'];
	// 	$data['title'] = $data['teacher']['title'];
	// 	$data['text'] = $data['teacher']['text'];
	// 	$data['ary_cou'] = $this->ary_cou;

	// 	$data['lang'] = $this->lang;
	// 	$data['site_lang'] = $this->session->userdata('site_lang');

	// 	$this->load->helper('form');
	// 	$this->load->library('form_validation');
		
	// 	$this->form_validation->set_rules('title','標題','required');
	// 	$this->form_validation->set_rules('text','內文','required');
		
	// 		$this->load->view('templates/header',$data);
	// 		$this->load->view('teacher/edit',$data);
	// 		$this->load->view('templates/footer');
	// }

	public function create($id = false) {
		$mode_edit = false;
		$u_id = 0;
		
		if($id) {
			$this->load->model('user_model');
			$u_id = $this->user_model->get_user_id_by_t_id($id);
		} else {
			$u_id = $this->session->userdata('u_id');
		}
		$data['sess']	= $this->init_sess($u_id);
/*
Array
(
    [0] => Array
        (
            [depart_id] => 2
            [phase] => 0
            [is_up] => 0
        )

)
*/

		if($this->session->userdata('u_s') === FALSE) {
			show_error('',401);
		}

		$this->load->model('visa_model');
		$this->ary_visa = $this->visa_model->get();

		$data['title']	= 'New Entry';
		$data['func']	= 'create';
		$data['u_s'] = json_decode($this->session->userdata('u_s'));

		$this->load->model('visa_model');
		$data['ary_visa'] = $this->visa_model->get();
		$this->load->model('certificate_model');
		$data['ary_certificate'] = $this->certificate_model->get();
		$this->load->model('lang_model');
		$data['ary_lang'] = $this->lang_model->get();
		$data['ary_lang_hi'] = $this->lang_model->get_lang_hi();

		// hi
		$this->load->model('personality_model');
		$data['ary_personality'] = $this->personality_model->get();
		$this->load->model('good_model');
		$data['ary_good'] = $this->good_model->get();
		$this->load->model('interest_model');
		$data['ary_interest'] = $this->interest_model->get();

		$this->load->model('degree_model');
		$data['ary_degree'] = $this->degree_model->get();
		$data['teaching_preference'] = $this->teaching_preference;

		if($id) {
			if( ($data['u_s']->prev->func_t_detail > 0) && ($id != $data['u_s']->erp->t_id) ) {
				show_error('',401);
			}

			$data['t'] = $this->teacher_model->get_teacher($id);
			$data['t_fo'] = $this->teacher_model->get_t_fo($id);
			$data['t_hi'] = $this->teacher_model->get_t_hi($id);

			$this->load->model('attachment_model');
			$data['attachment'] = $this->attachment_model->get_t($id);

			// hi
			$this->load->model('log_model');
			$data['t_record_reward'] = $this->log_model->get_reward($id);
			$data['t_record_warning'] = $this->log_model->get_warning($id);
			$data['t_record_contact'] = $this->log_model->get_contact($id);

			// fo
			$data['t_teaching_exp'] = $this->teacher_model->get_t_teaching_exp($id);

			if(empty($data['t'])) {
				show_404();
			}
			$data['visa'] = $this->visa_model->get_t($id);
			$data['certificate'] = $this->certificate_model->get_t($id);
			$data['val_lang'] = $this->lang_model->get_t($id);
			$data['val_lang_hi'] = $this->lang_model->get_t_hi($id);
			$data['val_personality'] = $this->personality_model->get_t($id);
			$data['val_good'] = $this->good_model->get_t($id);
			$data['val_interest'] = $this->interest_model->get_t($id);
			$data['val_degree'] = $this->degree_model->get_t($id);
			$data['title'] = 'Edit';
			$data['func'] = 'edit';
			$mode_edit = true;
		}
		$this->load->helper('form');

		$data['ary_cou'] = $this->ary_cou;

		$data['ary_e'] = $this->ary_e;
		asort($data['ary_e']);

		// forms
		$forms = array('basic');
		for($i=0; $i < count($data['sess']); $i++) {
			if($data['sess'][$i]['depart_id'] == 1) array_push($forms, 'hi');	
			if($data['sess'][$i]['depart_id'] == 2) array_push($forms, 'fo');	
		}
		$data['hid_forms'] = htmlspecialchars(json_encode($forms));

		$data['ary_current_employment_status'] = $this->ary_current_employment_status;
		$data['ary_employment_status'] = array(
			1 => 'Regular',
			2 => 'Probationary',
			3 => 'Training'
		);
		$data['ary_type_warning'] = array(
			1 => 'O',
			2 => 'O2',
		);
		$data['ary_type_contact'] = array(
			1 => 'xO',
			2 => 'xO2',
		);

		$data['lang'] = $this->lang;
		$data['site_lang'] = $this->session->userdata('site_lang');
		
		$this->load->view('templates/header',$data);
		$this->load->view('teacher/create',$data);
		$this->load->view('templates/footer');
	}

	public function init_sess($u_id) {
		$ary_ret = array();

		$this->load->model('depart_model');
		$ary_ret = $this->depart_model->get_t($u_id);

		return $ary_ret;
	}

	public function reg($step) {
		$this->load->helper('form');
		$data['title'] = 'Register';
		$data['func'] = 'reg';
		$data['ary_cou'] = $this->ary_cou;

		$data['lang'] = $this->lang;
		$data['site_lang'] = $this->session->userdata('site_lang');
		$data['step_now'] = $step;
		$data['step_next'] = ($step + 1);

		
		switch($step) {
			case '1':
				$type = array();
				if($this->session->userdata('type')) {
					$type = $this->session->userdata('type');	
				}
				
				$data['content'] = "
					<h3> Which one you prefered?</h3>
					<div class='row'>
						<div class='col-md-12'>
							<div class='form-group'>
								<label class='checkbox-inline'>
									<input type='checkbox' name='cbx_type[]' id='inlineRadio1' value='1'".(in_array(1, $type) ? 'checked' : '')."> 線上
								</label>
								<label class='checkbox-inline'>
									<input type='checkbox' name='cbx_type[]' id='inlineRadio2' value='2'".(in_array(2, $type) ? 'checked' : '')."> 實體
								</label>
							</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-md-12'>
							<div class='form-group'>
								<label for='mail' class='form-label'>Email (as your account)</label><br />
								<input required type='email' name='account' class='form-control' value=''>
							</div>					
						</div>
					</div>
					<div class='row'>
						<div class='col-md-12'>
							<div class='form-group'>
								<label for='mail' class='form-label'>Password</label><br />
								<input required type='password' name='password' id='txt_password' class='form-control' value=''>
							</div>					
						</div>
					</div>		
					<div class='row'>
						<div class='col-md-12'>
							<div class='form-group'>
								<label for='mail' class='form-label'>Re-Enter Password</label><br />
								<input required type='password' id='txt_repass' class='form-control' value=''>
							</div>					
						</div>
					</div>
					<div class='row'>
						<div class='col-md-12'>
							<div class='form-group'>
								<label class='checkbox-inline'>
									<input required type='checkbox'> I have read and agree to the Terms & Conditions.
								</label>
							</div>					
						</div>
					</div>
					<div class='row'>
						<div class='col-md-12'>
							<div class='form-group'>
								<label class='checkbox-inline'>
									<input required type='checkbox'> I agree terms of online.
								</label>
							</div>					
						</div>
					</div>
				";
				$this->load->view('templates/header',$data);
				$this->load->view('teacher/reg',$data);
				$this->load->view('templates/footer');
				break;
			case '2':	// basic
				$data['content'] = "
					<h3> 222222222222</h3>
				";
				$this->load->view('templates/header',$data);
				$this->load->view('teacher/reg',$data);
				$this->load->view('templates/footer');
				break;
			case '3':	// by depart
				$data['content'] = "
					<h3> 33333333333</h3>
				";
				$this->load->view('templates/header',$data);
				$this->load->view('teacher/reg',$data);
				$this->load->view('templates/footer');
				break;
			case '1e':
				echo $this->reg1_end();
				break;
			case '2e':
				$this->reg2_end();
				break;
			case '3e':
				$this->reg3_end();
				break;
		}
	}

	public function reg1_end() {
		$this->load->model('user_model');
		$u_id = $this->user_model->create($this->input->post('account'),$this->input->post('password'),$this->input->post('cbx_type'));

		$this->session->unset_userdata();
		$this->session->set_userdata('type', $this->input->post('cbx_type'));
		$this->session->set_userdata('u_id', $u_id);

		$this->t_dologin($this->input->post('account'),$this->input->post('password'));

		return $u_id;
	}

	public function reg2_end() {

	}

	public function reg3_end() {

	}

	public function test() {
		$this->load->view('teacher/test');		
	}

	public function t_dologin($acc = false,$pass = false) {
		$this->dologin($acc,$pass);
	}

	public function t_dologout() {
		$this->dologout();
	}
}