<?php
/*
* File:			depart_model.php
* Version:		-
* Last changed:	2015/02/04
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		tsys
*/
class Depart_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get() {
		$ary_ret = array();
		$site_lang = $this->session->userdata('site_lang');

		$query = $this->db->get('mapping_depart');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val[$site_lang];
			}
		}

		return $ary_ret;
	}

	public function get_t($u_id) {
		$ary_ret = array();

		$this->db->select('depart_id,phase,is_up');
		$query = $this->db->get_where('t_depart',array('u_id' => $u_id));
		$ary_cou = $query->result_array();

		return $ary_cou;
	}
}