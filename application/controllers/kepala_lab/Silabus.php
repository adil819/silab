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

	$this->load->model('kepala_lab/silabus_model', 'dbObject');
  }

 	public $tbl = 'silabus';
	public $id_name = 'id_silabus';

	public function index()
	{
		$temp = $this->session->userdata('user_id');
		$dosen = $this->dbObject->get_nidn2($temp);
		$data['dosen'] = $this->dbObject->get_nidn($dosen[0]->nidn);
		$data['lab'] = $this->dbObject->get_lab($temp);
		$data['aslab'] = $this->dbObject->get_aslab2($dosen[0]->nidn);
		foreach($data['aslab'] as $key){			
			$data['mhs'][$key->id_kelas] = $this->dbObject->get_silabus_kelas($key->id_kelas);
		}
		//print_r($data['dosen']);die;
		$this->load->view('kepala_lab/templates/header');
		$this->load->view('kepala_lab/templates/sidebar',$data);
		$this->load->view('kepala_lab/silabus/index',$data);
		$this->load->view('kepala_lab/templates/modal');
		$this->load->view('kepala_lab/templates/footer');
	}

	public function update($param2='', $param1='')
	{
		$temp = $this->session->userdata('user_id');
		$data['dosen'] = $this->dbObject->get_nidn($temp);
		$data['mhs'] = $this->dbObject->get_silabus_by_id($param2);
		//var_dump($data['mhs']);die;

		$this->load->view('aslab/templates/header');
		$this->load->view('aslab/templates/sidebar',$data);
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
