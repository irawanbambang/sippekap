<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller 
{
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	is_logged_in();
	// 	$this->load->model('Member_Model');
	// }
	
	// public function index()
	// {
	// 	$data['title'] = 'Identitas Pemilik';
	// 	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
	// 	$this->load->view('tamplates/header', $data);
	// 	$this->load->view('tamplates/sidebar', $data);
	// 	$this->load->view('tamplates/topbar', $data);
	// 	$this->load->view('member/index', $data);
	// 	$this->load->view('tamplates/footer');
	// }

	// public function simpan()
	// {
	// 			$foto="";
	// 			$namafoto=date('ymdhis');
	// 			$config['upload_path']          = './assets/upload_image/';
 //                $config['allowed_types']        = 'gif|jpg|png|jpeg';
 //                $config['max_size']             = 2500;
 //                $config['file_name']			=$namafoto;
 //                $this->load->library('upload', $config);

 //                if ( ! $this->upload->do_upload('image'))
 //                {
 //                        echo '<script>alert("Salah")</script>';
 //                        echo '<script>window.history.back();</script>';
 //                }
 //                else
 //                {
 // 	                       $gbr=$this->upload->data();
 // 	                       $foto=$gbr['file_name'];
 // 	                       $data = array('nik' => $this->input->post('nik'),
	// 									'nama' => $this->input->post('nama'),
	// 									'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	// 									'alamat' => $this->input->post('alamat'),
	// 									'rt' => $this->input->post('rt'),
	// 									'rw' => $this->input->post('rw'),
	// 									'kelurahan' => $this->input->post('kelurahan'),
	// 									'kecamatan' => $this->input->post('kecamatan'),
	// 									'provinsi' => $this->input->post('provinsi'),
	// 									'kota' => $this->input->post('kota'),
	// 									'image' => $foto,
	// 									'no_hp' => $this->input->post('no_hp')
	// 					 );
	// 					$this->Member_Model->simpan($data);
	// 					redirect('member');
 //                }
		
	// }

	// public function lihat()
	{
		// $data['title'] = 'Identitas Pemilik';
		// $data['tb_identitas_pemilik'] = $this->db->get_where('tb_identitas_pemilik', ['nik' => $this->session->userdata('nik')])->row_array();
		
		// $this->load->view('tamplates/header', $data);
		// $this->load->view('tamplates/sidebar', $data);
		// $this->load->view('tamplates/topbar', $data);
		// $this->load->view('member/lihat', $data);
		// $this->load->view('tamplates/footer');
	}

}