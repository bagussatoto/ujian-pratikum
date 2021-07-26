<?php
defined('BASEPATH') or exit('No direct script access allowed');

class soal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_soal');
        $this->load->model('Model_matkul');
    }

    public function showdata_soal()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Soal';
        $data['bc'] = 'Bank Soal';
        $data['soal'] = $this->Model_soal->show_soal();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('soal/daftar-soal', $data);
        $this->load->view('main/footer');
    }

    public function store_soal()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Data Soal';
        $data['bc'] = 'Bank Soal';
        $data['last'] = $this->Model_soal->last_soal();

        $this->form_validation->set_rules('tanggal', 'Tanggal Ujian', 'trim|required');
        $this->form_validation->set_rules('batch', 'Batch', 'trim|required');
        $this->form_validation->set_rules('status', 'Status Soal', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('soal/tambah', $data);
            $this->load->view('main/footer');
        } else {
            $this->Model_soal->storesoal();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('soal/showdata_soal');
        }
    }

    public function update_soal($kode)
    {
        $id = decrypt_url($kode);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Data Soal';
        $data['bc'] = 'Bank Soal';
        $data['last'] = $this->Model_soal->last_soal();
        $data['soal'] = $this->Model_soal->getsoalid($id);

        $this->form_validation->set_rules('tanggal', 'Tanggal Ujian', 'trim|required');
        $this->form_validation->set_rules('status', 'Status Soal', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('soal/update', $data);
            $this->load->view('main/footer');
        } else {
            $this->Model_soal->updatesoal($id);
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('soal/showdata_soal');
        }
    }

    public function hapus_soal($kode)
    {
        $id = decrypt_url($kode);

        $show = $this->Model_soal->getsoalid($id);
        $file = $show['nama_soal'];
        $dir = $show['folder_soal'] . $file;
        if (file_exists($dir)) {
            unlink($dir);
            rmdir($show['folder_soal']);
        }

        $this->db->delete('soal', ['id_soal' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('soal/showdata_soal');
    }

    public function soal()
    {
        $data['title'] = 'Batch Ujian';
        $data['folder'] = $this->Model_soal->getaktif();
        $data['soal'] = $this->Model_soal->buka_soal();
        $this->load->view('soal/soal', $data);
    }

    public function buka_soal($kode)
    {
        $no_soal = decrypt_url($kode);

        $data['title'] = 'Soal Ujian';
        $ini = $this->Model_soal->getsoalid($no_soal);
        $data['soal'] = $ini['folder_soal'] . $ini['nama_soal'];

        $this->load->view('soal/buka_soal', $data);
    }
}
