<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
  {   parent::__construct();

  	// if ($this->session->userdata('login') == 0 || $this->session->userdata('user_level') != '1') redirect('auth/logout');

	$this->session->set_userdata('menu','matakuliah');

	$this->load->model('aslab/matakuliah_model', 'dbObject');
  }

 	public $tbl = 'nilai';
	public $id_name = 'nim';

	public function index()
	{
		//READ mahasiswa yang memiliki kom yg sama dengan yg ada di table kelas
		//$kom = "A22017";
		$i = 0;
		$temp = $this->session->userdata('user_id');
		$id_aslab = $this->dbObject->get_id_aslab($temp);
		$data['aslab'] = $this->dbObject->get_mahasiswaA($id_aslab[0]->nim);
		// print_r($data['aslab']);die;

		$this->load->model('aslab/kehadiran_model');
		$data['mhs'] = $this->kehadiran_model->get_kelasku($id_aslab[0]->id_aslab);

		$data['jenis'][0][0] = '';
		$data['praktikan'][0][0] = '';

		foreach ($data['mhs'] as $key) {
			// print_r($key->kom);die;
			// echo '<br/>';
			$data['jenis'][$i] = $this->dbObject->get_jenis_penilaian($key->id_kelas);	
			$data['praktikan'][$i] = $this->dbObject->get_praktikanku($key->kom);
			$data['matkul'][$i++] = $this->dbObject->get_matkul($key->kode_matkul);
		}
		// print_r($data['matkul'][0]);
		// echo '<hr/>';
		// print_r($data['praktikan']);
		// echo '<hr/>';
		// print_r($data['mhs'][0]);
		
		// die;
	
		$j = 1;
if(isset($data['jenis'][0][0]->jenis_penilaian)){
	foreach ($data['jenis'] as $keys) {
		foreach ($keys as $key) {
			foreach ($data['praktikan'] as $rows): 
				foreach ($rows as $row): 
					$data['nilai'][$key->jenis_penilaian][$row->nim] = $this->dbObject->get_nilai($j, $key->jenis_penilaian, $row->nim);	
				endforeach;
			endforeach;
		}			
		$j++;
	}			
}
		//$data['nilai']['asd']['171402084'] = $this->dbObject->get_nilai(3, 'asd', '171402084');	
		 //print_r($data['nilai']['asd']['171402084']);die;
		// echo '<br/>';
		// echo '<br/>';
		// echo '<br/>';
		// print_r($data['jenis']);
		// die;
		  //var_dump($data['mahasiswa']);die;
		$this->load->view('aslab/templates/header');
		$this->load->view('aslab/templates/sidebar',$data);
		$this->load->view('aslab/matakuliah/index',$data);
		$this->load->view('aslab/templates/modal');
		$this->load->view('aslab/templates/footer');
	}

	public function insert_jenis_penilaian($id_kelas) {  
		$i=0;
		$temp = $this->session->userdata('user_id');
		$id_aslab = $this->dbObject->get_id_aslab($temp);
		$data['aslab'] = $this->dbObject->get_mahasiswaA($id_aslab[0]->nim);	
		$this->load->model('aslab/kehadiran_model');
		$data['mhs'] = $this->kehadiran_model->get_kelasku($id_aslab[0]->id_aslab);
		//print_r($data['mhs'][$id_kelas]);die;
		$data2 = $_POST;;
		//foreach ($data['mhs'] as $key) {
			// echo '<br/>';
			$data['praktikan'] = $this->dbObject->get_praktikanku2($data['mhs'][$id_kelas-1]->kom);
		//}
		//print_r($data['praktikan']);die;
		$this->load->model('aslab/Silabus_model');
		$this->Silabus_model->create_general('persentase_penilaian', $data2);
		$data3['jenis_penilaian'] = $data2['jenis_penilaian'];
		$data3['id_kelas'] = $id_kelas;
		$data3['nilai'] = 0;	

		foreach ($data['praktikan'] as $row): 
				$data3['nim'] = $row->nim;
				$this->Silabus_model->create_general('nilai', $data3);
		endforeach;	

	 	redirect(base_url()."index.php/aslab/matakuliah");  
	}

	public function update_nilai($id_kelas) {   
		//print_r($_POST);die;	
		$data2 = $_POST;

		// $i = 0;
		// $temp = $this->session->userdata('user_id');
		// $id_aslab = $this->dbObject->get_id_aslab($temp);
		// $data['aslab'] = $this->dbObject->get_mahasiswaA($id_aslab[0]->nim);
		// // print_r($data['aslab']);die;

		// $this->load->model('aslab/kehadiran_model');
		// $data['mhs'] = $this->kehadiran_model->get_kelasku($id_aslab[0]->id_aslab);
		// foreach ($data['mhs'] as $key) {
		// 	// print_r($key->kom);die;
		// 	// echo '<br/>';
		// 	$data['praktikan'][$i++] = $this->dbObject->get_praktikanku($key->kom);
		// }
		// //print_r($data['praktikan'][0][0]);die;

		// $data['jenis'] = $this->dbObject->get_jenis_penilaian($data['mhs'][0]->id_kelas);		
		// $j = 0;
		foreach ($data2['nilai'] as $nama_jenis => $jenis_penilaian) {
			//print_r($jenis_penilaian);echo '<br/>';
			 foreach ($jenis_penilaian as $nim => $nilai): 
					//print_r($nilai);echo '<br/>';
			 		$this->dbObject->update_nilai($id_kelas, $nama_jenis, $nim, $nilai);	
			 endforeach;
		}	
		//die;
	 	redirect(base_url()."index.php/aslab/matakuliah");  
	}

	public function update($param2='', $param1='')
	{
		$data['mhs'] = $this->dbObject->get_mahasiswa1($param2);
		//var_dump($data['mhs']);die;

		$this->load->view('aslab/templates/header');
		$this->load->view('aslab/templates/sidebar');
		$this->load->view('aslab/matakuliah/update', $data);
		$this->load->view('aslab/templates/footer');

		if ($param2 == 'do_update') 
		{
			$nilai = $this->input->post('nilai');
		
	        $data = array(
	       		'nilai' => $nilai
			);
	        
			if($this->dbObject->update_general($this->tbl, $this->id_name, $param1, $data)===TRUE)		// using direct parameter
			{
				$this->session->set_flashdata('pesan', [
               	        'title' => '',
               	        'message' => 'Data Berhasil Diubah',
               	        'type' => 'success'
               	        ]);
				?>
				<script>
					//alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>index.php/aslab/matakuliah/");
				</script>
				<?php
			}
			else {
				$this->session->set_flashdata('pesan', [
               	        'title' => '',
               	        'message' => 'Data Gagal Diubah',
               	        'type' => 'danger'
               	        ]);
				?>
				<script>
					//alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>index.php/aslab/matakuliah/");
				</script>
				<?php
			}
		}
	}

	public function print($id_kelas)
	{
		$data['temp'] = $id_kelas;
		$this->load->model('kepala_lab/aslab_model');
		//READ mahasiswa yang memiliki kom yg sama dengan yg ada di table kelas
		//$kom = "A22017";
		$i = 0;
		$temp = $this->session->userdata('user_id');
		$id_aslab = $this->dbObject->get_id_aslab($temp);
		$data['aslab'] = $this->dbObject->get_mahasiswaA($id_aslab[0]->nim);
		// print_r($data['aslab']);die;

		$this->load->model('aslab/kehadiran_model');
		$data['mhs'] = $this->kehadiran_model->get_kelasku($id_aslab[0]->id_aslab);
		// print_r($data['mhs']);die;

		foreach ($data['mhs'] as $key) {
			// print_r($key->kom);die;
			// echo '<br/>';
			$data['jenis'][$i] = $this->dbObject->get_jenis_penilaian($key->id_kelas);	
			$data['praktikan'][$i] = $this->dbObject->get_praktikanku($key->kom);
			$data['matkul'][$i] = $this->dbObject->get_matkul($key->kode_matkul);
			$data['dosen'][$i++] = $this->aslab_model->get_nidn($data['mhs'][0]->nidn);
		}
		// print_r($data['praktikan']);die;
	
		$j = 1;
	foreach ($data['jenis'] as $keys) {
		foreach ($keys as $key) {
			foreach ($data['praktikan'] as $rows): 
				foreach ($rows as $row): 
					$data['nilai'][$key->jenis_penilaian][$row->nim] = $this->dbObject->get_nilai($id_kelas, $key->jenis_penilaian, $row->nim);	
				endforeach;
			endforeach;
		}			
		$j++;
	}			
	// print_r($data['nilai']['Kuis']['171402003']);die;
		
		$this->load->view('aslab/matakuliah/print',$data);
	}



}
