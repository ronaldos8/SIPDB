<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	function getLogin($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$r = $this->db->get('admin', 1, 0);
		return $r->row();
	}

	// untuk mengambil semua data yang ada pada tabel
	function getAll($table)
	{
		$r = $this->db->get($table);
		return $r->result();
	}

	// untuk mengambil satu baris yang ada pada tabel
	function getRow($table, $where)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$r = $this->db->get($table, 1, 0);
		return $r->row();
	}

	// untuk mengambil data berdasarkan kondisi pada tabel
	function getWhere($table, $where)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$r = $this->db->get($table);
		return $r->result();
	}

	// untuk memasukan data kedalam tabel
	function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->affected_rows();
	}

	// untuk mengupdate tabel
	function update($table, $where, $data)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}

	// untuk menghapus data dalam tabel
	function delete($table, $where)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

	// mengambil id paling besar di tabel
	function getMaxId($table, $id)
	{
		$this->db->select("max($id) as id");
		$this->db->from($table);
		$r = $this->db->get();
		$r = $r->row();
		return $r->id;
	}

	// mengambil data buku, deskrips, penerbit dan jenis buku
	function getBukuFull($offset = 0, $limit = NULL)
	{
		if ($limit == NULL) {
			$q = "SELECT * FROM buku a, deskripsi_buku b, jenis c, penerbit d WHERE a.no_buku = b.no_buku and a.kd_jenis = c.kd_jenis and a.kd_penerbit = d.kd_penerbit";
		}else {
			$q = "SELECT * FROM buku a, deskripsi_buku b, jenis c, penerbit d WHERE a.no_buku = b.no_buku and a.kd_jenis = c.kd_jenis and a.kd_penerbit = d.kd_penerbit LIMIT $limit OFFSET $offset";
		}
		
		$r = $this->db->query($q);
		return $r->result();
	}

	// mengambil data buku, deskrips, penerbit dan jenis buku berdasarkan no buku
	function getBukuFullRow($id)
	{
		$q = "SELECT a.*, b.*, c.jenis_buku, d.penerbit FROM buku a, deskripsi_buku b, jenis c, penerbit d WHERE a.no_buku = b.no_buku and a.kd_jenis = c.kd_jenis and a.kd_penerbit = d.kd_penerbit and a.no_buku = $id";

		$r = $this->db->query($q);
		return $r->row();
	}

	// mengambil data buku, deskrips, penerbit, jenis buku dan penulis buku
	function getKaranganFull($offset = 0, $limit = NULL)
	{
		if ($limit == NULL) {
			$q = "SELECT * FROM buku a, deskripsi_buku b, jenis c, penerbit d, karangan e, penulis f WHERE a.no_buku = b.no_buku and a.kd_jenis = c.kd_jenis and a.kd_penerbit = d.kd_penerbit and a.no_buku = e.kd_buku and f.kd_penulis = e.kd_penulis";
		}else {
			$q = "SELECT * FROM buku a, deskripsi_buku b, jenis c, penerbit d, karangan e, penulis f WHERE a.no_buku = b.no_buku and a.kd_jenis = c.kd_jenis and a.kd_penerbit = d.kd_penerbit and a.no_buku = e.kd_buku and f.kd_penulis = e.kd_penulis LIMIT $limit OFFSET $offset";
		}
		
		$r = $this->db->query($q);
		return $r->result();
	}

	// mengambil data buku beserta tabel yang berhubungan dengannya berdasarkan jenis buku
	function getKaranganFullByJenis($kd_jenis, $offset = 0, $limit = NULL)
	{
		if ($limit == NULL) {
			$q = "SELECT * FROM buku a, deskripsi_buku b, jenis c, penerbit d, karangan e, penulis f WHERE a.no_buku = b.no_buku and a.kd_jenis = c.kd_jenis and a.kd_penerbit = d.kd_penerbit and a.no_buku = e.kd_buku and f.kd_penulis = e.kd_penulis and a.kd_jenis = $kd_jenis";
		}else {
			$q = "SELECT * FROM buku a, deskripsi_buku b, jenis c, penerbit d, karangan e, penulis f WHERE a.no_buku = b.no_buku and a.kd_jenis = c.kd_jenis and a.kd_penerbit = d.kd_penerbit and a.no_buku = e.kd_buku and f.kd_penulis = e.kd_penulis and a.kd_jenis = $kd_jenis LIMIT $limit OFFSET $offset";
		}
		
		$r = $this->db->query($q);
		return $r->result();
	}

	// // mengambil data buku beserta tabel yang berhubungan dengannya berdasarkan id buku
	function getKaranganFullRow($id)
	{
		$q = "SELECT a.*, b.*, c.jenis_buku, d.penerbit, d.deskripsi as deskripsi_penerbit, f.penulis, f.deskripsi as deskripsi_penulis, e.* FROM buku a, deskripsi_buku b, jenis c, penerbit d, karangan e, penulis f WHERE a.no_buku = b.no_buku and a.kd_jenis = c.kd_jenis and a.kd_penerbit = d.kd_penerbit and a.no_buku = e.kd_buku and f.kd_penulis = e.kd_penulis and e.kd_karangan = $id";
		$r = $this->db->query($q);
		return $r->row();
	}

	// mengambil semua jenis buku yang ada di perpustakaan
	function getJenisInBuku()
	{
		$q = "SELECT a.* FROM jenis a, buku b WHERE a.kd_jenis = b.kd_jenis group by b.kd_jenis";
		$r = $this->db->query($q);
		return $r->result();
	}

	// mengambil data buku berdasarkan id jenis
	function getBukubyJenis($id, $limit = 1)
	{
		$q = "SELECT a.judul, b.gambar from buku a, deskripsi_buku b where a.no_buku = b.no_buku and kd_jenis = $id LIMIT $limit";
		$r = $this->db->query($q);
		return $r->result();
	}

	// mengambil id buku terkecil
	function getMinIdBukuKarangan()
	{
		$this->db->select('min(kd_buku) as min');
		$this->db->from('karangan');
		$r = $this->db->get();
		$r = $r->row();
		return $r->min;
	}

	// mengambil id buku terbersar
	function getMaxIdBukuKarangan()
	{
		$this->db->select('max(kd_buku) as max');
		$this->db->from('karangan');
		$r = $this->db->get();
		$r = $r->row();
		return $r->max;
	}
}

/* End of file adminModel.php */
/* Location: ./application/models/adminModel.php */