<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

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
		
		 $this->session->set_userdata('menu','kelas');	
    }
	public function index()
	{
		$temp = $this->session->userdata('user_id');
		$this->load->model('admin/Testimoni_model');
		$data['admin'] = $this->Testimoni_model->get_admin($temp);
		$data['kelas'] = $this->Testimoni_model->get_kelas();
		//print_r($data);die;
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/kelas/index', $data);
		$this->load->view('admin/templates/footer');
	}
	
	public function create()
	{
		$temp = $this->session->userdata('user_id');
		$this->load->model('admin/Testimoni_model');
		$data['admin'] = $this->Testimoni_model->get_admin($temp);
		$this->load->model('admin/Testimoni_model');
		$data['kelas_kom'] = $this->Testimoni_model->get_general('kelas_kom');
		$data['lab'] = $this->Testimoni_model->get_general('lokasi_aset');
		$data['dosen'] = $this->Testimoni_model->get_general('dosen');
		$data['matkul'] = $this->Testimoni_model->get_general('matkul');
		$data['aslab'] = $this->Testimoni_model->get_aslab();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/kelas/create', $data);
		$this->load->view('admin/templates/footer');
	}
	
	public function delete()
	{
		$this->load->model('admin/Testimoni_model');
		//$this->Testimoni_model->ekspor();
		
		$this->Testimoni_model->delete_aslab();
		$this->Testimoni_model->delete();

		redirect(base_url()."index.php/admin/kelas/index");  		
	}
	
	public function ekspor()
	{
		$this->load->model('admin/Testimoni_model');
		//$this->Testimoni_model->ekspor();

		$data['kelas'] = $this->Testimoni_model->get_kelas();
		//print_r($data);die;

		$this->load->view('admin/kelas/ekspor_kelas', $data);

		//redirect(base_url()."index.php/admin/kelas/ekspor2/1");  		
	}
	
	public function ekspor2($id_kelas)
	{
		$this->load->model('aslab/matakuliah_model');
		
		
		$data['temp'] = $id_kelas;
		$this->load->model('kepala_lab/aslab_model');
		//READ mahasiswa yang memiliki kom yg sama dengan yg ada di table kelas
		//$kom = "A22017";
		$i = 0;
		$temp = 2; //id_aslab
		$id_aslab = $this->matakuliah_model->get_id_aslab($temp);
		$data['aslab'] = $this->matakuliah_model->get_mahasiswaA($id_aslab[0]->nim);
		// print_r($data['aslab']);die;

		$this->load->model('aslab/kehadiran_model');
		$data['mhs'] = $this->kehadiran_model->get_kelasku($id_aslab[0]->id_aslab);
		// print_r($data['mhs']);die;

		foreach ($data['mhs'] as $key) {
			// print_r($key->kom);die;
			// echo '<br/>';
			$data['jenis'][$i] = $this->matakuliah_model->get_jenis_penilaian($key->id_kelas);	
			$data['praktikan'][$i] = $this->matakuliah_model->get_praktikanku($key->kom);
			$data['matkul'][$i] = $this->matakuliah_model->get_matkul($key->kode_matkul);
			$data['dosen'][$i++] = $this->aslab_model->get_nidn($data['mhs'][0]->nidn);
		}
		// print_r($data['praktikan']);die;
	
		$j = 1;
	foreach ($data['jenis'] as $keys) {
		foreach ($keys as $key) {
			foreach ($data['praktikan'] as $rows): 
				foreach ($rows as $row): 
					$data['nilai'][$key->jenis_penilaian][$row->nim] = $this->matakuliah_model->get_nilai($id_kelas, $key->jenis_penilaian, $row->nim);	
				endforeach;
			endforeach;
		}			
		$j++;
	}			
	// print_r($data['nilai']['Kuis']['171402003']);die;
		
		//$this->load->view('aslab/matakuliah/print',$data);

		$this->load->view('admin/kelas/ekspor_aslab', $data);

		//redirect(base_url()."index.php/admin/kelas/index");  		
	}

	public function insert_kelas_kom() {   
		$data = $_POST;
		$data['kom'] = $data['kelas_kom'][0];
		$data['kode_prodi'] = '1402';
		$this->load->model('dosen/user_model');
		$this->user_model->create_general('kelas_kom', $data);

	 	redirect(base_url()."index.php/admin/kelas/create");  
	}

	public function insert_dosen() {  
		$data = $_POST;
		$this->load->model('dosen/user_model');
		//print_r($this->user_model->get_last_user());		die;

		$data2['user_name'] = $data['nidn'];
		$data2['user_email'] = $data['email'];
		$data2['user_password'] = $data['nidn'];
		$data2['user_level'] = 'dosen';
		$this->user_model->create_general('tbl_users', $data2);

		$user_id = $this->user_model->get_last_user();			
		$data3['nidn'] = $data['nidn'];
		$data3['nama_dosen'] = $data['nama_dosen'];
		$data3['kontak'] = $data['kontak'];
		$data3['kode_prodi'] = '1402';
		$data3['user_id'] = $user_id[0]['user_id'];		
		$this->user_model->create_general('dosen', $data3);

	 	redirect(base_url()."index.php/admin/kelas/create");  
	}

	public function insert_matkul() {   
		$data = $_POST;
		$this->load->model('dosen/user_model');
		$this->user_model->create_general('matkul', $data);

	 	redirect(base_url()."index.php/admin/kelas/create");  
	}

	public function insert_aslab() {   
		$data = $_POST;
		$this->load->model('dosen/user_model');
		//print_r($this->user_model->get_last_user());		die;

		$data2['user_name'] = $data['nim'];
		$data2['user_email'] = $data['email'];
		$data2['user_password'] = $data['nim'];
		$data2['user_level'] = 'aslab';
		$this->user_model->create_general('tbl_users', $data2);

		$user_id = $this->user_model->get_last_user();		
		$data3['nim'] = $data['nim'];
		$data3['kontak'] = $data['kontak'];
		$data3['kode_prodi'] = '1402';
		$data3['id_dosen'] = '0031087905';
		$data3['user_id'] = $user_id[0]['user_id'];
		$this->user_model->create_general('aslab', $data3);

	 	redirect(base_url()."index.php/admin/kelas/create");  
	}

	public function insert_kelas() {   
		$data['kode_prodi'] = '1402';
		$data['kom'] = $_POST['kom'];
		$data['kode_matkul'] = $_POST['kode_matkul'];
		$data['id_aslab'] = $_POST['id_aslab'];
		$data['nidn'] = $_POST['nidn'];
		$data2['jam_masuk'] = $_POST['jam_masuk'];
		$data2['hari'] = $_POST['hari'];
		$data2['id_lab'] = $_POST['id_lab'];
		$this->load->model('dosen/user_model');
		$this->load->model('admin/Testimoni_model');
		$this->user_model->create_general('kelas', $data);

		$data2['id_kelas'] = $this->Testimoni_model->get_last_id('kelas');
		$data2['id_kelas'] = $data2['id_kelas'][0]['last'];
		$this->user_model->create_general('jadwal_kelas', $data2);

	 	redirect(base_url()."index.php/admin/kelas/");  
	}
}
