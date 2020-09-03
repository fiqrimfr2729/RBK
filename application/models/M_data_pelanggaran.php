<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_pelanggaran extends CI_Model {

	public function get_kategori(){
		return $this->db->get('kategori_pelanggaran');
	}

	public function add_kategori($data){
		return $this->db->insert('kategori_pelanggaran', $data);
	}

	public function edit_kategori($id_kategori, $data){
		return $this->db->where('id_kategori', $id_kategori)
						->update('kategori_pelanggaran', $data);
	}

	public function delete_kategori($id_kategori){
		return $this->db->where('id_kategori', $id_kategori)
						->delete('kategori_pelanggaran');
	}

	public function get_pelanggaran(){
		return $this->db->get('pelanggaran');
	}

	public function get_pelanggaran_by_id($id_pelanggaran){
		return $this->db->where('id_pelanggaran', $id_pelanggaran)
						->get('pelanggaran');
	}

	public function add_pelanggaran($data){
		return $this->db->insert('pelanggaran', $data);
	}

	public function edit_pelanggaran($id_pelanggaran, $data){
		return $this->db->where('id_pelanggaran', $id_pelanggaran)
						->update('pelanggaran', $data);
	}

	public function delete_pelanggaran($id_pelanggaran){
		return $this->db->where('id_pelanggaran', $id_pelanggaran)
						->delete('pelanggaran');
	}

}