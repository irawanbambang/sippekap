<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Admin_Model');
		$this->load->model('Form_Model');
		$this->load->model('Member_Model');
		$this->load->model('Surat_Model');
	}
	
	public function index()
	{
		$this->load->model('Dasboard_Model','dm');

		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['t_pengajuan'] = $this->dm->ambilDataPengajuan();

		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('tamplates/footer');
	}

	// menu role
	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('admin', 'Admin', 'required');

		if($this->form_validation->run() == false ) {		
			$this->load->view('tamplates/header', $data);
			$this->load->view('tamplates/sidebar', $data);
			$this->load->view('tamplates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('tamplates/footer');
		}else {
			$this->db->insert('user_role', ['admin' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu Added !</div>');
				redirect('admin/role');
		}
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$this->db->where('id !=', 3);
		$this->db->where('id !=', 2);
		$this->db->where('id !=', 6);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('tamplates/footer');
	}

	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 2) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
	}

	public function simpan_role()
	{
		$nomor = $this->Role_Model->getnomor();
		if(empty($nomor )) {
			$no = '1';
		}else{
			foreach ($nomor as $n) {
				$no = $n['id']+1;
			}
		}
		$data = array('id' => $no,
						'role' => $this->input->post('role'),
		 );
		$this->Role_Model->simpan($data);
		redirect('admin/role');
	}

	public function hapusrole($id)
	{
		$this->Role_Model->hapusrole($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('admin/role');
	}


	// menu daftar member
	public function daftar_pemohon()
	{
		$data['title'] = 'Data Pemohon';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['data_pemohon'] = $this->Member_Model->getAll();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/daftar_pemohon', $data);
		$this->load->view('tamplates/footer');
	}

	public function hapus_member($id)
	{
		$this->Member_Model->hapus_member($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil dihapus!</div>');
		redirect('admin/daftar_member');
	}

	// menu daftar pengajuan
	public function daftar()
	{
		$data['title'] = 'Daftar Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pengajuan'] = $this->Form_Model->getVerifikasi();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/daftar', $data);
		$this->load->view('tamplates/footer');
	}

	

	public function lihat_pengajuan($id_kp)
	{
		$data['title'] = 'Lihat Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['pengajuan'] = $this->Form_Model->cari($id_kp);

		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/lihat_pengajuan', $data);
		$this->load->view('tamplates/footer');
	}

	public function verifikasi()
	{
		$data = array(
						'status' => 'verifikasi'
		 );
		$this->Form_Model->ubah($this->input->post('id'), $data);

		$data = array(
						'id_kp' => $this->input->post('id_kp'),
						'no_surat' => $this->input->post('no_surat'),
						'tgl_terbit' => date('Y-m-d'),
						'tgl_kadaluwarsa' => date('Y-m-d'),
						'catatan' => $this->input->post('catatan')
		 );
		$this->Surat_Model->simpan($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berkas Berhasil di Verifikasi!</div>');
		redirect('admin/daftar');
	}

	public function tolak($id_kp)
	{
		$data = array(
			'status' => 'tolak'
		 );

		$tolak = array(
			'id_kp'  => $this->input->post('id_kp_tolak'),
			'pesan' => $this->input->post('catatan')
		 );		

		$this->Form_Model->ubah($id_kp, $data);
		$this->db->insert('tb_surat_tolak', $tolak);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berkas Berhasil Ditolak</div>');
		redirect('admin/daftar');
	}

	// menu daftar surat perizinan kapal
	public function surat()
	{
		$data['title'] = 'Daftar Surat Perizinan Kapal';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pengesahan'] = $this->Surat_Model->getDisahkan();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/surat', $data);
		$this->load->view('tamplates/footer');
	}

	// menu daftar admin
	public function daftar_user()
	{
		$data['title'] = 'Daftar User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['daftar'] = $this->Admin_Model->getAll();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/daftar_user', $data);
		$this->load->view('tamplates/footer');
	}


	// public function tambah_admin()
	// {
	// 	$data['title'] = 'Tambah Admin';
	// 	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
	// 	$this->load->view('tamplates/header', $data);
	// 	$this->load->view('tamplates/sidebar', $data);
	// 	$this->load->view('tamplates/topbar', $data);
	// 	$this->load->view('admin/tambah_admin', $data);
	// 	$this->load->view('tamplates/footer');
	// }


	public function simpan()
	{
		$nomor = $this->Admin_Model->getnomor();
		if(empty($nomor )) {
			$no = '1';
		}else{
			foreach ($nomor as $n) {
				$no = $n['id']+1;
			}
		}
		$data = array('id' => $no,
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'image' => 'default.png',
						'password' => $this->input->post('password'),
						'role_id' => $this->input->post('role_id'),
						'is_active' => '1',
						'date_created' => date('Y-m-d')
		 );
		$this->Admin_Model->simpan($data);
		redirect('admin/daftar_admin');
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['admin'] = $this->Admin_Model->cari($id);

		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/edit_admin', $data);
		$this->load->view('tamplates/footer');
	}

	public function ubah()
	{
		$data = array(
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
						'role_id' => $this->input->post('role_id')
		 );
		$this->Admin_Model->ubah($this->input->post('id'),$data);
		redirect('admin/daftar_user');
	}

	public function hapus($id)
	{
		$this->Admin_Model->hapus($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('admin/daftar_admin');
	}

	

	


}