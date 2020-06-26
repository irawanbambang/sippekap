<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_MOdel
{
	public function getSubMenu()
	{
		$this->db->select('user_sub_menu.*,user_menu.menu');
		$this->db->join('user_menu','user_sub_menu.menu_id=user_menu.id');
		return $this->db->get('user_sub_menu')->result_array();
	}

	public function cari($id)
	{
		$this->db->where('id = "'.$id.'"');
		return $this->db->get('user')->result_array();
	}

	public function ubah($id,$data)
	{
		$this->db->where('id = "'.$id.'"');
		$this->db->update('user_sub_menu', $data);
	}
}