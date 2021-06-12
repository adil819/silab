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
		 $this->load->model('aslab/inventaris_model', 'dbObject');
    }
	public function index()
	{
		$data['inventaris'] = $this->dbObject->get_inventaris();
		//var_dump($data['inventaris']);die;
		$this->load->view('aslab/templates/header');
		$this->load->view('aslab/templates/sidebar');
		$this->load->view('aslab/inventaris/index',$data);
		$this->load->view('aslab/templates/footer');
	}

	public function create($param1='')
	{
		$data['inventaris'] = $this->dbObject->get_inventaris();
		$data['barang'] = $this->dbObject->get_barang();
		//var_dump($data['barang']);die;
		$this->load->view('aslab/templates/header');
		$this->load->view('aslab/templates/sidebar');
		$this->load->view('aslab/inventaris/create',$data);
		$this->load->view('aslab/templates/footer');

		if ($param1 == 'do_create') {
			$brg=trim($this->input->post('brg'));
			$jumlah=$this->input->post('jumlah');
			$tanggal=$this->input->post('peminjaman');
			$pengembalian=$this->input->post('pengembalian');
			$kode=$this->input->post('kode');
			$nim=$this->input->post('nim');

			$data1= array(
				'tanggal_plg' => $pengembalian,
				'id_peminjaman' => $kode 
				);

        	$data = array(
					'id_barang' => $brg,
					'jumlah' => $jumlah,
					'tanggal' => $tanggal,
					'id_peminjaman' => $kode,
					'nim' => $nim
				);
        	if($this->dbObject->create_general('pengembalian', $data1)===TRUE)		// using direct parameter
			{
				if($this->dbObject->create_general('peminjaman', $data)===TRUE)		// using direct parameter
				{
					?>
					<script>
						alert(" Data berhasil disimpan. ");
						location.replace("<?=base_url()?>index.php/aslab/inventaris/");
					</script>
					<?php
				}
			}
			else {
				?>
				<script>
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>index.php/aslab/inventaris/");
				</script>
				<?php
			}
		}
	}
}
