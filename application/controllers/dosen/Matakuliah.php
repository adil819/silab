<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

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

	$this->session->set_userdata('menu','matakuliah');

	$this->load->model('dosen/matakuliah_model', 'dbObject');
  }

 	public $tbl = 'nilai';
	public $id_name = 'nim';

	public function index()
	{
		$data['mhs'] = $this->dbObject->get_mahasiswa();
		//var_dump($data['mahasiswa']);die;
		$this->load->view('dosen/templates/header');
		$this->load->view('dosen/templates/sidebar');
		$this->load->view('dosen/matakuliah/index',$data);
		$this->load->view('dosen/templates/modal');
		$this->load->view('dosen/templates/footer');
	}

	public function update($param2='', $param1='')
	{
		$data['mhs'] = $this->dbObject->get_mahasiswa1($param2);
		//var_dump($data['mhs']);die;

		$this->load->view('dosen/templates/header');
		$this->load->view('dosen/templates/sidebar');
		$this->load->view('dosen/matakuliah/update', $data);
		$this->load->view('dosen/templates/footer');

		if ($param2 == 'do_update') 
		{
			$nilai = $this->input->post('nilai');
		
	        $data = array(
	       		'nilai' => $nilai
			);
	        
			if($this->dbObject->update_general($this->tbl, $this->id_name, $param1, $data)===TRUE)		// using direct parameter
			{
				?>
				<script>
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>index.php/dosen/matakuliah/");
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script>
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>index.php/dosen/matakuliah/");
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
			}
		}
	}



}
