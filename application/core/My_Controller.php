<?php defined('BASEPATH') OR exit('No direct script access allowed');

class My_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

}