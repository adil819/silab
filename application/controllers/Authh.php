<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authh extends CI_Controller {

	public function index() {
		$this->load->view('login');
	}

	public function cek_login() {
		$data = array('user_name' => $this->input->post('user_name', TRUE),
			'user_password' => $this->input->post('user_password', TRUE)
		);
		$this->load->model('model_user'); // load model_user
		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['user_id'] = $sess->user_id;
				$sess_data['user_name'] = $sess->user_name;
				$sess_data['user_level'] = $sess->user_level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('user_level')=='admin') {
				
				$this->session->set_flashdata('pesan', [
               	        'title' => 'Login Sukses',
               	        'message' => 'Selamat Datang Di SiLab',
               	        'type' => 'success'
               	        ]);
				redirect('admin/kelas');
			}
			else if ($this->session->userdata('user_level')=='aslab') {

				$this->session->set_flashdata('pesan', [
               	        'title' => 'Login Sukses',
               	        'message' => 'Selamat Datang Di SiLab',
               	        'type' => 'success'
               	        ]);
				redirect('aslab/matakuliah');
			}		
			else if ($this->session->userdata('user_level')=='kepala lab') {
				$this->session->set_flashdata('pesan', [
               	        'title' => 'Login Sukses',
               	        'message' => 'Selamat Datang Di SiLab',
               	        'type' => 'success'
               	        ]);

				redirect('kepala_lab/inventaris');
			}		
			else { 
				$this->session->set_flashdata('pesan', [
               	        'title' => 'Login Sukses',
               	        'message' => 'Selamat Datang Di SiLab',
               	        'type' => 'success'
               	        ]);
				redirect('dosen/aslab');
			}
		}

		else
		{
			$l_idnumber		= $this->input->post('user_name');
			$l_password 	= $this->input->post('user_password');
			
				$curl = curl_init();
				$url["login"] = "https://portal.usu.ac.id/login/proses_login.php";
				$url["profil"] = "https://portal.usu.ac.id/profil/tampil.php";
				$url["email"] = "https://portal.usu.ac.id/email/ubah.php";
				
				$cookie = base_url().'assets/cookiess.txt';
				$data1 = [
					 'username' => $l_idnumber,
					 'password' => $l_password
				];

				$data1 = http_build_query($data1);

				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data1);
				curl_setopt($curl, CURLOPT_URL, $url["login"] );
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_COOKIEJAR, realpath($cookie));

				$html = curl_exec($curl);
				$pattern = '/<div.+?id="member-info">.+<h3>([\S\s]+)<\/h3>.+<h4>([\d]+)<\/h4>.+<h4>([\S\s]+)<\/h4>.+/s';
				preg_match($pattern, $html, $login);


				if(count($login)<=0)
				{
					echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
				}
				else
				{
					curl_setopt($curl, CURLOPT_URL, $url['profil']);
					$html = curl_exec($curl);
					preg_match_all('/\<td>.?(.+)?<\/td>/', $html, $profil);


					curl_setopt($curl, CURLOPT_URL, $url['email']);
					$html = curl_exec($curl);
					preg_match_all('/<strong.+?id="myemail">(.+)<\/strong>/', $html, $email);

					$login[0] = $login[1];
					$login[1] = $login[2];
					$login[2] = $login[3];

					$profil = $profil[1];
					$alamat = $profil[0];
					$ttl = explode(", ", $profil[2]);
					$nama = explode(' ', $login[0]);
					for($i=1;$i<count($nama);$i++)
						@$nama_belakang .= ' '.$nama[$i];

					$bln["Januari"]	 = 1;
					$bln["Februari"] = 2;
					$bln["Maret"] = 3;
					$bln["April"] = 4;
					$bln["Mei"]	= 5;
					$bln["Juni"] 	= 6;
					$bln["Juli"] 	= 7;
					$bln["Agustus"] = 8;
					$bln["September"] = 9;
					$bln["Oktober"] = 10;
					$bln["November"] = 11;
					$bln["Desember"] = 12;

					$date = explode(" ", $ttl[1]);
					$tgl_lahir = $date[2].'-'.$bln[$date[1]].'-'.$date[0];
					$email = $email[1][0];
					$link_fofo = 'https://portal.usu.ac.id/photos/'.$login[1].'.jpg';
					
					$data_session = array(
						'username' => $l_idnumber,
						'status' => "mahasiswa_is_login",
						);

					$this->session->set_flashdata('pesan', [
								'title' => 'Login Sukses',
								'message' => 'Selamat Datang Di SiLab',
								'type' => 'success'
								]);

					//cari data dari table mahasiswa
					$this->load->model('model_user'); // load model_user
					$hasil2 = $this->model_user->mahasiswa($l_idnumber);
					//print_r($hasil2);die;
					$sess_data['name'] = $hasil2[0]->nama;
					$sess_data['user_name'] = $l_idnumber;
					$sess_data['logged_in'] = 'Sudah Loggin';
					$this->session->set_userdata($sess_data);
						
					$this->session->set_userdata($data_session);
					redirect(base_url(""));
					
				}
							//BATAS CRAWLING (CURL PORTAL USU)
	}

}
}
?>
