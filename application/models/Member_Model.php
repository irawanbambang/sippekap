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
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		return $this->db->get('tb_identitas_pemilik')->result_array();
	}
	public function simpan($data)
	{
		$this->db->insert('tb_identitas_pemilik', $data);
	}
	public function cari($id)
	{
		$this->db->where('tb_identitas_pemilik.id = "'.$id.'"');
		$this->db->join('user','user.id = tb_identitas_pemilik.id_user');
		return $this->db->get('tb_identitas_pemilik')->result_array();
	}
	public function ubah($id,$data)
	{
		$this->db->where('id = "'.$id.'"');
		$this->db->update('tb_identitas_pemilik', $data);
	}
	public function hapus_member($id)
	{
		$this->db->where('id = "'.$id.'"');
		$this->db->delete('tb_identitas_pemilik');
	}
}