<?php
/*
* File:			log_model.php
* Version:		-
* Last changed:	2015/02/04
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		tsys
*/
class Log_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_reward($t_id) {
		$ary_ret = array();

		$this->db->select('*');
		$query = $this->db->get_where('t_log_reward',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		return $ary_cou;
	}

	public function get_warning($t_id) {
		$ary_ret = array();

		$this->db->select('*');
		$query = $this->db->get_where('t_log_warning',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		return $ary_cou;
	}

	public function get_contact($t_id) {
		$ary_ret = array();

		$this->db->select('*');
		$query = $this->db->get_where('t_log_contact',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		return $ary_cou;
	}

	public function set_reward_t($id, $method, $obj) {
		$ary_data = array();

		$mode_edit = false;
		if($method != 'post') {
			$mode_edit = true;
		}

		if($mode_edit) {
			$this->db->where(array('t_id' => $id));
			$this->db->delete('t_log_reward');
		}

		$ary_row_reward				= $obj->$method('row_reward');
		$ary_reason					= $obj->$method('reason');
		$ary_method					= $obj->$method('method');
		$ary_comment_reward			= $obj->$method('comment_reward');
		$ary_remark_reward			= $obj->$method('remark_reward');
		
		for($i=0; $i < count($ary_row_reward); $i++) {
			$data = array(
				't_id'				=> $id,
				'row'		=> $ary_row_reward[$i],
				'date'		=> date('Y-m-d'),
				'reason'		=> $ary_reason[$i],
				'method'		=> $ary_method[$i],
				'comment'		=> $ary_comment_reward[$i],
				'remark'		=> $ary_remark_reward[$i]
			);
			array_push($ary_data, $data);
		}
		return $this->db->insert_batch('t_log_reward',$ary_data);
	}

	public function set_warning_t($id, $method, $obj) {
		$ary_data = array();

		$mode_edit = false;
		if($method != 'post') {
			$mode_edit = true;
		}

		if($mode_edit) {
			$this->db->where(array('t_id' => $id));
			$this->db->delete('t_log_warning');
		}

		$ary_row_warning			= $obj->$method('row_warning');
		$ary_type_warning			= $obj->$method('type_warning');
		$ary_explain				= $obj->$method('explain');
		$ary_plan					= $obj->$method('plan');
		$ary_comment_warning		= $obj->$method('comment_warning');
		$ary_remark_warning			= $obj->$method('remark_warning');
		
		for($i=0; $i < count($ary_row_warning); $i++) {
			$data = array(
				't_id'			=> $id,
				'row'			=> $ary_row_warning[$i],
				'date'			=> date('Y-m-d'),
				'type'			=> $ary_type_warning[$i],
				'explain'		=> $ary_explain[$i],
				'plan'			=> $ary_plan[$i],
				'comment'		=> $ary_comment_warning[$i],
				'remark'		=> $ary_remark_warning[$i]
			);
			array_push($ary_data, $data);
		}
		return $this->db->insert_batch('t_log_warning',$ary_data);
	}

	public function set_contact_t($id, $method, $obj) {
		$ary_data = array();

		$mode_edit = false;
		if($method != 'post') {
			$mode_edit = true;
		}

		if($mode_edit) {
			$this->db->where(array('t_id' => $id));
			$this->db->delete('t_log_contact');
		}

		$ary_row_contact		= $obj->$method('row_contact');
		$ary_type_contact		= $obj->$method('type_contact');
		$ary_topic				= $obj->$method('topic');
		$ary_content			= $obj->$method('content');
		$ary_remark_contact		= $obj->$method('remark_contact');
		
		for($i=0; $i < count($ary_row_contact); $i++) {
			$data = array(
				't_id'			=> $id,
				'row'			=> $ary_row_contact[$i],
				'date'			=> date('Y-m-d'),
				'type'			=> $ary_type_contact[$i],
				'topic'			=> $ary_topic[$i],
				'content'		=> $ary_content[$i],
				'remark'		=> $ary_remark_contact[$i]
			);
			array_push($ary_data, $data);
		}

		return $this->db->insert_batch('t_log_contact',$ary_data);
	}
}