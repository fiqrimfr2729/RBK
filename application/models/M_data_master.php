<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_master extends CI_Model {

	public function get_tingkatan(){
		return $this->db->get('tingkatan');
	}

	function view_class($id_kelas) {
		$this->db->from('kelas');
		$this->db->join('tingkatan','kelas.id_tingkatan=tingkatan.id_tingkatan');
		$this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
		$this->db->join('siswa','siswa.id_kelas=kelas.id_kelas');
		$this->db->where('kelas.id_kelas',$id_kelas);
		$this->db->order_by('siswa.nama_lengkap','ASC');
		$sql_data_siswa=$this->db->get()->result();
		return $sql_data_siswa;

	}
	

	function pilih_kelas() {
		// $this->db->from('kelas');
		$sekolah = $this->session->userdata('id_sekolah');
		$this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
		$this->db->where('tingkatan', '1')->or_where('tingkatan', '2')->or_where('tingkatan', '3');
		$this->db->order_by('jurusan.nama_jurusan','ASC');
		$this->db->order_by('kelas.tingkatan','ASC');
		$this->db->order_by('kelas.urutan_kelas','ASC');
		$sql_kelas=$this->db->get_where('kelas', ['jurusan.id_sekolah' => $sekolah]);
		return $sql_kelas->result();
	}

	function get_kelas_sekarang($id_kelas) {
		$this->db->from('kelas');
		$this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
		$this->db->where('kelas.id_kelas',$id_kelas);
		$this->db->order_by('jurusan.nama_jurusan','ASC');
		$this->db->order_by('kelas.urutan_kelas','ASC');
		$sql_kelas=$this->db->get();
		return $sql_kelas;
	}
	function get_kelas_sekarangbyid($id_kelas) {
		$this->db->from('kelas');
		$this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
		$this->db->where('kelas.id_kelas',$id_kelas);
		$this->db->order_by('jurusan.nama_jurusan','ASC');
		$this->db->order_by('kelas.urutan_kelas','ASC');
		$sql_kelas=$this->db->get();
		return $sql_kelas;
	}

	function tampilkan_siswa($id_kelas) {
		$this->db->from('siswa');
		$this->db->join('kelas','siswa.id_kelas=kelas.id_kelas');
		$this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
		$this->db->where('siswa.id_kelas',$id_kelas);
		$this->db->order_by('siswa.nama_siswa','ASC');
		$sql_siswa=$this->db->get();
		return $sql_siswa;
	}

	function lihat_user($NIS) {
		$this->db->where('NIS',$NIS);
		return $this->db->get('siswa')->result();
	}

	function tambah_user($data) {
		$this->db->insert('users',$data);
	}

	public function get_jurusan($id_sekolah){
		return $this->db->get_where('jurusan', ['jurusan.id_sekolah' => $id_sekolah]);
	}

	public function get_jurusan_by_id($id_jurusan){
		return $this->db->get_where('jurusan', ['jurusan.id_jurusan' => $id_jurusan])->row();
	}

	public function add_jurusan($data){
		return $this->db->insert('jurusan', $data);
		
	}

	public function edit_jurusan($id_jurusan, $data){
		return $this->db->where('id_jurusan', $id_jurusan)->update('jurusan', $data);
	}

	public function delete_jurusan($id_jurusan){
		$kelas = $this->db->from('kelas')->where('id_jurusan', $id_jurusan)->get()->result();
		if(sizeof($kelas)==0){
			return $this->db->where('id_jurusan', $id_jurusan)->delete('jurusan');
		}else{
			return false;
		}
	}

	public function get_kelas($id_sekolah){
		$this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
		$this->db->where('tingkatan', '1')->or_where('tingkatan', '2')->or_where('tingkatan', '3');
		$this->db->order_by('kelas.tingkatan','ASC');
		$this->db->order_by('kelas.urutan_kelas','ASC');
		$this->db->order_by('jurusan.nama_jurusan','ASC');
		return $this->db->get_where('kelas', ['jurusan.id_sekolah' => $id_sekolah]);
	}

	public function get_kelas_alumni($id_sekolah){
		$this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
		$this->db->where('tingkatan', '4');
		return $this->db->get_where('kelas', ['jurusan.id_sekolah' => $id_sekolah]);
	}

	public function add_kelas($data){
		return $this->db->insert('kelas', $data);
	}

	public function add_all_kelas($data){
		return $this->db->insert_batch('kelas', $data);
	}

	public function naik_kelas(){
		$this->db->set('tingkatan', '4')->where('tingkatan', '3')->update('kelas');
		$this->db->set('tingkatan', '3')->where('tingkatan', '2')->update('kelas');
		$this->db->set('tingkatan', '2')->where('tingkatan', '1')->update('kelas');
		
		return true;
	}
	
	public function turun_kelas(){
		$this->db->set('tingkatan', '1')->where('tingkatan', '2')->update('kelas');
		$this->db->set('tingkatan', '2')->where('tingkatan', '3')->update('kelas');
		$this->db->set('tingkatan', '3')->where('tingkatan', '4')->update('kelas');
		return true;
	}

	public function edit_kelas($id_kelas, $data){
		return $this->db->where('id_kelas', $id_kelas)
		->update('kelas', $data);
	}

	public function delete_kelas($id_kelas){
		return $this->db->where('id_kelas', $id_kelas)
		->delete('kelas');
	}

	public function get_jumlah_kelas($id_jurusan, $tingkatan, $tahun_masuk){
		$jumlah = $this->db
		->from('kelas')
		->where('id_jurusan', $id_jurusan)
		->where('tingkatan', $tingkatan)
		->where('tahun_masuk', $tahun_masuk)
		->get()->num_rows();
		return $jumlah;
    }

	 public function get_siswa(){
		return $this->db->get_where('siswa');
	}

	public function get_total_siswa($id_sekolah){
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas')
		->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
		return $this->db->get_where('siswa', ['jurusan.id_sekolah' => $id_sekolah]);
	}

	public function get_total_jurusan($id_sekolah){
		return $this->db->get_where('jurusan', ['jurusan.id_sekolah' => $id_sekolah]);
	}

	public function get_total_kelas(){
		$id_sekolah = $this->session->userdata('id_sekolah');
		return $this->db->get_where('kelas', ['kelas.id_sekolah' => $id_sekolah]);
	}

	public function get_siswa_by_nis($nis){
		return $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas')->where('nis', $nis)
		->get('siswa');
	}

	public function get_siswa_by_nisn($nisn){
		return $this->db->where('NISN', $nisn)
		->get('siswa');
	}


	public function add_siswa($data, $data_user){

		$this->db->insert('users', $data_user);

		$this->db->insert('siswa', $data);
	}

	public function edit_siswa($id_siswa, $data){
		return $this->db->where('NIS', $id_siswa)
		->update('siswa', $data);
	}

	public function delete_siswa($id_siswa){
		return $this->db->where('NIS', $id_siswa)
		->delete('siswa');
	}

	public function hapus_jurusan($id_jurusan)
	{
		return $this->db->where('id_jurusan', $id_jurusan)
		->delete('jurusan');
	}

	public function get_nama_sekolah($id_sekolah){
		return $this->db->where('id_sekolah', $id_sekolah)->get('sekolah')->row()->nama_sekolah;
	}

	public function get_guru($nik){
        $guru = $this->db->from('guru')->where('nik', $nik)->get()->row();
        return $guru;
	}
	
	public function get_guru_bk_by_tingkatan($tingkatan, $id_sekolah){
        $guru = $this->db->from('guru')->where('tingkatan', $tingkatan)->where('id_sekolah', $id_sekolah)->get()->row();
        return $guru;
    }


}