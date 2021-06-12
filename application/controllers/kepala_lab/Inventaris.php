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
		$user_id = $this->session->userdata('user_id');
		$data['lab'] = $this->dbObject->get_lab($user_id);
		$data['aset'] = $this->dbObject->get_aset($data['lab'][0]->id_ruang);
		$data['dosen'] = $this->dbObject->get_dosen($data['lab'][0]->nidn);
		//print_r($data['dosen']);die;

		function get_lab($user_id)
		{
			$query = $this->db->query('SELECT * FROM kepala_lab JOIN lokasi_aset ON kepala_lab.id_ruang = lokasi_aset.id_ruang WHERE kepala_lab.user_id = ' . $user_id);
			return $query->result();
		}
		//var_dump($data['inventaris']);die;
		$this->load->view('kepala_lab/templates/header');
		$this->load->view('kepala_lab/templates/sidebar',$data);
		$this->load->view('kepala_lab/inventaris/index',$data);
		$this->load->view('kepala_lab/templates/footer');
	}

	public function insert_jenis_barang() {   
		$data = $_POST;
		$this->load->model('dosen/user_model');
		$this->user_model->create_general('aset', $data);

	 	redirect(base_url()."index.php/admin/inventaris/create");  
	}

	public function create($param1='')
	{
		$data['lab'] = $this->dbObject->get_lab(4);
		$data['inventaris'] = $this->dbObject->get_inventaris();
		$data['barang'] = $this->dbObject->get_barang();
		$data['dosen'] = $this->dbObject->get_dosen($data['lab'][0]->nidn);
		//var_dump($data['barang']);die;
		$this->load->view('kepala_lab/templates/header');
		$this->load->view('kepala_lab/templates/sidebar', $data);
		$this->load->view('kepala_lab/inventaris/create',$data);
		$this->load->view('kepala_lab/templates/footer');

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
						//alert(" Data berhasil disimpan. ");
						location.replace("<?=base_url()?>index.php/kepala_lab/inventaris/");
					</script>
					<?php
				}
				else {
					$this->session->set_flashdata('pesan', [
							   'title' => '',
							   'message' => 'Data Gagal Disimpan',
							   'type' => 'success'
							   ]);
					?>
					<script>
						//alert(" Data gagal disimpan. ");
						location.replace("<?=base_url()?>index.php/kepala_lab/inventaris/");
					</script>
					<?php
				}
		}
	}
}
