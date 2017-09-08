<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!class_exists('My_Controller')) {
    require_once FCPATH.'application/core/My_Controller.php';
}

class Welcome extends My_controller 
{
	public function __construct() {
	    parent::__construct();
	}

	public function index()
	{
		$this->set_layout->_home([
		    'pageContant' => 'welcome_message',
		]);
	}

	public function change_theme()
	{
		$theme =  $this->input->get('theme');

		$this->session->set_userdata('theme', $theme);
	}
}
