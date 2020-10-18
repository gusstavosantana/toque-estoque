<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public function checkIfAccountExists($username, $pass) {
        $this->db->select('*');
        $this->db->from('tb_loja');
        $this->db->where('usuario_loja', $username);
        $this->db->where('senha_loja', $pass);

        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getAccountData($username) {
        $this->db->select('*');
        $this->db->from('tb_loja');
        $this->db->where('usuario_loja', $username);

        $query = $this->db->get();

        return $query->result();
    }

}