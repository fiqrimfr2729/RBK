<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model {

	public function verifikasi($username, $password) {
		$this->db->or_where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_data_login($username) {
		$query = $this->db->select("*")
		->from('users')
		->where('username',$username)
		->get();
		return $query->result();
	}

	function result_email() {
		$search=$this->input->GET('cari',TRUE);
		$this->db->like('email_admin',$search);
		return $this->db->get('users')->result();
	}

	function lihat_email($id_users) {
		$this->db->where('id_users',$id_users);
		return $this->db->get('users')->result();
	}

	function ubah_sandi($data,$id_users) {
		$this->db->where('id_users',$id_users);
		$this->db->update('users',$data);
	}
}