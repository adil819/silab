<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

	function search($key)
	{
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE nama LIKE "%'.$key.'%" OR nim LIKE "%'.$key.'%"');
		return $query->result();
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

	function get_all_artikel(){
		$query = $this->db->query('SELECT * FROM artikel ORDER BY id_artikel DESC');
		return $query->result();
	}

	function get_mahasiswa()
	{
		$query = $this->db->query('SELECT * FROM mahasiswa, nilai WHERE mahasiswa.nim = nilai.nim');
		return $query->result();
	}
	
	function get_nidn($id)
	{
		$query = $this->db->query("SELECT * FROM dosen WHERE user_id = " . $id);
		return $query->result();
	}
	
	function get_kom($id)
	{
		$query = $this->db->query("SELECT kom FROM kelas_mahasiswa WHERE nim = '" . $id . "'");
		return $query->result();
	}
	
	function get_kelas($id)
	{
		$query = $this->db->query("SELECT * FROM kelas WHERE kom = '" . $id . "'");
		return $query->result();
	}
	
	function get_matkul($id)
	{
		$query = $this->db->query("SELECT nama_matkul FROM matkul WHERE kode_matkul = '" . $id . "'");
		return $query->result();
	}
	
	function get_aslab($id)
	{
		$query = $this->db->query("SELECT nim FROM aslab WHERE id_aslab = " . $id);
		return $query->result();
	}
	
	function get_aslab2($id)
	{
		$query = $this->db->query("SELECT * FROM mahasiswa WHERE nim = '" . $id . "'");
		return $query->result();
	}
	
	function get_dosen($id)
	{
		$query = $this->db->query("SELECT nama_dosen FROM dosen WHERE nidn = '" . $id . "'");
		return $query->result();
	}
	
	function get_nilai($id_kelas, $nim)
	{
		$query = $this->db->query("SELECT * FROM nilai WHERE id_kelas = " . $id_kelas . " AND nim = '" . $nim . "'");
		return $query->result();
	}
}
?>
