<?php
class Model_lab extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function count_lab()
    {
        return $this->db->count_all('lab');
    }

    public function lab_1($tgl)
    {
        $query = "SELECT nama_lab,COUNT(lab_id) AS jumlah FROM hasil INNER JOIN lab ON lab_id = id_lab WHERE lab_id = 1 AND tgl = '$tgl'";
        return $this->db->query($query)->row_array();
    }
    public function lab_2($tgl)
    {
        $query = "SELECT nama_lab,COUNT(lab_id) AS jumlah FROM hasil INNER JOIN lab ON lab_id = id_lab WHERE lab_id = 2 AND tgl = '$tgl'";
        return $this->db->query($query)->row_array();
    }
    public function lab_3($tgl)
    {
        $query = "SELECT nama_lab,COUNT(lab_id) AS jumlah FROM hasil INNER JOIN lab ON lab_id = id_lab WHERE lab_id = 3 AND tgl = '$tgl'";
        return $this->db->query($query)->row_array();
    }
    public function lab_4($tgl)
    {
        $query = "SELECT nama_lab,COUNT(lab_id) AS jumlah FROM hasil INNER JOIN lab ON lab_id = id_lab WHERE lab_id = 4 AND tgl = '$tgl'";
        return $this->db->query($query)->row_array();
    }


    public function show_lab()
    {
        $query = "SELECT * FROM lab ORDER BY nama_lab ASC";
        return $this->db->query($query)->result_array();
    }

    public function getlabid($kode)
    {
        $query = "SELECT * FROM lab WHERE id_lab = " . $kode . " ORDER BY id_lab ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_lab()
    {
        $this->db->select('id_lab');
        $this->db->order_by('id_lab', 'DESC');
        $this->db->limit(1);
        return $this->db->get('lab')->row_array();
    }

    public function storelab()
    {
        $lab = $this->input->post('nama_lab');

        $this->db->insert('lab', ['nama_lab' => $lab]);
    }

    public function updatelab($kode)
    {
        $lab = $this->input->post('nama_lab');

        $this->db->where('id_lab', $kode);
        $this->db->update('lab', ['nama_lab' => $lab]);
    }
}
