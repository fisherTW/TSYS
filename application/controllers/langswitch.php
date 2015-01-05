<?php
class LangSwitch extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	function switchLanguage($language = '') {
		//echo 'LangSwitch=['.$language;
		$language = ($language == '') ? 'en' : $language;
		$this->session->set_userdata('site_lang', $language);
		//echo 'LangSwitch=['.$this->session->userdata('site_lang');

		redirect($_SERVER['HTTP_REFERER']);
	}
}