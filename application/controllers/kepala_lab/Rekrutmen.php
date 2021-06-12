<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rekrutmen extends CI_Controller {

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
		
		 $this->session->set_userdata('menu','rekrutmen');	
		 $this->load->model('admin/rekrutmen_model', 'dbObject');
    }
	public function index()
	{
		$data['rekrutmen'] = $this->dbObject->get_rekrutmen();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/rekrutmen/index',$data);
		$this->load->view('admin/templates/footer');
	}

	public function create($param1='')
	{
		$data['fakultas'] = $this->dbObject->get_fakultas();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/rekrutmen/create',$data);
		$this->load->view('admin/templates/footer');

		if ($param1 == 'do_create') {
			$isi=$this->input->post('isi');
			$fakultas_id=trim($this->input->post('fakultas_id'));
			$config['upload_path']          = 'assets/img/';
		  	$config['allowed_types']        = 'zip|rar|pdf|';
		  	$config['max_size']             = 10000;
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('file_upload'))
      {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);die;
      }
      else
      {
        $data = array(
					'file' => $this->upload->data('file_name'),
					'id_fakultas' => $fakultas_id,
					'isi' => $isi
				);
      }

			if($this->dbObject->create_general('rekrutmen', $data)===TRUE)		// using direct parameter
			{
				?>
				<script>
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>index.php/admin/rekrutmen/");
				</script>
				<?php
			}
			else {
				?>
				<script>
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>index.php/admin/rekrutmen/");
				</script>
				<?php
			}
		}
	}

public function detail($param1='')
	{
		$data['fakultas'] = $this->dbObject->get_by_id_general('rekrutmen', 'id_fakultas', $param1);
		$this->load->view('admin/rekrutmen/detail', $data);
	}

}
