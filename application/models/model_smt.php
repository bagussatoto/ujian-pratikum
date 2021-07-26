<?php
class Model_smt extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function count_smt()
    {
        return $this->db->count_all('semester');
    }

    public function show_smt()
    {
        $query = "SELECT * FROM semester";
        return $this->db->query($query)->result_array();
    }

    public function getsmtid($kode)
    {
        $query = "SELECT * FROM semester WHERE id_smt = " . $kode . " ORDER BY nama_smt ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_smt()
    {
        $this->db->select('id_smt');
        $this->db->order_by('id_smt', 'DESC');
        $this->db->limit(1);
        return $this->db->get('semester')->row_array();
    }

    public function storesmt()
    {
        $smt = $this->input->post('nama_smt');

        $this->db->insert('semester', ['nama_smt' => $smt]);
    }

    public function updatesmt($kode)
    {
        $smt = $this->input->post('nama_smt');

        $this->db->where('id_smt', $kode);
        $this->db->update('semester', ['nama_smt' => $smt]);
    }
}
