<?php
class C_aslab extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('user_name')=="") {
			redirect('authh');
		}
		$this->load->helper('text');
	}
	public function index() {
		$data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('aslab/login', $data);
	}

	public function logout() {
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_level');
		session_destroy();
		redirect('authh');
	}
}
?>