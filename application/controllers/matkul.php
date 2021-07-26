<?php
defined('BASEPATH') or exit('No direct script access allowed');

class matkul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_matkul');
    }

    public function showdata_matkul()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Mata Kuliah';
        $data['bc'] = 'Ujian Praktikum';
        $data['matkul'] = $this->model_matkul->show_matkul();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('matkul/matkul', $data);
        $this->load->view('main/footer');
    }

    public function store_matkul()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Mata Kuliah';
        $data['bc'] = 'Ujian Praktikum';
        $data['last'] = $this->model_matkul->last_matkul();

        $this->form_validation->set_rules('nama_matkul', 'Mata Kuliah', 'trim|required');
        $this->form_validation->set_rules('kode', 'Kode Mata Kuliah', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('matkul/tambah', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_matkul->storematkul();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('matkul/showdata_matkul');
        }
    }

    public function update_matkul($kode)
    {
        $id = decrypt_url($kode);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Mata Kuliah';
        $data['bc'] = 'Ujian Praktikum';
        $data['matkul'] = $this->model_matkul->getmatkulid($id);

        $this->form_validation->set_rules('nama_matkul', 'Mata Kuliah', 'trim|required');
        $this->form_validation->set_rules('kode', 'Kode Mata Kuliah', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('matkul/update', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_matkul->updatematkul($kode);
            $this->session->set_flashdata('flash', 'dirubah');
            redirect('matkul/showdata_matkul');
        }
    }

    public function hapus_matkul($kode)
    {
        $id = decrypt_url($kode);

        $this->db->delete('matkul', ['id_matkul' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('matkul/showdata_matkul');
    }
}
