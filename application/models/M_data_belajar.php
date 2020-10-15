<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_belajar extends CI_Model {


	public function get_belajar() {
		// $this->db->from('kelas');
		$sekolah = $this->session->userdata('id_sekolah');
		// $this->db->join('tingkatan','kelas.id_tingkatan=tingkatan.id_tingkatan');
		// $this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
		// $this->db->order_by('tingkatan.tingkatan','ASC');
		// $this->db->order_by('jurusan.nama_jurusan','ASC');
		// $this->db->order_by('kelas.urutan_kelas','ASC');
		$sql_kelas=$this->db->get_where('pengumuman', ['pengumuman.id_sekolah' => $sekolah]);
		return $sql_kelas->result_array();
	}


	public function get_belajar_where_users($NIS){
		$this->db->select('*');
		$this->db->from('belajar');
		$this->db->join('pelanggaran', 'pelanggaran.id_pelanggaran = belajar.id_pelanggaran');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_kategori = pelanggaran.id_kategori');
		$this->db->where('NIS', $NIS);
		return $this->db->get();
	}

	public function get_belajar_where_users_nis(){
		$this->db->select('*');
		$this->db->from('belajar');
		$this->db->join('pelanggaran', 'pelanggaran.id_pelanggaran = belajar.id_pelanggaran');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_kategori = pelanggaran.id_kategori');
		$this->db->where('NIS', $this->session->userdata('NIS'));
		return $this->db->get();
	}

	public function get_belajar_by_id($id_belajar){
		return $this->db->where('id_belajar', $id_belajar)
						->get('belajar');
	}

	// GET STATUS belajar = 0 (BELUM DI BACA SISWA / ORTU) UTK NOTIF SISWA & ORTU
	public function get_belajar_belum_dibaca(){
		$this->db->select('*');
		$this->db->from('belajar');
		$this->db->join('pelanggaran', 'pelanggaran.id_pelanggaran = belajar.id_pelanggaran');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_kategori = pelanggaran.id_kategori');
		$this->db->where('status', 0);
		return $this->db->get();
	}

	public function add_belajar($data){
		return $this->db->insert('belajar', $data);
	}

	public function edit_belajar($id_belajar, $data){
		return $this->db->where('id_belajar', $id_belajar)
						->update('belajar', $data);
	}

	public function delete_belajar($id_pengumuman){
		return $this->db->where('id_pengumuman', $id_pengumuman)
						->delete('pengumuman');
	}

	public function delete_komentar($id_komentar){
		return $this->db->where('id_komentar', $id_komentar)->delete('komentar');
	}

}