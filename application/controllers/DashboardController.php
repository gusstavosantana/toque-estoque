<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	public function __construct()  {
		parent::__construct();
	}
		
	public function index() {
        if($this->session->userdata('id_loja')){
            $data['storeName'] = $this->session->userdata('nome_loja');

            $this->load->view('dashboard', $data);
        } else {
            redirect(base_url('login'));
        }
		
	}
}
