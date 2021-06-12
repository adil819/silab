<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

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

		$this->session->set_userdata('menu','artikel');

		$this->load->model('admin/artikel_model', 'dbObject');
  	}

  	public $tbl = 'artikel';
	public $id_name = 'id_artikel';

	public function index()
	{
		$data['artikel'] = $this->dbObject->get_all_artikel();

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/artikel/index', $data);
		$this->load->view('admin/templates/modal');
		$this->load->view('admin/templates/footer');
	}

	public function create($param1='')
	{
		

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/artikel/create');
		$this->load->view('admin/templates/footer');

		if ($param1 == 'do_create') {
			$artikel_judul=trim($this->input->post('artikel_judul'));
			$artikel_isi=$this->input->post('artikel_isi');
			$artikel_prodi=$this->input->post('artikel_prodi');

			$config['upload_path']          = 'assets/img/';
		    $config['allowed_types']        = 'gif|jpg|png';
		    $config['max_size']             = 10000;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('artikel_gambar'))
      {
            $error = array('error' => $this->upload->display_errors());

            var_dump($error);die;
      }
      else
      {
        $data = array(
					'judul' => $artikel_judul,
					'gambar' => $this->upload->data('file_name'),
					'isi' => $artikel_isi,
					'kode_prodi' => $artikel_prodi,
					'tanggal' => date('Y-m-d H:i:s')
				);
      }

			if($this->dbObject->create_general($this->tbl, $data)===TRUE)		// using direct parameter
			{
				?>
				<script>
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>index.php/admin/artikel/");
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script>
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>index.php/admin/artikel/");
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
			}
		}
	}

	public function update($param2='', $param1='')
	{
		$data['data_media'] = $this->dbObject->get_by_id_general($this->tbl, $this->id_name, $param2);

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/artikel/update', $data);
		$this->load->view('admin/templates/footer');

		if ($param1 == 'do_update') {
			$artikel_judul=trim($this->input->post('artikel_judul'));
			$artikel_isi=$this->input->post('artikel_isi');
			$artikel_prodi=$this->input->post('artikel_prodi');

			$config['upload_path']          = 'assets/img/';
		    $config['allowed_types']        = 'gif|jpg|png';
		    $config['max_size']             = 10000;

      		$this->load->library('upload', $config);

		      if ( ! $this->upload->do_upload('artikel_gambar'))
		      {
		             $data = array(
							'judul' => $artikel_judul,
							'isi' => $artikel_isi,
							'kode_prodi' => $artikel_prodi,
							'tanggal' => date('Y-m-d H:i:s')
						);
		      }
		      else
		      {
		        $data = array(
							'judul' => $artikel_judul,
							'gambar' => $this->upload->data('file_name'),
							'isi' => $artikel_isi,
							'kode_prodi' => $artikel_prodi,
							'tanggal' => date('Y-m-d H:i:s')
						);
		      }

			if($this->dbObject->update_general($this->tbl, $this->id_name, $param2, $data)===TRUE)		// using direct parameter
			{
				?>
				<script>
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>index.php/admin/artikel/");
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script>
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>index.php/admin/artikel/");
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
			}
		}
	}

	public function delete($param2='')
	{
		if($this->dbObject->delete_general($this->tbl, $this->id_name, $param2)===TRUE)		// using direct parameter
		{
			?>
			<script>
				alert(" Data berhasil dihapus. ");
				location.replace("<?=base_url()?>index.php/admin/media");
			</script>
			<?php
			//redirect('backoffice/master/category','refresh');
		}
		else {
			?>
			<script>
				alert(" Data gagal dihapus. ");
				location.replace("<?=base_url()?>index.php/admin/media");
			</script>
			<?php
			//redirect('backoffice/master/category','refresh');
		}
	}

	public function detail($param1='')
	{
		$data['media'] = $this->dbObject->get_by_id_general($this->tbl, $this->id_name, $param1);
		//var_dump($data['media']);die;
		$this->load->view('admin/artikel/detail', $data);
	}

}
