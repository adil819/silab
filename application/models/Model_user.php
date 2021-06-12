<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_user extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('tbl_users', $data);
			return $query;
		}

		public function mahasiswa($nim) {
			$query = $this->db->query('SELECT * FROM mahasiswa WHERE nim = "' .$nim . '"');
			return $query->result();
		}

	}

?>