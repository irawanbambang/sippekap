<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_Model extends CI_MOdel
{
	public function getAll()
	{
		return $this->db->get('tb_identitas_pemilik')->result_array();
	}
	public function getnomor()
	{
		$this->db->order_by('id_ip', 'desc');
		$this->db->limit(1);
		return $this->db->get('tb_identitas_pemilik')->result_array();
	}
	public function simpan($data)
	{
		$this->db->insert('tb_identitas_pemilik', $data);
	}
	public function cari($id_ip)
	{
		$this->db->where('id_ip = "'.$id_ip.'"');
		return $this->db->get('tb_identitas_pemilik')->result_array();
	}
	public function ubah($id_ip,$data)
	{
		$this->db->where('id_ip = "'.$id_ip.'"');
		$this->db->update('tb_identitas_pemilik', $data);
	}
	public function hapus_member($id_ip)
	{
		$this->db->where('id_ip = "'.$id_ip.'"');
		$this->db->delete('tb_identitas_pemilik');
	}
}