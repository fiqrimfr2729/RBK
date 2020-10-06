<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_users extends CI_Model {

	function view_NIS($NIS) {
		$this->db->select('*');
		$this->db->where('NIS',$NIS);
		return $this->db->get('siswa')->result();
	}

	function delete_pengguna($id_users) {
		$this->db->where('id_users',$id_users);
		$this->db->delete('users');
	}

	function lihat_nis() {
		$this->db->select('*');
		$this->db->order_by('NIS','DESC');
		return $this->db->get('siswa')->result();
	}

	function tambah_user($data) {
		$this->db->insert('users',$data);
	}

	public function get_pengumuman_by_id($id_pengumuman)
	{
		$pengumuman = $this->db->get_where('pengumuman', ['id_pengumuman' => $id_pengumuman])->row();
		$pengumuman->jumlah_komentar = $this->db->from('komentar')->where('id_pengumuman', $id_pengumuman)->get()->num_rows();
		return $pengumuman;
	}

	public function getAllPengumuman($id_sekolah)
	{
		$pengumuman = $this->db->get_where('pengumuman', ['id_sekolah' => $id_sekolah])->result();

		foreach($pengumuman as $data){
			$data->jumlah_komentar = $this->db->from('komentar')->where('id_pengumuman', $data->id_pengumuman)->get()->num_rows();
		}
		return $pengumuman;
	}

	public function getAllKomentar()
	{
		$this->db->join('users', 'users.id_user = komentar.id_user');
		$this->db->join('pengumuman', 'pengumuman.id_pengumuman = komentar.id_pengumuman');
		return $this->db->get('komentar')->result();
	}

	public function get_komentar($id_pengumuman){
		$this->db->from('komentar')->select('komentar.id_komentar, komentar.tanggal, komentar.isi_komentar, guru.nama_guru, siswa.nama_siswa');
		$this->db->join('guru', 'guru.id_user=komentar.id_user', 'left');
		$this->db->join('siswa', 'siswa.id_user=komentar.id_user', 'left');
		return $this->db->where('komentar.id_pengumuman', $id_pengumuman)->get()->result();
	}

	public function edit_user($id_users, $data){
		return $this->db->where('id_users', $id_users)
		->update('users', $data);
	}


	function get_users_siswa() {
		// $this->db->select('*');
		// $this->db->where('level','siswa');
		$id_sekolah = $this->session->userdata('id_sekolah');
		// $this->db->order_by('id_users','DESC');
		// return $this->db->get_where('notif', ['flag' => 0, 'id_jurusan' => $id_jurusan])->num_rows();
		return $this->db->get_where('siswa', ['id_sekolah' => $id_sekolah])->result();
	}

	function get_users() {
		// $this->db->select('*');
		// $this->db->where('level','siswa');
		$id_sekolah = $this->session->userdata('id_sekolah');
		// $this->db->order_by('id_users','DESC');
		// return $this->db->get_where('notif', ['flag' => 0, 'id_jurusan' => $id_jurusan])->num_rows();
		return $this->db->get_where('users', ['id_sekolah' => $id_sekolah])->result();
	}

	function get_users_ortu() {
		$id_sekolah = $this->session->userdata('id_sekolah');
		// $this->db->select('*');
		// $this->db->where('level','ortu');
		$this->db->order_by('id_users','DESC');
		return $this->db->get_where('users', ['level' => 'ortu', 'id_sekolah' => $id_sekolah])->result();
	}

	public function add_users_siswa($data_user_siswa){
		return $this->db->insert('users', $data_user_siswa);
	}

	public function add_users_ortu($data_user_ortu){
		return $this->db->insert('users', $data_user_ortu);
	}

	public function delete_user_by_nisn($nisn){
		return $this->db->where('NISN', $nisn)
						->delete('users');
	}

	public function delete_user_by_nis($nis){
		return $this->db->where('NIS', $nis)
						->delete('users');
	}

	public function get_data_user_by_id()
	{
		$id_sekolah = $this->session->userdata('id_sekolah');
		// $this->db->join('sekolah', 'sekolah.id_sekolah = users.id_sekolah');
		// $this->db->join('admin', 'admin.id_user = users.id_user');
		return $this->db->get_where('sekolah', ['sekolah.id_sekolah' => $id_sekolah])->row_array();
	}

}