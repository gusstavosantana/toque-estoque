<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	public function __construct()  {
		parent::__construct();

		$this->load->model('LoginModel');
	}

	public function index() {
		$this->load->view('login');
	}

	public function auth() {
		$data['usuario_loja'] = $this->input->post('usuario_loja');
		$data['senha_loja'] = $this->input->post('senha_loja');

		if ($this->LoginModel->checkIfAccountExists($data['usuario_loja'], $data['senha_loja'])) {
			$accountData = $this->LoginModel->getAccountData($data['usuario_loja']);

			foreach ($accountData as $item) {
				$sessionData['id_loja'] = $item->id_loja;
				$sessionData['nome_loja'] = $item->nome_loja;
				$sessionData['usuario_loja'] = $item->usuario_loja;
			}
			
			$this->session->set_userdata($sessionData);
			
			echo json_encode([
				'status' => true,
				'location' => base_url('dashboard')
			]);
		} else {
			echo json_encode(['status' => false]);
		}		
	}
}
