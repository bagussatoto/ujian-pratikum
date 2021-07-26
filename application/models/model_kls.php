<?php
class Model_kls extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function count_kelas()
    {
        return $this->db->count_all('kelas');
    }

    public function show_kelas()
    {
        $query = "SELECT * FROM kelas ORDER BY nama_kls ASC";
        return $this->db->query($query)->result_array();
    }

    public function getkelasid($kode)
    {
        $query = "SELECT * FROM kelas WHERE id_kls = " . $kode . " ORDER BY id_kls ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_kelas()
    {
        $this->db->select('id_kls');
        $this->db->order_by('id_kls', 'DESC');
        $this->db->limit(1);
        return $this->db->get('kelas')->row_array();
    }

    public function storekelas()
    {
        $kls = $this->input->post('nama_kls');

        $this->db->insert('kelas', ['nama_kls' => $kls]);
    }

    public function updatekelas($kode)
    {
        $kls = $this->input->post('nama_kls');

        $this->db->where('id_kls', $kode);
        $this->db->update('kelas', ['nama_kls' => $kls]);
    }
}
