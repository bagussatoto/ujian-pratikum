<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('dashboard');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Akun';
			$this->load->view('auth/login-view', $data);
		} else {
			// validasi sukses
			$this->_login();
		}
	}


	private function _login()
	{
		$password = $this->input->post('password');
		$admin = $this->db->get_where('user', ['username' => $this->input->post('username')])->row_array();

		// cek username
		if ($admin) {
			// cek password
			if (password_verify($password, $admin['password'])) {
				$data = [
					'username' => $admin['username'],
					'password' => $admin['password'],
					'name' => $admin['name'],
					'role' => $admin['role']
				];

				$this->session->set_userdata($data);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Password salah </div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Username salah </div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil keluar!</div>');
		redirect('login');
	}
}
