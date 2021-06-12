<?php
class M_berita extends CI_Model{
 
    function simpan_berita($jdl,$berita,$gambar){
        $hsl=$this->db->query("INSERT INTO artikel (judul,isi,gambar) VALUES ('$jdl','$berita','$gambar')");
        return $hsl;
    }
 
    function get_berita_by_kode($kode){
        $hsl=$this->db->query("SELECT * FROM artikel WHERE id_artikel='$kode'");
        return $hsl;
    }
 
    function get_all_berita(){
        $hsl=$this->db->query("SELECT * FROM artikel ORDER BY id_artikel DESC");
        return $hsl;
    }

	function search($key)
	{
		$query = $this->db->query('SELECT * FROM mahasiswa WHERE nama LIKE "%'.$key.'%" OR nim LIKE "%'.$key.'%"');
		return $query->result();
	}
}