<?php

class model_myprofile extends CI_model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ubah()
    {
        $pwd = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = [
            'username' => $this->input->post('username'),
            'password' => $pwd,
            'role' => $this->input->post('role'),
            'foto' => $this->_uploadImage()
        ];

        $this->db->where('username', $this->input->post('username'));
        $this->db->update('user', $data);
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
}
