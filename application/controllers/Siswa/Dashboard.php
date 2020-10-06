<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

class Dashboard extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        if($this->session->userdata('level') != 'siswa'){
            redirect(base_url("/Login"));
        }else{
            $this->load->model('M_data_master');
            $this->load->model('M_data_absensi');        
            $this->load->model('M_data_konseling');
            $this->load->model('M_data_users');
        }
       
    }

    public function index(){
        $nis = $this->session->userdata('nis');
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu'] = 'dashboard';
        $data['pengumuman'] = $this->M_data_users->getAllPengumuman($id_sekolah);
        $data['siswa'] = $this->M_data_master->get_siswa_by_nis($nis)->row();
        $data['sekolah'] = $this->M_data_master->get_nama_sekolah($id_sekolah);
        //echo var_dump($data['pengumuman']);
        $this->load->view('siswa/view_index_siswa', $data);
    }

    public function pengumuman($id_pengumuman){
        $data['komentar'] = $this->M_data_users->get_komentar($id_pengumuman);
        $data['pengumuman'] = $this->M_data_users->get_pengumuman_by_id($id_pengumuman);
        //echo var_dump($data['komentar']);
        $this->load->view('siswa/view_pengumuman', $data);
    }

    public function absensi(){
       
        $this->load->view('siswa/view_absensi_siswa');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
    
    
}