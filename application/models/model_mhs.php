<?php
class Model_mhs extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function count_submit()
	{
		$query = "SELECT * FROM mahasiswa";
		return $this->db->query($query)->num_rows();
	}

	public function count_mhs()
	{
		$query = "SELECT * FROM mahasiswa GROUP BY nrp";
		return $this->db->query($query)->num_rows();
	}


	public function show_mhs()
	{
		$query = "SELECT * FROM mahasiswa INNER JOIN semester ON smt_id = id_smt INNER JOIN kelas ON kelas_id = id_kls INNER JOIN sesi ON sesi_id = id_sesi GROUP BY nrp ORDER BY mahasiswa.TimeStamp DESC";
		return $this->db->query($query)->result_array();
	}

	public function getmhsid($kode)
	{
		return $this->db->get_where('mahasiswa', ['id_mhs' => $kode])->row_array();
	}

	public function storemhs()
	{
		$data = [
			'nrp' => $this->input->post('nrp'),
			'nama_mhs' => $this->input->post('nama_mhs'),
			'smt_id' => $this->input->post('nama_smt'),
			'kelas_id' => $this->input->post('nama_kls'),
			'sesi_id' => $this->input->post('nama_sesi'),
			'TimeStamp' => $this->input->post('tmp')
		];

		$this->db->insert('mahasiswa', $data);
	}

	public function updatemhs($kode)
	{
		$data = [
			'nrp' => $this->input->post('nrp'),
			'nama_mhs' => $this->input->post('nama_mhs'),
			'smt_id' => $this->input->post('nama_smt'),
			'kelas_id' => $this->input->post('nama_kls'),
			'sesi_id' => $this->input->post('nama_sesi'),
			'TimeStamp' => $this->input->post('tmp')
		];

		$this->db->where('id_mhs', $kode);
		$this->db->update('mahasiswa', $data);
	}
}
