<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

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
		
		 $this->session->set_userdata('menu','inventaris');	
		 $this->load->model('kepala_lab/inventaris_model', 'dbObject');
    }
	public function index()
	{
		// $data['aset'] = $this->dbObject->get_all_aset();
		$data['lab'] = $this->dbObject->get_lokasi();
		//print_r($data['lab']);die;
		foreach ($data['lab'] as $key) {
			$data['aset'][$key->id_ruang] = $this->dbObject->get_aset($key->id_ruang);# code...
		}
		
		// print_r($data['aset']);die;
		//var_dump($data['inventaris']);die;
		$temp = $this->session->userdata('user_id');
		$this->load->model('admin/Testimoni_model');
		$data['admin'] = $this->Testimoni_model->get_admin($temp);
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/inventaris/index',$data);
		$this->load->view('admin/templates/footer');
	}

	public function insert_jenis_barang() {   
		$data = $_POST;
		//print_r($data);die;
		$this->load->model('dosen/user_model');
		$this->user_model->create_general('aset', $data);

	 	redirect(base_url()."index.php/admin/inventaris/create");  
	}

	public function create($param1)
	{
		$id_ruang = $this->uri->segment(4);
		//print_r($id_ruang);die;
		$temp = $this->session->userdata('user_id');
		$this->load->model('admin/Testimoni_model');
		$data['admin'] = $this->Testimoni_model->get_admin($temp);
		$data['lab'] = $this->dbObject->get_labb(2);
		$data['inventaris'] = $this->dbObject->get_inventaris();
		$data['barang'] = $this->dbObject->get_barang();
		//print_r($data['lab']);die;
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/inventaris/create',$data);
		$this->load->view('admin/templates/footer');

		if ($param1 == 'do_create') {
			$brg=trim($this->input->post('brg'));
			$jumlah=$this->input->post('jumlah');
			$kondisi=$this->input->post('kondisi');
			$id_ruang=$this->input->post('id_ruang');

        	$data = array(
					'id_barang' => $brg,
					'jumlah' => $jumlah,
					'id_ruang' => $id_ruang,
					'kondisi' => $kondisi
				);
			if($this->dbObject->create_general('detail_aset', $data)===TRUE)		// using direct parameter
			{
				$this->session->set_flashdata('pesan', [
               	        'title' => '',
               	        'message' => 'Data Berhasil Disimpan',
               	        'type' => 'success'
               	        ]);
				?>
				<script>
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>index.php/admin/inventaris/");
				</script>
				<?php
			}
			else {
				$this->session->set_flashdata('pesan', [
               	        'title' => '',
               	        'message' => 'Data Gagal Disimpan',
               	        'type' => 'danger'
               	        ]);
				?>
				<script>
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>index.php/admin/inventaris/");
				</script>
				<?php
			}
		}
	}
}
