<?php
class Model_sesi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function count_sesi()
    {
        return $this->db->count_all('sesi');
    }

    public function show_sesi()
    {
        $query = "SELECT * FROM sesi ORDER BY nama_sesi ASC";
        return $this->db->query($query)->result_array();
    }

    public function getsesiid($kode)
    {
        return $this->db->get_where('sesi', ['id_sesi' => $kode])->row_array();
    }

    public function last_sesi()
    {
        $this->db->select('id_sesi');
        $this->db->order_by('id_sesi', 'DESC');
        $this->db->limit(1);
        return $this->db->get('sesi')->row_array();
    }

    public function storesesi()
    {
        $sesi = $this->input->post('nama_sesi');

        $this->db->insert('sesi', ['nama_sesi' => $sesi]);
    }

    public function updatesesi($kode)
    {
        $sesi = $this->input->post('nama_sesi');

        $this->db->where('id_sesi', $kode);
        $this->db->update('sesi', ['nama_sesi' => $sesi]);
    }
}
