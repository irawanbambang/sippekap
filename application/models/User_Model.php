<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_MOdel
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
		$this->db->insert('tb_identitas_pemilik', $data);
	}
	public function cari($id_user)
	{
		$this->db->where('id_user = "'.$id_user.'"');
		return $this->db->get('tb_identitas_pemilik')->result_array();
	}
	public function cari_email($email)
	{
		$this->db->where('email = "'.$email.'"');
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