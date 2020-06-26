<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Dasboard_Model','dm');
	}
	
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['t_pengajuan'] = $this->dm->ambilDataPengajuan();

		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('tamplates/footer');
	}
}