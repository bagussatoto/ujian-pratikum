<?php
defined('BASEPATH') or exit('No direct script access allowed');

class token extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_token');
    }

    public function showdata_token()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Token';
        $data['bc'] = 'Ujian Praktikum';
        $data['token'] = $this->model_token->show_token();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('token/token', $data);
        $this->load->view('main/footer');
    }

    public function store_token()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Token';
        $data['bc'] = 'Ujian Praktikum';
        $data['last'] = $this->model_token->last_token();

        $this->form_validation->set_rules('nama_token', 'token', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('token/tambah', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_token->storetoken();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('token/showdata_token');
        }
    }

    public function update_token($kode)
    {
        $id = decrypt_url($kode);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Token';
        $data['bc'] = 'Ujian Praktikum';
        $data['token'] = $this->model_token->gettokenid($id);

        $this->form_validation->set_rules('nama_token', 'token', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('token/update', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_token->updatetoken($id);
            $this->session->set_flashdata('flash', 'dirubah');
            redirect('token/showdata_token');
        }
    }

    public function hapus_token($kode)
    {
        $id = decrypt_url($kode);

        $this->db->delete('token', ['id_token' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('token/showdata_token');
    }
}
