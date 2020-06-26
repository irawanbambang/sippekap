<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Surat_Model');
		$this->load->model('User_Model');
		$this->load->model('Form_Model');
	}
	
	public function pengajuan()
	{
		$data['title'] = 'Daftar Pengesahan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pengesahan'] = $this->Surat_Model->getVerifikasi();

		
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('kadin/pengajuan', $data);
		$this->load->view('tamplates/footer');
	}

	public function pengesahan($id_kp)
	{
		$data = array(
						'status' => 'disahkan'
		 );
		$this->Form_Model->ubah($id_kp, $data);

		redirect('kadin/pengajuan');
	}

	public function detailsurat($id_kp)
	{
		$data['title'] = 'Detail Surat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['pengesahan'] = $this->Form_Model->cari($id_kp);

		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/detailsurat', $data);
		$this->load->view('tamplates/footer');
	}
}