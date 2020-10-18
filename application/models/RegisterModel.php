<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {

    public function addUser($data) {
        $this->db->insert('tb_loja', $data);
    }

    public function checkIfUserExists($username) {
        $this->db->select('*');
        $this->db->from('tb_loja');
        $this->db->where('usuario_loja', $username);

        $query = $this->db->get();

        return $query->num_rows();
    }

}