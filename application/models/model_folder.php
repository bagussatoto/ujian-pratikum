<?php
class Model_folder extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function count_folder()
    {
        return $this->db->count_all('folder');
    }

    public function show_folder()
    {
        $query = "SELECT * FROM folder ORDER BY nama_folder ASC";
        return $this->db->query($query)->result_array();
    }

    public function getfolderid($kode)
    {
        $query = "SELECT * FROM folder WHERE id_folder = " . $kode . " ORDER BY id_folder ASC";
        return $this->db->query($query)->row_array();
    }

    public function last_folder()
    {
        $this->db->select('id_folder');
        $this->db->order_by('id_folder', 'DESC');
        $this->db->limit(1);
        return $this->db->get('folder')->row_array();
    }

    public function storefolder()
    {
        $kls = '/' . $this->input->post('nama_kls') . '/';
        $sesi = '/sesi ' . $this->input->post('nama_sesi') . '/';
        $folder = $this->input->post('nama_folder');
        $data = [
            'nama_folder' => $folder,
            'kelas' =>  $kls,
            'sesi' => $sesi
        ];

        $this->db->insert('folder', $data);
        $open = "./uploads/";
        $dir =  $open . $folder;
        $dir2  = $open . $folder . $kls;
        $dir3  = $open . $folder . $kls . $sesi;
        mkdir($dir, true);
        mkdir($dir2, true);
        mkdir($dir3, true);
    }

    public function updatefolder($kode)
    {
        $f = $this->getfolderid($kode);
        $kls = '/' . $this->input->post('nama_kls') . '/';
        $sesi = '/sesi ' . $this->input->post('nama_sesi') . '/';
        $folder = $this->input->post('nama_folder');
        $data = [
            'nama_folder' => $folder,
            'kelas' =>  $kls,
            'sesi' => $sesi
        ];


        $open = "./uploads/";
        if (is_dir($open)) {
            if ($f['nama_folder'] != $folder && $f['kelas'] != $kls && $f['sesi'] != $sesi) {
                $this->db->where('id_folder', $kode);
                $this->db->update('folder', $data);
                $dir = $open . $folder;
                $dir2 = $open . $folder . $kls;
                $dir3 = $open . $folder . $kls . $sesi;
                mkdir($dir, true);
                mkdir($dir2, true);
                mkdir($dir3, true);
            } elseif ($f['kelas'] != $kls) {
                $this->db->where('id_folder', $kode);
                $this->db->update('folder', $data);
                $dir = $open . $folder;
                $dir2 = $open . $f['nama_folder'] . $f['kelas'] . $f['sesi'];
                $dir3 = $open . $f['nama_folder'] . $f['kelas'];
                $dir4 = $open . $f['nama_folder'] . $kls . $sesi;
                mkdir($dir, true);
                rmdir($dir2);
                rmdir($dir3);
                mkdir($dir4, true);
            } elseif ($f['sesi'] != $sesi) {
                $this->db->where('id_folder', $kode);
                $this->db->update('folder', $data);
                $dir = $open . $folder;
                $dir2 = $open . $f['nama_folder'] . $f['kelas'] . $f['sesi'];
                $dir3 = $open . $f['nama_folder'] . $f['kelas'] . $sesi;
                mkdir($dir, true);
                rmdir($dir2);
                mkdir($dir3, true);
            } elseif ($f['nama_folder'] != $folder) {
                $this->db->where('id_folder', $kode);
                $this->db->update('folder', $data);
                $dir = $open . $f['nama_folder'] . $f['kelas'] . $f['sesi'];
                $dir2 = $open . $f['nama_folder'] . $f['kelas'];
                $dir3 = $open . $f['nama_folder'];
                $dir4 = $open . $folder;
                $dir5 = $open . $folder . $f['kelas'];
                $dir6 = $open . $folder . $f['kelas'] . $f['sesi'];
                rmdir($dir);
                rmdir($dir2);
                rmdir($dir3);
                mkdir($dir4);
                mkdir($dir5);
                mkdir($dir6);
            }
        }
    }
}
