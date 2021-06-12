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

	function get_kelas($id_aslab)
	{
		$query = $this->db->query('SELECT id_kelas FROM kelas WHERE id_aslab = '.$id_aslab);
		return $query->result();
	}

	function get_mahasiswa()
	{
		$query = $this->db->query('SELECT * FROM mahasiswa, nilai WHERE mahasiswa.nim = nilai.nim');
		return $query->result();
	}

	function get_mahasiswaku($kom)
	{
		$query = $this->db->query('SELECT * FROM kelas_mahasiswa WHERE kom = ' . $kom);
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

	function get_silabus_by_id($id1)
	{
		$query = $this->db->query('SELECT * FROM silabus WHERE id_kelas="'.$id1.'"');
		return $query->result();
	}

	function get_silabus_by_id2($id1)
	{
		$query = $this->db->query('SELECT * FROM silabus WHERE id_silabus="'.$id1.'"');
		return $query->result();
	}

}
?>
