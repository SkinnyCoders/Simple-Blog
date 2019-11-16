<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_auth extends CI_Model
{
    public function addUser($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    public function cekUser()
    {
        $query = $this->db->get_where('tb_user', ['email' => $this->input->post('email')]);
        return $query->row_array();
    }
}
