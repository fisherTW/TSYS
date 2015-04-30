<?php
/*
* File:			degree_model.php
* Version:		-
* Last changed:	2015/02/04
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		tsys
*/
class Degree_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get() {
		$ary_ret = array();
		$site_lang = $this->session->userdata('site_lang');

		$query = $this->db->get('mapping_degree');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val[$site_lang];
			}
		}

		return $ary_ret;
	}

	public function get_t($t_id) {
		$ary_ret[0] = array();
		$ary_ret[1] = array();

		$this->db->select('t_id,degree,file,year_grad,school_name,nation');
		$query = $this->db->get_where('t_degree',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				array_push($ary_ret[0], $val['degree']);

				$ary_ret[1]['degree_year_'.$val['degree']]		= $val['year_grad'];
				$ary_ret[1]['degree_school_'.$val['degree']]	= $val['school_name'];
				$ary_ret[1]['degree_nation_'.$val['degree']]	= $val['nation'];
			}
		}

		return $ary_ret;
	}
}