<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

class Bimbingan extends CI_Controller{
    
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
            $this->load->model('M_data_bimbingan');
        }
       
    }

    public function index(){
        $nis = $this->session->userdata('nis');
        $data['menu'] = 'bimbingan';
        $data['siswa'] = $this->M_data_master->get_siswa_by_nis($nis)->row();
        $data['bimbingan'] = $this->M_data_bimbingan->get_bimbingan_siswa($nis)->result();
        //echo var_dump($data['bimbingan']);
        $this->load->view('siswa/view_bimbingan_siswa', $data);
    }

    public function room_bimbingan($id_bimbingan){
        $data['menu'] = 'bimbingan';
        $this->load->view('siswa/view_room_bimbingan', $data);
    }
}

?>