<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aslab_model extends CI_Model
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

    function get_last_pertemuan($id_kelas)
    {
		$query = $this->db->query('Select pertemuan_ke from presensi_mahasiswa WHERE id_kelas = ' . $id_kelas . ' order by pertemuan_ke desc limit 1');
		return $query->result_array();
    }

	function get_kelasku($id_aslab)
	{
		$query = $this->db->query('SELECT * FROM aslab JOIN kelas ON aslab.id_aslab = kelas.id_aslab WHERE kelas.id_aslab = '.$id_aslab.' ORDER BY nim');
		return $query->result();
	}

	function get_mahasiswa1($dosen)
	{
		$query = $this->db->query("SELECT * FROM presensi_mahasiswa,mahasiswa,kelas,aslab,dosen WHERE presensi_mahasiswa.id_kelas = kelas.id_kelas AND presensi_mahasiswa.nim = mahasiswa.nim AND kelas.id_aslab = aslab.id_aslab AND aslab.id_dosen = dosen.nidn AND aslab.id_dosen = '$dosen'");
		return $query->result();
	}

	function get_mahasiswa2($id_kelas)
	{
		$query = $this->db->query("SELECT * FROM presensi_mahasiswa JOIN mahasiswa ON presensi_mahasiswa.nim = mahasiswa.nim WHERE presensi_mahasiswa.id_kelas = " . $id_kelas);
		return $query->result();
	}

	// function get_mahasiswa2($dosen)
	// {
	// 	$query = $this->db->query("SELECT * FROM presensi_mahasiswa,mahasiswa,kelas,aslab,dosen WHERE presensi_mahasiswa.id_kelas = kelas.id_kelas AND mahasiswa.nim = presensi_mahasiswa.nim AND kelas.id_aslab = aslab.id_aslab AND presensi_mahasiswa.pertemuan_ke = 2 AND aslab.id_dosen = dosen.nidn AND aslab.id_dosen = '$dosen'");
	// 	return $query->result();
	// }

	// function get_mahasiswa3($dosen)
	// {
	// 	$query = $this->db->query("SELECT * FROM presensi_mahasiswa,mahasiswa,kelas,aslab,dosen WHERE presensi_mahasiswa.id_kelas = kelas.id_kelas AND mahasiswa.nim = presensi_mahasiswa.nim AND kelas.id_aslab = aslab.id_aslab AND presensi_mahasiswa.pertemuan_ke = 3 AND aslab.id_dosen = dosen.nidn AND aslab.id_dosen = '$dosen'");
	// 	return $query->result();
	// }

	// function get_mahasiswa4($dosen)
	// {
	// 	$query = $this->db->query("SELECT * FROM presensi_mahasiswa,mahasiswa,kelas,aslab,dosen WHERE presensi_mahasiswa.id_kelas = kelas.id_kelas AND mahasiswa.nim = presensi_mahasiswa.nim AND kelas.id_aslab = aslab.id_aslab AND presensi_mahasiswa.pertemuan_ke = 4 AND aslab.id_dosen = dosen.nidn AND aslab.id_dosen = '$dosen'");
	// 	return $query->result();
	// }

	function get_aslab($id)
	{
		$query = $this->db->query("SELECT * FROM aslab,mahasiswa,dosen WHERE aslab.nim = mahasiswa.nim AND aslab.id_dosen = dosen.nidn AND aslab.id_dosen = '$id'");
		return $query->result();
	}

	function get_aslab2($id)
	{
		$query = $this->db->query("SELECT * FROM kelas JOIN aslab ON kelas.id_aslab = aslab.id_aslab JOIN mahasiswa ON aslab.nim = mahasiswa.nim JOIN matkul ON kelas.kode_matkul = matkul.kode_matkul WHERE nidn = '$id'");
		return $query->result();
	}
	
	function get_nidn($id)
	{
		$query = $this->db->query("SELECT * FROM dosen WHERE nidn = " . $id);
		return $query->result();
	}
	
	function get_nidn2($id)
	{
		$query = $this->db->query("SELECT * FROM kepala_lab WHERE user_id = " . $id);
		return $query->result();
	}

	function get_lab($user_id)
	{
		$query = $this->db->query('SELECT * FROM kepala_lab JOIN lokasi_aset ON kepala_lab.id_ruang = lokasi_aset.id_ruang WHERE kepala_lab.user_id = ' . $user_id);
		return $query->result();
	}
	
}
?>
