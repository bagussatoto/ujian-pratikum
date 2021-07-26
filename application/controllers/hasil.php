<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_hasil');
        $this->load->model('model_lab');
        $this->load->model('model_mhs');
    }

    public function showdata_hasil()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Jawaban';
        $data['bc'] = 'Ujian Praktikum';
        $data['hasil'] = $this->model_hasil->show_hasil();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('hasil/hasil', $data);
        $this->load->view('main/footer');
    }

    public function hapus_hasil($kode)
    {
        $id = decrypt_url($kode);

        $show = $this->model_hasil->gethasilid($id);
        $file = $show['jawaban'];
        $dir = $show['folder'] . $file;
        if (file_exists($dir)) {
            unlink($dir);
        }

        $this->db->delete('hasil', ['id_jwb' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('hasil/showdata_hasil');
    }
}
