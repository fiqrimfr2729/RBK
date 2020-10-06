<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_alumni extends CI_Model {

    public function get_universitas($id_sekolah){
        $univ = $this->db->from('universitas')->get()->result();

        foreach($univ as $key => $data){
            $this->db->from('sebaran_alumni')->where('sebaran_alumni.id_universitas', $data->id_universitas)
            ->join('siswa', 'siswa.nis = sebaran_alumni.nis')
            ->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
            ->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan')
            ->where('jurusan.id_sekolah', $id_sekolah);
            $jumlah = $this->db->get()->num_rows();

            if($jumlah == 0){
                unset($images[$key]);
            }else{
                $data->jumlah = $jumlah;
            }
        }

        return $univ;
    }

    public function get_siswa_by_universitas($id_sekolah, $id_universitas){
        $this->db->from('sebaran_alumni')
        ->join('siswa', 'siswa.nis = sebaran_alumni.nis')
        ->join('kelas', 'siswa.id_kelas = kelas.id_kelas')
        ->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan')
        ->where('jurusan.id_sekolah', $id_sekolah)->where('sebaran_alumni.id_universitas', $id_universitas);
        return $this->db->get()->result();
    }

    public function get_universitas_by_id($id_universitas){
        return $this->db->from('universitas')->where('id_universitas', $id_universitas)->get()->row();
    }

}
