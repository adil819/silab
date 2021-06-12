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
		$this->load->model('admin/Testimoni_model');
		$data['kelas'] = $this->Testimoni_model->get_kelas();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/kelas/index', $data);
		$this->load->view('admin/templates/footer');
	}
	
	public function create()
	{
		$this->load->model('admin/Testimoni_model');
		$data['kelas_kom'] = $this->Testimoni_model->get_general('kelas_kom');
		$data['lab'] = $this->Testimoni_model->get_general('laboratorium');
		$data['dosen'] = $this->Testimoni_model->get_general('dosen');
		$data['matkul'] = $this->Testimoni_model->get_general('matkul');
		$data['aslab'] = $this->Testimoni_model->get_aslab();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/kelas/create', $data);
		$this->load->view('admin/templates/footer');
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
		$data['kode_prodi'] = '1402';
		$this->load->model('dosen/user_model');
		$this->user_model->create_general('dosen', $data);

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
		$data['kode_prodi'] = '1402';
		$this->load->model('dosen/user_model');
		$this->user_model->create_general('aslab', $data);

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
