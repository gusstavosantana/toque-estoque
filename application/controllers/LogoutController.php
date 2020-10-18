<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoutController extends CI_Controller {
	public function __construct()  {
		parent::__construct();
	}
		
	public function index() {
        $this->session->sess_destroy();

        redirect(base_url('login'));
	}
}
