<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * /Index Page for this controller.
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
    // if ($this->session->userdata('login') == 0 || $this->session->userdata('user_level') != '6') redirect('auth/logout');
		$this->session->set_userdata('menu','user');
		// $user_id = $this->session->userdata('user_id');
		 $this->load->model('dosen/user_model', 'dbObject');
  }

	public function index()
	{
	
		$this->load->view('dosen/templates/header');
		$this->load->view('dosen/templates/sidebar');
		$this->load->view('dosen/user/index');
		$this->load->view('dosen/templates/modal');
		$this->load->view('dosen/templates/footer');
	}

	

}
