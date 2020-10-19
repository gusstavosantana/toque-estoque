<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {
    public function selectProducts($storeId) {
        $this->db->select('*');
        $this->db->from('tb_produto');
        $this->db->where('id_loja', $storeId);

        $query = $this->db->get();

        return $query->result();
    }

    public function insertProduct($data) {
        $this->db->insert('tb_produto', $data);
    }

    public function selectProduct($productId) {
        $this->db->select('*');
        $this->db->from('tb_produto');
        $this->db->where('id_produto', $productId);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateProduct($data) {
        $this->db->where('id_produto', $data['id_produto']);
        $this->db->update('tb_produto', $data);
    }

    function deleteProduct($productId) {
        $this->db->where('id_produto', $productId);
        $this->db->delete('tb_produto');
    }
}