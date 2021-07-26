<?php
defined('BASEPATH') or exit('No direct script access allowed');

class folder extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_folder');
        $this->load->model('model_matkul');
        $this->load->model('model_kls');
        $this->load->model('model_sesi');
    }

    public function showdata_folder()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Folder';
        $data['bc'] = 'Ujian Praktikum';
        $data['folder'] = $this->model_folder->show_folder();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('folder/folder', $data);
        $this->load->view('main/footer');
    }

    public function store_folder()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Folder';
        $data['bc'] = 'Ujian Praktikum';
        $data['last'] = $this->model_folder->last_folder();
        $data['kd'] = $this->model_matkul->show_matkul();
        $data['kls'] = $this->model_kls->show_kelas();
        $data['sesi'] = $this->model_sesi->show_sesi();

        $this->form_validation->set_rules('nama_folder', 'Mata Kuliah', 'trim|required');
        $this->form_validation->set_rules('nama_kls', 'Kelas', 'trim|required');
        $this->form_validation->set_rules('nama_sesi', 'Sesi', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('folder/tambah', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_folder->storefolder();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('folder/showdata_folder');
        }
    }

    public function update_folder($kode)
    {
        $id = decrypt_url($kode);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']    = 'Folder';
        $data['bc'] = 'Ujian Praktikum';
        $data['folder'] = $this->model_folder->getfolderid($id);
        $data['kd'] = $this->model_matkul->show_matkul();
        $data['kls'] = $this->model_kls->show_kelas();
        $data['sesi'] = $this->model_sesi->show_sesi();

        $this->form_validation->set_rules('nama_folder', 'Mata Kuliah', 'trim|required');
        $this->form_validation->set_rules('nama_kls', 'Kelas', 'trim|required');
        $this->form_validation->set_rules('nama_sesi', 'Sesi', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('folder/update', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_folder->updatefolder($id);
            $this->session->set_flashdata('flash', 'dirubah');
            redirect('folder/showdata_folder');
        }
    }

    public function hapus_folder($kode)
    {
        $id = decrypt_url($kode);

        $f = $this->model_folder->getfolderid($id);
        $open = "./uploads/";
        $dir = $open . $f['nama_folder'] . $f['kelas'] . $f['sesi'];
        $dir2 = $open . $f['nama_folder'] . $f['kelas'];
        $dir3 = $open . $f['nama_folder'];
        rmdir($dir);
        rmdir($dir2);
        rmdir($dir3);

        $this->db->delete('folder', ['id_folder' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('folder/showdata_folder');
    }
}
