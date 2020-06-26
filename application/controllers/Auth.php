<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Member_Model');
		$this->load->model('User_Model');
	}
	public function index()
	{
		if($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('tamplates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('tamplates/auth_footer');
		}else {
			//validasinya success
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		//usernya ada
		if($user) {
			//jika user aktif
			if($user['is_active'] == 1) {
				//cek password
				if(password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'roles_id' => $user['role_id'],
						'id' => $user['id']
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1) {
						redirect('admin');
					}else {
						$cari_user = $this->User_Model->cari($user['id']);
						foreach ($cari_user as $cu) {
							$nik = $cu['nik'];
						}
						$data = ['nik' => $nik];
						$this->session->set_userdata($data);
						redirect('user');

					}
				}else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi Salah!</div>');
				redirect('auth');
				}
			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Diaktifkan!</div>');
				redirect('auth');
			}

		}else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar</div>');
			redirect('auth');
		}
	}

	public function identitas()
	{
		if($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('tamplates/auth_header', $data);
			$this->load->view('auth/identitas');
			$this->load->view('tamplates/auth_footer');
		}else {
			//validasinya success
			$this->_login();
		}
	}

	public function registration()
	{
		if($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email has already registered !'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match !',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('rt', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw', 'rw', 'required|trim');
		$this->form_validation->set_rules('kelurahan', 'kelurahan', 'required|trim');
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim');
		$this->form_validation->set_rules('kota', 'kota', 'required|trim');

		if( $this->form_validation->run() == false) {
			$data['title'] = 'SIPPEKP Registrsi';
			$this->load->view('tamplates/auth_header', $data);
			$this->load->view('auth/identitas');
			$this->load->view('tamplates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];


			// Siapkan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$insert = $this->db->insert('user', $data);
			if ($insert) {
				$this->db->insert('user_token', $user_token);
			}
			$cari_email = $this->User_Model->cari_email($email);

			foreach ($cari_email as $c) {
				$id = $c ['id'];
			}

			$data = [
				'id' => $id,
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'no_hp' => $this->input->post('no_hp'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
				'kelurahan' => $this->input->post('kelurahan'),
				'kecamatan' => $this->input->post('kecamatan'),
				'provinsi' => $this->input->post('provinsi'),
				'kota' => $this->input->post('kota'),
				'image' => 'default.png'
			];

			$this->User_Model->simpan($data);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah dibuat. Tolong Aktifasi Akun Anda</div>');
			redirect('auth');

		}
	}

	// public function cekemail()
	// {
	// 	$token = base64_encode(random_bytes(32));
	// 	$config =[
	// 		'protocol'  => 'smtp',
	// 		'smtp_host' => 'ssl://smtp.googlemail.com',
	// 		'smtp_user' => 'wawanpkl33@gmail.com',
	// 		'smtp_pass' => 'piyut a345',
	// 		'smtp_port' => 465,
	// 		'mailtype'  => 'html',
	// 		'charset'   => 'utf-8',
	// 		'newline'   => "\r\n"
	// 	];

	// 	$this->load->library('email', $config);
	// 	$this->email->initialize($config);

	// 	$this->email->from('wawanpkl33@gmail.com', 'Sistem Pelayanan Perizinan Kapal');
	// 	$this->email->to('wawanbatang93@gmail.com');
	// 	$this->email->subject('Akun Verifikasi');
	// 	$this->email->message('Klik link ini untuk verifikasi akun anda : <a href="'.base_url(). 'auth/verify?email=wawanbatang93@gmail.com&token='. urlencode($token).'">Aktif</a>');
		
	// 	if ($this->email->send()) {
	// 		return true;
	// 	}else {
	// 		echo $this->email->print_debugger();
	// 		die;
	// 	}
	// }

	private function _sendEmail($token, $type)
	{

		$config =[
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'wawanpkl33@gmail.com',
			'smtp_pass' => 'piyut a345',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('wawanpkl33@gmail.com', 'Sistem Pelayanan Perizinan Kapal');
		$this->email->to($this->input->post('email'));

		if($type == 'verify'){
			$this->email->subject('Akun Verifikasi');
			$this->email->message('Klik link ini untuk verifikasi akun anda : <a href="'.base_url(). 'auth/verify?email='. $this->input->post('email'). '&token='. urlencode($token).'">Aktif</a>');	
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik Link ini untuk Reset Password Anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktif</a>');
		}
		
		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			//print_r($query);
			if($user_token > 0) {
				if(time() - $user_token['date_created'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');
					
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$email.' Telah Diaktifkan. Silahkan Login.</div>');
					redirect('auth');
				} else {

					$this->db->delete('user', ['email' =>$email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun aktifasi gagal! Token Expired.</div>');
				redirect('auth');
				}		
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun aktifasi gagal! salah token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun aktifasi gagal! salah email.</div>');
		redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
		redirect('auth');
	}

	public function blocked() 
	{
		$this->load->view('auth/blocked');
	}

	public function lupaPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Forgot Password";
            $this->load->view('tamplates/auth_header', $data);
            $this->load->view('auth/lupa-password');
            $this->load->view('tamplates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/lupaPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = "Change Password";
            $this->load->view('tamplates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('tamplates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
	
	public function identitas_pemilik()
	{
		$data['title'] = 'Identitas Pemilik';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('auth/simpan', $data);
		$this->load->view('tamplates/footer');
	}

	public function simpan()
	{
				$foto="";
				$namafoto=date('ymdhis');
				$config['upload_path']          = './assets/upload_image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2500;
                $config['file_name']			=$namafoto;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                        echo '<script>alert("Salah")</script>';
                        echo '<script>window.history.back();</script>';
                }
                else
                {
 	                       $gbr=$this->upload->data();
 	                       $foto=$gbr['file_name'];
 	                       $data = array('nik' => $this->input->post('nik'),
										'nama' => $this->input->post('nama'),
										'jenis_kelamin' => $this->input->post('jenis_kelamin'),
										'alamat' => $this->input->post('alamat'),
										'rt' => $this->input->post('rt'),
										'rw' => $this->input->post('rw'),
										'kelurahan' => $this->input->post('kelurahan'),
										'kecamatan' => $this->input->post('kecamatan'),
										'provinsi' => $this->input->post('provinsi'),
										'kota' => $this->input->post('kota'),
										'image' => $foto,
										'no_hp' => $this->input->post('no_hp')
						 );
						$this->Member_Model->simpan($data);
						redirect('member');
                }
		
	}

	public function lihat()
	{
		$data['title'] = 'Identitas Pemilik';
		$data['tb_identitas_pemilik'] = $this->db->get_where('tb_identitas_pemilik', ['nik' => $this->session->userdata('nik')])->row_array();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('member/lihat', $data);
		$this->load->view('tamplates/footer');
	}

}

