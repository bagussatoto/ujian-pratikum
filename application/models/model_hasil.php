<?php
class Model_hasil extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_mhs');
        $this->load->model('Model_matkul');
        $this->load->model('Model_kls');
    }

    public function getChart()
    {
        $query = $this->db->query("SELECT count(nama_token) as jumlah from hasil GROUP BY tgl");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function tgl()
    {
        $query = $this->db->query("SELECT tgl from hasil GROUP BY tgl");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function count_hasil()
    {
        return $this->db->count_all('hasil');
    }

    public function show_hasil()
    {
        $query = "SELECT * FROM hasil INNER JOIN mahasiswa ON mhs_id = id_mhs INNER JOIN lab ON lab_id = id_lab INNER JOIN matkul ON matkul_id = id_matkul ORDER BY hasil.TimeStamp ASC";
        return $this->db->query($query)->result_array();
    }

    public function gethasilid($kode)
    {
        $query = "SELECT * FROM hasil INNER JOIN mahasiswa ON mhs_id = id_mhs INNER JOIN lab ON lab_id = id_lab WHERE id_jwb = ' . $kode . ' ORDER BY hasil.TimeStamp ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_hasil()
    {
        $this->db->select('id_jwb');
        $this->db->order_by('id_jwb', 'DESC');
        $this->db->limit(1);
        return $this->db->get('hasil')->row_array();
    }

    public function storehasil()
    {
        $mtk = $this->input->post('nama_matkul');
        $kls = $this->input->post('nama_kls');
        $sesi = $this->input->post('nama_sesi');

        $mtk1 = $this->selectmatkul($mtk);
        $convert = (int)$mtk1;
        // var_dump($convert);
        // die;

        $kls1 = $this->selectkls($kls);

        $dir = './uploads/' . $mtk . '/' . $kls1 . '/sesi ' . $sesi . '/';
        // var_dump($dir);
        // die;

        $config['upload_path']          = $dir;
        $config['allowed_types']        = 'zip|rar';
        $config['file_name']            = $this->input->post('nrp') . '_' . $this->input->post('nama_mhs') . '_' . $kls1;
        $config['overwrite']            = TRUE;
        $config['max_size']            = 100000;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('jwb')) {
            $this->session->set_flashdata('submit', $this->upload->display_errors());
            $data['title'] = "Beranda";
            $this->load->view('form/beranda', $data);
        } else {
            $file = $this->upload->data();
            file_get_contents($file['full_path']);
            $upload = $this->upload->data('file_name');

            date_default_timezone_set("Asia/Jakarta");
            $tmp = date('d-m-Y H:i:s');
            $tgl = date('d-m-Y');

            $data1 = [
                'nrp' => $this->input->post('nrp'),
                'nama_mhs' => $this->input->post('nama_mhs'),
                'smt_id' => $this->input->post('nama_smt'),
                'kelas_id' => $this->input->post('nama_kls'),
                'sesi_id' => $this->input->post('nama_sesi'),
                'TimeStamp' => $tmp
            ];

            $data2 = [
                'lab_id' => $this->input->post('nama_lab'),
                'nama_token' => $this->input->post('token'),
                'mhs_id' => $this->last_mhs()['id_mhs'] + 1,
                'folder' => $dir,
                'matkul_id' => $mtk1,
                'jawaban' => $upload,
                'TimeStamp' => $tmp,
                'tgl' => $tgl
            ];

            if ($data2 != NULL) {
                $nrp = $this->get_mhs_keyword($this->input->post('nrp'));
                if ($nrp['nrp'] == $this->input->post('nrp')) {
                    $this->db->where('nrp', $nrp['nrp']);
                    $this->db->update('mahasiswa', $data1);

                    $data3 = [
                        'lab_id' => $this->input->post('nama_lab'),
                        'nama_token' => $this->input->post('token'),
                        'mhs_id' => $nrp['id_mhs'],
                        'folder' => $dir,
                        'matkul_id' => $mtk1,
                        'jawaban' => $upload,
                        'TimeStamp' => $tmp,
                        'tgl' => $tgl
                    ];

                    $this->db->insert('hasil', $data3);
                } else {
                    $this->db->insert('mahasiswa', $data1);
                    $this->db->insert('hasil', $data2);
                }

                $this->session->set_flashdata('submit', 'DIREKAM');
                $this->load->view('form/sukses');
            }
        }
    }

    public function selectkls($kls)
    {
        $ini = $this->Model_kls->show_kelas();
        foreach ($ini as $j) {
            if ($j['id_kls'] == $kls) {
                return $kls = $j['nama_kls'];
            }
        }
    }

    public function selectmatkul($mtk)
    {
        $ini = $this->Model_matkul->show_matkul();
        foreach ($ini as $j) {
            if ($j['kode'] == $mtk) {
                return $mtk = $j['id_matkul'];
            }
        }
    }

    public function get_mhs_keyword($keyword)
    {
        return $this->db->get_where('mahasiswa', array('nrp' => $keyword))->row_array();
    }

    public function last_mhs()
    {
        $this->db->select('id_mhs');
        $this->db->order_by('id_mhs', 'DESC');
        $this->db->limit(1);
        return $this->db->get('mahasiswa')->row_array();
    }
}
