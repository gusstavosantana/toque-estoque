<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	public function __construct()  {
        parent::__construct();
        
        $this->load->model('DashboardModel');
	}
		
	public function index() {
        if($this->session->userdata('id_loja')){
            $data['storeName'] = $this->session->userdata('nome_loja');
            $data['inStock'] = 0;
            $data['ending'] = 0;
            $data['outOfStock'] = 0;

            $products = $this->DashboardModel->selectProducts($this->session->userdata('id_loja'));

            foreach ($products as $item) {
                if ($item->qtd_produto == 0) {
                    $data['outOfStock'] = $data['outOfStock'] + 1;
                } elseif ($item->qtd_produto > 0 && $item->qtd_produto <= 5) {
                    $data['ending'] = $data['ending'] + 1;
                } else {
                    $data['inStock'] = $data['inStock'] + 1;
                }
            }

            $this->load->view('dashboard', $data);
        } else {
            redirect(base_url('login'));
        }
    }
    
    public function selectProductsView() {
        if($this->session->userdata('id_loja')){
            $data['storeName'] = $this->session->userdata('nome_loja');
            $data['products'] = $this->DashboardModel->selectProducts($this->session->userdata('id_loja'));

            $this->load->view('dashboard-products', $data);
        } else {
            redirect(base_url('login'));
        }
    }

    public function insertProductView() {
        if($this->session->userdata('id_loja')){
            $data['storeName'] = $this->session->userdata('nome_loja');

            $this->load->view('dashboard-add-product', $data);
        } else {
            redirect(base_url('login'));
        }
    }

    public function insertProductDatabase() {
        $data['id_loja'] = $this->session->userdata('id_loja');
        $data['qtd_produto'] = $this->input->post('qtd_produto');
        $data['nome_produto'] = $this->input->post('nome_produto');
        $data['preco_produto'] = $this->input->post('preco_produto');
        $data['descricao_produto'] = $this->input->post('descricao_produto');

        $this->DashboardModel->insertProduct($data);

        echo json_encode([
            'location' => base_url('dashboard/products')
        ]);
    }

    public function updateProductView() {
        if($this->session->userdata('id_loja')){
            $data['storeName'] = $this->session->userdata('nome_loja');
            $data['product'] = $this->DashboardModel->selectProduct($this->uri->segment(3));

            $this->load->view('dashboard-edit-product', $data);
        } else {
            redirect(base_url('login'));
        }
    }

    public function updateProductDatabase() {
        $data['id_loja'] = $this->session->userdata('id_loja');
        $data['id_produto'] = $this->input->post('id_produto');
        $data['qtd_produto'] = $this->input->post('qtd_produto');
        $data['nome_produto'] = $this->input->post('nome_produto');
        $data['preco_produto'] = $this->input->post('preco_produto');
        $data['descricao_produto'] = $this->input->post('descricao_produto');

        $this->DashboardModel->updateProduct($data);

        echo json_encode([
            'location' => base_url('dashboard/products')
        ]);
    }

    function deleteProductDatabase() {
        $this->DashboardModel->deleteProduct($this->uri->segment(3));
    }
}
