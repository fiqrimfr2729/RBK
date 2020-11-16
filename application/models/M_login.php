<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model {

	public function verifikasi($username, $password) {
		$user =  $this->db->get_where('admin', ['username' => $username])->row();
		if($user){
			if(password_verify($password, $user->password)) {
				$data = array(
					'status' => true,
					'level' => 'admin',
					'id_sekolah' => $user->id_sekolah,
					'message' => 'berhasil'
				);
				return $data;
			}else{
				$data = array(
					'status' => false,
					'level' => 'admin',
					'message' => 'Password Salah'
				);
				return $data;
			}
		}else{
			$guru = $this->db->get_where('guru', ['nik' => $username])->row();
			if($guru){
				$user = $this->db->get_where('users', ['id_user' => $guru->id_user])->row();
				if($user){
					if(password_verify($password, $user->password)) {
						$data = array(
							'status' => true,
							'level' => 'guru',
							'id_sekolah' => $guru->id_sekolah,
							'message' => 'berhasil'
						);
						return $data;
					}else{
						$data = array(
							'status' => false,
							'level' => 'guru',
							'message' => 'Password Salah'
						);
						return $data;
					}
				}
			}else{
				$siswa = $this->db
				->join('kelas', 'kelas.id_kelas = siswa.id_kelas')
				->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan')
				->get_where('siswa', ['siswa.nis' => $username])->row();
				if($siswa){
					$user = $this->db->get_where('users', ['id_user' => $username])->row();
					if($user){
						if(password_verify($password, $user->password)) {
							$data = array(
								'status' => true,
								'level' => 'siswa',
								'id_sekolah' => $siswa->id_sekolah,
								'message' => 'berhasil'
							);
							return $data;
						}else{
							$data = array(
								'status' => false,
								'level' => 'siswa',
								'message' => 'Password Salah'
							);
							return $data;
						}
					}
				}else{
					$data = array(
						'status' => false,
						'level' => 'false',
						'message' => 'Username Salah'
					);
					return $data;
				}
			}
			$data = array(
				'status' => false,
				'level' => 'false',
				'message' => 'Username Salah'
			);
			return $data;
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
		$level = 'users';
		$user = $this->db->from('users')->where('id_user', $id_users)->get()->row();
		if($user==null){
			$level= 'admin';
			$user=$this->db->from('admin')->where('username', $id_users)->get()->row();
		}
		if(password_verify($data['password_lama'], $user->password)){
			if($data['password_baru'] == $data['password_konfirmasi']){
				if($level == 'users'){
					$this->db->where('id_user', $id_users)->set('password', password_hash($data['password_baru'], PASSWORD_DEFAULT))->update('users');
				}else{
					$this->db->where('username', $id_users)->set('password', password_hash($data['password_baru'], PASSWORD_DEFAULT))->update('admin');
				}
				
				$data = array(
					'status' => true,
					'level' => 'true',
					'message' => 'Ganti password berhasil'
				);
				return $data;
			}else{
				$data = array(
					'status' => false,
					'level' => 'false',
					'message' => 'Konfirmasi password tidak sesuai'
				);
				return $data;
			}
		}else{
			$data = array(
				'status' => false,
				'level' => 'false',
				'message' => 'Password lama salah'
			);
			return $data;
		}
	}
}