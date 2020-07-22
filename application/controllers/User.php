<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('User_Model');
	}
	
	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengguna']= $this->User_Model->getUser($this->session->userdata('email')); 
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('tamplates/footer');
	}


	public function edit()
	{
		$data['title'] = 'Ubah Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pengguna']= $this->User_Model->getUser($this->session->userdata('email'));

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		$this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('rt', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw', 'rw', 'required|trim');
		$this->form_validation->set_rules('kelurahan', 'kelurahan', 'required|trim');
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim');
		$this->form_validation->set_rules('kota', 'kota', 'required|trim');
		
		if($this->form_validation->run() == false) 
		{
			$this->load->view('tamplates/header', $data);
			$this->load->view('tamplates/sidebar', $data);
			$this->load->view('tamplates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('tamplates/footer');
	}else{
		

		$name = $this->input->post('name');
		$email = $this->input->post('email');

		//cek jika ada gambar yang akan diupload
		$upload_image = $_FILES['image']['name'];

		if($upload_image){
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']		 = '2048';
			$config['upload_path']	 = './assets/img/profile/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('image')) {
				$old_image = $data['user']['image'];
				if($old_image != 'default.png') {
					unlink(FCPATH . 'assets/img/profile/' . $old_image);
				}

				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' .$this->upload->display_errors().'</div>');
				redirect('user');
			}
		}

		$this->db->set('name', $name);
		$this->db->where('email', $email);
		$this->db->update('user');
		$data = [
				'nama' => $this->input->post('name'),
				'no_hp' => $this->input->post('no_hp'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
				'kelurahan' => $this->input->post('kelurahan'),
				'kecamatan' => $this->input->post('kecamatan'),
				'provinsi' => $this->input->post('provinsi'),
				'kota' => $this->input->post('kota')
			];
		$this->User_Model->ubahidentitas($this->input->post('id_user'),$data);	
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Anda Berhasil di Ubah</div>');
		redirect('user');
		}

	}

	public function changePassword()
	{
		$data['title'] = 'Ubah Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if($this->form_validation->run() == false) {
			$this->load->view('tamplates/header', $data);
			$this->load->view('tamplates/sidebar', $data);
			$this->load->view('tamplates/topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('tamplates/footer');
		}else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">wrong current password!</div>');
				redirect('user/changepassword');
			} else {
				if($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
					redirect('user/changepassword');
				} else {
					// password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
					redirect('user/changepassword');
				}
			}
		}
	}
}