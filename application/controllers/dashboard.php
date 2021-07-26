<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_mhs');
		$this->load->model('model_smt');
		$this->load->model('model_kls');
		$this->load->model('model_sesi');
		$this->load->model('model_hasil');
		$this->load->model('model_lab');
		$this->load->model('model_matkul');
		$this->load->model('model_folder');
		$this->load->model('model_soal');
	}

	public function index()
	{
		if ($this->session->userdata('username') == NULL) {
			redirect('login');
		}

		$data = [
			'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'title' => 'Dashboard',
			'mhs' => $this->model_mhs->count_mhs(),
			'sbt' => $this->model_mhs->count_submit(),
			'smt' => $this->model_smt->count_smt(),
			'kls' => $this->model_kls->count_kelas(),
			'sesi' => $this->model_sesi->count_sesi(),
			'jwb' => $this->model_hasil->count_hasil(),
			'lab' => $this->model_lab->count_lab(),
			'mtk' => $this->model_matkul->count_matkul(),
			'fd' => $this->model_folder->count_folder(),
			'ss' => $this->model_soal->count_soal(),
			'chart' => $this->model_hasil->getChart(),
			'tgl' => $this->model_hasil->tgl(),
			'lab1' => $this->model_lab->lab_1(date('d-m-Y')),
			'lab2' => $this->model_lab->lab_2(date('d-m-Y')),
			'lab3' => $this->model_lab->lab_3(date('d-m-Y')),
			'lab4' => $this->model_lab->lab_4(date('d-m-Y'))
		];

		$this->load->view('main/header', $data);
		$this->load->view('main/sidebar', $data);
		$this->load->view('main/topbar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('main/footer');
	}

	public function myprofile()
	{
		$data['title']    = 'Myprofile';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/myprofile', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Model_admin->ubah();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin_dashboard/myprofile');
		}
	}
}
