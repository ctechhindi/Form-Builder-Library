<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_controller 
{
    public function __construct() {
        parent::__construct();
        // set validation error template
        $theme = $this->session->userdata('theme');
        if($theme == "bootstrap3"){
           $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }else if( $theme == 'semantic2'){
            $this->form_validation->set_error_delimiters('<div class="ui pointing red basic label">', '</div>');
        }else{
           $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }
    }

    public function index()
    {
		$this->load->view('welcome_message');
    }

    public function form_inline()
    {
        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|max_length[50]|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'Full Name', 'trim|required|alpha_numeric|max_length[50]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|matches[password]|max_length[50]');
        $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|min_length[10]|max_length[10]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->set_layout->_home(['pageContant' => 'form_inline']);

        }else
        {
        }
    }

    public function form()
    {
        // $this->load->library('form_builder');
        $this->load->library('form_builder', 'login');

        $this->form_validation->set_rules('username', 'Username or email address', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('roles', 'Select Roles', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('lang', 'Select Language', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('accept_terms_checkbox', 'Read Terms Conditions', 'callback_accept_registration_terms',
            array('accept_registration_terms' => 'Read Terms Conditions and check box')
        );
        $this->form_validation->set_rules('multi_checkbox[]', 'Multi Select Checkbox', 'callback_multi_checkbox',
            array('multi_checkbox' => 'Multi Select Checkbox')
        );
        $this->form_validation->set_rules('radio', 'Read Terms Conditions', 'callback_radio',
            array('radio' => 'Please Select Radio')
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->set_layout->_home(['pageContant' => 'form',]);
        }else
        {
        }
    }


    public function accept_registration_terms() {
        if ($this->input->post('accept_terms_checkbox'))
            return TRUE;
        else
            return FALSE;
    }

    public function multi_checkbox() {
        if ($this->input->post('multi_checkbox[]'))
            return TRUE;
        else
            return FALSE;
    }

    public function radio() {
        if ($this->input->post('radio'))
            return TRUE;
        else
            return FALSE;
    }
}
