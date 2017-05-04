<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('adminModel');
		$this->load->model('UserModel');
		$this->load->library('pagination');
		$this->load->library('cart');
	}

	public function index($kd_jenis = 0, $offset = 0)
	{
		$data['kd_jenis'] = $kd_jenis;
		$data['v_buku'] = 'active'; //mengaktifkan menu halaman buku
		if ($kd_jenis == 0) {
			$data['buku'] = $this->adminModel->getKaranganFull($offset, 6);
			$numrow = count((array)$this->adminModel->getKaranganFull());
			$data['title'] = "Semua Buku";
		}else {
			$data['buku'] = $this->adminModel->getKaranganFullByJenis($kd_jenis, $offset, 6);
			$numrow = count((array)$this->adminModel->getKaranganFullByJenis($kd_jenis));
			$where['kd_jenis'] = $kd_jenis;
			$r = $this->adminModel->getRow("jenis", $where);
			if ($r != NULL) {
				$data['title'] = $r->jenis_buku;
			}else {
				$data['title'] = "Kategori buku tidak ada";
			}
		}

		/*----------------- PAGINATION PAGE-----------------------------------------------*/
		// pagination
		$config['base_url'] = site_url("buku/index/$kd_jenis/");
		$config['total_rows'] = $numrow;
		$config['per_page'] = 6;
		$config['uri_segment'] = 4;

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";

		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";

		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";

		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";

		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";

		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";

		$config['cur_tag_open'] = "<li class='active'><a><b>";
		$config['cur_tag_close'] = "</b></a></li>";

		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';

		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		/*----------------- PAGINATION PAGE-----------------------------------------------*/
		// mengambil jenis buku yang terdapat di tabel buku
		$data['jenis'] = $this->adminModel->getJenisInBuku();
		$this->template->ShowUser('buku', $data);
	}

	function detail($kd_karangan = NULL)
	{
		if ($kd_karangan != NULL) {
			$data['buku'] = $this->adminModel->getKaranganFullRow($kd_karangan);
			$data['v_buku'] = 'active';
			$data['title'] = $data['buku']->judul;
			$this->template->ShowUser('detailBuku', $data);
		}
	}

	function pinjam()
	{
		if (isset($_POST['jaminan'])) {
			$data['tgl_pinjam'] = date("Y-m-d");
			$data['id_anggota'] = $this->session->userdata('id');
			$data['kd_karangan'] = $_POST['kd_karangan'];
			$data['jaminan'] = $_POST['jaminan'];

			$r = $this->adminModel->insert("pinjaman", $data);
			if ($r > 0) {
				$this->UserModel->updateStokBuku($data['kd_karangan'], '-', $r);
				$status = "<div class='alert alert-success' role='alert'>Peminjaman Berhasil. silahkan datang ke perpustakaan dengan membawa bukti nomor peminjaman</div>";
			}else {
				$status = "<div class='alert alert-danger' role='alert'>Peminjaman gagal. silahkan coba lagi</div>";
			}

			if (isset($_POST['rowid'])) {
				$this->hapusKeranjang($_POST['rowid']);
				unset($_POST['rowid']);
			}
			
			$this->session->set_flashdata('status', $status);
			redirect(site_url('user/index/peminjaman'),'refresh');
		}
	}

	function kembalikan($kd_karangan = NULL)
	{
		if ($kd_karangan != NULL) {
			$data['kd_karangan'] = $kd_karangan;
			$data['id_anggota'] = $this->session->userdata('id');
			$r = $this->adminModel->delete('pinjaman', $data);
			if ($r > 0) {
				$this->UserModel->updateStokBuku($kd_karangan, '+', $r);
				$status = "<div class='alert alert-success' role='alert'>Buku berhasil dikembalikan</div>";
			}else {
				$status = "<div class='alert alert-danger' role='alert'>Pengembalian buku gagal. silahkan coba lagi</div>";
			}
			$this->session->set_flashdata('status', $status);
			redirect(site_url('user/index/peminjaman'),'refresh');
		}
	}

	function tambahKeranjang($kd_karangan = NULL)
	{
		if ($kd_karangan != NULL) {
			$buku = $this->adminModel->getKaranganFullRow($kd_karangan);
			$data = array(
			        'id'      => $buku->kd_karangan,
			        'qty'     => 1,
			        'price'   => 0,
			        'name'    => $buku->judul,
			        'gambar' => $buku->gambar,
			        'penulis' => $buku->penulis
			);
			$r = $this->cart->insert($data);
			if ($r == TRUE) {
				$status = "<div class='alert alert-success' role='alert'>Buku berhasil disimpan kedalam keranjang. <a href='" .site_url('user/index/keranjang') ."'>Lihat</a></div>";
			}else {
				$status = "<div class='alert alert-danger' role='alert'>Buku gagal disimpan kedalam keranjang. silahkan coba lagi</div>";
			}
			$this->session->set_flashdata('status', $status);
			redirect(site_url("buku/detail/$buku->kd_karangan"),'refresh');
		}
	}

	function hapusKeranjang($rowid = NULL, $rdr = TRUE)
	{
		if ($rowid != NULL) {
			$this->cart->remove($rowid);
		}
		if ($rdr == TRUE) {
			$status = "<div class='alert alert-success' role='alert'>Buku berhasil dihapus dari keranjang.</div>";
			$this->session->set_flashdata('status', $status);
			redirect(site_url('user/index/keranjang'),'refresh');
		}
	}

}

/* End of file buku.php */
/* Location: ./application/controllers/buku.php */