<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->CI =& get_instance();

if(empty($this->CI->session->userdata('theme'))) {
    $theme = "bootstrap4";
}else{
    $theme = $this->CI->session->userdata('theme');
}




$config['all'] = [
    'theme' => 'bootstrap3', // bootstrap4, semantic2 , by default set bootstrap3
    // 'class' => FALSE,
    'label' => [
        'class' => false,
        'for' => False,
    ],
];


$config['login'] = [
    'theme' => $theme, // bootstrap3, bootstrap4, semantic2
    'class' => TRUE,
    'name' => TRUE,
    'id' => TRUE,
    'placeholder' => TRUE,
    'required' => TRUE,
    // 'group' => False, // by default TRUE
    // 'error_class' => False, // by default TRUE
    // 'error_text' => False, // by default TRUE
    'label' => [
        'class' => TRUE,
        'for' => TRUE,
    ],
];