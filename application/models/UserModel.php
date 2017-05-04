<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	function getLogin($username, $password)
	{
		$this->db->where('user', $username);
		$this->db->where('password', $password);
		$r = $this->db->get('anggota', 1, 0);
		return $r->row();
	}

	// mengambil data buku yang dipinjam oleh anggota
	function getPinjamanAnggota($id_anggota)
	{
		$q = "SELECT * FROM pinjaman a, buku b, karangan c, penulis d WHERE a.kd_karangan = c.kd_karangan and b.no_buku = c.kd_buku and c.kd_penulis = d.kd_penulis and a.id_anggota = $id_anggota";
		$r = $this->db->query($q);
		return $r->result();
	}

	// memperbaharui stok buku. (anggota meminjam berarti kurangi stok dan anggota mengemablikan berarti tambah stok)
	function updateStokBuku($kd_karangan, $operator, $n = 1)
	{
		$q = "UPDATE karangan SET jml_buku = jml_buku $operator $n WHERE kd_karangan = $kd_karangan";
		$this->db->query($q);
		return $this->db->affected_rows();
	}

}

/* End of file userModel.php */
/* Location: ./application/models/userModel.php */