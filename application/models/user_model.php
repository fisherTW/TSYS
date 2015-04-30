<?php
/*
* File:			user_model.php
* Version:		-
* Last changed:	2015/02/04
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		tsys
*/
class User_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function create($acc,$pass,$ary_depart) {
		if($this->is_duplicate($acc)) return 0;
		
		$u_id = 0;

		$data = array(
			'account'				=> $acc,
			'password'				=> md5($pass)
		);
		$this->db->insert("user",$data);
		$u_id = $this->db->insert_id();

		$ary_data = array();
		for($i=0; $i < count($ary_depart); $i++) {
			$data = array(
				'u_id'				=> $u_id,
				'depart_id'			=> $ary_depart[$i]
			);
			array_push($ary_data, $data);
		}
		$this->db->insert_batch('t_depart',$ary_data);

		return $u_id;
	}

	public function get_user_id_by_t_id($t_id) {
		$u_id = 0;

		$this->db->select('id');
		$query = $this->db->get_where('user',array('t_id' => $t_id));
		$ary_cou = $query->result_array();
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$u_id = $val['id'];
			}
		}

		return $u_id;	
	}

	public function is_duplicate($account) {
		$ret = true;
		$this->db->select('id');
		$query = $this->db->get_where('user',array('account' => $account));
		$ary_cou = $query->result_array();

		if(count($ary_cou) == 0) {
			$ret = false;
		}

		return $ret;
	}

/*
	public function get() {
		$ary_ret = array();

		$query = $this->db->get('mapping_user');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['tw'];
			}
		}

		return $ary_ret;
	}

	public function get_t($t_id) {
		$ary_ret = array();

		$this->db->select('user');
		$query = $this->db->get_where('t_user',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				array_push($ary_ret, $val['user']);
			}
		}

		return $ary_ret;
	}

	public function set_t($method, $obj) {
		$ary_data = array();
		
		$mode_edit = false;
		if($method != 'post') {
			$mode_edit = true;
		}

		if($mode_edit) {
			$this->db->where(array('t_id' => $obj->$method('id')));
			$this->db->delete('t_user');
		}

		$ary					= $obj->$method('cbx_user');
		for($i=0; $i < count($ary); $i++) {
			$data = array(
				't_id'					=> $obj->$method('id'),
				'user'					=> $ary[$i]
			);
			array_push($ary_data, $data);
		}
		$this->db->insert_batch('t_user',$ary_data);
	}
*/
}