<?php
class Model_matkul extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function count_matkul()
    {
        return $this->db->count_all('matkul');
    }

    public function show_matkul()
    {
        $query = "SELECT * FROM matkul ORDER BY nama_matkul ASC";
        return $this->db->query($query)->result_array();
    }

    public function getmatkulid($kode)
    {
        $query = "SELECT * FROM matkul WHERE id_matkul = " . $kode . " ORDER BY id_matkul ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_matkul()
    {
        $this->db->select('id_matkul');
        $this->db->order_by('id_matkul', 'DESC');
        $this->db->limit(1);
        return $this->db->get('matkul')->row_array();
    }

    public function storematkul()
    {
        $data = [
            'nama_matkul' => $this->input->post('nama_matkul'),
            'kode' => $this->input->post('kode')
        ];

        $this->db->insert('matkul', $data);
    }

    public function updatematkul($kode)
    {
        $data = [
            'nama_matkul' => $this->input->post('nama_matkul'),
            'kode' => $this->input->post('kode')
        ];

        $this->db->where('id_matkul', $kode);
        $this->db->update('matkul', $data);
    }
}
