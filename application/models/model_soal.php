<?php
class Model_soal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function count_soal()
    {
        $query = "SELECT * FROM soal GROUP BY nama_soal";
        return $this->db->query($query)->num_rows();
    }

    public function getaktif()
    {
        $query = "SELECT * FROM soal WHERE status = 'aktif' ORDER BY nama_soal ASC";
        return $this->db->query($query)->row_array();
    }

    public function buka_soal()
    {
        $query = "SELECT * FROM soal WHERE status = 'aktif' ORDER BY nama_soal ASC";
        return $this->db->query($query)->result_array();
    }

    public function show_soal()
    {
        $query = "SELECT * FROM soal ORDER BY nama_soal ASC";
        return $this->db->query($query)->result_array();
    }

    public function getsoalid($id)
    {
        $query = "SELECT * FROM soal WHERE id_soal = " . $id . " ORDER BY id_soal ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_soal()
    {
        $this->db->select('id_soal');
        $this->db->order_by('id_soal', 'DESC');
        $this->db->limit(1);
        return $this->db->get('soal')->row_array();
    }

    public function dir1()
    {
        $folder = './soal/';
        $dir1 = $folder . $this->input->post('tanggal');
        return $dir1;
    }

    public function dir2()
    {
        $folder = './soal/';
        $dir1 = $folder . $this->input->post('tanggal');
        $dir2 = $dir1 . '/batch ' . $this->input->post('batch') . '/';

        return $dir2;
    }

    function storesoal()
    {
        $dir1 = $this->dir1();
        $dir2 = $this->dir2();

        mkdir($dir1);
        mkdir($dir2);


        $config['upload_path']          = $dir2;
        $config['allowed_types']        = 'doc|docx|pdf';
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;

        $this->load->library('upload', $config);

        $jumlah_soal = count($_FILES['nama_soal']['name']);
        for ($i = 0; $i < $jumlah_soal; $i++) {
            if (!empty($_FILES['nama_soal']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['nama_soal']['name'][$i];
                $_FILES['file']['type'] = $_FILES['nama_soal']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['nama_soal']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['nama_soal']['error'][$i];
                $_FILES['file']['size'] = $_FILES['nama_soal']['size'][$i];

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $data = [
                        'tanggal' => $this->input->post('tanggal'),
                        'folder_soal' => $dir2,
                        'nama_soal' => $uploadData['file_name'],
                        'status' => $this->input->post('status')
                    ];
                    $this->db->insert('soal', $data);
                }
            }
        }
    }

    public function updatesoal($kode)
    {
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'status' => $this->input->post('status')
        ];

        $this->db->where('id_soal', $kode);
        $this->db->update('soal', $data);
    }
}
