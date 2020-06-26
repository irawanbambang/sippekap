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
}