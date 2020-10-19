<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {
	public function __construct()  {
		parent::__construct();

		$this->load->model('RegisterModel');
	}
		
	public function index() {
		$this->load->view('register');
	}

	public function addUser() {
		$data['nome_loja'] = $this->input->post('nome_loja');
		$data['senha_loja'] = $this->input->post('senha_loja');
		$data['usuario_loja'] = $this->input->post('usuario_loja');

		if (!$this->RegisterModel->checkIfUserExists($data['usuario_loja'])) {
			$this->RegisterModel->addUser($data);
			
			echo json_encode([
				'status' => true,
				'location' => base_url('login')
			]);
		} else {
			echo json_encode(['status' => false]);
		}		
	}
}
