<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {

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
		
		$this->session->set_userdata('menu','inbox');	

		$this->load->model('admin/inbox_model', 'dbObject');
    }

	public $tbl = 'lb_kontak';
	public $id_name = 'kontak_id';

	public function index()
	{
		$data['inbox'] = $this->dbObject->get_general('lb_kontak');

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/inbox/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function delete($param2='')
	{
		if($this->dbObject->delete_general($this->tbl, $this->id_name, $param2)===TRUE)		// using direct parameter
		{
			?>
			<script> 
				alert(" Data berhasil dihapus. ");
				location.replace("<?=base_url()?>index.php/admin/inbox"); 
			</script>
			<?php
			//redirect('backoffice/master/category','refresh');
		}
		else {
			?>
			<script> 
				alert(" Data gagal dihapus. ");
				location.replace("<?=base_url()?>index.php/admin/inbox"); 
			</script>
			<?php
			//redirect('backoffice/master/category','refresh');
		}
	}
}
