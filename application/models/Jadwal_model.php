<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_model extends CI_Model{

  function get_jadwal(){
	  return $this->db->query('SELECT * FROM jadwal_kelas jk,laboratorium lb,superlab sp
      WHERE jk.id_lab=lb.id_lab and lb.id_superlab=sp.id_superlab')->result();
  }

}
 ?>
