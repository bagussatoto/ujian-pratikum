<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_mhs');
        $this->load->model('Model_smt');
        $this->load->model('Model_kls');
        $this->load->model('Model_sesi');
        $this->load->model('Model_lab');
        $this->load->model('Model_hasil');
        $this->load->model('Model_token');
        $this->load->model('Model_matkul');
        $this->load->model('Model_soal');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['status'] = $this->Model_soal->getaktif();

        $this->load->view('form/beranda', $data);
    }

    public function form()
    {
        $data['title'] = 'Formulir';
        $data['semester'] = $this->Model_smt->show_smt();
        $data['kelas'] = $this->Model_kls->show_kelas();
        $data['sesi'] = $this->Model_sesi->show_sesi();
        $data['lab'] = $this->Model_lab->show_lab();
        $data['mtk'] = $this->Model_matkul->show_matkul();

        $this->form_validation->set_rules('token', 'Token', 'trim|required');
        $this->form_validation->set_rules('nrp', 'NRP', 'trim|required');
        $this->form_validation->set_rules('nama_mhs', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('nama_smt', 'Semester', 'trim|required');
        $this->form_validation->set_rules('nama_kls', 'Kelas', 'trim|required');
        $this->form_validation->set_rules('nama_sesi', 'Sesi', 'trim|required');
        $this->form_validation->set_rules('nama_lab', 'Laboratorium', 'trim|required');
        $this->form_validation->set_rules('nama_matkul', 'Mata Kuliah', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('form/form', $data);
        } else {
            $this->Model_hasil->storehasil();
        }
    }

    public function getValToken()
    {
        $token = $this->Model_token->getToken($this->input->post('token'));
        echo json_encode($token);
    }
}
