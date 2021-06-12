<?php
class Page extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
	}

	function index(){
		if($this->session->userdata('level')==='1'){
			$this->load->view('dashboard_view');
		}else{
			echo "Access Defined";
		}
	}

	function staff(){
		if($this->session->userdata('level')==='2'){
			$this->load->view('dashboar_view');
		}else{
			echo "Access Denied";
		}
	}

	function author(){
		if($this->session->userdata('level')==='3'){
			$this->load->view('dashboar_view');
		}else{
			echo "Access Denied";
		}
	}
}