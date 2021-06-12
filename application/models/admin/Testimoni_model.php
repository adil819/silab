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

    function get_admin($id)
    {
		$query = $this->db->query('Select * from admin where user_id = ' .$id);
		return $query->result_array();
    }

    function get_kelas()
    {
		$query = $this->db->query('Select * from aslab RIGHT JOIN kelas ON aslab.id_aslab = kelas.id_aslab LEFT JOIN mahasiswa ON aslab.nim = mahasiswa.nim LEFT JOIN matkul ON kelas.kode_matkul = matkul.kode_matkul JOIN jadwal_kelas ON kelas.id_kelas = jadwal_kelas.id_kelas');
		return $query->result();
    }

		function get_lab($user_id)
		{
			$query = $this->db->query('SELECT * FROM kepala_lab JOIN lokasi_aset ON kepala_lab.id_ruang = lokasi_aset.id_ruang WHERE kepala_lab.user_id = ' . $user_id);
			return $query->result();
		}

    function get_kelas_ruangan($id_lab)
    {
		$query = $this->db->query('Select * from aslab RIGHT JOIN kelas ON aslab.id_aslab = kelas.id_aslab LEFT JOIN mahasiswa ON aslab.nim = mahasiswa.nim LEFT JOIN matkul ON kelas.kode_matkul = matkul.kode_matkul JOIN jadwal_kelas ON kelas.id_kelas = jadwal_kelas.id_kelas WHERE jadwal_kelas.id_lab = ' . $id_lab);
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

	function ekspor()
	{
		//$data = $this->db->query("SELECT * FROM kelas INTO OUTFILE 'C:/SILab/kelas.csv' FIELDS ENCLOSED BY '"' TERMINATED BY ';' ESCAPED BY '"' LINES TERMINATED BY '\r\n';");
		//return $data->result();
	}

	function get_aslab()
	{
		$data = $this->db->query('SELECT * FROM aslab JOIN mahasiswa ON aslab.nim = mahasiswa.nim');
		return $data->result();
	}

	function delete()
	{
		//return $this->db->query('DELETE FROM aslab, kelas, jadwal_kelas, kelas_kom, kelas_mahasiswa, nilai, presensi_mahasiswa, persentase_penilaian, silabus');
		$this->db->query('DELETE FROM aslab');
		$this->db->query('DELETE FROM jadwal_kelas');
		$this->db->query('DELETE FROM nilai');
		$this->db->query('DELETE FROM presensi_mahasiswa');
		$this->db->query('DELETE FROM persentase_penilaian');
		$this->db->query('DELETE FROM kelas');
		return $this->db->query('DELETE FROM silabus');
	}

	function delete_aslab()
	{
		return $this->db->query('DELETE FROM tbl_users WHERE user_level = "aslab"');
	}
}
?>