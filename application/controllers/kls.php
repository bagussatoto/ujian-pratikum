<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kls extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_kls');
    }

    public function showdata_kelas()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Kelas';
        $data['bc'] = 'Data Mahasiswa';
        $data['kelas'] = $this->model_kls->show_kelas();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('kelas/kelas', $data);
        $this->load->view('main/footer');
    }

    public function store_kelas()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Kelas';
        $data['bc'] = 'Data Mahasiswa';
        $this->form_validation->set_rules('nama_kls', 'Kelas', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('kelas/tambah', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_kls->storekelas();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('kls/showdata_kelas');
        }
    }

    public function update_kelas($kode)
    {
        $id = decrypt_url($kode);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Kelas';
        $data['bc'] = 'Data Mahasiswa';
        $data['kelas'] = $this->model_kls->getkelasid($id);

        $this->form_validation->set_rules('nama_kls', 'Kelas', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('kelas/update', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_kls->updatekelas($id);
            $this->session->set_flashdata('flash', 'dirubah');
            redirect('kls/showdata_kelas');
        }
    }

    public function hapus_kelas($kode)
    {
        $id = decrypt_url($kode);

        $this->db->delete('kelas', ['id_kls' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('kls/showdata_kelas');
    }
}
