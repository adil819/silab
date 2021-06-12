<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

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

		$this->session->set_userdata('menu','registration');

		$this->load->model('admin/registration_model', 'dbObject');
    }

    public $tbl = 'fd_operator';
	public $id_name = 'id';
	public $tbl2 = 'fd_users';
	public $id_name2 = 'users_user_id';

	public function index()
	{
		$data['operator'] = $this->dbObject->get_operator();

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/registration/index', $data);
		$this->load->view('admin/templates/modal');
		$this->load->view('admin/templates/footer');
	}

	public function create($param1='')
	{
		$data['lokal_distributor'] = $this->dbObject->get_general($this->tbl);
		$this->session->set_userdata('submenu','tambah');

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/registration/create', $data);
		$this->load->view('admin/templates/footer');

		if ($param1 == 'do_create') {
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$nama=$this->input->post('nama');
			
		        $data = array(
					'password' => md5($password),
					'name' => $nama,
				);

			if($this->dbObject->create_general($this->tbl, $data)===TRUE)		// using direct parameter
			{
				$datausers = array(
				'users_username' => $username,
				'users_user_id' => $this->db->insert_id(),
				'users_role_id' => '2',
				'users_status_active'=>'1',
				'users_created_time'=>date('Y-m-d H:i:s'),
				'users_created_by'=>$this->session->userdata('user_id')
				);
				if($this->dbObject->create_general('fd_users', $datausers)===TRUE){		// using direct parameter
				?>
				<script>
					alert(" Data berhasil disimpan. ");
					location.replace("<?=base_url()?>index.php/distributor/registration/");
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script>
					alert(" Data gagal disimpan. ");
					location.replace("<?=base_url()?>index.php/distributor/registration/");
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
			}
		}
	}
}

	public function update($param2='', $param1='')
	{
		$data['operator'] = $this->dbObject->get_operator_by_id($param2);
		$this->load->view('admin/registration/update', $data);

		if ($param1 == 'do_update') {
			$admin_username=$this->input->post('username');
			$admin_password=$this->input->post('password');
			$admin_nama=$this->input->post('nama');
			$admin_status=$this->input->post('status');

		        $data = array(
					'password' => $admin_password,
					'name' => $admin_nama,
				);


			if($this->dbObject->update_general($this->tbl, $this->id_name, $param2, $data)===TRUE)		// using direct parameter
			{
				$datausers = array(
				'users_username' => $admin_username,
				'users_status_active'=> $admin_status,
				);
				if($this->dbObject->update_general($this->tbl2, $this->id_name2 , $param2, $datausers)===TRUE){		// using direct parameter
				?>

				?>
				<script>
					alert(" Data berhasil diubah. ");
					location.replace("<?=base_url()?>index.php/admin/registration/");
				</script>
				<?php
				//redirect('master/jabatan','refresh');
			}
			else {
				?>
				<script>
					alert(" Data gagal diubah. ");
					location.replace("<?=base_url()?>index.php/admin/registration/");
				</script>
				<?php
				//redirect('master/jabatan_insert','refresh');
			}
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
				location.replace("<?=base_url()?>index.php/distributor/registration");
			</script>
			<?php
			//redirect('backoffice/master/category','refresh');
		}
		else {
			?>
			<script>
				alert(" Data gagal dihapus. ");
				location.replace("<?=base_url()?>index.php/distributor/registration");
			</script>
			<?php
			//redirect('backoffice/master/category','refresh');
		}
	}

	public function detail($param1='')
	{
		$data['operator'] = $this->dbObject->get_operator_by_id($param1);
		$this->load->view('admin/registration/detail', $data);
	}

}
