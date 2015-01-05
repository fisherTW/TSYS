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
	
	public function get_teacher($id = FALSE) {
		$ary_ret = array();


		if($id === FALSE) {
			$query = $this->db->get('teacher');
			$ary_ret = $query->result_array();

			for($i=0; $i < count($ary_ret); $i++) {
				$ary_ret[$i]['country'] .= '[-S-]'.$this->ary_cou[$ary_ret[$i]['country']];
			}

			return $ary_ret;
		}
		$query = $this->db->get_where('teacher',array('id' => $id));
		return $query->row_array();
	}
	
	public function set_teacher() {
		$data = array(
			'title' => $this->input->post('title'),
			'country' => $this->input->post('country'),
			'text' => $this->input->post('text')
		);
		
		$this->db->insert('teacher',$data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_teacher($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('teacher', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		} 
	}
	
	public function del_teacher($id) {
		$this->db->where('id',$id);
		$this->db->delete('teacher');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

?>