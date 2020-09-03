<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_bimbingan extends CI_Model {

	public function get_bimbingan(){
		$id_sekolah = $this->session->userdata('id_sekolah');
		return $this->db->get_where('bimbingan', ['id_sekolah' => $id_sekolah] );
	}

	public function get_kunjungan_bimbingan_tahun($tahun){
		return $this->db->query("SELECT MONTH(tanggal) as bulan, COUNT(id_bimbingan) as jumlah_pengunjung FROM bimbingan WHERE tanggal LIKE '$tahun%' GROUP BY bulan");
	}

	public function get_tahun_bimbingan(){
		return $this->db->query("SELECT YEAR(tanggal) as tahun FROM bimbingan GROUP BY tahun");
	}

	public function get_bulan_bimbingan(){
		return $this->db->query("SELECT MONTH(tanggal) as bulan FROM bimbingan GROUP BY bulan");
	}

	public function get_bimbingan_where_users($NIS){
		return $this->db->where('NIS', $NIS)
		->get('bimbingan');
	}

	public function get_bimbingan_where_id($id_bimbingan){
		$this->db->select('*');
		$this->db->from('bimbingan');
		$this->db->join('siswa', 'siswa.NIS = bimbingan.NIS');
		$this->db->where('id_bimbingan', $id_bimbingan);
		return $this->db->get();
	}

	// GET STATUS BIMBINGAN = 0 (BELUM DI BACA ortu BK) UTK NOTIF ADMIN
	public function get_bimbingan_belum_dibaca(){
		
		$id_sekolah = $this->session->userdata('id_sekolah');
		$id_tingkatan = $this->session->userdata('id_tingkatan');
		return $this->db->get_where('bimbingan', ['id_sekolah' => $id_sekolah, 'status' => 0, 'id_tingkatan' => $id_tingkatan] );
	}

	// GET STATUS BIMBINGAN = 1 DAN ISI_BIMBINGAN != '' (SUDAH DI BALAS ortu BK) BERDASARKAN SESSION AKUN SISWA UTK NOTIF SISWA
	public function get_bimbingan_sudah_dibalas($NIS){
		return $this->db->where('status', 1)
		->where('isi_balasan !=', null)
		->where('NIS', $NIS)
		->get('bimbingan');
	}

	public function add_bimbingan($data){
		return $this->db->insert('bimbingan', $data);
	}

	public function edit_bimbingan($id_bimbingan, $data){
		return $this->db->where('id_bimbingan', $id_bimbingan)
		->update('bimbingan', $data);
	}

	public function delete_bimbingan($id_bimbingan){
		return $this->db->where('id_bimbingan', $id_bimbingan)
		->delete('bimbingan');
	}


}