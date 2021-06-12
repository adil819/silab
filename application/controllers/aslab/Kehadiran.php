<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kehadiran extends CI_Controller {

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

	$this->session->set_userdata('menu','kehadiran');

	$this->load->model('aslab/kehadiran_model', 'dbObject');
  }

 	public $tbl = 'nilai';
	public $id_name = 'nim';

	public function index()
	{
		$this->load->model('aslab/Matakuliah_model');
		$temp = $this->session->userdata('user_id');
		$id_aslab = $this->Matakuliah_model->get_id_aslab($temp);
		$data['aslab'] = $this->Matakuliah_model->get_mahasiswaA($id_aslab[0]->nim);
		//READ mahasiswa yang memiliki kom yg sama dengan yg ada di table kelas
		//$kom = "A22017";
		$i = 0;
		$data['mhs'] = $this->dbObject->get_kelasku($id_aslab[0]->id_aslab);

		$data['jenis'][0][0] = '';
		$data['praktikan'][0][0] = '';

		foreach ($data['mhs'] as $key) {
			// print_r($key->kom);
			// echo '<br/>';
			$data['praktikan'][$i] = $this->dbObject->get_praktikanku($key->kom);
			$data['pertemuan_ke'][$i] = $this->dbObject->get_last_pertemuan($key->id_kelas);
			$data['matkul'][$i++] = $this->dbObject->get_matkul($key->kode_matkul);
		}
		//print_r($data['matkul']);die;
if(isset($data['praktikan'][0][0]->nim)){
	foreach ($data['praktikan'] as $keys ) {
		foreach ($keys as $key ) {
			//echo $key->nim;
			$data['sakit'][$key->nim] = $this->dbObject->get_jumlah($key->nim, 'sakit');
			$data['alpa'][$key->nim] = $this->dbObject->get_jumlah($key->nim, 'alpa');
			$data['izin'][$key->nim] = $this->dbObject->get_jumlah($key->nim, 'izin');
		}
	}
}	
		//print_r($data['izin']['171402001']);die;
		// print_r($data['mhs']);
		// echo '<br/>';	
		// print_r($data['praktikan']);
		// die;

		$this->load->view('aslab/templates/header');
		$this->load->view('aslab/templates/sidebar',$data);
		$this->load->view('aslab/kehadiran/index',$data);
		$this->load->view('aslab/templates/modal');
		$this->load->view('aslab/templates/footer');
	}

	public function insert() {   
		//print_r($_POST);die;
		$data['pertemuan_ke'] = $_POST['pertemuan_ke'];
		$data['id_kelas'] = $_POST['id_kelas'];
		$this->load->model('dosen/user_model');
		$i = 0;
		$data['nim'] = '0';	//mewakili semua yg hadir
		$data['status'] = 'hadir';
		$this->user_model->create_general('presensi_mahasiswa', $data);
		foreach ($_POST['nim'] as $name=>$key) {
			//echo $key . ' => '. $_POST['status'][$name] . '<br/>';
			$data['nim'] = $key;
			$data['status'] = $_POST['status'][$name];
			if($data['status'] != 'hadir'){
			  $this->user_model->create_general('presensi_mahasiswa', $data);
			}
		}		
		//die;
	 	redirect(base_url()."index.php/aslab/kehadiran/");  
	}

	public function update($param2='', $param1='')
	{
		$data['mhs'] = $this->dbObject->get_mahasiswa1($param2);
		//var_dump($data['mhs']);die;

		$this->load->view('aslab/templates/header');
		$this->load->view('aslab/templates/sidebar');
		$this->load->view('aslab/kehadiran/update', $data);
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
					location.replace("<?=base_url()?>index.php/aslab/kehadiran/");
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
					location.replace("<?=base_url()?>index.php/aslab/kehadiran/");
				</script>
				<?php
			}
		}
	}

	public function printdata($id_kelas)
	{
		//READ mahasiswa yang memiliki kom yg sama dengan yg ada di table kelas
		//$kom = "A22017";
		$i = 0;
		$this->load->model('kepala_lab/aslab_model');
		$data['mhs'] = $this->dbObject->get_kelasku2($id_kelas);
		foreach ($data['mhs'] as $key) {
			// print_r($key->kom);
			// echo '<br/>';
			$data['praktikan'][$i++] = $this->dbObject->get_praktikanku($key->kom);
		}
		$data['aslab'] = $this->dbObject->get_mahasiswa1($data['mhs'][0]->nim);
		$data['matkul'] = $this->dbObject->get_matkul($data['mhs'][0]->kode_matkul);
		$data['dosen'] = $this->aslab_model->get_nidn($data['mhs'][0]->nidn);
		//print_r($data['dosen']);die;
		
		$this->load->view('aslab/kehadiran/print',$data);
	}

	public function printujian($id_kelas)
	{
		//READ mahasiswa yang memiliki kom yg sama dengan yg ada di table kelas
		//$kom = "A22017";
		$i = 0;
		$this->load->model('kepala_lab/aslab_model');
		$data['mhs'] = $this->dbObject->get_kelasku2($id_kelas);
		foreach ($data['mhs'] as $key) {
			// print_r($key->kom);
			// echo '<br/>';
			$data['praktikan'][$i++] = $this->dbObject->get_praktikanku($key->kom);
		}
		$data['aslab'] = $this->dbObject->get_mahasiswa1($data['mhs'][0]->nim);
		$data['matkul'] = $this->dbObject->get_matkul($data['mhs'][0]->kode_matkul);
		$data['dosen'] = $this->aslab_model->get_nidn($data['mhs'][0]->nidn);
		//print_r($data['dosen']);die;
		
		$this->load->view('aslab/kehadiran/printUjian',$data);
	}

	public function printjadwal()
	{
		// $i = 0;
		// $this->load->model('kepala_lab/aslab_model');
		// $data['mhs'] = $this->dbObject->get_kelasku2($id_kelas);
		// foreach ($data['mhs'] as $key) {
		// 	$data['praktikan'][$i++] = $this->dbObject->get_praktikanku($key->kom);
		// }
		// $data['aslab'] = $this->dbObject->get_mahasiswa1($data['mhs'][0]->nim);
		// $data['matkul'] = $this->dbObject->get_matkul($data['mhs'][0]->kode_matkul);
		// $data['dosen'] = $this->aslab_model->get_nidn($data['mhs'][0]->nidn);
	
		$ruangan = $this->dbObject->get_general('lokasi_aset');
		$data['ruangan'] = $this->dbObject->get_general('lokasi_aset');
		// print_r($ruangan);die;   // diketahui bahwa $ruangan[0]->nama_ruang = 'Database';
		$days = array('senin', 'selasa', 'rabu', 'kamis', 'jumat');
		$sesis = array('08.00', '09.40', '11.20', '13.00', '14.40');
		$data['sesis'] = array('08.00', '09.40', '11.20', '13.00', '14.40');
		// print_r($sesi);die;

foreach ($days as $day) {
	foreach ($sesis as $sesi) {
		foreach ($ruangan as $object_ruang) {
			//echo $object_ruang->nama_ruang . '<br/>';
			$data['data'][$day][$sesi][$object_ruang->nama_ruang] = $this->dbObject->get_kelas($day, $sesi, $object_ruang->id_ruang);
			if(isset($data['data'][$day][$sesi][$object_ruang->nama_ruang][0]->kode_matkul)){
				$temp = $this->dbObject->get_matkul($data['data'][$day][$sesi][$object_ruang->nama_ruang][0]->kode_matkul);
				//print_r($temp);echo '<br/>';
				$data['data'][$day][$sesi][$object_ruang->nama_ruang][0]->nama_matkul = $temp[0]->nama_matkul;
			}
		}
	}
}
		//die;
		
		//  print_r($data['senin']['08.00']['Database']);
		// print_r($data['senin']['08.00']['Database'][0]->kode_matkul);
		// print_r($data['data']); die;
		
		// $data['data']['senin']['1']['Database'] = 'WS C2-17';
		// $data['data']['senin']['1']['Multimedia'] = 'WS C1-17';

		// $data['data']['senin']['2']['Database'] = 'IMK C2-17';
		// $data['data']['senin']['2']['Multimedia'] = 'IMK C1-17';
			
		// $data['data']['selasa']['1']['Database'] = 'SDA C2-17';
		// $data['data']['selasa']['1']['Multimedia'] = 'SDA C1-17';

		// $data['data']['selasa']['2']['Database'] = 'SBD C2-17';
		// $data['data']['selasa']['2']['Multimedia'] = 'SBD C1-17';



		$this->load->view('aslab/kehadiran/printJadwal',$data);
	}



}
