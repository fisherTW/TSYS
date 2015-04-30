<?php
/*
* File:			attachment_model.php
* Version:		-
* Last changed:	2015/02/04
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2015
* Product:		tsys
*/
class Attachment_model extends CI_Model {
	public function __construct() {
		$this->load->database();

		$this->COUNT_ATTACHMENT = 7;
	}

	public function get_t($t_id) {
		// init
		$ary_ret = array();

		$this->db->select('t_id,row,type,path');
		$query = $this->db->get_where('attachment',array('t_id' => $t_id));
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['type']][$val['row']] = $val['path'];
			}
		}

		return $ary_ret;
	}

	public function set_t($id = false, $method, $obj) {
		$ary_data = array();
		
		$mode_edit = false;
		if($method != 'post') {
			$mode_edit = true;
			$id = $obj->$method('id');
		}

		if($mode_edit) {
			$this->db->where(array('t_id' => $obj->$method('id')));
			$this->db->delete('attachment');
		}

		for($i=1; $i < 8; $i++) {
			for($j=0; $j < 2; $j++) {
				if($obj->$method('attachment_'.$i.'_'.$j)) {
					$data = array(
						't_id'	=> $id,
						'type'	=> $i,
						'row'	=> $j,
						'path'	=> $obj->$method('attachment_'.$i.'_'.$j)
					);
					array_push($ary_data, $data);
				}
			}
		}
		
		return $this->db->insert_batch('attachment',$ary_data);
	}
}