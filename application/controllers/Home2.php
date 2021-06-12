<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {   parent::__construct();

    	// if ($this->session->userdata('login') == 0 || $this->session->userdata('user_level') != '1') redirect('auth/logout');
		
		 $this->load->model('home_model', 'dbObject');
    }


	public function index()
	{
	  $data['main_view'] = 'menu/index';
	  $this->load->view('layout',$data);
	}

	public function fk()
	{
	  $data['main_view'] = 'menu/fk';
	  $this->load->view('jadwal',$data);
	}

	public function rekrutmen()
	{
	  $data['main_view'] = 'menu/rekrutmen';
	  $data['rerkutmenfasilkom'] = $this->dbObject->get_rekrutmenfasilkomti();
	  $data['rerkutmenfk'] = $this->dbObject->get_rekrutmenfk();
	  $data['rerkutmenfmipa'] = $this->dbObject->get_rekrutmenfmipa();
	  $data['rerkutmenfib'] = $this->dbObject->get_rekrutmenfib();
	  $data['rerkutmenfisip'] = $this->dbObject->get_rekrutmenfisip();
	  $data['rerkutmenfp'] = $this->dbObject->get_rekrutmenfp();
	  $data['rerkutmenfkm'] = $this->dbObject->get_rekrutmenfkm();
	  $data['rerkutmenfh'] = $this->dbObject->get_rekrutmenfh();
	  $data['rerkutmenff'] = $this->dbObject->get_rekrutmenff();
	  $data['rerkutmenft'] = $this->dbObject->get_rekrutmenft();
	  $data['rerkutmenfpsi'] = $this->dbObject->get_rekrutmenfpsi();
	  $data['rerkutmenfeb'] = $this->dbObject->get_rekrutmenfeb();
	  $data['rerkutmenfkg'] = $this->dbObject->get_rekrutmenfkg();
	  $data['rerkutmenfkp'] = $this->dbObject->get_rekrutmenfkp();
	  $data['rerkutmenfhut'] = $this->dbObject->get_rekrutmenfhut();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfk()
	{
	  $data['main_view'] = 'menu/isirekrutmenfk';
	  $data['rerkutmenfk'] = $this->dbObject->get_rekrutmenfk();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfmipa()
	{
	  $data['main_view'] = 'menu/isirekrutmenfmipa';
	  $data['rerkutmenfmipa'] = $this->dbObject->get_rekrutmenfmipa();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfib()
	{
	  $data['main_view'] = 'menu/isirekrutmenfib';
	  $data['rerkutmenfib'] = $this->dbObject->get_rekrutmenfib();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfp()
	{
	  $data['main_view'] = 'menu/isirekrutmenfp';
	  $data['rerkutmenfp'] = $this->dbObject->get_rekrutmenfp();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfh()
	{
	  $data['main_view'] = 'menu/isirekrutmenfh';
	  $data['rerkutmenfh'] = $this->dbObject->get_rekrutmenfh();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenft()
	{
	  $data['main_view'] = 'menu/isirekrutmenft';
	  $data['rerkutmenft'] = $this->dbObject->get_rekrutmenft();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfeb()
	{
	  $data['main_view'] = 'menu/isirekrutmenfeb';
	  $data['rerkutmenfeb'] = $this->dbObject->get_rekrutmenfeb();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfkg()
	{
	  $data['main_view'] = 'menu/isirekrutmenfkg';
	  $data['rerkutmenfkg'] = $this->dbObject->get_rekrutmenfkg();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfhut()
	{
	  $data['main_view'] = 'menu/isirekrutmenfhut';
	  $data['rerkutmenfhut'] = $this->dbObject->get_rekrutmenfhut();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfisip()
	{
	  $data['main_view'] = 'menu/isirekrutmenfisip';
	  $data['rerkutmenfisip'] = $this->dbObject->get_rekrutmenfisip();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfkm()
	{
	  $data['main_view'] = 'menu/isirekrutmenfkm';
	  $data['rerkutmenfkm'] = $this->dbObject->get_rekrutmenfkm();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenff()
	{
	  $data['main_view'] = 'menu/isirekrutmenff';
	  $data['rerkutmenff'] = $this->dbObject->get_rekrutmenff();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfpsi()
	{
	  $data['main_view'] = 'menu/isirekrutmenfpsi';
	  $data['rerkutmenfpsi'] = $this->dbObject->get_rekrutmenfpsi();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfkp()
	{
	  $data['main_view'] = 'menu/isirekrutmenfkp';
	  $data['rerkutmenfkp'] = $this->dbObject->get_rekrutmenfkp();
	  $this->load->view('rekrutmen',$data);
	}

	public function isirekrutmenfasilkom()
	{
	  $data['main_view'] = 'menu/isirekrutmenfasilkom';
	  $data['rerkutmenfasilkom'] = $this->dbObject->get_rekrutmenfasilkomti();
	  $this->load->view('rekrutmen',$data);
	}

	public function download($param1=''){				
		force_download('assets/img/'.$param1.'/',NULL);
	}

	public function fib()
	{
	  $data['main_view'] = 'menu/fib';

	  $this->load->view('jadwal',$data);
	}

	public function fp()
	{
	  $data['main_view'] = 'menu/fp';
	  $this->load->view('jadwal',$data);
	}

	public function fh()
	{
	  $data['main_view'] = 'menu/fh';
	  $this->load->view('jadwal',$data);
	}

	public function ft()
	{
	  $data['main_view'] = 'menu/ft';
	  $this->load->view('jadwal',$data);
	}

	public function feb()
	{
	  $data['main_view'] = 'menu/feb';
	  $this->load->view('jadwal',$data);
	}

	public function fkg()
	{
	  $data['main_view'] = 'menu/fkg';
	  $this->load->view('jadwal',$data);
	}

	public function fmipa()
	{
	  $data['main_view'] = 'menu/fmipa';
	  $this->load->view('jadwal',$data);
	}

	public function fisip()
	{
	  $data['main_view'] = 'menu/fisip';
	  $this->load->view('jadwal',$data);
	}

	public function fkm()
	{
	  $data['main_view'] = 'menu/fkm';
	  $this->load->view('jadwal',$data);
	}

	public function farmasi()
	{
	  $data['main_view'] = 'menu/farmasi';
	  $this->load->view('jadwal',$data);
	}

	public function fpsi()
	{
	  $data['main_view'] = 'menu/fpsi';
	  $this->load->view('jadwal',$data);
	}

	public function fper()
	{
	  $data['main_view'] = 'menu/fper';
	  $this->load->view('jadwal',$data);
	}

	public function fasilkomti()
	{
	  $data['main_view'] = 'menu/fasilkomti';
	  $this->load->view('jadwal',$data);
	}

	public function fhut()
	{
	  $data['main_view'] = 'menu/fhut';
	  $this->load->view('jadwal',$data);
	}

		public function jadwal()
	  {
	    $data['main_view'] = "menu/courses";
	    $this->load->view('jadwal',$data);
	  }

		public function about()
	{
	  $data['main_view'] = 'menu/about';
	  $this->load->view('layout',$data);
	}

		public function blog_home()
	{
	  $data['main_view'] = 'menu/blog-home';
	  $this->load->view('layout',$data);
	}

		public function blog_single()
	{
	  $data['main_view'] = 'menu/blog-single';
	  $this->load->view('layout',$data);
	}

		public function contact()
	{
	  $data['main_view'] = 'menu/contact';
	  $this->load->view('layout',$data);
	}

		public function courses()
	{
	  $data['main_view'] = 'menu/courses';
	  $this->load->view('layout',$data);
	}

		public function elements()
	{
	  $data['main_view'] = 'menu/elements';
	  $this->load->view('layout',$data);
	}
}
