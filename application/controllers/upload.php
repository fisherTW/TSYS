<?php
/*
* File:			upload.php
* Version:		-
* Last changed:	2014/12/29
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2014
* Product:		TSYS
*/
class Upload extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	function index() {
	}

	function do_upload() {
		$ret = new stdClass();
		$ret->error = 'error!';

		$targetPath = dirname($_SERVER["SCRIPT_FILENAME"]).'/uploads/';
/*
print_r($_FILES);
Array
(
    [xxxx] => Array
        (
            [name] => 1237284094.jpg
            [type] => image/jpeg
            [tmp_name] => D:\wamp\tmp\php92CA.tmp
            [error] => 0
            [size] => 150821
        )

)
print_r($_POST);
Array
(
    [file_id] => 0
    [file_for] => cover_letter
    [func] => create
)
*/
		if (!empty($_FILES)) {
			foreach ($_FILES as $key => $val) {
				$ary_file = $val;
				//$tempFile = $_FILES['file_data'];
			}
			list($o_name, $o_ext) = explode('.', $ary_file['name']);
			$micro_date = microtime();
			$date_array = explode(" ",$micro_date);
			$date = date("Ymd_His_",$date_array[1]);
			$str_time = $date.intval($date_array[0] * 100);

			$tempFile = $ary_file['tmp_name'];
			$targetFile =  $targetPath. $str_time.'.'.$o_ext;
			move_uploaded_file($tempFile,$targetFile);
			$ret->new_name = $str_time.'.'.$o_ext;
			$ret->key_o = $key;
			$ret->key 	= str_replace('input_', '', $key);
			unset($ret->error);
		}

		echo json_encode($ret);
	}
}
?>