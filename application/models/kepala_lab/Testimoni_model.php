<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Testimoni_model extends CI_Model
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

    function get_last_id()
    {
		$query = $this->db->query('Select id_kelas as last from kelas order by id_kelas desc limit 1');
		return $query->result_array();
    }

    function get_kelas()
    {
		$query = $this->db->query('Select * from aslab RIGHT JOIN kelas ON aslab.id_aslab = kelas.id_aslab LEFT JOIN mahasiswa ON aslab.nim = mahasiswa.nim LEFT JOIN matkul ON kelas.kode_matkul = matkul.kode_matkul JOIN jadwal_kelas ON kelas.id_kelas = jadwal_kelas.id_kelas');
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

	function get_aslab()
	{
		$data = $this->db->query('SELECT * FROM aslab JOIN mahasiswa ON aslab.nim = mahasiswa.nim');
		return $data->result();
	}



}
?>