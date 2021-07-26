<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mhs extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_mhs');
		$this->load->model('Model_kls');
		$this->load->model('Model_sesi');
		$this->load->model('Model_smt');
		$this->load->model('Model_hasil');
		$this->load->library('form_validation');
	}


	public function showdata_mahasiswa()
	{
		if ($this->session->userdata('username') == NULL) {
			redirect('login');
		}

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title']    = 'Mahasiswa';
		$data['bc'] = 'Data Mahasiswa';
		$data['mahasiswa'] = $this->Model_mhs->show_mhs();

		$this->load->view('main/header', $data);
		$this->load->view('main/sidebar', $data);
		$this->load->view('main/topbar', $data);
		$this->load->view('mahasiswa/mahasiswa', $data);
		$this->load->view('main/footer');
	}

	public function store_mahasiswa()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title']    = 'Mahasiswa';
		$data['bc'] = 'Data Mahasiswa';
		$data['smt'] = $this->Model_smt->show_smt();
		$data['kls'] = $this->Model_kls->show_kelas();
		$data['sesi'] = $this->Model_sesi->show_sesi();
		$data['mahasiswa'] = $this->Model_hasil->last_mhs();

		$this->form_validation->set_rules('nrp', 'NRP', 'trim|required');
		$this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'trim|required');
		$this->form_validation->set_rules('nama_smt', 'Semester', 'trim|required');
		$this->form_validation->set_rules('nama_kls', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('nama_sesi', 'Sesi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('main/header', $data);
			$this->load->view('main/sidebar', $data);
			$this->load->view('main/topbar', $data);
			$this->load->view('mahasiswa/tambah', $data);
			$this->load->view('main/footer');
		} else {
			$this->Model_mhs->storemhs();
			$this->session->set_flashdata('flash', 'ditambahkan');
			redirect('mhs/showdata_mahasiswa');
		}
	}

	public function update_mahasiswa($kode)
	{
		$id = decrypt_url($kode);

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title']    = 'Mahasiswa';
		$data['bc'] = 'Data Mahasiswa';
		$data['smt'] = $this->Model_smt->show_smt();
		$data['kls'] = $this->Model_kls->show_kelas();
		$data['sesi'] = $this->Model_sesi->show_sesi();
		$data['mhs'] = $this->Model_mhs->getmhsid($id);
		$data['mahasiswa'] = $this->Model_mhs->last_mhs();

		$this->form_validation->set_rules('nrp', 'NRP', 'trim|required');
		$this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'trim|required');
		$this->form_validation->set_rules('nama_smt', 'Semester', 'trim|required');
		$this->form_validation->set_rules('nama_kls', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('nama_sesi', 'Sesi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('main/header', $data);
			$this->load->view('main/sidebar', $data);
			$this->load->view('main/topbar', $data);
			$this->load->view('mahasiswa/update', $data);
			$this->load->view('main/footer');
		} else {
			$this->Model_mhs->updatemhs($id);
			$this->session->set_flashdata('flash', 'dirubah');
			redirect('mhs/showdata_mahasiswa');
		}
	}

	public function hapus_mahasiswa($kode)
	{
		$id = decrypt_url($kode);

		$show = $this->Model_hasil->gethasilid($id);
		$mhs = $this->Model_mhs->getmhsid($id);
		$hsl = $this->Model_hasil->show_hasil();

		$file = $show['jawaban'];
		$dir = $show['folder'] . $file;
		if (file_exists($dir)) {
			unlink($dir);
		}

		foreach ($hsl as $s) {
			if ($s['nrp'] == $mhs['nrp']) {
				$this->db->delete('hasil', ['id_jwb' => $s['id_jwb']]);
			}
		}

		$this->db->delete('mahasiswa', ['nrp' => $mhs['nrp']]);
		$this->session->set_flashdata('flash', 'dihapus');
		redirect('mhs/showdata_mahasiswa');
	}
}
