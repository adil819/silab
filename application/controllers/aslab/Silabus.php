<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Silabus extends CI_Controller {

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

	$this->session->set_userdata('menu','silabus');

	$this->load->model('aslab/silabus_model', 'dbObject');
  }

 	public $tbl = 'silabus';
	public $id_name = 'id_silabus';

	public function index()
	{
		$this->load->model('aslab/Matakuliah_model');
		$temp = $this->session->userdata('user_id');
		$id_aslab = $this->Matakuliah_model->get_id_aslab($temp);
		$data['aslab'] = $this->Matakuliah_model->get_mahasiswaA($id_aslab[0]->nim);
		$data['kelas'] = $this->dbObject->get_kelas($id_aslab[0]->id_aslab);	//kom yg diajar aslab
		// print_r($data['kelas']);die;
		foreach ($data['kelas'] as $id_kls) {
			$data['mhs'][$id_kls->id_kelas] = $this->dbObject->get_silabus_by_id($id_kls->id_kelas);
		}
		$this->load->model('aslab/kehadiran_model');
		$data['mhs2'] = $this->kehadiran_model->get_kelasku($id_aslab[0]->id_aslab);
		$i = 0;
		foreach ($data['mhs2'] as $key) {
			// print_r($key->kom);die;
			// echo '<br/>';
			$data['matkul'][$i++] = $this->Matakuliah_model->get_matkul($key->kode_matkul);
		}
		// print_r($data['mhs']);die;
		$this->load->view('aslab/templates/header');
		$this->load->view('aslab/templates/sidebar',$data);
		$this->load->view('aslab/silabus/index',$data);
		$this->load->view('aslab/templates/modal');
		$this->load->view('aslab/templates/footer');
	}

	public function insert_silabus($id_kelas) {   
		$data = $_POST;
		$data['status'] = 0;
		$data['id_kelas'] = $id_kelas; //INSERT BERDASARKAN ID KELAS YANG DISIMPAN SESSION
		$this->load->model('aslab/Silabus_model');
		$this->Silabus_model->create_general('silabus', $data);

	 	redirect(base_url()."index.php/aslab/silabus");  
	}

	public function update($param2='', $param1='')
	{
		$this->load->model('aslab/Matakuliah_model');
		$temp = $this->session->userdata('user_id');
		$id_aslab = $this->Matakuliah_model->get_id_aslab($temp);
		$data['aslab'] = $this->Matakuliah_model->get_mahasiswaA($id_aslab[0]->nim);
		$data['mhs'] = $this->dbObject->get_silabus_by_id2($param2);
		//var_dump($data['mhs']);die;

		$this->load->view('aslab/templates/header');
		$this->load->view('aslab/templates/sidebar', $data);
		$this->load->view('aslab/silabus/update', $data);
		$this->load->view('aslab/templates/footer');

		if ($param2 == 'do_update') 
		{
			$status = $this->input->post('status');
		
	        $data = array(
	       		'status' => $status
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
					location.replace("<?=base_url()?>index.php/aslab/silabus/");
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
					location.replace("<?=base_url()?>index.php/aslab/silabus/");
				</script>
				<?php
			}
		}
	}

	public function printdata($param1)
	{
		$data['nilai']=$this->dbObject->get_mahasiswa1($param1);
		$this->load->view('aslab/matakuliah/print',$data);
	}



}
