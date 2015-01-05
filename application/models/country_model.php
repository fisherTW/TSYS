<?php
/*
* File:			country_model.php
* Version:		-
* Last changed:	2014/12/29
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2014
* Product:		TSYS
*/
class Country_model extends CI_Model {
	public function __construct() {
		$this->load->helper('file');
	}
	
	// return array
	public function get() {
		$ary_ret = array();

		$json = json_decode(read_file('./assets/json/country.json'));
		$ary_cou = $json->countries->country;

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val->countryCode] = $val->countryName;
			}
		}

		return $ary_ret;
	}
}