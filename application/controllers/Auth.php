<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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

    	$this->load->model('auth_model', 'dbObject');

    }
    //

	public function index()
	{
		if ($this->session->userdata('login') == 1){
			if($this->session->userdata('user_level') == '1')
				redirect('admin/dashboard','refresh');
			else if($this->session->userdata('user_level') == '2')
				redirect('operator/dashboard','refresh');
			else if($this->session->userdata('user_level') == '3')
				redirect('distributor/dashboard','refresh');
			else if($this->session->userdata('user_level') == '4')
				redirect('lokal_distributor/dashboard','refresh');
			else if($this->session->userdata('user_level') == '5')
				redirect('reseller/dashboard','refresh');
			else if($this->session->userdata('user_level') == '6')
				redirect('pelanggan/dashboard','refresh');
			else if($this->session->userdata('user_level') == '7')
				redirect('mitra/dashboard','refresh');

		}

		$this->session->set_userdata('page','login');

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('login');
	}

	public function login()
	{
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$uresult = $this->dbObject->get_user($username);

		//var_dump($uresult);die;

		if (count($uresult) > 0)
		{
			//echo "Login Successfully ==> Redirecting";
			foreach ($uresult as $row)
			{
				$this->session->set_userdata('user_id', $row->users_id);
		        $this->session->set_userdata('user_level', $row->users_role_id);
		        $this->session->set_userdata('login', 1);
				$this->session->set_userdata('profile_id', $row->users_user_id);

				if($row->users_role_id == 1){
					$result = $this->dbObject->get_password($password, 'fd_admin');
					@$name = $result->name;
					//var_dump($name);die;


					if($result)
					{
						$this->session->set_userdata('user_nama', $name);
						//var_dump($result);die;
						redirect('admin/dashboard','refresh');
					}
					else
					{
						$this->session->set_userdata('login', 0);
						echo "<script> alert('Username and Password Salah...'); </script>";
						redirect(base_url().'index.php/auth','refresh');
					}
				}
				else if($row->users_role_id == 2){
					$result = $this->dbObject->get_password($password, 'fd_operator');
					@$name = $result->name;

					if($result)
					{

						$this->session->set_userdata('user_nama', $name);
						redirect('operator/dashboard','refresh');
					}
					else
					{
						$this->session->set_userdata('login', 0);
						echo "<script> alert('Username and Password Salah...'); </script>";
						redirect(base_url().'index.php/auth','refresh');
					}
				}
				else if($row->users_role_id == 3){
					$result = $this->dbObject->get_password($password, 'fd_distributor');
					//var_dump($uresult);die;

					if($result)
					{
						$this->session->set_userdata('user_nama', $result->name);
						redirect('distributor/dashboard','refresh');
					}
					else
					{
						$this->session->set_userdata('login', 0);
						echo "<script> alert('Username and Password Salah...'); </script>";
						redirect(base_url().'index.php/auth','refresh');
					}
				}
				else if($row->users_role_id == 4){
					$result = $this->dbObject->get_password($password, 'fd_distributor_lokal');

					if($result)
					{
						$this->session->set_userdata('user_nama', $result->name);
						redirect('lokal_distributor/dashboard','refresh');
					}
					else
					{
						$this->session->set_userdata('login', 0);
						echo "<script> alert('Username and Password Salah...'); </script>";
						redirect(base_url().'index.php/auth','refresh');
					}
				}
				else if($row->users_role_id == 5){
					$result = $this->dbObject->get_password($password, 'fd_reseller');
					//var_dump($result);die;

					if($result)
					{
						$this->session->set_userdata('user_nama', $result->name);
						redirect('reseller/dashboard','refresh');
					}
					else
					{
						$this->session->set_userdata('login', 0);
						echo "<script> alert('Username and Password Salah...'); </script>";
						redirect(base_url().'index.php/auth','refresh');
					}
				}
				else if($row->users_role_id == 6){
					$result = $this->dbObject->get_password($password, 'fd_pelanggan');

					if($result)
					{
						$this->session->set_userdata('user_nama', $result->name);
						redirect('pelanggan/dashboard','refresh');
					}
					else
					{
						$this->session->set_userdata('login', 0);
						echo "<script> alert('Username and Password Salah...'); </script>";
						redirect(base_url().'index.php/auth','refresh');
					}
				}

				else if($row->users_role_id == 7){
					$result = $this->dbObject->get_password($password, 'fd_mitra');

					if($result )
					{
						$this->session->set_userdata('user_nama', $result->name);
						redirect('mitra/dashboard','refresh');
					}
					else
					{
						$this->session->set_userdata('login', 0);
						echo "<script> alert('Username and Password Salah...'); </script>";
						redirect(base_url().'index.php/auth','refresh');
					}
				}

			}
		}
		else
		{	$this->session->set_userdata('login', 0);
			echo "<script> alert('Username and Password Salah...'); </script>";
            redirect(base_url().'index.php/auth','refresh');
			//echo "Error :";
		}

	}

	public function register($param='', $param2='')
	{
		if ($this->session->userdata('login') == 1){
			if($this->session->userdata('user_level') == '1')
				redirect('admin/dashboard','refresh');
			else if($this->session->userdata('user_level') == '2')
				redirect('operator/dashboard','refresh');
			else if($this->session->userdata('user_level') == '3')
				redirect('distributor/dashboard','refresh');
			else if($this->session->userdata('user_level') == '4')
				redirect('lokal_distributor/dashboard','refresh');
			else if($this->session->userdata('user_level') == '5')
				redirect('reseller/dashboard','refresh');
			else if($this->session->userdata('user_level') == '7=6')
				redirect('pelanggan/dashboard','refresh');
			else if($this->session->userdata('user_level') == '7')
				redirect('mitra/dashboard','refresh');

		}

		$this->session->set_userdata('page','register');

		if($param=='reseller'){
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('register_reseller');

			if ($param2=='do') {
				$reseller_password=md5($this->input->post('password'));
				$reseller_nama=$this->input->post('nama');
				$reseller_email=$this->input->post('email');
				$reseller_alamat=$this->input->post('alamat');
				$reseller_telepon=$this->input->post('telepon');
				$reseller_kota=$this->input->post('kota');
				$reseller_nik=$this->input->post('nik');

				$data = array(
					'password' => $reseller_password,
					'name' => $reseller_nama,
					'email' => $reseller_email,
					'alamat' => $reseller_alamat,
					'telepon' => $reseller_telepon,
					'kota' => $reseller_kota,
					'nik' => $reseller_nik,
					'created_time' => date('Y-m-d H:i:s')
				);

				if($this->dbObject->create_general('fd_reseller', $data)===TRUE)		// using direct parameter
				{
					$data2 = array(
						'users_username' => $this->input->post('reseller_username'),
						'users_user_id' => $this->db->insert_id(),
						'users_role_id' => '5',
						'users_status_active' => '0',
						'users_created_time' => date('Y-m-d H:i:s'),
						'users_created_by' => '0'
					);
					if($this->dbObject->create_general('fd_users', $data2)===TRUE){
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/reseller");
						alert(" Register berhasil. ");
					</script>
					<?php
					//redirect('master/jabatan','refresh');
					}
				}
				else {
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/reseller");
						alert(" Register gagal. ");
					</script>
					<?php
					//redirect('master/jabatan_insert','refresh');
				}
			}
		}
		else if($param=='mitra'){
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('register_mitra');

			if ($param2=='do') {
				$mitra_password=md5($this->input->post('password'));
				$mitra_nama=$this->input->post('nama');
				$mitra_email=$this->input->post('email');
				$mitra_alamat=$this->input->post('alamat');
				$mitra_telepon=$this->input->post('telepon');
				$mitra_kota=$this->input->post('kota');
				$mitra_nik=$this->input->post('nik');
				$mitra_rekening=$this->input->post('rekening');
				$mitra_perusahaan=$this->input->post('perusahaan');
				$mitra_bank=$this->input->post('bank');
				$mitra_npwp=$this->input->post('npwp');
				$mitra_siup=$this->input->post('siup');
				$mitra_tdp=$this->input->post('tdp');
				$mitra_direksi=$this->input->post('direksi');

				$data = array(
					'password' => $mitra_password,
					'name' => $mitra_nama,
					'email' => $mitra_email,
					'alamat' => $mitra_alamat,
					'telepon' => $mitra_telepon,
					'kota' => $mitra_kota,
					'nik' => $mitra_nik,
					'rekening' => $mitra_rekening,
					'perusahaan' => $mitra_perusahaan,
					'bank' => $mitra_bank,
					'npwp' => $mitra_npwp,
					'siup' => $mitra_siup,
					'tdp' => $mitra_tdp,
					'direksi' => $mitra_direksi,
					'created_time' => date('Y-m-d H:i:s')
				);
				if($this->dbObject->create_general('fd_mitra', $data)===TRUE)		// using direct parameter
				{
					$data2 = array(
						'users_username' => $this->input->post('username'),
						'users_user_id' => $this->db->insert_id(),
						'users_role_id' => '7',
						'users_status_active' => '0',
						'users_created_time' => date('Y-m-d H:i:s'),
						'users_created_by' => '0'
					);
					if($this->dbObject->create_general('fd_users', $data2)===TRUE){
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/mitra");
						alert(" Register berhasil. ");
					</script>
					<?php
					//redirect('master/jabatan','refresh');
					}
				}
				else {
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/mitra");
						alert(" Register gagal. ");
					</script>
					<?php
					//redirect('master/jabatan_insert','refresh');
				}
			}
		}
		else if($param=='distributor'){
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('register_distributor');

			if ($param2=='do') {
				$dis_name=$this->input->post('name');
				$dis_password=md5($this->input->post('password'));
				$dis_nik=$this->input->post('nik');
				$dis_alamat=$this->input->post('alamat');
				$dis_kota=$this->input->post('kota');
				$dis_telepon=$this->input->post('telepon');
				$dis_email=$this->input->post('email');
				$dis_rekening=$this->input->post('rekening');
				$dis_bank=$this->input->post('bank');
				$dis_perusahaan=$this->input->post('perusahaan');
				$dis_npwp=$this->input->post('npwp');
				$dis_siup=$this->input->post('siup');
				$dis_tdp=$this->input->post('tdp');
				$dis_direksi=$this->input->post('direksi');

				$data = array(
					'password' => $dis_password,
					'name' => $dis_name,
					'email' => $dis_email,
					'alamat' => $dis_alamat,
					'telepon' => $dis_telepon,
					'kota' => $dis_kota,
					'nik' => $dis_nik,
					'rekening' => $dis_rekening,
					'bank' => $dis_bank,
					'perusahaan' => $dis_perusahaan,
					'npwp' => $dis_npwp,
					'siup' => $dis_siup,
					'tdp' => $dis_tdp,
					'direksi' => $dis_direksi,
					'created_time' => date('Y-m-d H:i:s')
				);

				if($this->dbObject->create_general('fd_distributor', $data)===TRUE)		// using direct parameter
				{
					$data2 = array(
						'users_username' => $this->input->post('users_username'),
						'users_user_id' => $this->db->insert_id(),
						'users_role_id' => '3',
						'users_status_active' => '0',
						'users_created_time' => date('Y-m-d H:i:s'),
						'users_created_by' => '0'
					);
					if($this->dbObject->create_general('fd_users', $data2)===TRUE){
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/distributor");
						alert(" Register berhasil. ");
					</script>
					<?php
					//redirect('master/jabatan','refresh');
					}
				}
				else {
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/distributor");
						alert(" Register gagal. ");
					</script>
					<?php
					//redirect('master/jabatan_insert','refresh');
				}
			}
		}
		else if($param=='lokal_distributor'){
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('register_lokal_distributor');

			if ($param2=='do') {
				$lokal_distributor_password=md5($this->input->post('password'));
				$lokal_distributor_nama=$this->input->post('name');
				$lokal_distributor_email=$this->input->post('email');
				$lokal_distributor_alamat=$this->input->post('alamat');
				$lokal_distributor_telepon=$this->input->post('telepon');
				$lokal_distributor_kota=$this->input->post('kota');
				$lokal_distributor_nik=$this->input->post('nik');
				$lokal_distributor_rekening=$this->input->post('rekening');
				$lokal_distributor_bank=$this->input->post('bank');
				$lokal_distributor_perusahaan=$this->input->post('perusahaan');
				$lokal_distributor_npwp=$this->input->post('npwp');
				$lokal_distributor_siup=$this->input->post('siup');
				$lokal_distributor_tdp=$this->input->post('tdp');
				$lokal_distributor_direksi=$this->input->post('direksi');

				$data = array(
					'password' => $lokal_distributor_password,
					'name' => $lokal_distributor_nama,
					'email' => $lokal_distributor_email,
					'alamat' => $lokal_distributor_alamat,
					'telepon' => $lokal_distributor_telepon,
					'kota' => $lokal_distributor_kota,
					'nik' => $lokal_distributor_nik,
					'rekening' => $lokal_distributor_rekening,
					'bank' => $lokal_distributor_bank,
					'perusahaan' => $lokal_distributor_perusahaan,
					'npwp' => $lokal_distributor_npwp,
					'siup' => $lokal_distributor_siup,
					'tdp' => $lokal_distributor_tdp,
					'direksi' => $lokal_distributor_direksi,
					'created_time' => date('Y-m-d H:i:s')
				);

				if($this->dbObject->create_general('fd_distributor_lokal', $data)===TRUE)		// using direct parameter
				{
					$data2 = array(
						'users_username' => $this->input->post('users_username'),
						'users_user_id' => $this->db->insert_id(),
						'users_role_id' => '4',
						'users_status_active' => '0',
						'users_created_time' => date('Y-m-d H:i:s'),
						'users_created_by' => '0'
					);
					if($this->dbObject->create_general('fd_users', $data2)===TRUE){
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/lokal_distributor");
						alert(" Register berhasil. ");
					</script>
					<?php
					//redirect('master/jabatan','refresh');
					}
				}
				else {
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/lokal_distributor");
						alert(" Register gagal. ");
					</script>
					<?php
					//redirect('master/jabatan_insert','refresh');
				}
			}
		}
		else {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('register');

			if ($param2=='do') {
				$pelanggan_password=md5($this->input->post('password'));
				$pelanggan_nama=$this->input->post('nama');
				$pelanggan_email=$this->input->post('email');
				$pelanggan_alamat=$this->input->post('alamat');
				$pelanggan_telepon=$this->input->post('telepon');
				$pelanggan_kota=$this->input->post('kota');
				$pelanggan_rekening=$this->input->post('rekening');
				$pelanggan_bank=$this->input->post('bank');

				$data = array(
					'password' => $pelanggan_password,
					'name' => $pelanggan_nama,
					'email' => $pelanggan_email,
					'alamat' => $pelanggan_alamat,
					'telepon' => $pelanggan_telepon,
					'kota' => $pelanggan_kota,
					'rekening' => $pelanggan_rekening,
					'bank' => $pelanggan_kota,
					'created_time' => date('Y-m-d H:i:s')
				);
				if($this->dbObject->create_general('fd_pelanggan', $data)===TRUE)		// using direct parameter
				{
					$data2 = array(
						'users_username' => $this->input->post('username'),
						'users_user_id' => $this->db->insert_id(),
						'users_role_id' => '6',
						'users_status_active' => '0',
						'users_created_time' => date('Y-m-d H:i:s'),
						'users_created_by' => '0'
					);
					if($this->dbObject->create_general('fd_users', $data2)===TRUE){
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/distributor");
						alert(" Register berhasil. ");
					</script>
					<?php
					//redirect('master/jabatan','refresh');
					}
				}
				else {
					?>
					<script>
						location.replace("<?=base_url()?>index.php/auth/register/distributor");
						alert(" Register gagal. ");
					</script>
					<?php
					//redirect('master/jabatan_insert','refresh');
				}
			}
		}
	}
	public function logout()
	{
		$this->session->set_userdata('login', 0);
		$this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');

		redirect(base_url(),'refresh');
	}
}
