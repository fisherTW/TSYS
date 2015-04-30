<?php
/*
* File:			work_type_model.php
* Version:		-
* Last changed:	2015/02/04
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		tsys
*/
class Work_type_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get() {
		$ary_ret = array();
		$site_lang = $this->session->userdata('site_lang');

		$query = $this->db->get('mapping_work_type');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val[$site_lang];
			}
		}

		return $ary_ret;
	}
}