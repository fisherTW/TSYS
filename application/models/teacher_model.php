<?php
/*
* File:			teacher_model.php
* Version:		-
* Last changed:	2014/12/29
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2014
* Product:		TSYS
*/
class Teacher_model extends CI_Model {
	public function __construct() {
		$this->load->database();

		$this->load->model('country_model');
		$this->ary_cou = $this->country_model->get();
	}
	
	public function get_teacher($id = FALSE, $obj = FALSE,$method = FALSE) {
		$ary_ret = array();

		if($id === FALSE) {
			$ary_where = array();
			if(strval($obj->$method('sex')) != '0') {
				$tmp = 0;
				if($obj->$method('sex') == 'm') $tmp = 1;
				if($obj->$method('sex') == 'f') $tmp = 0;
				$ary_where['sex'] = $tmp;
			}

			if($obj->$method('contact') != 0) { $ary_where['contact'] = $obj->$method('contact'); }
			if($obj->$method('recruiter') != 0) { $ary_where['recruiter'] = $obj->$method('recruiter'); }
			if(strval($obj->$method('nation')) != '0') { $ary_where['nation'] = $obj->$method('nation'); }
			if(strval($obj->$method('current_location')) != '0') { $ary_where['location'] = $obj->$method('current_location'); }
			if($obj->$method('current_employment_status') != 0) { $ary_where['current_employment_status'] = $obj->$method('current_employment_status'); }

			$this->db->select('id,name_full,nation,sex,is_enable,is_blacklist');

			if($obj->$method('degree') != 0) {
				$this->db->join('(SELECT t_id, MIN( degree ) as md FROM t_degree GROUP BY t_id) a', 't.id=a.t_id', 'left');
				$this->db->where('a.t_id is not NULL AND a.md <='.$obj->$method('degree'));
			}
			if($obj->$method('lang') != 0) {
				$this->db->join('(select distinct t_id from t_lang where lang in ('.$obj->$method('lang').')) b', 't.id=b.t_id', 'left');
				$this->db->where('b.t_id is not NULL');
			}
			if( (strlen($obj->$method('good')) > 0) && 
				($obj->$method('good') != '[]') ) {
				$this->db->join('(select distinct t_id from t_good where good in ('.$obj->$method('good').')) c', 't.id=c.t_id', 'left');
				$this->db->where('c.t_id is not NULL');
			}
			if( (strlen($obj->$method('interest')) > 0) && 
				($obj->$method('interest') != '[]') ) {
				$this->db->join('(select distinct t_id from t_interest where interest in ('.$obj->$method('interest').')) d', 't.id=d.t_id', 'left');
				$this->db->where('d.t_id is not NULL');
			}
			if( (strlen($obj->$method('personality')) > 0) && 
				($obj->$method('personality') != '[]') ) {
				$this->db->join('(select distinct t_id from t_personality where personality in ('.$obj->$method('personality').')) e', 't.id=e.t_id', 'left');
				$this->db->where('e.t_id is not NULL');
			}

			// visa
			if($obj->$method('visa') != 0) {
				$where = 't.id in (select t_id from t_visa WHERE visa='.$obj->$method('visa').')';
				$this->db->where($where);
			}
			// pos
			if(strval($obj->$method('pos_seeking')) != '0') {
				if($obj->$method('pos_seeking') == 'full') {
					$where = 't.id in (select t_id from t_fo WHERE work_hour = 0)';
				} else {
					$where = 't.id in (select t_id from t_fo WHERE work_hour <> 0)';
				}
				$this->db->where($where);
			}
			if(strval($obj->$method('teaching_preference')) != '0') {
				$where = 't.id in (select t_id from t_fo WHERE teaching_preference & '.$obj->$method('teaching_preference').' = '.$obj->$method('teaching_preference').')';
				$this->db->where($where);	
			}

			$this->db->where($ary_where);
			$query = $this->db->get('t');
//print_r($this->db->last_query());
/*
left join (select distinct t_id from t_good where good in (3,4,5,6)) c on t.id=c.t_id
where c.t_id is not NULL
*/


			$ary_ret = $query->result_array();

			for($i=0; $i < count($ary_ret); $i++) {
				$ary_ret[$i]['nation'] .= '[-S-]'.$this->ary_cou[$ary_ret[$i]['nation']];
			}

			return $ary_ret;
		}
		$query = $this->db->get_where('t',array('id' => $id));
		return $query->row_array();
	}
	
	public function set_teacher($obj,$method) {
		$mode_edit = false;
		$ary_rollback = array();
		if($method == 'post') {
			$this->db_init($id);
			$this->db->select_max('id','maxid');
			$query = $this->db->get('t');
			$id = $query->row()->maxid + 1;
		} else {
			$mode_edit = true;
			$id = $obj->$method('id');
		}

		$data = array(
			'id'		=> $id,
			'name_full'	=> $obj->$method('name_full'),
			'location'	=> $obj->$method('location'),
			'nation'	=> $obj->$method('nation'),
			'sex'	=> $obj->$method('sex'),
			'birth_date'	=> $obj->$method('birth_date'),
			'mail'	=> $obj->$method('mail'),
			'address_permanent'	=> $obj->$method('address_permanent'),
			'phone_current'	=> $obj->$method('phone_current'),
			'skype'	=> $obj->$method('skype'),
			'available_start_date'	=> $obj->$method('available_start_date'),
			'current_employment_status'	=> $obj->$method('current_employment_status'),
			'contact'	=> $obj->$method('contact'),
			'recruiter'	=> $obj->$method('recruiter'),
			'remark'	=> $obj->$method('remark'),
			'modify_date'	=> date('Y-m-d h:i:s'),
			'is_enable'	=> $obj->$method('is_enable'),
			'is_blacklist'	=> $obj->$method('is_blacklist')
		);

		$this->load->model('attachment_model');
		array_push($ary_rollback, 'attachment');
		if($this->attachment_model->set_t($id, $method, $obj)) {
		} else {
			$this->db_rollback($id, $ary_rollback, $mode_edit);
			return FALSE;
		}

		if(in_array('fo', json_decode(stripslashes($obj->$method('hid_forms')),true))) {
			array_push($ary_rollback, 't_teaching_exp');
			array_push($ary_rollback, 't_fo');
			if($this->set_teacher_fo($id, $method, $obj)) {
			} else {
				$this->db_rollback($id, $ary_rollback, $mode_edit);
				return FALSE;
			}
		}
		if(in_array('hi', json_decode(stripslashes($obj->$method('hid_forms')),true))) {
			array_push($ary_rollback, 't_hi');
			array_push($ary_rollback, 't_lang_hi');
			array_push($ary_rollback, 't_good');
			array_push($ary_rollback, 't_interest');
			array_push($ary_rollback, 't_personality');
			array_push($ary_rollback, 't_log_contact');
			array_push($ary_rollback, 't_log_warning');
			array_push($ary_rollback, 't_log_reward');
			if($this->set_teacher_hi($id, $method, $obj)) {
			} else {
				$this->db_rollback($id, $ary_rollback, $mode_edit);
				return FALSE;
			}
		}
		
		if($mode_edit) {
			$this->db->where('id', $id);
			$this->db->update('t', $data); 
		} else {
			$data['create_date'] = date('Y-m-d h:i:s');
			$this->db->insert('t',$data);	
		}
		
		if ($this->db->affected_rows() > 0) {
			array_push($ary_rollback, 't_visa');
			if($this->set_multi_cbx($method, $obj, 'visa')) {
			} else {
				$this->db_rollback($id, $ary_rollback, $mode_edit);
				return FALSE;				
			}
			array_push($ary_rollback, 't_certificate');
			if($this->set_multi_cbx($method, $obj, 'certificate')) {
			} else {
				$this->db_rollback($id, $ary_rollback, $mode_edit);
				return FALSE;				
			}
			array_push($ary_rollback, 't_lang');
			if($this->set_multi_cbx($method, $obj, 'lang')) {
			} else {
				$this->db_rollback($id, $ary_rollback, $mode_edit);
				return FALSE;				
			}
			array_push($ary_rollback, 't_degree');
			if($this->set_degree($method, $obj)) {
			} else {
				$this->db_rollback($id, $ary_rollback, $mode_edit);
				return FALSE;
			}

			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_teacher($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('t', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		} 
	}
	
	public function del_teacher($id) {
		$this->db->where('id',$id);
		$this->db->delete('t');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// delete & insert
	private function set_multi_cbx($method, $obj, $name) {
		// del
		$this->db->delete('t_'.$name, array('t_id' => $obj->$method('id')));

		// ins
		$ary = $obj->$method('cbx_'.$name);
		$arys = array();
		for($i=0; $i < count($ary); $i++) {
			if($ary[$i] == null) continue;
			array_push($arys, array(
				't_id'	=> $obj->$method('id'),
				$name	=> $ary[$i]
			));
		}
		if(count($arys) > 0) {
			return $this->db->insert_batch('t_'.$name, $arys);	
		}

		return TRUE;
	}

	// delete & insert
	private function set_degree($method, $obj) {
		// del
		$this->db->delete('t_degree', array('t_id' => $obj->$method('id')));

		// ins
		$ary = $obj->$method('cbx_degree');
		$arys = array();
		for($i=0; $i < count($ary); $i++) {
			if($ary[$i] == null) continue;
			array_push($arys, array(
				't_id'		=> $obj->$method('id'),
				'degree'	=> $ary[$i],
				'year_grad'	=> $obj->$method('degree_year_'.$ary[$i]),
				'school_name'	=>	$obj->$method('degree_school_'.$ary[$i]),
				'nation'	=> $obj->$method('degree_nation_'.$ary[$i])
			));
		}
		if(count($arys) > 0) {
			return $this->db->insert_batch('t_degree', $arys);	
		}

		return TRUE;
	}

	private function set_teacher_fo($id, $method, $obj) {
		$work_hour = 0;
		$location_preference = 0;
		$teaching_preference = 0;

		$mode_edit = false;
		if($method != 'post') {
			$mode_edit = true;
			$id = $obj->$method('id');
		}

		if((string)$obj->$method('rdo_work_hour') != '0') {
			$work_hour = $obj->$method('work_hour');
		}

		$ary_location_preference = $obj->$method('cbx_location_preference');
		for($i=0; $i < count($ary_location_preference); $i++) {
			if($ary_location_preference[$i] == null) continue;
			$location_preference += $ary_location_preference[$i];
		}
		$ary_teaching_preference = $obj->$method('cbx_teaching_preference');
		for($i=0; $i < count($ary_teaching_preference); $i++) {
			if($ary_teaching_preference[$i] == null) continue;
			$teaching_preference += $ary_teaching_preference[$i];
		}

		$data = array(
			't_id'		=> $id,
			'is_validate'	=> $obj->$method('is_validate_fo'),
			'is_ignore'		=> $obj->$method('is_ignore_fo'),
			'work_hour'	=> $work_hour,
			'location_preference'	=> $location_preference,
			'teaching_preference'	=> $teaching_preference,
			'sp_need'	=> $obj->$method('sp_need'),
			'q1'	=> $obj->$method('q1'),
			'q2'	=> $obj->$method('q2'),
			'q3'	=> $obj->$method('q3'),
			'q4'	=> $obj->$method('q4'),
			'q5'	=> $obj->$method('q5'),
			'q6'	=> $obj->$method('q6')
		);

		if($mode_edit) {
			$this->db->where('t_id', $obj->$method('id'));
			if($this->db->update('t_fo', $data)) {
			} else {
				return FALSE;
			}
		} else {
			if($this->db->insert('t_fo',$data)) {
			} else {
				return FALSE;
			}
		}

		return $this->set_t_teaching_exp($id, $method, $obj);
	}

	private function set_teacher_hi($id, $method, $obj) {
		$mode_edit = false;
		$ent_week = 0;

		if($method != 'post') {
			$mode_edit = true;
			$id = $obj->$method('id');
		}


		$ary = $obj->$method('cbx_ent_week');
		for($i=0; $i < count($ary); $i++) {
			if($ary[$i] == null) continue;
			$ent_week += $ary[$i];
		}

		$data = array(
			't_id'		=> $id,
			'is_validate'	=> $obj->$method('is_validate_hi'),
			'is_ignore'		=> $obj->$method('is_ignore_hi'),
			'name_alias'	=> $obj->$method('name_alias'),
			'employment_status'	=> $obj->$method('employment_status'),
			'sound'	=> $obj->$method('sound'),
			'tin_no'	=> $obj->$method('tin_no'),
			'facebook'	=> $obj->$method('facebook'),
			'line'	=> $obj->$method('line'),
			'contact_other'	=> $obj->$method('contact_other'),
			'sale_self'	=> $obj->$method('sale_self'),
			'ent_week'	=> $ent_week,
			'ent_time_start'	=> $obj->$method('ent_time_start'),
			'ent_time_end'	=> $obj->$method('ent_time_end'),
			'ent_remark'	=> $obj->$method('ent_remark')
		);

		if($mode_edit) {
			$this->db->where('t_id', $obj->$method('id'));
			if($this->db->update('t_hi', $data)) {
			} else {
				return FALSE;
			}
		} else {
			if($this->db->insert('t_hi',$data)) {
			} else {
				return FALSE;
			}
		}

		$this->load->model('lang_model');
		$this->load->model('log_model');
		$this->load->model('good_model');
		$this->load->model('personality_model');
		$this->load->model('interest_model');

		if($this->lang_model->set_lang_hi_t($id, $method, $obj)) {
		} else {
			log_message('error','set_lang_hi_t');
			return FALSE;
		}
		if($this->good_model->set_t($id, $method, $obj)) {
		} else {
			log_message('error','good_model');
			return FALSE;			
		}
		if($this->interest_model->set_t($id, $method, $obj)) {
		} else {
			log_message('error','interest_model');
			return FALSE;			
		}
		if($this->personality_model->set_t($id, $method, $obj)) {
		} else {
			log_message('error','personality_model');
			return FALSE;			
		}
		if($this->log_model->set_reward_t($id, $method, $obj)) {
		} else {
			log_message('error','set_reward_t');
			return FALSE;			
		}
		if($this->log_model->set_warning_t($id, $method, $obj)) {
		} else {
			log_message('error','set_warning_t');
			return FALSE;			
		}
		if($this->log_model->set_contact_t($id, $method, $obj)) {
		} else {
			log_message('error','set_contact_t');
			return FALSE;			
		}

		return TRUE;
	}

	// output: NULL / array
	public function get_t_fo($id) {
		$ret = NULL;

		$query = $this->db->get_where('t_fo',array('t_id' => $id));
		if(count($query->row_array()) > 0) {
			$ret = $query->row_array();
		}

		return $ret;
	}

	// output: NULL / array
	public function get_t_hi($id) {
		$ret = NULL;

		$query = $this->db->get_where('t_hi',array('t_id' => $id));
		if(count($query->row_array()) > 0) {
			$ret = $query->row_array();
		}

		return $ret;
	}

	public function get_t_teaching_exp($t_id) {
		$ary_ret = array();

		$this->db->select('*');
		$query = $this->db->get_where('t_teaching_exp',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		return $ary_cou;
	}

	private function set_t_teaching_exp($id, $method, $obj) {
		$ary_data = array();

		$mode_edit = false;
		if($method != 'post') {
			$mode_edit = true;
		}

		if($mode_edit) {
			$this->db->where(array('t_id' => $id));
			$this->db->delete('t_teaching_exp');
		}

		$ary_row					= $obj->$method('row_exp');
		$ary_school_name			= $obj->$method('school_name');
		$ary_teaching_exp_nation	= $obj->$method('teaching_exp_nation');
		$ary_teaching_exp_level		= $obj->$method('teaching_exp_level');
		$ary_position_hold			= $obj->$method('position_hold');
		$ary_responsibilities		= $obj->$method('responsibilities');
		$ary_employment_start		= $obj->$method('employment_start');
		$ary_employment_end			= $obj->$method('employment_end');
		$ary_contact_fo				= $obj->$method('contact_fo');

		for($i=0; $i < count($ary_row); $i++) {
			if($ary_school_name[$i] == '') continue;
			$data = array(
				't_id'					=> $id,
				'row'					=> $ary_row[$i],
				'school_name'			=> $ary_school_name[$i],
				'nation'				=> $ary_teaching_exp_nation[$i],
				'level'					=> $ary_teaching_exp_level[$i],
				'position_hold'			=> $ary_position_hold[$i],
				'employment_start'		=> $ary_employment_start[$i],
				'employment_end'		=> $ary_employment_end[$i],
				'responsibilities'		=> $ary_responsibilities[$i],
				'contact'				=> $ary_contact_fo[$i]
			);
			array_push($ary_data, $data);
		}

		return $this->db->insert_batch('t_teaching_exp',$ary_data);
	}

	private function db_init($id) {
		$ary = array(
			'attachment',
			't_teaching_exp',
			't_fo',
			't_hi',
			't_lang_hi',
			't_good',
			't_interest',
			't_personality',
			't_log_contact',
			't_log_warning',
			't_log_reward'
		);

		$this->db->where(array('id' => $id));
		$this->db->delete('t');
		for($i=0; $i < count($ary); $i++) {
			$this->db->where(array('t_id' => $id));
			$this->db->delete($ary[$i]);
		}
	}

	private function db_rollback($id, $ary_rollback, $mode_edit) {
		log_message('error',implode(',',$ary_rollback));
		log_message('error',$this->db->last_query());
		if($mode_edit) return ;
		for($i=0; $i < count($ary_rollback); $i++) {
			$this->db->where(array('t_id' => $id));
			$this->db->delete($ary_rollback[$i]);
		}
	}
}

?>