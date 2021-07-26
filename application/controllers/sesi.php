<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sesi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_sesi');
    }

    public function showdata_sesi()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Sesi';
        $data['bc'] = 'Data Mahasiswa';
        $data['sesi'] = $this->model_sesi->show_sesi();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('sesi/sesi', $data);
        $this->load->view('main/footer');
    }

    public function store_sesi()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Sesi';
        $data['bc'] = 'Data Mahasiswa';
        $data['last'] = $this->model_sesi->last_sesi();

        $this->form_validation->set_rules('nama_sesi', 'sesi', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('sesi/tambah', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_sesi->storesesi();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('sesi/showdata_sesi');
        }
    }

    public function update_sesi($kode)
    {
        $id = decrypt_url($kode);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Sesi';
        $data['bc'] = 'Data Mahasiswa';
        $data['sesi'] = $this->model_sesi->getsesiid($id);

        $this->form_validation->set_rules('nama_sesi', 'sesi', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('sesi/update', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_sesi->updatesesi($id);
            $this->session->set_flashdata('flash', 'dirubah');
            redirect('sesi/showdata_sesi');
        }
    }

    public function hapus_sesi($kode)
    {
        $id = decrypt_url($kode);

        $this->db->delete('sesi', ['id_sesi' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('sesi/showdata_sesi');
    }
}
