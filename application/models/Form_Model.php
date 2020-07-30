<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_Model extends CI_MOdel
{
	public function getAll()
	{
		return $this->db->get('tb_kapal')->result_array();
	}
	// public function getbynik($nik)
	// {
	// 	$this->db->from('tb_kapal');
	// 	$this->db->where('nik', $nik);
	// 	return $this->db->get()->result_array();
	// }
	public function getbynik($nik)
	{
		$this->db->select('s.*,k.id_surat');
		$this->db->from('tb_kapal as s');
		$this->db->join('tb_surat as k', 'k.id_kp = s.id_kp','LEFT outer');
		$this->db->where('nik', $nik);
		$this->db->order_by('tgl_pengajuan', 'DESC');
		return $this->db->get()->result_array();
	}
	public function getVerifikasi()
	{
		$this->db->where('status != "menunggu"');
		$this->db->order_by('tgl_pengajuan', 'DESC');
		return $this->db->get('tb_kapal')->result_array();
	}
	public function getnomor()
	{
		$this->db->order_by('id_kp', 'desc');
		$this->db->limit(1);
		return $this->db->get('tb_kapal')->result_array();
	}
	public function simpan($data)
	{
		$this->db->insert('tb_kapal', $data);
	}
	public function cari($id_kp)
	{
		$this->db->where('id_kp = "'.$id_kp.'"');
		return $this->db->get('tb_kapal')->result_array();
	}
	public function ubah($id_kp,$data)
	{
		$this->db->where('id_kp = "'.$id_kp.'"');
		$this->db->update('tb_kapal', $data);
	}
	public function ambil_pesan($id)
    {
		$this->db->select('*');        
		$this->db->from('tb_kapal');
		$this->db->where('id_kp',$id);
		$query = $this->db->get();
		 
		return $query->row();
    }
}