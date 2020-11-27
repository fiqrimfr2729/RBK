<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_alumni extends CI_Model {

    public function get_universitas($id_sekolah){
        $univ = $this->db->from('universitas')->get()->result();

        foreach($univ as $key => $data){
            $this->db->from('alumni')->where('alumni.id_univ', $data->id_universitas)
            ->join('siswa', 'siswa.nis = alumni.nis')
            ->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
            ->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan')
            ->where('jurusan.id_sekolah', $id_sekolah);
            $jumlah = $this->db->get()->num_rows();

            if($jumlah == 0){
                unset($univ[$key]);
            }else{
                $data->jumlah = $jumlah;
            }
        }

        return $univ;
    }

    public function get_siswa_by_universitas($id_sekolah, $id_universitas){
        $this->db->from('alumni')
        ->join('siswa', 'siswa.nis = alumni.nis')
        ->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
        ->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan')
        ->where('jurusan.id_sekolah', $id_sekolah)->where('alumni.id_univ', $id_universitas);
        return $this->db->get()->result();
    }

    public function get_universitas_by_id($id_universitas){
        return $this->db->from('universitas')->where('id_universitas', $id_universitas)->get()->row();
    }

    function get_alumni($id_kelas) {
		$this->db->from('siswa');
		$this->db->join('kelas','siswa.id_kelas=kelas.id_kelas');
        $this->db->join('jurusan','kelas.id_jurusan=jurusan.id_jurusan');
        $this->db->where('siswa.id_kelas',$id_kelas);
		$this->db->order_by('siswa.nama_siswa','ASC');
		$sql_siswa=$this->db->get()->result();
		//$this->db->join('alumni', 'siswa.nis = alumni.nis', 'inner');
        //$this->db->join('universitas', 'universitas.id_universitas = alumni.id_univ', 'left' );
        foreach($sql_siswa as $siswa){
            $this->db->from('alumni')->where('nis', $siswa->nis);
            $this->db->join('universitas', 'universitas.id_universitas = alumni.id_univ');
            $univ = $this->db->get()->row();
            $siswa->univ = $univ;
        }
		
		return $sql_siswa;
	}

}
