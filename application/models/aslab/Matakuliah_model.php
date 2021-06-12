<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matakuliah_model extends CI_Model
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

	function get_jenis_penilaian($id_kelas)
	{
		$query = $this->db->query('SELECT * FROM persentase_penilaian WHERE id_kelas = ' . $id_kelas);
		return $query->result();
	}

	function update_nilai($id_kelas, $jenis_penilaian, $nim, $nilai)
	{
		return $this->db->query('UPDATE nilai SET nilai ='. $nilai .' WHERE id_kelas = ' . $id_kelas . ' AND jenis_penilaian = "' . $jenis_penilaian . '" AND nim = "' . $nim . '"');
	}

	function get_nilai($id_kelas, $jenis_penilaian, $nim)
	{
		$query = $this->db->query('SELECT * FROM nilai WHERE id_kelas = ' . $id_kelas . ' AND nim = ' . $nim . ' AND jenis_penilaian = "' . $jenis_penilaian . '"');
		return $query->result();
	}

	function get_kelasku($id_aslab)
	{
		$query = $this->db->query('SELECT * FROM aslab RIGHT JOIN kelas ON aslab.id_aslab = kelas.id_aslab ' );
		return $query->result();
	}

	function get_id_aslab($id)
	{
		$query = $this->db->query('SELECT * FROM aslab WHERE user_id =  '. $id );
		return $query->result();
	}

	function get_praktikanku($kom)
	{
		$query = $this->db->query('SELECT * FROM kelas_mahasiswa JOIN mahasiswa ON kelas_mahasiswa.nim = mahasiswa.nim WHERE kom = "' . $kom . '"');
		return $query->result();
	}

	function get_praktikanku2($kom)
	{
		$query = $this->db->query('SELECT * FROM kelas_mahasiswa JOIN mahasiswa ON kelas_mahasiswa.nim = mahasiswa.nim WHERE kom = "' . $kom . '"');
		return $query->result();
	}

	function get_matkul	($kode)
	{
		$query = $this->db->query('SELECT * FROM matkul WHERE kode_matkul = "' . $kode . '"');
		return $query->result();
	}

	function get_mahasiswa1($id)
	{
		$query = $this->db->query("SELECT * FROM mahasiswa, nilai WHERE mahasiswa.nim = nilai.nim AND nilai.nim='$id'");
		return $query->result();
	}

	function get_mahasiswaA($id)
	{
		$query = $this->db->query("SELECT * FROM mahasiswa WHERE nim='$id'");
		return $query->result();
	}

	  function get_total_sales($id)
    {
        return $this->db->query("SELECT *,SUM(od.od_amount*prs.prod_dist_price) AS jumlah FROM
            fd_order_lod op, fd_order_detail od,fd_product_dist prs where op.order_lod_seller_id=$id AND op.order_lod_invoice=od.od_order_invoice AND od.od_product_code=prs.prod_dist_prod_code")->result();
    }

        function get_total_purchase($id)
    {
        return $this->db->query("SELECT *,SUM(od.od_amount*prd.prod_price) AS jumlah FROM
            fd_order ors, fd_order_detail od,fd_product prd where ors.order_created_by=$id AND ors.order_invoice=od.od_order_invoice AND od.od_product_code=prd.prod_code")->result();
    }
}
?>
