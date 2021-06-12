<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman extends CI_Controller {

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
		
		 $this->session->set_userdata('menu','peminjaman');	
		 $this->load->model('kepala_lab/inventaris_model', 'dbObject');
    }
	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['lab'] = $this->dbObject->get_lab($user_id);
		$data['dosen'] = $this->dbObject->get_dosen($data['lab'][0]->nidn);
		$data['peminjaman'] = $this->dbObject->get_inventaris();
		//var_dump($data['peminjaman']);die;
		$this->load->view('kepala_lab/templates/header');
		$this->load->view('kepala_lab/templates/sidebar',$data);
		$this->load->view('kepala_lab/peminjaman/index',$data);
		$this->load->view('kepala_lab/templates/footer');
	}

	public function ganti_status() {   
		$this->load->model('dosen/user_model');
		if($_POST['status'] == 'perpanjang'){
			$this->dbObject->perpanjang($_POST['id_peminjaman']);		
		}else {
			$data['id_peminjaman'] = $_POST['id_peminjaman'];
			$data['tanggal_plg'] = date("Y-m-d");
			$this->user_model->create_general('pengembalian', $data);
		}

	 	redirect(base_url()."index.php/kepala_lab/peminjaman");  
	}

	public function insert_jenis_barang() {   
		$data = $_POST;
		$this->load->model('dosen/user_model');
		$this->user_model->create_general('aset', $data);

	 	redirect(base_url()."index.php/kepala_lab/peminjaman/create");  
	}

	public function create($param1='')
	{
		$data['lab'] = $this->dbObject->get_lab(4);
		$data['peminjaman'] = $this->dbObject->get_inventaris();
		$data['barang'] = $this->dbObject->get_barang();
		$data['dosen'] = $this->dbObject->get_dosen($data['lab'][0]->nidn);
		//var_dump($data['barang']);die;
		$this->load->view('kepala_lab/templates/header');
		$this->load->view('kepala_lab/templates/sidebar', $data);
		$this->load->view('kepala_lab/peminjaman/create',$data);
		$this->load->view('kepala_lab/templates/footer');

		if ($param1 == 'do_create') {
			$brg=trim($this->input->post('brg'));
			$jumlah=$this->input->post('jumlah');
			$tanggal=$this->input->post('peminjaman');
			$nim=$this->input->post('nim');

        	$data = array(
					'id_barang' => $brg,
					'jumlah' => $jumlah,
					'tanggal' => $tanggal,
					'nim' => $nim
				);
			if($this->dbObject->create_general('peminjaman', $data)===TRUE)		// using direct parameter
			{
				$this->session->set_flashdata('pesan', [
               	        'title' => '',
               	        'message' => 'Data Berhasil Diubah',
               	        'type' => 'success'
               	        ]);
				?>
				<script>
					//alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>index.php/kepala_lab/peminjaman/");
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
					//alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>index.php/kepala_lab/peminjaman/");
				</script>
				<?php
			}	
		}
	}
}
