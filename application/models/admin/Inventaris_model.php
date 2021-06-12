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

	function get_barang()
	{
		return $query = $this->db->query("SELECT * FROM aset")->result();
	}


	function get_inventaris()
	{
		return $query = $this->db->query("SELECT * FROM pengembalian,peminjaman,aset,mahasiswa WHERE pengembalian.id_peminjaman = peminjaman.id_peminjaman AND mahasiswa.nim = peminjaman.nim AND aset.id_barang = peminjaman.id_barang")->result();
	}
}
?>