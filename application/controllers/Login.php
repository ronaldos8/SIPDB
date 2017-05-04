<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('adminModel');
	}

	public function index()
	{
		//halaman login anggota
	}

	// berfungsi untuk menampilkan form login admin
	function admin()
	{
		$this->load->view('admin/login');
	}

	function proses_login()
	{
		$uname = $this->input->post('username');
		$pass = $this->input->post('password');
		$pass = md5($pass);
		$r = $this->adminModel->getLogin($uname, $pass);

		if ($r != NULL) {
			$array = array(
				'log' => TRUE,
				'nama' => $r->nama,
				'logID' => $r->ID
			);
			
			$this->session->set_userdata($array);

			redirect(site_url('admin'),'refresh');
		}else {
			$this->session->set_flashdata('status', 'Username atau password salah');

			redirect(site_url('login/admin'),'refresh');
		}
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */