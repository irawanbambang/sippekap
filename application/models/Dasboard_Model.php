<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard_Model extends CI_MOdel
{
	public function ambilDataPengajuan()
	{
		$this->db->from('tb_kapal');
		$this->db->where('status != "menunggu"');
		return $this->db->count_all_results();
	}

	public function ambilDataPerizinan()
	{
<<<<<<< HEAD
		$this->db->from('tb_surat');
=======
		$this->db->from('tb_surat_perizinan');
>>>>>>> 05e0c4639e50998c201287c6bc8f7d95bc4bae2f
		return $this->db->count_all_results();
	}

	public function ambilDataPemohon()
	{
<<<<<<< HEAD
		$this->db->from('tb_identitas_pemilik');
=======
		$this->db->from('tb_surat');
>>>>>>> 05e0c4639e50998c201287c6bc8f7d95bc4bae2f
		return $this->db->count_all_results();
	}

	public function ambilKotaChart()
	{
		$this->db->select("
              SUM(CASE WHEN (asal_ktp = 'Kota Pekalongan') THEN 1 ELSE 0 END) AS dalam,
              SUM(CASE WHEN (asal_ktp = 'Luar Kota Pekalongan') THEN 1 ELSE 0 END) AS luar"
            );
		$this->db->from('tb_kapal');
		return $this->db->get();
	}

	public function ambilJekelChart()
	{
		$this->db->select("
              SUM(CASE WHEN (jenis_kelamin = 'laki-laki') THEN 1 ELSE 0 END) AS cowok,
              SUM(CASE WHEN (jenis_kelamin = 'perempuan') THEN 1 ELSE 0 END) AS cewek"
            );
		$this->db->from('tb_identitas_pemilik');
		return $this->db->get();
	}
}