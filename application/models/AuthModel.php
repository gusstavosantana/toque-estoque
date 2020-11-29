<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

    public function checkIfAccountExists($email, $pass) {
        $this->db->select('*');
        $this->db->from('tb_loja');
        $this->db->where('email_loja', $email);
        $this->db->where('senha_loja', $pass);

        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getAccountData($email) {
        $this->db->select('*');
        $this->db->from('tb_loja');
        $this->db->where('email_loja', $email);

        $query = $this->db->get();

        return $query->result();
    }

}