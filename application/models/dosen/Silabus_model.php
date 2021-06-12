<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Silabus_model extends CI_Model
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

	function get_mahasiswa()
	{
		$query = $this->db->query('SELECT * FROM mahasiswa, nilai WHERE mahasiswa.nim = nilai.nim');
		return $query->result();
	}

	function get_mahasiswa1($id)
	{
		$query = $this->db->query("SELECT * FROM mahasiswa, nilai WHERE mahasiswa.nim = nilai.nim AND nilai.nim='$id'");
		return $query->result();
	}

	function get_silabus()
	{
		$query = $this->db->query("SELECT * FROM silabus");
		return $query->result();
	}

	function get_silabus_kelas($id_kelas)
	{
		$query = $this->db->query("SELECT * FROM silabus WHERE id_kelas = " . $id_kelas);
		return $query->result();
	}

	function get_silabus_by_id($id)
	{
		$query = $this->db->query("SELECT * FROM silabus WHERE silabus.id_silabus='$id'");
		return $query->result();
	}
	
	function get_nidn($id)
	{
		$query = $this->db->query("SELECT * FROM dosen WHERE user_id = " . $id);
		return $query->result();
	}

	function get_aslab2($id)
	{
		$query = $this->db->query("SELECT * FROM kelas JOIN aslab ON kelas.id_aslab = aslab.id_aslab JOIN mahasiswa ON aslab.nim = mahasiswa.nim JOIN matkul ON kelas.kode_matkul = matkul.kode_matkul WHERE nidn = '$id'");
		return $query->result();
	}

}
?>
