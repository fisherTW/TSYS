<?php
/*
* File:			MY_Controller.php
* Version:		-
* Last changed:	2015/02/12
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		TSYS
*/
class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//$this->lang->load("message","english");
		$this->load->helper('url');
		$this->load->helper('language');
	}

/*
{
	"id": 5566,
	"name": "Mike",		// not employee
	"erp": {
		"auth": true,
		"system": "tsys",	// "tsys"/"payment"
		"id": 1234,
		"name": "Mike",
		"role": [
			1,
			2,
			3
		],
		"supervisor": {
			"id": 2345,
			"mail": "test@abc.com",
			"name": "Brian"
		}
	},
	"prev": {
		"home_path": "index",
		"c": "d",
		"e": "f"
	}
}
*/

	public function dologin($acc = false, $pass = false) {
		$this->session->unset_userdata();
		
		if($acc) {
			$acc;
		} else {
			$acc = $this->input->post('account');	
		}
		if($pass) {
			$pass;
		} else {
			$pass = $this->input->post('password');
		}

		$this->session->set_userdata('site_lang', 'en');

		list($data, $is_erp_success) = $this->dologin_erp($acc, $pass);
		if($is_erp_success) {
			$this->session->set_userdata('u_s', $data);
			$this->output->set_status_header('200');
			echo $data;
		} else {
			list($data, $is_success) = $this->dologin_tsys($acc, $pass);
			if($is_success) {
				$this->session->set_userdata('u_s', $data);
				$this->output->set_status_header('200');
				echo $data;
			} else {
				$this->output->set_status_header('401');
			}
		}
	}

	public function dologout() {
		//$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	public function get_employee() {
		return $this->api_erp('get_all_member', 'x', 'x');
	}

	private function dologin_erp($acc, $pass) {
		$ret = false;
		$data = '';
		$ret_pre = '';

		$ret_curl = $this->api_erp('tsys_login',$acc,$pass);

		if(json_decode($ret_curl)->auth != false) {
			$ret = true;
/*		
		$ary = array(
			'auth' => true,
			'system' => "tsys",
			'm_id' => 1234,
			'u_id' => 0,
			't_id'	=> 0,
			'name' => "Mike",
			'role' => 9,	// 8+1
			'supervisor' => array(
				'm_id'	=> 2345,
				"mail"	=> "test@abc.com",
				'name'	=> "Brian"
			)
		);
*/
			$data = $ret_curl;
			$ret_pre = $this->get_previllege($data);
		}

		return array($ret_pre, $ret);
	}

	private function dologin_tsys($acc, $pass) {
		$this->load->database();

		$ret = false;
		$data = '';
		$ary = array();
		$ret_pre = '';

		$query = $this->db->get_where('user',array('account' => $acc, 'password' => md5($pass)));
		$num = $query->num_rows();
		if($num > 0) {
			$ret = true;

			foreach($query->result() as $row) {
				$ary = array(
					'auth' => $ret,
					'system' => "tsys",
					'u_id' => $row->id,
					't_id' => $row->t_id,
					'name' => $row->account,
					'role' => $row->role,
// fake start
					'supervisor' => array(
						'id'	=> 2345,
						'name'	=> "Brian"
					)
// fake end
				);
			}
			$data = json_encode($ary);
			$ret_pre = $this->get_previllege($data);
		}

		return array($ret_pre, $ret);
	}

	// output: json string
	private function get_previllege($json) {
		$data = json_decode($json);
		$data = array('erp' => $data);
		$home_path = 'teacher';
		$ary_no_teacher_list = array(ROLE_CONSULTANT,ROLE_TEACHER);

		// set home_path by role
		if((intval($data['erp']->role) & ROLE_CONSULTANT) == ROLE_CONSULTANT) {
			$home_path = '404';
		}
		if((intval($data['erp']->role) & ROLE_TEACHER) == ROLE_TEACHER) {
			$home_path = 'teacher/'.$data['erp']->t_id;
		}

		// who can access list
		if(in_array(intval($data['erp']->role), $ary_no_teacher_list)) {
			$func_t_list = 0;
		} else {
			$func_t_list = 1;
		}

		// who can access detail
		if((intval($data['erp']->role) & ROLE_TEACHER) == ROLE_TEACHER) {
			$func_t_detail = $data['erp']->t_id;	// only self
		} else {
			$func_t_detail = -1;	// not limited
		}

		$data['prev'] = array(
			'home_path'		=> $home_path,
			'func_t_list'	=> $func_t_list,
			'func_t_detail'	=> $func_t_detail
		);

		return json_encode($data);
	}

	// call ERP API
	// func: 'tsys_login', 'get_all_member'
	private function api_erp($func, $acc, $pass) {
		$post = array(
			"func"		=> $func,
			"account"	=> $acc,
			"passwd"	=> $pass
		);
		$ch = curl_init();
		$options = array(
			CURLOPT_URL				=> URL_API_ERP,
			CURLOPT_HEADER			=> 0,
			CURLOPT_VERBOSE			=> 0,
			CURLOPT_RETURNTRANSFER	=> true,
			CURLOPT_USERAGENT		=> "Mozilla/4.0 (compatible;)",
			CURLOPT_POST			=> true,
			CURLOPT_POSTFIELDS		=> http_build_query($post)
		);
		curl_setopt_array($ch, $options);
		// CURLOPT_RETURNTRANSFER=true 會傳回網頁回應,
		// false 時只回傳成功與否
		$result = curl_exec($ch); 
		curl_close($ch);
		
		return $result;
	}
}

?>