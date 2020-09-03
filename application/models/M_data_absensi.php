<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_absensi extends CI_Model {

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
		$this->db->join('tingkatan','kelas.id_tingkatan=tingkatan.id_tingkatan');
		$this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
		$this->db->order_by('tingkatan.tingkatan','ASC');
		$this->db->order_by('jurusan.nama_jurusan','ASC');
		$this->db->order_by('kelas.urutan_kelas','ASC');
		$sql_kelas=$this->db->get_where('kelas', ['kelas.id_sekolah' => $sekolah]);
		return $sql_kelas->result();
	}

	function get_kelas_sekarang($id_kelas) {
		$this->db->from('kelas');
		$this->db->join('tingkatan','kelas.id_tingkatan=tingkatan.id_tingkatan');
		$this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
		$this->db->where('kelas.id_kelas',$id_kelas);
		$this->db->order_by('tingkatan.tingkatan','ASC');
		$this->db->order_by('jurusan.nama_jurusan','ASC');
		$this->db->order_by('kelas.urutan_kelas','ASC');
		$sql_kelas=$this->db->get();
		return $sql_kelas;
	}

	function tampilkan_siswa($id_kelas) {
		$this->db->from('kelas');
		$this->db->join('tingkatan','kelas.id_tingkatan=tingkatan.id_tingkatan');
		$this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
		$this->db->join('siswa','siswa.id_kelas=kelas.id_kelas');
		$this->db->where('kelas.id_kelas',$id_kelas);
		$this->db->order_by('siswa.nama_lengkap','ASC');
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

	public function get_jurusan(){
		$id_sekolah = $this->session->userdata('id_sekolah');
		return $this->db->get_where('jurusan', ['id_sekolah' => $id_sekolah]);
	}
	public function get_absensi(){
		// $id_sekolah = $this->session->userdata('id_sekolah');
		// $this->db->from('absensi');
		// $this->db->join('tingkatan','kelas.id_tingkatan=tingkatan.id_tingkatan');
		// $this->db->join('jurusan','jurusan.id_jurusan=absensi.id_jurusan');
		
		// $this->db->where('kelas.id_kelas',$id_kelas);
		// $this->db->order_by('siswa.nama_lengkap','ASC');
		$id_sekolah = $this->session->userdata('id_sekolah');
		$this->db->join('siswa','siswa.NIS=absensi.NIS');
		return $this->db->get_where('absensi', ['absensi.id_sekolah' => $id_sekolah])->result_array();
	}

	public function add_jurusan($data){
		return $this->db->insert('jurusan', $data);
	}

	public function edit_jurusan($id_jurusan, $data){
		return $this->db->where('id_jurusan', $id_jurusan)
		->update('jurusan', $data);
	}

	public function delete_jurusan($id_jurusan){
		return $this->db->where('id_jurusan', $id_jurusan)
		->delete('jurusan');
	}

	public function get_kelas(){
		$id_sekolah = $this->session->userdata('id_sekolah');
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
		$this->db->join('tingkatan', 'tingkatan.id_tingkatan = kelas.id_tingkatan');
		return $this->db->get();
	}

	public function add_kelas($data){
		return $this->db->insert('kelas', $data);
	}


	public function edit_kelas($id_kelas, $data){
		return $this->db->where('id_kelas', $id_kelas)
		->update('kelas', $data);
	}

	public function delete_kelas($id_kelas){
		return $this->db->where('id_kelas', $id_kelas)
		->delete('kelas');
	}

	public function get_siswa(){
		return $this->db->get('siswa');
	}

	public function get_siswa_by_nis($nis){
		return $this->db->where('NIS', $nis)
		->get('siswa');
	}

	public function get_siswa_by_nisn($nisn){
		return $this->db->where('NISN', $nisn)
		->get('siswa');
	}


	public function add_siswa(){

		$data = array(

            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'id_kelas' => $this->input->post('id_kelas'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jk' => $this->input->post('jk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'email' => $this->input->post('email'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'alamat_ortu' => $this->input->post('alamat_ortu')
            );

		$this->db->insert('siswa', $data);

		 $datas = array(
            'nis' => $this->input->post('nis'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username' => $this->input->post('nis'),
            'password' => md5($this->input->post('nis')),
            'level' => 'siswa',
            'email_admin' => $this->input->post('email'),
            );
		 
		 $this->db->insert('users', $datas);
	}

	public function edit_siswa($id_siswa, $data){
		return $this->db->where('NIS', $id_siswa)
		->update('siswa', $data);
	}

	public function delete_siswa($id_siswa){
		return $this->db->where('NIS', $id_siswa)
		->delete('siswa');
	}

}