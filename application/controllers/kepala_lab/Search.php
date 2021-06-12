<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

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
  	{   	
  		parent::__construct();

	  	// if ($this->session->userdata('login') == 0 || $this->session->userdata('user_level') != '1') redirect('auth/logout');

		$this->session->set_userdata('menu','search');

		$this->load->model('kepala_lab/search_model', 'dbObject');
  	}

  	public $tbl = 'search';
	//public $id_name = 'id_artikel';

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['lab'] = $this->dbObject->get_lab($user_id);
		$data['aset'] = $this->dbObject->get_aset($data['lab'][0]->id_ruang);
		$data['dosen'] = $this->dbObject->get_dosen2($data['lab'][0]->nidn);
		//$data['hasil'] = $this->dbObject->search('adil');

		if(isset($_GET['key'])){
			$key = $_GET['key'];
			$data['data']=$this->dbObject->search($key);
			//	print_r($data['data']);die;
		}

		//print_r($data['hasil']);die;

		$this->load->view('kepala_lab/templates/header');
		$this->load->view('kepala_lab/templates/sidebar', $data);
		$this->load->view('kepala_lab/search/index', $data);
		$this->load->view('kepala_lab/templates/modal');
		$this->load->view('kepala_lab/templates/footer');
	}

	public function detail($nim)
	{
		$data['praktikan'] = $this->dbObject->get_aslab2($nim);
		$data['kom'] = $this->dbObject->get_kom($nim);
		$data['kelas'] = $this->dbObject->get_kelas($data['kom'][0]->kom);
		foreach ($data['kelas'] as $key => $value) {
			$data['matkul'][$value->id_kelas] = $this->dbObject->get_matkul($value->kode_matkul);
			$temp = $this->dbObject->get_aslab($value->id_aslab);
			$data['aslab'][$value->id_kelas] = $this->dbObject->get_aslab2($temp[0]->nim);
			$data['dosen2'][$value->id_kelas] = $this->dbObject->get_dosen($value->nidn);
			$data['nilai'][$value->id_kelas] = $this->dbObject->get_nilai($value->id_kelas, $nim);
		}
		//print_r($data['nilai']);die;
		//$data['media'] = $this->dbObject->get_by_id_general($this->tbl, $this->id_name, $param1);
		//var_dump($data['media']);die;
		$this->load->view('kepala_lab/search/detail', $data);
	}
}
