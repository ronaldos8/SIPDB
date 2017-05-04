<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('adminModel');
		$this->load->model('UserModel');
		$this->load->library('cart');
	}

	public function index($tab = NULL)
	{
		if ($this->session->has_userdata('id')) {
			$id = $this->session->userdata('id');
			$where['id_anggota'] = $id;
			$data['anggota'] = $this->adminModel->getRow('anggota', $where);

			$data['pinjaman'] = $this->UserModel->getPinjamanAnggota($this->session->userdata('id'));

			$data['cart'] = $this->cart->contents();

			$data['title'] = $data['anggota']->nama;
			$data['v_anggota'] = 'active';

			if ($tab == "peminjaman") {
				$data['v_peminjaman'] = "active";
			}else if ($tab == "keranjang") {
				$data['v_keranjang'] = "active";
			}else{
				$data['v_datadiri'] = "active";
			}
			$this->template->ShowUser('anggota', $data);
		}
		
	}

	function daftar()
	{
		$data['title'] = 'Daftar';
		$this->template->ShowUser('daftar', $data);
	}

	function masuk()
	{
		$uname = $this->input->post('user');
		$pass = md5($this->input->post('password'));
		$row = $this->UserModel->getLogin($uname, $pass);
		if ($row != NULL) {
			$nama = explode(" ", $row->nama);
			$array = array(
				'log' => TRUE,
				'nama' => $nama[0],
				'id' => $row->id_anggota
			);
			$this->session->set_userdata( $array );
			redirect(site_url('user'),'refresh');
		}else {
			echo "Login gagal. username atau password salah <a href='" .site_url() ."'>kembali</a>";
		}
	}

	function proses()
	{
		if (isset($_POST['table'])) {
			$table = $this->input->post('table');
			$req = $this->input->post('req');
			$sukses = $this->input->post('sukses');
			unset($_POST['table']);
			unset($_POST['req']);
			unset($_POST['sukses']);

			// mengenkripsi jika ada password yang dimasukan
			if (isset($_POST['password'])) {
				$_POST['password'] = md5($_POST['password']);
			}

			$r = $this->adminModel->insert($table, $_POST);
			if ($r > 0) {
				$status = "<div class='alert alert-success' role='alert'>$sukses</div>";
			}else {
				$status = "<div class='alert alert-danger' role='alert'>$table gagal diinputkan</div>";
			}
			$this->session->set_flashdata('status', $status);
			redirect(site_url($req),'refresh');
		}
	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect(site_url(),'refresh');
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */