<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('adminModel');
	}

	public function index()
	{
		$data['title'] = "Perpustakaan GIK";
		$data['jumlah_anggota'] = $this->db->count_all_results('anggota');
		if ($data['jumlah_anggota'] > 4) {
			$data['sisaAnggota'] = $data['jumlah_anggota'] - 4;
		}
		$data['jumlah_kategori'] = $this->db->count_all_results('jenis');
		$data['sisa'] = $data['jumlah_kategori'] - 6;
		$this->db->limit(6);
		$data['kategori'] = $this->adminModel->getAll('jenis');

		$this->db->limit(4);
		$data['anggota'] = $this->adminModel->getAll('anggota');

		// mengambil jenis buku yang terdapat di tabel buku
		$jenis = $this->adminModel->getJenisInBuku();
		$data['jenis'] = $jenis;
		foreach ($jenis as $value) {
			// mengambil buku berdasarkan jenis
			$data['buku'][$value->kd_jenis] = $this->adminModel->getBukubyJenis($value->kd_jenis);
		}

		$id = rand($this->adminModel->getMinIdBukuKarangan(), $this->adminModel->getMaxIdBukuKarangan());
		$data['inspirasi'] = $this->adminModel->getKaranganFullRow($id);

		$this->template->ShowUser("home", $data, TRUE);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */