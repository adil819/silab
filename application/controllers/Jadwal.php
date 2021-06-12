<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function index()
  {
    $data['jadwal_kelas']=$this->jadwal_model->get_jadwal();
    $this->load->view('jadwal',$data);
		foreach ($data['jadwal_kelas'] as $key){
			echo "id kelas:".$key->id_kelas."<br>";
			echo "jam masuk:".$key->jam_masuk."<br>";
			echo "jam keluar:".$key->jam_keluar."<br>";
			echo "hari:".$key->hari."<br>";
			echo "id lab:".$key->id_lab."<br>";
			echo "nama lab:".$key->nama_lab."<br>";
			echo "id superlab:".$key->id_superlab."<br>";
			echo "nama superlab:".$key->nama_superlab."<br>";
		}
	}

}
