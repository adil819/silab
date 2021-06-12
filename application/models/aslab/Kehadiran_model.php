<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kehadiran_model extends CI_Model
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

    function get_jumlah($nim, $status)
    {
		$query = $this->db->query('Select count(*) as jumlah from presensi_mahasiswa WHERE nim = ' . $nim . ' and  status = "' . $status . '"');
		return $query->result_array();
    }

	function get_id_aslab($id)
	{
		$query = $this->db->query('SELECT * FROM aslab WHERE user_id =  '. $id );
		return $query->result();
	}

	function get_kelasku($id_aslab)
	{
		$query = $this->db->query('SELECT * FROM aslab RIGHT JOIN kelas ON aslab.id_aslab = kelas.id_aslab WHERE aslab.id_aslab = '.$id_aslab.' ORDER BY nim');
		return $query->result();
	}

	function get_kelasku2($id_kelas)
	{
		$query = $this->db->query('SELECT * FROM aslab RIGHT JOIN kelas ON aslab.id_aslab = kelas.id_aslab WHERE kelas.id_kelas = '.$id_kelas.' ORDER BY nim');
		return $query->result();
	}

	function get_praktikanku($kom)
	{
		$query = $this->db->query('SELECT * FROM kelas_mahasiswa JOIN mahasiswa ON kelas_mahasiswa.nim = mahasiswa.nim WHERE kom = "' . $kom . '"');
		return $query->result();
	}

	function get_mahasiswa1($id)
	{
		$query = $this->db->query("SELECT * FROM mahasiswa WHERE nim='$id'");
		return $query->result();
	}

	function get_matkul($id)
	{
		$query = $this->db->query("SELECT * FROM matkul WHERE kode_matkul='$id'");
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
	
	function get_kelas($hari, $sesi, $id_lab)
	{
		$query = $this->db->query('SELECT kom, kode_matkul FROM kelas JOIN jadwal_kelas ON kelas.id_kelas = jadwal_kelas.id_kelas WHERE jadwal_kelas.jam_masuk = "'.$sesi.'" AND jadwal_kelas.hari = "'.$hari.'" AND  jadwal_kelas.id_lab = '.$id_lab);
		return $query->result();
	}
}
?>
