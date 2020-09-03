<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_konseling extends CI_Model {

	public function get_konseling(){
		$id_sekolah = $this->session->userdata('id_sekolah');
		return $this->db->get_where('konseling', ['id_sekolah' => $id_sekolah]);
	}

	public function get_konseling_where_users($NIS){
		$this->db->select('*');
		$this->db->from('konseling');
		$this->db->join('pelanggaran', 'pelanggaran.id_pelanggaran = konseling.id_pelanggaran');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_kategori = pelanggaran.id_kategori');
		$this->db->where('NIS', $NIS);
		return $this->db->get();
	}

	public function get_konseling_where_users_nis(){
		$this->db->select('*');
		$this->db->from('konseling');
		$this->db->join('pelanggaran', 'pelanggaran.id_pelanggaran = konseling.id_pelanggaran');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_kategori = pelanggaran.id_kategori');
		$this->db->where('NIS', $this->session->userdata('NIS'));
		return $this->db->get();
	}

	public function get_konseling_by_id($id_konseling){
		return $this->db->where('id_konseling', $id_konseling)
						->get('konseling');
	}

	// GET STATUS KONSELING = 0 (BELUM DI BACA SISWA / ORTU) UTK NOTIF SISWA & ORTU
	public function get_konseling_belum_dibaca(){
		$this->db->select('*');
		$this->db->from('konseling');
		$this->db->join('pelanggaran', 'pelanggaran.id_pelanggaran = konseling.id_pelanggaran');
		$this->db->join('kategori_pelanggaran', 'kategori_pelanggaran.id_kategori = pelanggaran.id_kategori');
		$this->db->where('status', 0);
		return $this->db->get();
	}

	public function add_konseling($data){
		return $this->db->insert('konseling', $data);
	}

	public function edit_konseling($id_konseling, $data){
		return $this->db->where('id_konseling', $id_konseling)
						->update('konseling', $data);
	}

	public function delete_konseling($id_konseling){
		return $this->db->where('id_konseling', $id_konseling)
						->delete('konseling');
	}

}