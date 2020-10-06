<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

class Absensi extends CI_Controller
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
        $data['menu'] = 'absensi';
        $data['absensi'] = $this->M_data_absensi->get_absensi_siswa($nis);
        $data['siswa'] = $this->M_data_master->get_siswa_by_nis($nis)->row();
        
        $this->load->view('siswa/view_absensi_siswa', $data);
    }

    public function detail_absensi(){
        $nis = $this->session->userdata('nis');
        $data['menu'] = 'absensi';
        $data['absensi'] = $this->M_data_absensi->get_list_absen($nis);
        $data['siswa'] = $this->M_data_master->get_siswa_by_nis($nis)->row();
        //echo var_dump($data['absensi']);
        $this->load->view('siswa/view_detail_absensi', $data);
    }
}