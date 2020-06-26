<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_Model extends CI_MOdel
{
	public function getAll()
	{
		$this->db->join('tb_kapal','tb_kapal.id_kp = tb_surat.id_kp');
		$this->db->join('tb_identitas_pemilik','tb_kapal.nik = tb_identitas_pemilik.nik');
		return $this->db->get('tb_surat')->result_array();
	}
	public function getVerifikasi()
	{
		$this->db->select('*');
		$this->db->from('tb_kapal');
		$this->db->join('tb_surat','tb_surat.id_kp = tb_kapal.id_kp');
		$this->db->join('tb_identitas_pemilik','tb_identitas_pemilik.nik = tb_kapal.nik');
		// $this->db->where('tb_kapal.status != "menunggu"');
		$this->db->where('tb_kapal.status', 'disahkan');
		$this->db->or_where('tb_kapal.status', 'verifikasi');
		$this->db->or_where('tb_kapal.status', 'stempel');
		return $this->db->get()->result_array();
	}
	public function getDisahkan()
	{
		$this->db->join('tb_kapal','tb_kapal.id_kp = tb_surat.id_kp');
		$this->db->join('tb_identitas_pemilik','tb_kapal.nik = tb_identitas_pemilik.nik');
		$this->db->where('tb_kapal.status = "disahkan"');
		$this->db->or_where('tb_kapal.status', 'stempel');
		return $this->db->get('tb_surat')->result_array();
	}
	public function getnomor()
	{
		$this->db->order_by('id_kp', 'desc');
		$this->db->limit(1);
		return $this->db->get('tb_surat')->result_array();
	}

	public function simpan($data)
	{
		$this->db->insert('tb_surat', $data);
	}
	public function cari($id_kp)
	{
		$this->db->where('id_kp = "'.$id_kp.'"');
		return $this->db->get('tb_surat')->result_array();
	}
	public function ubah($id_kp,$data)
	{
		$this->db->where('id_kp = "'.$id_kp.'"');
		$this->db->update('tb_surat', $data);
	}
	public function hapus($id_kp)
	{
		$this->db->where('id_kp = "'.$id_kp.'"');
		$this->db->delete('tb_surat');
	}
}