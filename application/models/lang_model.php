<?php
/*
* File:			lang_model.php
* Version:		-
* Last changed:	2015/02/04
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		tsys
*/
class Lang_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get() {
		$ary_ret = array();
		$site_lang = $this->session->userdata('site_lang');

		$query = $this->db->get('mapping_lang');
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

		$this->db->select('lang');
		$query = $this->db->get_where('t_lang',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				array_push($ary_ret, $val['lang']);
			}
		}

		return $ary_ret;
	}

	public function get_t_hi($t_id) {
		$ary_ret = array();
		$ary_ret[1] = array();
		$ary_ret[2] = array();

		$this->db->select('lang,type');
		$query = $this->db->get_where('t_lang_hi',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['type']][] = $val['lang'];
			}
		}

		return $ary_ret;
	}

	public function get_lang_hi() {
		$ary_ret = array();
		$site_lang = $this->session->userdata('site_lang');

		$this->db->select('mapping_lang_hi.*,mapping_lang_hi_group.'.$site_lang.' as mtw');
		$this->db->from('mapping_lang_hi');
		$this->db->join('mapping_lang_hi_group', 'mapping_lang_hi_group.id = mapping_lang_hi.group');

		$query = $this->db->get();
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['group']]['name'] = $val['mtw'];
				$ary_ret[$val['group']]['data'][$val['id']] = $val[$site_lang];
			}
		}

		return $ary_ret;
	}

	public function set_lang_hi_t($id, $method, $obj) {
		$ary_data = array();

		$mode_edit = false;
		if($method != 'post') {
			$mode_edit = true;
		}

		if($mode_edit) {
			$this->db->where(array('t_id' => $id));
			$this->db->delete('t_lang_hi');
		}

		$ary_wish			= $obj->$method('cbx_lang_hi_wish');
		$ary_already		= $obj->$method('cbx_lang_hi_already');
		for($i=0; $i < count($ary_wish); $i++) {
			$data = array(
				't_id'	=> $id,
				'lang'	=> $ary_wish[$i],
				'type'	=> 1
			);
			array_push($ary_data, $data);
		}
		for($i=0; $i < count($ary_already); $i++) {
			$data = array(
				't_id'	=> $id,
				'lang'	=> $ary_already[$i],
				'type'	=> 2
			);
			array_push($ary_data, $data);	
		}
		return $this->db->insert_batch('t_lang_hi',$ary_data);
	}
}