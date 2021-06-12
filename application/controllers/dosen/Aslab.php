<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aslab extends CI_Controller {

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

	$this->session->set_userdata('menu','aslab');

	$this->load->model('dosen/aslab_model', 'dbObject');
  }

 	public $tbl = 'nilai';
	public $id_name = 'nim';

	public function index()
	{
		$temp = $this->session->userdata('user_id');
		$dosen = $this->dbObject->get_nidn($temp);
		$data['dosen'] = $this->dbObject->get_nidn($temp);
		//$dosen diambil dari session dosen yang login
		$data['aslab'] = $this->dbObject->get_aslab2($dosen[0]->nidn);
		//print_r($data['aslab']); die;;

		foreach($data['aslab'] as $key){
			//$data['mhs'][$key->id_kelas] = $this->dbObject->get_kelasku($key->id_aslab);
			//print_r($data['mhs']);echo '<hr/>';die;
			$data['pertemuan_ke'][$key->id_kelas] = $this->dbObject->get_last_pertemuan($key->id_kelas);
			$i = 1;
			foreach ($data['pertemuan_ke'][$key->id_kelas] as $key2) {
				$data['absen'][$key->id_kelas] = $this->dbObject->get_mahasiswa2($key->id_kelas);
			}
		}
		 
		 //print_r($data['pertemuan_ke']);echo '<hr/>';
		 //print_r($data['absen']);echo '<hr/>';
		 //die;
		
		//$data['mhs1'] = $this->dbObject->get_mahasiswa1($dosen);
		

		//print_r($data['aslab']);die;
		$this->load->view('dosen/templates/header');
		$this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/aslab/index',$data);
		$this->load->view('dosen/templates/modal');
		$this->load->view('dosen/templates/footer');
	}

	public function update($param2='', $param1='')
	{
		$temp = $this->session->userdata('user_id');
		$data['dosen'] = $this->dbObject->get_nidn($temp);
		$data['mhs'] = $this->dbObject->get_mahasiswa1($param2);
		//var_dump($data['mhs']);die;

		$this->load->view('dosen/templates/header');
		$this->load->view('dosen/templates/sidebar',$data);
		$this->load->view('dosen/aslab/update', $data);
		$this->load->view('dosen/templates/footer');

		if ($param2 == 'do_update') 
		{
			$nilai = $this->input->post('nilai');
		
	        $data = array(
	       		'nilai' => $nilai
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
					location.replace("<?=base_url()?>index.php/dosen/matakuliah/");
				</script>
				<?php
			}
			else {
				$this->session->set_flashdata('pesan', [
               	        'title' => '',
               	        'message' => 'Data Gagal Diubah',
               	        'type' => 'success'
               	        ]);
				?>
				<script>
					//alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>index.php/dosen/matakuliah/");
				</script>
				<?php
			}
		}
	}



}
