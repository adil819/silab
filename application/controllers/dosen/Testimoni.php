<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

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

    	if ($this->session->userdata('login') == 0 || $this->session->userdata('user_level') != '1') redirect('auth/logout');
		
		$this->session->set_userdata('menu','testimoni');

		$this->load->model('admin/testimoni_model', 'dbObject');	
    }

    public $tbl = 'fd_testimony';
	public $id_name = 'testimony_id';

	public function index()
	{
		$data['testimoni'] = $this->dbObject->get_general($this->tbl);

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/testimoni/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function create($param1='')
	{
		$data['kategori'] = $this->dbObject->get_general('fd_media_kategori');

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/testimoni/create');
		$this->load->view('admin/templates/footer');

		if ($param1 == 'do_create') {
			$testimoni_nama=trim($this->input->post('testimony_nama'));
			$testimoni_jabatan=trim($this->input->post('testimony_jabatan'));
			$testimoni_isi=$this->input->post('testimony_isi');

			$config['upload_path']          = 'assets/img/testimoni';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 10000;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('testimony_image'))
	        {
                $error = array('error' => $this->upload->display_errors());

                var_dump($error);die;
	        }
	        else
	        {
		        $data = array(
					'testimony_nama' => $testimoni_nama, 
					'testimony_image' => $this->upload->data('file_name'),
					'testimony_isi' => $testimoni_isi,
					'testimony_jabatan' => $testimoni_jabatan,
					'testimony_created_by' => $this->session->userdata('user_id'),
					'testimony_created_time' => date('Y-m-d H:i:s')
				);
	        }

			if($this->dbObject->create_general($this->tbl, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>index.php/admin/testimoni/"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>index.php/admin/testimoni/");  
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
			}
		}
	}

	public function update($param2='', $param1='')
	{
		$data['data_testimoni'] = $this->dbObject->get_by_id_general($this->tbl, $this->id_name, $param2);

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/testimoni/update', $data);
		$this->load->view('admin/templates/footer');

		if ($param1 == 'do_update') {
			$testimoni_nama=trim($this->input->post('testimony_nama'));
			$testimoni_jabatan=trim($this->input->post('testimony_jabatan'));
			$testimoni_isi=$this->input->post('testimony_isi');

			$config['upload_path']          = 'assets/img/testimoni';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 10000;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('testimony_image'))
	        {
                $data = array(

					'testimony_nama' => $testimoni_nama,
					'testimony_isi' => $testimoni_isi,
					'testimony_jabatan' => $testimoni_jabatan,
					'testimony_update_by' => $this->session->userdata('user_id'),
					'testimony_update_date' => date('Y-m-d H:i:s')
				);
	        }
	        else
	        {
		        $data = array(
					'testimony_nama' => $testimoni_nama, 
					'testimony_image' => $this->upload->data('file_name'),
					'testimony_isi' => $testimoni_isi,
					'testimony_jabatan' => $testimoni_jabatan,
					'testimony_insert_by' => $this->session->userdata('user_id'),
					'testimony_insert_time' => date('Y-m-d H:i:s')
				);
	        }

			if($this->dbObject->update_general($this->tbl, $this->id_name, $param2, $data)===TRUE)		// using direct parameter
			{
				?>
				<script> 
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>index.php/admin/testimoni/"); 
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script> 
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>index.php/admin/testimoni/");  
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
				location.replace("<?=base_url()?>index.php/admin/testimoni"); 
			</script>
			<?php
			//redirect('backoffice/master/category','refresh');
		}
		else {
			?>
			<script> 
				alert(" Data gagal dihapus. ");
				location.replace("<?=base_url()?>index.php/admin/testimoni"); 
			</script>
			<?php
			//redirect('backoffice/master/category','refresh');
		}
	}
}
