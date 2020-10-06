<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Alumni extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        if($this->session->userdata('logged_in') == null){
            redirect('login');
        }else{    
            $this->load->model('M_data_master');
            $this->load->model('M_data_users');
            $this->load->model('M_data_bimbingan');
            $this->load->model('M_data_alumni');
        }
    }

    public function index(){
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='alumni';
        $data['mode']='data_alumni';
        $data['content']='data_master/view_master_kelas_alumni';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['data_kelas']=$this->M_data_master->get_kelas_alumni($id_sekolah)->result_array();
        $data['data_siswa']=array();
        $data['data_jurusan']=$this->M_data_master->get_jurusan($id_sekolah)->result_array();
       
        $data['data_belum_dibaca']=array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function tampil_kelas() {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='data_master';
        $data['mode']='kelas';
        $data['id_kelas']=$this->input->GET('id_kelas',TRUE);
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $id_kelas=$this->input->GET('id_kelas',TRUE);
        $data['kelas']=$this->M_data_master->get_kelas_sekarang($id_kelas)->result_array();
        $data['nama_kelas']=$this->M_data_master->get_kelas_sekarangbyid($id_kelas)->row_array();
        $data['data_siswa']=$this->M_data_master->tampilkan_siswa($id_kelas)->result_array();
        $data['content']='data_master/view_master_siswa_alumni';
        $data['data_kelas']=$this->M_data_master->get_kelas($id_sekolah)->result_array();
        $data['data_jurusan']=$this->M_data_master->get_jurusan($id_sekolah)->result_array();
        $data['data_tingkatan']=array();
        $data['data_belum_dibaca']=array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function universitas(){
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='alumni';
        $data['mode']='data_alumni';
        $data['content']='data_master/view_master_universitas';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['universitas']= $univ = $this->M_data_alumni->get_universitas($id_sekolah);
        
        //echo var_dump($univ);
        $data['data_siswa']=array();
        $data['data_jurusan']=$this->M_data_master->get_jurusan($id_sekolah)->result_array();
       
         $data['data_belum_dibaca']=array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function list_alumni_universitas(){
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='data_master';
        $data['mode']='kelas';
        $data['id_universitas']=$this->input->GET('id_universitas',TRUE);
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $id_universitas=$this->input->GET('id_universitas',TRUE);
        //$data['kelas']=$this->M_data_master->get_kelas_sekarang($id_kelas)->result_array();
        $data['nama_universitas']=$this->M_data_alumni->get_universitas_by_id($id_universitas);
        $data['data_siswa']=$this->M_data_alumni->get_siswa_by_universitas($id_sekolah, $id_universitas);
        $data['content']='data_master/view_master_siswa_universitas';
        $data['data_kelas']=$this->M_data_master->get_kelas($id_sekolah)->result_array();
        $data['data_jurusan']=$this->M_data_master->get_jurusan($id_sekolah)->result_array();
        $data['data_tingkatan']=array();
        $data['data_belum_dibaca']=array();
        $this->load->view('admin/partial/index_admin',$data); 

        //echo var_dump($siswa);
    }
}