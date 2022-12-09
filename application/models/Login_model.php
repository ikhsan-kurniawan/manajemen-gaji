<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	  // ambil data berdasarkan cookie
	public function get_by_cookie($cookie)
	{
		$this->db->where('cookie', $cookie);
		return $this->db->get('v_user');
	}

	public function update($data, $id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */