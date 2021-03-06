<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Form_Model');
		$this->load->model('SuratTolak_Model');
		$this->load->helper('tgl_indo');
	}

	public function pendaftaran()
	{
		$data['title'] = 'Form Pendaftaran';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('form/pendaftaran', $data);
		$this->load->view('tamplates/footer');

		// $this->form_validation->set_rules('no_pas', 'Nomor Pas Kecil', 'required|trim');
	}

	public function pengajuan()
	{
		$data['title'] = 'Data Yang Diajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$id = $data['user']['id'];

		$nik = $this->db->get_where('tb_identitas_pemilik', ['id_user' => $id])->row_array();

		$data['pengajuan'] = $this->Form_Model->getbynik($nik['nik']);
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('form/pengajuan', $data);
		$this->load->view('tamplates/footer');
	}

	public function add()
	{
		$tolak = array(
			'status' => 'tolak',
			'pesan' => $this->input->post('pesan')
		 );		

		$this->Form_Model->getbynik($this->input->post('nik'), $tolak);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berkas Berhasil Ditolak</div>');
		redirect('form/pendaftaran');
	}

	public function simpan()
	{
		// $foto="";
		// $namafoto=date('ymdhis');
		// $config['upload_path']          = './assets/upload_image/';
  //             $config['allowed_types']        = 'gif|jpg|png|jpeg';
  //             $config['max_size']             = 2500;
  //             $config['file_name']			=$namafoto;
  //             $this->load->library('upload', $config);
		

              // if ( ! $this->upload->do_upload('upload_pas'))
              // {
                      
              // }
              // else
              // {
 	            // $gbr=$this->upload->data();
 	            // $foto=$gbr['file_name'];
				// $this->form_validation->set_rules('no_pas','No Pas kecil','required');
				// $this->form_validation->set_rules('penerbit','Penerbit','required');
				// $this->form_validation->set_rules('asal_ktp','Asal KTP','required');

				// if($this->form_validation->run() == false) {
				// 	redirect('form/pendaftaran');
				// 	// echo "form validasi false";
				// 	// die;
				// }else{
					$tgl_awal      = $this->input->post('tgl_terbit');
			        $tgl_akhir  = $this->input->post('tgl_kadaluwarsa');

			        if ($tgl_awal > $tgl_akhir) {
			        	
			        	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tanggal Terbit tidak boleh lebih besar dari Tanggal Kadaluwarsa!</div>');
			        	echo '<script>window.history.back();</script>';
			        }else{


					$upload_pas = $_FILES['upload_pas']['name'];
					if ($upload_pas) {
						$config['allowed_types'] = 'gif|jpeg|jpg|png';
		                $config['max_size']     = '10240';
		                $namafoto=date('ymdhis');
		                $config['file_name']	= $namafoto;
		                $config['upload_path'] = './assets/upload_image/';

		                $this->load->library('upload', $config);

		                if ($this->upload->do_upload('upload_pas')) {
		                    $nama_foto_upload_pas = $this->upload->data('file_name');
		                } else {
		                    echo $this->upload->display_errors();
		                }
		            } else {
		            	$nama_foto_upload_pas = '';
		            }

		            // echo $nama_foto_upload_pas;

		            $upload_kapal_datang = $_FILES['upload_kapal_datang']['name'];
					if ($upload_kapal_datang) {
		                $config['allowed_types'] = 'gif|jpeg|jpg|png';
		                $config['max_size']     = '10240';
		                $namafoto=date('ymdhis');
		                $config['file_name']	= $namafoto;
		                $config['upload_path'] = './assets/upload_image/';

		                $this->load->library('upload', $config);

		                if ($this->upload->do_upload('upload_kapal_datang')) {
		                    $nama_foto_upload_kapal_datang = $this->upload->data('file_name');
		                } else {
		                    echo $this->upload->display_errors();
		                }
		            } else {
		            	$nama_foto_upload_kapal_datang = '';
		            }

		            // echo $nama_foto_upload_kapal_datang;

		            $upload_ktp = $_FILES['upload_ktp']['name'];
					if ($upload_ktp) {
		                $config['allowed_types'] = 'gif|jpeg|jpg|png';
		                $config['max_size']     = '10240';
		                $namafoto=date('ymdhis');
		                $config['file_name']	= $namafoto;
		                $config['upload_path'] = './assets/upload_image/';

		                $this->load->library('upload', $config);

		                if ($this->upload->do_upload('upload_ktp')) {
		                    $nama_foto_upload_ktp = $this->upload->data('file_name');
		                } else {
		                    echo $this->upload->display_errors();
		                }
		            } else {
		            	$nama_foto_upload_ktp = '';
		            }

		            $jenis_alat = '';

		            if($this->input->post('jenis_alat') == 'lainnya') {
		            	$jenis_alat = $this->input->post('jenis_lain');
		            } else {
		            	$jenis_alat = $this->input->post('jenis_alat');
		            }

		            $bahan = '';

		            if($this->input->post('bahan') == 'lain') {
		            	$bahan = $this->input->post('bahan_lain');
		            } else {
		            	$bahan = $this->input->post('bahan');
		            }


	 	            $data = array('no_pas' => $this->input->post('no_pas'), 
	 	            				'asal_ktp' => $this->input->post('asal_ktp'),
									'nik' => $this->input->post('nik'),
									'tgl_terbit' => $this->input->post('tgl_terbit'),
									'tgl_kadaluwarsa' => $this->input->post('tgl_kadaluwarsa'),
									'penerbit' => $this->input->post('penerbit'),
									'nama_kapal' => $this->input->post('nama_kapal'),
									'tanda_selar' => $this->input->post('tanda_selar'),
									'jenis_alat' => $jenis_alat,
									'berat' => $this->input->post('berat'),
									'muatan' => $this->input->post('muatan'),
									'kekuatan' => $this->input->post('kekuatan'),
									'merk_mesin' => $this->input->post('merk_mesin'),
									'no_mesin' => $this->input->post('no_mesin'),
									'bahan' => $bahan,
									'penangkapan' => $this->input->post('penangkapan'),
									'pangkalan' => $this->input->post('pangkalan'),
									'anak_buah' => $this->input->post('anak_buah'),
									'upload_pas' => $nama_foto_upload_pas,
									'upload_kapal_datang' => $nama_foto_upload_kapal_datang,
									'upload_ktp' => $nama_foto_upload_ktp,
									'tgl_pengajuan' => date("Y-m-d")
			 		);
					$this->Form_Model->simpan($data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambah Pengajuan!</div>');
					redirect('form/pengajuan');

					}

				
	}

	public function edit($id_kp)
	{
		$data['title'] = 'Lihat Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['pengajuan'] = $this->Form_Model->cari($id_kp);

		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('form/edit', $data);
		$this->load->view('tamplates/footer');
	}

	public function ubah()
	{
		$tgl_awal      = $this->input->post('tgl_terbit');
		$tgl_akhir  = $this->input->post('tgl_kadaluwarsa');
		$upload_pas = $_FILES['upload_pas']['name'];
					if ($upload_pas) {
						$config['allowed_types'] = 'gif|jpeg|jpg|png';
		                $config['max_size']     = '10240';
		                $namafoto=date('ymdhis');
		                $config['file_name']	= $namafoto;
		                $config['upload_path'] = './assets/upload_image/';

		                $this->load->library('upload', $config);

		                if ($this->upload->do_upload('upload_pas')) {
		                    $nama_foto_upload_pas = $this->upload->data('file_name');
		                } else {
		                    echo $this->upload->display_errors();
		                }
		            } else {
		            	$nama_foto_upload_pas = $this->input->post('upload_pas_lama');
		            }

		            // echo $nama_foto_upload_pas;

		            $upload_kapal_datang = $_FILES['upload_kapal_datang']['name'];
					if ($upload_kapal_datang) {
		                $config['allowed_types'] = 'gif|jpeg|jpg|png';
		                $config['max_size']     = '10240';
		                $namafoto=date('ymdhis');
		                $config['file_name']	= $namafoto;
		                $config['upload_path'] = './assets/upload_image/';

		                $this->load->library('upload', $config);

		                if ($this->upload->do_upload('upload_kapal_datang')) {
		                    $nama_foto_upload_kapal_datang = $this->upload->data('file_name');
		                } else {
		                    echo $this->upload->display_errors();
		                }
		            } else {
		            	$nama_foto_upload_kapal_datang = $this->input->post('upload_kapal_datang_lama');
		            }

		            // echo $nama_foto_upload_kapal_datang;

		            $upload_ktp = $_FILES['upload_ktp']['name'];
					if ($upload_ktp) {
		                $config['allowed_types'] = 'gif|jpeg|jpg|png';
		                $config['max_size']     = '10240';
		                $namafoto=date('ymdhis');
		                $config['file_name']	= $namafoto;
		                $config['upload_path'] = './assets/upload_image/';

		                $this->load->library('upload', $config);

		                if ($this->upload->do_upload('upload_ktp')) {
		                    $nama_foto_upload_ktp = $this->upload->data('file_name');
		                } else {
		                    echo $this->upload->display_errors();
		                }
		            } else {
		            	$nama_foto_upload_ktp = $this->input->post('upload_ktp_lama');
		            }

		            $jenis_alat = '';

		            if($this->input->post('jenis_alat') == 'lainnya') {
		            	$jenis_alat = $this->input->post('jenis_lain');
		            } else {
		            	$jenis_alat = $this->input->post('jenis_alat');
		            }

		            $bahan = '';

		            if($this->input->post('bahan') == 'lain') {
		            	$bahan = $this->input->post('bahan_lain');
		            } else {
		            	$bahan = $this->input->post('bahan');
		            }
		$data = array(
						'no_pas' => $this->input->post('no_pas'),
						'asal_ktp' => $this->input->post('asal_ktp'),
						'tgl_terbit' => $this->input->post('tgl_terbit'),
						'tgl_kadaluwarsa' => $this->input->post('tgl_kadaluwarsa'),
						'penerbit' => $this->input->post('penerbit'),
						'nama_kapal' => $this->input->post('nama_kapal'),
						'tanda_selar' => $this->input->post('tanda_selar'),
						'jenis_alat' => $this->input->post('jenis_alat'),
						'berat' => $this->input->post('berat'),
						'muatan' => $this->input->post('muatan'),
						'kekuatan' => $this->input->post('kekuatan'),
						'merk_mesin' => $this->input->post('merk_mesin'),
						'no_mesin' => $this->input->post('no_mesin'),
						'bahan' => $this->input->post('bahan'),
						'penangkapan' => $this->input->post('penangkapan'),
						'pangkalan' => $this->input->post('pangkalan'),
						'anak_buah' => $this->input->post('anak_buah'),
						'upload_pas' => $nama_foto_upload_pas,
						'upload_kapal_datang' => $nama_foto_upload_kapal_datang,
						'upload_ktp' => $nama_foto_upload_ktp
		 );
		$this->Form_Model->ubah($this->input->post('id_kp'),$data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengubah Data!</div>');
		redirect('form/pengajuan');
	}

	public function usulkan($id_kp)
	{
		$data = array(
						'status' => 'proses'
		 );
		$this->Form_Model->ubah($id_kp, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengusulkan Pengajuan!</div>');
		redirect('form/pengajuan');
	}

	public function tolak()
	{
		$tolak = array(
			'id_kp' => $this->input->post('id_kp'),
			'keterangan' => $this->input->post('keterangan')
		 );
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Berkas Berhasil Ditolak</div>');
		redirect('admin/daftar');
	}
	
	public function download_surat($id_surat) {
		$data = $this->db->get_where('tb_surat', ['id_surat' => $id_surat])->row_array();
		force_download('assets/upload_image/'.$data['upload_surat'], NULL);
	}

	public function ambil_pesan($id)
	{
	    $data = $this->Form_Model->ambil_pesan($id);
	    echo json_encode($data);
	}
    
}