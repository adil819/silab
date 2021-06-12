<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
 public function index($angkatan)
 {
     //SENGAJA DI KOMEN BIAR KALAU GAK SENGJA DIAKSES JADI GAK EROR, WALAUPUN DB GK NGARUH
  //$url = file_get_contents("http://localhost/silab/api/ti".$angkatan[2].$angkatan[3].".json");
  $json = json_decode($url,true);
  $k =  0; $a = 0; $b = 0; $c = 0; $angkaA = 1; $angkaB = 1; $angkaC = 1;

  foreach ($json as $user) {
      $data['nim'] = $user['NIM'];
      $data2['nim'] = $user['NIM'];
      $data['nama'] = $user['NAMA'];
      $data['angkatan'] = $angkatan;
      $data['kode_prodi'] = "1402";

    $temp = $data['nim'] % 1000;
      
    if($temp % 3 == 1){
        $data2['kom'] = 'A';
        $a++;
        if($a >= 25){
            $a = $a % 25;
            $angkaA++;
        }
        $data2['kom'] = $data2['kom'].$angkaA;
    }elseif($temp % 3 == 2){
        $data2['kom'] = 'B';
        $b++;
        if($b >= 25){
            $b = $b % 25;
            $angkaB++;
        }
        $data2['kom'] = $data2['kom'].$angkaB;
    }elseif($temp % 3 == 0){
        $data2['kom'] = 'C';
        $c++;
        if($c >= 25){
            $c = $c % 25;
            $angkaC++;
        }
        $data2['kom'] = $data2['kom'].$angkaC;
    }

    if($a >= 25 || $b >= 25 || $c >= 25){
        $a = $a % 25;
        $b = $b % 25;
        $c = $c % 25;
    }
      $data2['kom'] = $data2['kom'].$data['angkatan'];
      $this->load->model('dosen/user_model');
      $this->user_model->create_general('mahasiswa', $data);
      $this->user_model->create_general('kelas_mahasiswa', $data2);
  }
  
 }
}
