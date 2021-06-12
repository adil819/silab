<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventaris_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function get_general($table)
    {
    	$query = $this->db->get($table);
		return $query->result();
    }

    function get_by_id_general($table, $id, $val)
    {
    	$query = $this->db->where($id, $val)->get($table);
		return $query->result();
    }

	function create_general($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	function update_general($table, $id, $val, $data)
	{
		$this->db->where($id, $val);
		return $this->db->update($table, $data);
	}

	function delete_general($table, $id, $val)
	{
		$this->db->where($id, $val);
		return $this->db->delete($table);
	}

	function get_all_media_with_kategori(){
		$query = $this->db->query('SELECT * FROM fd_media, fd_media_kategori WHERE fd_media.media_med_kat_id = fd_media_kategori.med_kat_id');
		return $query->result();
	}

	function get_mahasiswa()
	{
		$query = $this->db->query('SELECT * FROM mahasiswa, nilai WHERE mahasiswa.nim = nilai.nim');
		return $query->result();
	}

	function get_lab($user_id)
	{
		$query = $this->db->query('SELECT * FROM kepala_lab JOIN lokasi_aset ON kepala_lab.id_ruang = lokasi_aset.id_ruang WHERE kepala_lab.user_id = ' . $user_id);
		return $query->result();
	}

	function get_labb($id)
	{
		$query = $this->db->query('SELECT * FROM lokasi_aset WHERE id_ruang = ' . $id);
		return $query->result();
	}

	function get_dosen($nidn)
	{
		$query = $this->db->query('SELECT * FROM dosen WHERE nidn = ' . $nidn);
		return $query->result();
	}

	function get_lokasi()
	{
		$query = $this->db->query('SELECT * FROM lokasi_aset');
		return $query->result();
	}

	function get_barang()
	{
		return $query = $this->db->query("SELECT * FROM aset")->result();
	}

	function get_inventaris()
	{
		return $query = $this->db->query("SELECT * FROM peminjaman,aset,mahasiswa WHERE mahasiswa.nim = peminjaman.nim AND aset.id_barang = peminjaman.id_barang AND peminjaman.id_peminjaman NOT IN (SELECT pengembalian.id_peminjaman FROM pengembalian) ORDER BY peminjaman.id_peminjaman DESC")->result();
	}

	function get_aset($id_ruang)
	{
		return $query = $this->db->query("SELECT * FROM aset,detail_aset WHERE aset.id_barang = detail_aset.id_barang AND detail_aset.id_ruang = " . $id_ruang)->result();
	}

	function get_all_aset()
	{
		return $query = $this->db->query("SELECT * FROM aset,detail_aset WHERE aset.id_barang = detail_aset.id_barang")->result();
	}

	function perpanjang($id_peminjaman)
	{
		return $this->db->query('UPDATE peminjaman SET tanggal = "'. date("Y-m-d") . '" WHERE id_peminjaman = ' . $id_peminjaman);
		
	}	
}
?>
