<?php
/*
* File:			good_model.php
* Version:		-
* Last changed:	2015/02/04
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		tsys
*/
class Good_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get() {
		$ary_ret = array();
		$site_lang = $this->session->userdata('site_lang');

		$query = $this->db->get('mapping_good');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val[$site_lang];
			}
		}

		return $ary_ret;
	}

	public function get_t($t_id) {
		$ary_ret = array();

		$this->db->select('good');
		$query = $this->db->get_where('t_good',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				array_push($ary_ret, $val['good']);
			}
		}

		return $ary_ret;
	}

	public function set_t($id, $method, $obj) {
		$ary_data = array();
		
		$mode_edit = false;
		if($method != 'post') {
			$mode_edit = true;
		}

		if($mode_edit) {
			$this->db->where(array('t_id' => $id));
			$this->db->delete('t_good');
		}

		$ary					= $obj->$method('cbx_good');
		for($i=0; $i < count($ary); $i++) {
			$data = array(
				't_id'					=> $id,
				'good'					=> $ary[$i]
			);
			array_push($ary_data, $data);
		}
		return $this->db->insert_batch('t_good',$ary_data);
	}
}