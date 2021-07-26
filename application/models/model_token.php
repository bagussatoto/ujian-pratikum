<?php

class model_token extends CI_model
{
    public function getToken($token)
    {
        return $this->db->get_where('token', ['nama_token' => $token])->row_array();
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function count_token()
    {
        return $this->db->count_all('token');
    }

    public function show_token()
    {
        $query = "SELECT * FROM token ORDER BY nama_token ASC";
        return $this->db->query($query)->result_array();
    }

    public function gettokenid($kode)
    {
        $query = "SELECT * FROM token WHERE id_token = " . $kode . " ORDER BY id_token ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_token()
    {
        $this->db->select('id_token');
        $this->db->order_by('id_token', 'DESC');
        $this->db->limit(1);
        return $this->db->get('token')->row_array();
    }

    public function storetoken()
    {
        $token = $this->input->post('nama_token');

        $this->db->insert('token', ['nama_token' => $token]);
    }

    public function updatetoken($kode)
    {
        $token = $this->input->post('nama_token');

        $this->db->where('id_token', $kode);
        $this->db->update('token', ['nama_token' => $token]);
    }
}
