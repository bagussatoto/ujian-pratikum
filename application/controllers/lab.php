<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lab extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_lab');
    }

    public function showdata_lab()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Laboratorium';
        $data['bc'] = 'Ujian Praktikum';
        $data['lab'] = $this->model_lab->show_lab();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('lab/lab', $data);
        $this->load->view('main/footer');
    }

    public function store_lab()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Laboratorium';
        $data['bc'] = 'Ujian Praktikum';
        $data['last'] = $this->model_lab->last_lab();

        $this->form_validation->set_rules('nama_lab', 'lab', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('lab/tambah', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_lab->storelab();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('lab/showdata_lab');
        }
    }

    public function update_lab($kode)
    {
        $id = decrypt_url($kode);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Laboratorium';
        $data['bc'] = 'Ujian Praktikum';
        $data['lab'] = $this->model_lab->getlabid($id);

        $this->form_validation->set_rules('nama_lab', 'lab', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('lab/update', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_lab->updatelab($id);
            $this->session->set_flashdata('flash', 'dirubah');
            redirect('lab/showdata_lab');
        }
    }

    public function hapus_lab($kode)
    {
        $id = decrypt_url($kode);

        $this->db->delete('lab', ['id_lab' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('lab/showdata_lab');
    }
}
