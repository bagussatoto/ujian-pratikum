<?php

class model_admin extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('encrypt');
    }

    public function tambahAdmin()
    {
        $data = [
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 2
        ];

        $this->db->insert('user', $data);
    }

    public function _uploadImage()
    {
        $data = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('username');
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            return $data['foto'];
        } else {
            $image_data = $this->upload->data();
            file_get_contents($image_data['full_path']);
            $img = $this->upload->data('file_name');
            return $img;
        }
    }

    public function ubah()
    {

        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $gmb = $this->_uploadImage();

        $data = [
            'username' => $username,
            'password' => $password,
            'role' => $this->input->post('role'),
            'foto' => $gmb
        ];

        $this->db->where('username', $username);
        $this->db->update('user', $data);
    }
}
