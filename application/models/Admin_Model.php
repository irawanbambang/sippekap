<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_MOdel
{
	public function getAll()
	{
		return $this->db->get('user')->result_array();
	}
	public function getnomor()
	{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		return $this->db->get('user')->result_array();
	}

	public function simpan($data)
	{
		$this->db->insert('user', $data);
	}
	public function cari($id)
	{
		$this->db->where('id = "'.$id.'"');
		return $this->db->get('user')->result_array();
	}
	public function ubah($id,$data)
	{
		$this->db->where('id = "'.$id.'"');
		$this->db->update('user', $data);
	}
	public function hapus($id)
	{
		$this->db->where('id = "'.$id.'"');
		$this->db->delete('user');
	}
}