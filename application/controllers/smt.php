<?php
defined('BASEPATH') or exit('No direct script access allowed');

class smt extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_smt');
    }

    public function showdata_semester()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Semester';
        $data['bc'] = 'Data Mahasiswa';
        $data['semester'] = $this->model_smt->show_smt();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('semester/semester', $data);
        $this->load->view('main/footer');
    }

    public function store_semester()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Semester';
        $data['bc'] = 'Data Mahasiswa';
        $data['semester'] = $this->model_smt->last_smt();

        $this->form_validation->set_rules('nama_smt', 'Semester', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('semester/tambah', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_smt->storesmt();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('smt/showdata_semester');
        }
    }

    public function update_semester($kode)
    {
        $id = decrypt_url($kode);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Semester';
        $data['bc'] = 'Data Mahasiswa';
        $data['smt'] = $this->model_smt->getsmtid($id);
        $data['semester'] = $this->model_smt->last_smt();

        $this->form_validation->set_rules('nama_smt', 'Semester', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('semester/update', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_smt->updatesmt($id);
            $this->session->set_flashdata('flash', 'dirubah');
            redirect('smt/showdata_semester');
        }
    }

    public function hapus_semester($kode)
    {
        $id = decrypt_url($kode);

        $this->db->delete('semester', ['id_smt' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('smt/showdata_semester');
    }
}
