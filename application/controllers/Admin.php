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
		$data['title'] = 'Daftar Pemohon';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['data_pemohon'] = $this->Member_Model->getAll();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/daftar_pemohon', $data);
		$this->load->view('tamplates/footer');
	}

	public function detail_data_pemohon()
	{
		$data['title'] = 'Detail Data Pemohon';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['data_pemohon'] = $this->Member_Model->getAll();
		
		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/detail_data_pemohon', $data);
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
						'id_kp' => $this->input->post('id'),
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
	public function ubah_aktifasi($id,$is_active)
	{
		$is="";
		if($is_active=="1"){
			$is=="0";
		}else{
			$is="1";
		}
		$data = array(
						'is_active' => $is
		 );
		$this->Admin_Model->ubah($id,$data);
		redirect('admin/daftar_user');
	}

	public function hapus($id)
	{
		$this->Admin_Model->hapus($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('admin/daftar_admin');
	}


	public function cetak_tanggal()
	{
		$data['title'] = 'Cetak Laporan Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/filter/v_cetak_tanggal', $data);
		$this->load->view('tamplates/footer');
	}
	public function cetak_tahun()
	{
		$data['title'] = 'Cetak Laporan Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/filter/v_cetak_tahun', $data);
		$this->load->view('tamplates/footer');
	}

	public function cetak_bulan()
	{
		$data['title'] = 'Cetak Laporan Pengajuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('tamplates/header', $data);
		$this->load->view('tamplates/sidebar', $data);
		$this->load->view('tamplates/topbar', $data);
		$this->load->view('admin/filter/v_cetak_bulan', $data);
		$this->load->view('tamplates/footer');
	}

	public function excel()
	{
		$tgl_awal      = $this->input->post('tgl_awal');
        $tgl_akhir  = $this->input->post('tgl_akhir');
        $asal = $this->input->post('asal');
        $kota="";
        if ($asal=="1") {
        	$kota="Kota Pekalongan";
        }else{
        	$Kota="Luar Kota Pekalongan";
        }

        if ($tgl_awal > $tgl_akhir) {
        	
        	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tanggal Awal tidak boleh lebih besar dari Tanggal Akhir!</div>');
        	echo '<script>window.history.back();</script>';
        }else{
        	include APPPATH.'third_party\PHPExcel\Classes\PHPExcel.php';
		include APPPATH.'third_party\PHPExcel\Classes\PHPExcel\Writer\Excel2007.php';

		$cetak = new PHPExcel();

		$cetak->getproperties()->setCreator("Dinas Kelautan dan Perikanan")
								->setLastModifiedBy("DKP Kota Pekalongan")
								->setTitle("Daftar Pendaftaran Kapal")
								->setSubject("Admin")
								->setDescription("Laporan Pendaftaran Kapal")
								->setKeywords("Data Pengajuan Izin Kapal");

		$style_col = array(
          'font' => array('bold' => true),
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
        
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );						

		$cetak->setActiveSheetIndex(0);

		$cetak->setActiveSheetIndex(0)->setCellValue('A1', "Data Daftar Pengajuan Perizinan");
        $cetak->getActiveSheet()->mergeCells('A1:K1');
        $cetak->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $cetak->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $cetak->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$cetak->getActiveSheet()->setCellValue('A3', 'NO');
		$cetak->getActiveSheet()->setCellValue('B3', 'NAMA KAPAL');
		$cetak->getActiveSheet()->setCellValue('C3', 'UKURAN(GT)');
		$cetak->getActiveSheet()->setCellValue('D3', 'TANDA SELAR');
		$cetak->getActiveSheet()->setCellValue('E3', 'MESIN(PK)');
		$cetak->getActiveSheet()->setCellValue('F3', 'MERK MESIN');
		$cetak->getActiveSheet()->setCellValue('G3', 'NAMA PEMILIK');
		$cetak->getActiveSheet()->setCellValue('H3', 'ALAMAT');
		$cetak->getActiveSheet()->setCellValue('I3', 'TANGGAL PEMBUATAN IZIN');
		$cetak->getActiveSheet()->setCellValue('J3', 'TANGGAL BERAKHIR IZIN');
		$cetak->getActiveSheet()->setCellValue('K3', 'NO. SPKPI');

		$cetak->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);

		$kapal = $this->Surat_Model->getCetaktgl($tgl_awal,$tgl_akhir,$kota);

		$baris = 4;
		$no = 1;

		foreach ($kapal as $kp) {
			$cetak->setActiveSheetIndex(0)->setCellValue('A'.$baris, $no++);
			$cetak->setActiveSheetIndex(0)->setCellValue('B'.$baris, $kp['nama_kapal']);
			$cetak->setActiveSheetIndex(0)->setCellValue('C'.$baris, $kp['muatan']);
			$cetak->setActiveSheetIndex(0)->setCellValue('D'.$baris, $kp['tanda_selar']);
			$cetak->setActiveSheetIndex(0)->setCellValue('E'.$baris, $kp['no_mesin']);
			$cetak->setActiveSheetIndex(0)->setCellValue('F'.$baris, $kp['merk_mesin']);
			$cetak->setActiveSheetIndex(0)->setCellValue('G'.$baris, $kp['nama']);
			$cetak->setActiveSheetIndex(0)->setCellValue('H'.$baris, $kp['alamat'].", RT :".$kp['rt']);
			$cetak->setActiveSheetIndex(0)->setCellValue('I'.$baris, $kp['tgl_terbit']);
			$cetak->setActiveSheetIndex(0)->setCellValue('J'.$baris, $kp['tgl_kadaluwarsa']);
			$cetak->setActiveSheetIndex(0)->setCellValue('K'.$baris, $kp['no_surat']);

			$cetak->getActiveSheet()->getStyle('A'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('B'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('C'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('D'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('E'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('F'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('G'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('H'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('I'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('J'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('K'.$baris)->applyFromArray($style_row);

			$baris++;
		}

		$cetak->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $cetak->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $cetak->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $cetak->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $cetak->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $cetak->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $cetak->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $cetak->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $cetak->getActiveSheet()->getColumnDimension('I')->setWidth(27);
        $cetak->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $cetak->getActiveSheet()->getColumnDimension('K')->setWidth(30);

		$filename = "Data_Pendaftaran".'.xlsx';

		 $cetak->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        
        $cetak->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		$cetak->getActiveSheet()->setTitle("Data Pendaftaran Kapal");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Daftar Pengajuan'.$filename. '"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($cetak, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');


		exit;
        }

		

	}
	public function bulan()
	{
		$bulan      = $this->input->post('bulan');
        $tahun  = $this->input->post('tahun');
        $tgl_awal      = $tahun."-".$bulan."-"."1";
        $tgl_akhir  = $tahun."-".$bulan."-"."31";
        $asal = $this->input->post('asal');
        $kota="";
        if ($asal=="1") {
        	$kota="Kota Pekalongan";
        }else{
        	$Kota="Luar Kota Pekalongan";
        }

        if ($tgl_awal > $tgl_akhir) {
        	
        	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tanggal Awal tidak boleh lebih besar dari Tanggal Akhir!</div>');
        	echo '<script>window.history.back();</script>';
        }else{
        	include APPPATH.'third_party\PHPExcel\Classes\PHPExcel.php';
		include APPPATH.'third_party\PHPExcel\Classes\PHPExcel\Writer\Excel2007.php';

		$cetak = new PHPExcel();

		$cetak->getproperties()->setCreator("Dinas Kelautan dan Perikanan")
								->setLastModifiedBy("DKP Kota Pekalongan")
								->setTitle("Daftar Pendaftaran Kapal")
								->setSubject("Admin")
								->setDescription("Laporan Pendaftaran Kapal ")
								->setKeywords("Data Pengajuan Izin Kapal");

		$style_col = array(
          'font' => array('bold' => true),
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
        
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
		$cetak->setActiveSheetIndex(0);

		$cetak->setActiveSheetIndex(0)->setCellValue('A1', "Data Daftar Pengajuan Perizinan");
        $cetak->getActiveSheet()->mergeCells('A1:K1');
        $cetak->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $cetak->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $cetak->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$cetak->getActiveSheet()->setCellValue('A3', 'NO');
		$cetak->getActiveSheet()->setCellValue('B3', 'NAMA KAPAL');
		$cetak->getActiveSheet()->setCellValue('C3', 'UKURAN(GT)');
		$cetak->getActiveSheet()->setCellValue('D3', 'TANDA SELAR');
		$cetak->getActiveSheet()->setCellValue('E3', 'MESIN(PK)');
		$cetak->getActiveSheet()->setCellValue('F3', 'MERK MESIN');
		$cetak->getActiveSheet()->setCellValue('G3', 'NAMA PEMILIK');
		$cetak->getActiveSheet()->setCellValue('H3', 'ALAMAT');
		$cetak->getActiveSheet()->setCellValue('I3', 'TANGGAL PEMBUATAN IZIN');
		$cetak->getActiveSheet()->setCellValue('J3', 'TANGGAL BERAKHIR IZIN');
		$cetak->getActiveSheet()->setCellValue('K3', 'NO. SPKPI');

		$cetak->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);

		$kapal = $this->Surat_Model->getCetaktgl($tgl_awal,$tgl_akhir,$kota);

		$baris = 4;
		$no = 1;

		foreach ($kapal as $kp) {
			$cetak->setActiveSheetIndex(0)->setCellValue('A'.$baris, $no++);
			$cetak->setActiveSheetIndex(0)->setCellValue('B'.$baris, $kp['nama_kapal']);
			$cetak->setActiveSheetIndex(0)->setCellValue('C'.$baris, $kp['muatan']);
			$cetak->setActiveSheetIndex(0)->setCellValue('D'.$baris, $kp['tanda_selar']);
			$cetak->setActiveSheetIndex(0)->setCellValue('E'.$baris, $kp['no_mesin']);
			$cetak->setActiveSheetIndex(0)->setCellValue('F'.$baris, $kp['merk_mesin']);
			$cetak->setActiveSheetIndex(0)->setCellValue('G'.$baris, $kp['nama']);
			$cetak->setActiveSheetIndex(0)->setCellValue('H'.$baris, $kp['alamat'].", RT :".$kp['rt']);
			$cetak->setActiveSheetIndex(0)->setCellValue('I'.$baris, $kp['tgl_terbit']);
			$cetak->setActiveSheetIndex(0)->setCellValue('J'.$baris, $kp['tgl_kadaluwarsa']);
			$cetak->setActiveSheetIndex(0)->setCellValue('K'.$baris, $kp['no_surat']);

			$cetak->getActiveSheet()->getStyle('A'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('B'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('C'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('D'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('E'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('F'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('G'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('H'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('I'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('J'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('K'.$baris)->applyFromArray($style_row);

			$baris++;
		}

		$cetak->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $cetak->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $cetak->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $cetak->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $cetak->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $cetak->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $cetak->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $cetak->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $cetak->getActiveSheet()->getColumnDimension('I')->setWidth(27);
        $cetak->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $cetak->getActiveSheet()->getColumnDimension('K')->setWidth(30);

		$filename = "Data_Pendaftaran".'.xlsx';

		$cetak->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        
        $cetak->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		$cetak->getActiveSheet()->setTitle("Data Pendaftaran Kapal");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		header('Content-Disposition: attachment;filename="Daftar Pengajuan'.$filename. '"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($cetak, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');


		exit;
        }

		

	}
public function tahun()
	{
		$tahun  = $this->input->post('tahun');
        $tgl_awal      = $tahun."-01-1";
        $tgl_akhir  = $tahun."-12-31";
        $asal = $this->input->post('asal');
        $kota="";
        if ($asal=="1") {
        	$kota="Kota Pekalongan";
        }else{
        	$Kota="Luar Kota Pekalongan";
        }

        if ($tgl_awal > $tgl_akhir) {
        	
        	$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Tanggal Awal tidak boleh lebih besar dari Tanggal Akhir!</div>');
        	echo '<script>window.history.back();</script>';
        }else{
        	include APPPATH.'third_party\PHPExcel\Classes\PHPExcel.php';
		include APPPATH.'third_party\PHPExcel\Classes\PHPExcel\Writer\Excel2007.php';

		$cetak = new PHPExcel();

		$cetak->getproperties()->setCreator("Dinas Kelautan dan Perikanan")
								->setLastModifiedBy("DKP Kota Pekalongan")
								->setTitle("Daftar Pendaftaran Kapal")
								->setSubject("Admin")
								->setDescription("Laporan Pendaftaran Kapal ")
								->setKeywords("Data Pengajuan Izin Kapal");

		$style_col = array(
          'font' => array('bold' => true),
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
        
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
		$cetak->setActiveSheetIndex(0);

		$cetak->setActiveSheetIndex(0)->setCellValue('A1', "Data Daftar Pengajuan Perizinan");
        $cetak->getActiveSheet()->mergeCells('A1:K1');
        $cetak->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $cetak->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $cetak->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$cetak->getActiveSheet()->setCellValue('A3', 'NO');
		$cetak->getActiveSheet()->setCellValue('B3', 'NAMA KAPAL');
		$cetak->getActiveSheet()->setCellValue('C3', 'UKURAN(GT)');
		$cetak->getActiveSheet()->setCellValue('D3', 'TANDA SELAR');
		$cetak->getActiveSheet()->setCellValue('E3', 'MESIN(PK)');
		$cetak->getActiveSheet()->setCellValue('F3', 'MERK MESIN');
		$cetak->getActiveSheet()->setCellValue('G3', 'NAMA PEMILIK');
		$cetak->getActiveSheet()->setCellValue('H3', 'ALAMAT');
		$cetak->getActiveSheet()->setCellValue('I3', 'TANGGAL PEMBUATAN IZIN');
		$cetak->getActiveSheet()->setCellValue('J3', 'TANGGAL BERAKHIR IZIN');
		$cetak->getActiveSheet()->setCellValue('K3', 'NO. SPKPI');

		$cetak->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $cetak->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);

		$kapal = $this->Surat_Model->getCetaktgl($tgl_awal,$tgl_akhir,$kota);

		$baris = 4;
		$no = 1;

		foreach ($kapal as $kp) {
			$cetak->setActiveSheetIndex(0)->setCellValue('A'.$baris, $no++);
			$cetak->setActiveSheetIndex(0)->setCellValue('B'.$baris, $kp['nama_kapal']);
			$cetak->setActiveSheetIndex(0)->setCellValue('C'.$baris, $kp['muatan']);
			$cetak->setActiveSheetIndex(0)->setCellValue('D'.$baris, $kp['tanda_selar']);
			$cetak->setActiveSheetIndex(0)->setCellValue('E'.$baris, $kp['no_mesin']);
			$cetak->setActiveSheetIndex(0)->setCellValue('F'.$baris, $kp['merk_mesin']);
			$cetak->setActiveSheetIndex(0)->setCellValue('G'.$baris, $kp['nama']);
			$cetak->setActiveSheetIndex(0)->setCellValue('H'.$baris, $kp['alamat'].", RT :".$kp['rt']);
			$cetak->setActiveSheetIndex(0)->setCellValue('I'.$baris, $kp['tgl_terbit']);
			$cetak->setActiveSheetIndex(0)->setCellValue('J'.$baris, $kp['tgl_kadaluwarsa']);
			$cetak->setActiveSheetIndex(0)->setCellValue('K'.$baris, $kp['no_surat']);

			$cetak->getActiveSheet()->getStyle('A'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('B'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('C'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('D'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('E'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('F'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('G'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('H'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('I'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('J'.$baris)->applyFromArray($style_row);
          	$cetak->getActiveSheet()->getStyle('K'.$baris)->applyFromArray($style_row);

			$baris++;
		}

		$cetak->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $cetak->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $cetak->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $cetak->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $cetak->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $cetak->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $cetak->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $cetak->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $cetak->getActiveSheet()->getColumnDimension('I')->setWidth(27);
        $cetak->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $cetak->getActiveSheet()->getColumnDimension('K')->setWidth(30);

		$filename = "Data_Pendaftaran".'.xlsx';

		$cetak->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        
        $cetak->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		$cetak->getActiveSheet()->setTitle("Data Pendaftaran Kapal");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		header('Content-Disposition: attachment;filename="Daftar Pengajuan'.$filename. '"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createwriter($cetak, 'Excel2007');
		ob_end_clean();
		$writer->save('php://output');


		exit;
        }

		

	}
	


}