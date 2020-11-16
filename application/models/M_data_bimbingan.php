<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_bimbingan extends CI_Model {

	public function get_bimbingan($id_sekolah, $nik){
		$guru = $this->db->from('guru')->where('nik', $nik)->get()->row();

		$this->db->from('bimbingan')
        ->join('siswa', 'siswa.nis = bimbingan.nis')
        ->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
        ->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan')
		->where('jurusan.id_sekolah', $id_sekolah)
		->where('bimbingan.id_tingkatan', $guru->tingkatan)
		->where('kelas.tingkatan', $guru->tingkatan);
        return $this->db->get();
	}

	public function get_bimbingan_admin($id_sekolah){
		$this->db->from('bimbingan')
        ->join('siswa', 'siswa.nis = bimbingan.nis')
        ->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
        ->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan')
        ->where('jurusan.id_sekolah', $id_sekolah);
        return $this->db->get();
	}

	public function get_bimbingan_siswa($nis){
		$this->db->from('bimbingan')
		->select('bimbingan.id_tingkatan, bimbingan.nis, bimbingan.subject, bimbingan.tgl_bim, bimbingan.isi_bim, bimbingan.status_by_guru, bimbingan.id_bimbingan')
        ->join('siswa', 'siswa.nis = bimbingan.nis')
        ->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
        ->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan')
        ->where('bimbingan.nis', $nis);
        return $this->db->get();
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

	public function get_bimbingan_where_users($nis){
		return $this->db->where('nis', $nis)
		->get('bimbingan');
	}

	public function get_bimbingan_where_id($id_bimbingan){
		$this->db->from('bimbingan')->select('bimbingan.id_bimbingan, siswa.nis, siswa.nama_siswa, 
		jurusan.nama_jurusan, bimbingan.id_tingkatan, jurusan.singkatan_jurusan, kelas.urutan_kelas, bimbingan.tgl_bim,
		bimbingan.subject, bimbingan.isi_bim');
		$this->db->join('siswa', 'siswa.nis = bimbingan.nis');
		$this->db->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
		$this->db->join('jurusan', 'jurusan.id_jurusan=kelas.id_jurusan');
		$this->db->where('id_bimbingan', $id_bimbingan);
		return $this->db->get();
	}

	// GET STATUS BIMBINGAN = 0 (BELUM DI BACA ortu BK) UTK NOTIF ADMIN
	public function get_bimbingan_belum_dibaca(){
		
		$id_sekolah = $this->session->userdata('id_sekolah');
		$this->db->from('bimbingan');
		$this->db->join('siswa', 'siswa.nis = bimbingan.nis');
		return $this->db->where('id_sekolah', $id_sekolah)->where('status_by_guru', '0')->get();
	}

	// GET STATUS BIMBINGAN = 1 DAN ISI_BIMBINGAN != '' (SUDAH DI BALAS ortu BK) BERDASARKAN SESSION AKUN SISWA UTK NOTIF SISWA
	public function get_bimbingan_sudah_dibalas($NIS){
		return $this->db->where('status', 1)
		->where('isi_balasan !=', null)
		->where('NIS', $NIS)
		->get('bimbingan');
	}

	//update status sudah dibaca
	public function update_status_bimbingan($id_bimbingan){
		$this->db->where('id_bimbingan', $id_bimbingan)->set('status_by_guru', '1')->set('status', '1')->update('bimbingan');
	}

	//update status belum dibaca
	public function update_status_bimbingan_siswa($id_bimbingan){
		$this->db->where('id_bimbingan', $id_bimbingan)->set('status_by_guru', '0')->set('status', '0')->update('bimbingan');
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