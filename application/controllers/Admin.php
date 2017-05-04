<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('adminModel');
		$this->load->library('template');
		$this->load->library('pagination');

		if ($this->session->has_userdata('log')) {
			if ($this->session->userdata('log') != TRUE) {
				redirect(site_url('login/admin'),'refresh');
			}
		}else {
			redirect(site_url('login/admin'),'refresh');
		}
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['v_beranda'] = 'active';
		$data['nama'] = $this->session->userdata('nama');
		$this->template->ShowAdmin('beranda', $data);
	}

	/*-----------------------------------------HALAMAN KATEGORI--------------------------------------------------*/

	// untuk menampilkan halaman kategori buku
	function kategori($offset=0)
	{
		$data['title'] = 'Kategori Buku'; //judul halaman
		$data['v_kategori'] = 'active'; //mengaktifkan menu halaman kategori buku
		$data['nama'] = $this->session->userdata('nama'); //untuk mengisi nama user yang login

		/*----------------- PAGINATION PAGE-----------------------------------------------*/
		$s = $this->db->get('jenis');
		$numrow = $s->num_rows();
		$data['kategori'] = $this->db->get('jenis', 6, $offset)->result(); //mengambil data dari tabel jenis
		// pagination
		$config['base_url'] = site_url('admin/kategori/');
		$config['total_rows'] = $numrow;
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;

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
		$this->template->ShowAdmin('kategori', $data);
	}

	function editkategori($id)
	{
		$wh['kd_jenis'] = $id;
		$r = $this->adminModel->getRow('jenis', $wh); //mengambil data jenis buku berdasarkan id (kd_jenis)
		$data['title'] = $r->jenis_buku;
		$data['nama'] = $this->session->userdata('nama');
		$data['v_kategori'] = 'active';
		$data['kategori'] = $r;

		$this->template->ShowAdmin('editkategori', $data);
	}

	/*-----------------------------------------BATAS HALAMAN KATEGORI--------------------------------------------------*/

	/*--------------------------------------------- HALAMAN PENULIS --------------------------------------------------*/
	// untuk menampilkan halaman data buku
	function buku($offset = 0)
	{
		$data['title'] = 'Buku'; //judul halaman
		$data['v_buku'] = 'active'; //mengaktifkan menu halaman data buku
		$data['nama'] = $this->session->userdata('nama'); //untuk mengisi nama user yang login
		
		$data['no'] = $offset+1;

		/*----------------- PAGINATION PAGE-----------------------------------------------*/
		$s = $this->db->get('buku');
		$numrow = $s->num_rows();
		$data['buku'] = $this->adminModel->getBukuFull($offset, 5);
		// pagination
		$config['base_url'] = site_url('admin/buku/');
		$config['total_rows'] = $numrow;
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

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

		$this->template->ShowAdmin('buku', $data);
	}

	function tambahbuku()
	{
		$data['title'] = 'Buku'; //judul halaman
		$data['v_buku'] = 'active'; //mengaktifkan menu halaman data buku
		$data['nama'] = $this->session->userdata('nama'); //untuk mengisi nama user yang login
		$data['jenis'] = $this->adminModel->getAll("jenis"); // mengambil data kategori buku
		$data['penerbit'] = $this->adminModel->getAll("penerbit"); //mengambil data penerbit

		$this->template->ShowAdmin('tambahbuku', $data);
	}

	function prosesBuku()
	{
		$desk_buku['deskripsi'] = $this->input->post('deskripsi');
		$desk_buku['kondisi'] = $this->input->post('kondisi');
		unset($_POST['deskripsi']);
		unset($_POST['kondisi']);

		//menambahkan data buku kedalam tabel buku
		$r = $this->adminModel->insert('buku', $_POST);

		if ($r > 0) {
			$id = $this->adminModel->getMaxId("buku", "no_buku");

			// mengubah nama file yang diupload
			$namafile = "cover$id";

			//mengupload foto
			$config['upload_path']          = './cover/';
	        $config['allowed_types']        = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
	        $config['max_size']             = 10240;
	        $config['file_name']			= $namafile;
	        $config['overwrite']			= TRUE;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('gambar'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	                // mencetak error
	                print_r($error);
	        }
	        else
	        {
				$data = array('upload_data' => $this->upload->data());
				$desk_buku['gambar'] = $data['upload_data']['file_name'];
				$desk_buku['no_buku'] = $id;

				// menambahkan data kedalam tabel deskripsi_buku
				$r = $this->adminModel->insert("deskripsi_buku", $desk_buku);
				if ($r > 0) {
					$status = "<div class='alert alert-success' role='alert'>Buku berhasil diinputkan</div>";
				}else {
					$status = "<div class='alert alert-danger' role='alert'>Cover gagal diinputkan</div>";
				}
	        }
		}else {
			$status = "<div class='alert alert-danger' role='alert'>Buku gagal diinputkan</div>";
		}

		$this->session->set_flashdata('status', $status);
		redirect(site_url('admin/buku'),'refresh');
	}

	function lihatBuku($id)
	{
		$r = $this->adminModel->getBukuFullRow($id);
		$data['title'] = $r->judul; //judul halaman
		$data['v_buku'] = 'active'; //mengaktifkan menu halaman buku
		$data['nama'] = $this->session->userdata('nama'); //untuk mengisi nama user yang login
		$data['buku'] = $r;
		$this->template->ShowAdmin('lihatBuku', $data);
	}

	function editBuku($id)
	{
		$r = $this->adminModel->getBukuFullRow($id);
		$data['title'] = $r->judul; //judul halaman
		$data['v_buku'] = 'active'; //mengaktifkan menu halaman buku
		$data['nama'] = $this->session->userdata('nama'); //untuk mengisi nama user yang login
		$data['buku'] = $r;
		$data['jenis'] = $this->adminModel->getAll('jenis');
		$data['penerbit'] = $this->adminModel->getAll('penerbit');
		$this->template->ShowAdmin('editBuku', $data);
	}

	function updateBuku()
	{
		$desk_buku['deskripsi'] = $this->input->post('deskripsi');
		$desk_buku['kondisi'] = $this->input->post('kondisi');
		unset($_POST['deskripsi']);
		unset($_POST['kondisi']);

		//mengupdate data buku pada tabel buku
		$where['no_buku'] = $_POST['no_buku'];
		$r = $this->adminModel->update("buku", $where, $_POST);

		$id = $_POST['no_buku'];

        if ($_FILES['gambar']['size'] > 0) {
			// mengubah nama file yang diupload
			$namafile = "cover$id";

			//mengupload foto
			$config['upload_path']          = './cover/';
	        $config['allowed_types']        = 'gif|jpg|png|GIF|JPG|JPEG|PNG';
	        $config['max_size']             = 10240;
	        $config['file_name']			= $namafile;
	        $config['overwrite']			= TRUE;

	        $this->load->library('upload', $config);

        	if ( ! $this->upload->do_upload('gambar'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	                // mencetak error
	                print_r($error);
	        }
	        else
	        {
				$data = array('upload_data' => $this->upload->data());
				$desk_buku['gambar'] = $data['upload_data']['file_name'];
				$desk_buku['no_buku'] = $id;

				// menambahkan data kedalam tabel deskripsi_buku
				$r = $this->adminModel->update("deskripsi_buku", $where ,$desk_buku);
				$status = "<div class='alert alert-success' role='alert'>Buku berhasil diupdate</div>";
	        }
        }else {
        	$r = $this->adminModel->update("deskripsi_buku", $where ,$desk_buku);
        	$status = "<div class='alert alert-success' role='alert'>Buku berhasil diupdate</div>";
        }

		$this->session->set_flashdata('status', $status);
		redirect(site_url('admin/buku'),'refresh');
	}

	function hapusBuku($id)
	{
		$where['no_buku'] = $id;
		$r = $this->adminModel->getRow("deskripsi_buku", $where);
		$namafile = $r->gambar;
		$path = "./cover/$namafile";
		if (unlink($path)) {
			$err = 0;

			// menghapus data buku di tabel deskripsi_buku
			$r = $this->adminModel->delete("deskripsi_buku", $where);
			if ($r < 1) {
				$err++;
			}

			// menghapus data buku di tabel buku
			$r = $this->adminModel->delete("buku", $where);
			if ($r < 1) {
				$err++;
			}

			if ($err == 0) {
				$status = "<div class='alert alert-success' role='alert'>Buku berhasil dihapus</div>";
			}else {
				$status = "<div class='alert alert-danger' role='alert'>Buku gagal dihapus</div>";
			}
		}else $status = "<div class='alert alert-danger' role='alert'>Buku gagal dihapus</div>";

		$this->session->set_flashdata('status', $status);
		redirect(site_url('admin/buku'),'refresh');
	}
	/*-----------------------------------------BATAS HALAMAN BUKU--------------------------------------------------*/

	/*--------------------------------------------- HALAMAN PENULIS --------------------------------------------------*/
	// untuk menampilkan halaman penulis
	function penulis($offset=0)
	{
		$data['title'] = 'Penulis'; //judul halaman
		$data['v_penulis'] = 'active'; //mengaktifkan menu halaman penulis
		$data['nama'] = $this->session->userdata('nama'); //untuk mengisi nama user yang login
		$data['counter'] = $offset + 1; //penomoran pada tabel

		/*----------------- PAGINATION PAGE-----------------------------------------------*/
		$s = $this->db->get('penulis');
		$numrow = $s->num_rows();
		$data['penulis'] = $this->db->get('penulis', 5, $offset)->result(); //mengambil data dari tabel penulis
		// pagination
		$config['base_url'] = site_url('admin/penulis/');
		$config['total_rows'] = $numrow;
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

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
		
		$this->template->ShowAdmin('penulis', $data);
	}

	function editPenulis($id)
	{
		$wh['kd_penulis'] = $id;
		$r = $this->adminModel->getRow('penulis', $wh); //mengambil data penulis buku berdasarkan id (kd_penulis)
		$data['title'] = $r->penulis;
		$data['nama'] = $this->session->userdata('nama');
		$data['v_penulis'] = 'active';
		$data['penulis'] = $r;

		$this->template->ShowAdmin('editPenulis', $data);
	}
	/*--------------------------------------- BATAS HALAMAN PENULIS --------------------------------------------------*/

	/*--------------------------------------------- HALAMAN PENERBIT --------------------------------------------------*/
	// untuk menampilkan halaman penerbit
	function penerbit($offset=0)
	{
		$data['title'] = "Penerbit";
		$data['nama'] = $this->session->userdata('nama');
		$data['v_penerbit'] = 'active';
		$data['counter'] = $offset + 1; //penomoran pada tabel

		/*----------------- PAGINATION PAGE-----------------------------------------------*/
		$s = $this->db->get('penerbit');
		$numrow = $s->num_rows();
		$data['penerbit'] = $this->db->get('penerbit', 5, $offset)->result(); //mengambil data dari tabel penerbit
		// pagination
		$config['base_url'] = site_url('admin/penerbit/');
		$config['total_rows'] = $numrow;
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

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

		$this->template->ShowAdmin('penerbit', $data);
	}

	function editPenerbit($id)
	{
		$wh['kd_penerbit'] = $id;
		$r = $this->adminModel->getRow('penerbit', $wh); //mengambil data penerbit buku berdasarkan id (kd_penerbit)
		$data['title'] = $r->penerbit;
		$data['nama'] = $this->session->userdata('nama');
		$data['v_penerbit'] = 'active';
		$data['penerbit'] = $r;

		$this->template->ShowAdmin('editPenerbit', $data);
	}
	/*--------------------------------------- BATAS HALAMAN PENERBIT --------------------------------------------------*/

	/*------------------------------------------- HALAMAN KARANGAN ----------------------------------------------------*/
	function karangan($offset = 0, $edit = NULL)
	{
		$data['title'] = "Karangan";
		$data['nama'] = $this->session->userdata('nama');
		$data['v_karangan'] = 'active';
		$data['counter'] = $offset + 1; //penomoran pada tabel
		$data['buku'] = $this->adminModel->getAll('buku');
		$data['penulis'] = $this->adminModel->getAll('penulis');

		if ($edit != NULL) {
			$data['id_edit'] = $edit;
		}

		/*----------------- PAGINATION PAGE-----------------------------------------------*/
		$s = $this->db->get('karangan');
		$numrow = $s->num_rows();
		$data['karangan'] = $this->adminModel->getKaranganFull($offset, 5); //mengambil data dari tabel karangan
		// pagination
		$config['base_url'] = site_url('admin/karangan/');
		$config['total_rows'] = $numrow;
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

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

		$this->template->ShowAdmin('karangan', $data);
	}
	/*--------------------------------------- BATAS HALAMAN KARANGAN --------------------------------------------------*/

	// untuk menampilkan halaman pengaturan
	function pengaturan()
	{

	}

	// untuk melakukan logout admin
	function logout()
	{
		session_destroy();
		redirect(site_url('login/admin'),'refresh');
	}

	function proses()
	{
		if (isset($_POST['table'])) {
			$table = $this->input->post('table');
			$req = $this->input->post('req');
			unset($_POST['table']);
			unset($_POST['req']);

			$r = $this->adminModel->insert($table, $_POST);
			if ($r > 0) {
				$status = "<div class='alert alert-success' role='alert'>$table berhasil diinputkan</div>";
			}else {
				$status = "<div class='alert alert-danger' role='alert'>$table gagal diinputkan</div>";
			}
			$this->session->set_flashdata('status', $status);
			redirect(site_url("admin/$req"),'refresh');
		}
	}

	function update()
	{
		if (isset($_POST['table'])) {
			$fieldID = $this->input->post('fieldID');
			$id = $this->input->post('ID');
			$where[$fieldID] = $id;
			$table = $this->input->post('table');
			$req = $this->input->post('req');

			// hapus variabel yang tidak akan diinputkan ke database
			unset($_POST['fieldID']);
			unset($_POST['ID']);
			unset($_POST['table']);
			unset($_POST['req']);

			$r = $this->adminModel->update($table, $where, $_POST);
			if ($r > 0) {
				$status = "<div class='alert alert-success' role='alert'>$table berhasil diupdate</div>";
			}else {
				$status = "<div class='alert alert-danger' role='alert'>$table gagal diupdate</div>";
			}
			$this->session->set_flashdata('status', $status);
			redirect(site_url("admin/$req"),'refresh');
		}
	}

	function hapus($table, $fieldID, $ID, $req)
	{
		$where[$fieldID] = $ID;
		$r = $this->adminModel->delete($table, $where);
		if ($r > 0) {
			$status = "<div class='alert alert-success' role='alert'>$table berhasil dihapus</div>";
		}else {
			$status = "<div class='alert alert-danger' role='alert'>$table gagal dihapus</div>";
		}
		$this->session->set_flashdata('status', $status);
		redirect(site_url("admin/$req"),'refresh');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */