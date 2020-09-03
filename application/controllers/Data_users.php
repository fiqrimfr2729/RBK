<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_users extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('M_data_users');
        $this->load->model('M_data_master');
        $this->load->model('M_data_absensi');
        $this->load->model('M_data_bimbingan');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } elseif ($this->session->userdata('level') == 'siswa' || $this->session->userdata('level') == 'ortu') {
            redirect('users/dashboard');
        } else {
            echo "PAGE NOT FOUND!";
        }
    }

    function tambah_user_ortu() {
        $NIS=$this->input->post('NIS',TRUE);
        $sql_NIS=$this->M_data_users->view_NIS($NIS);
        $insert_nama=$sql_NIS[0]->nama_ayah;
        $email_ortu=$sql_NIS[0]->email;
        $data=array(
            'NIS'=>$this->input->post('NIS'),
            'nama_lengkap'=>$insert_nama,
            'username'=>$insert_nama,
            'password'=>md5($insert_nama),
            'email_admin'=>$email_ortu,
            'level'=>'ortu'
            );
        $this->M_data_users->tambah_user($data);
        redirect('Data_users/ortu');
    }

    public function siswa(){
    	$data['menu']='data_users';
    	$data['mode']='siswa';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['content']='data_users/view_user_siswa';
        $data['data_users']=$this->M_data_users->get_users();
        $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
        $data['data_kelas']=$this->M_data_master->get_kelas()->result_array();
        $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
        $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function ortu(){
    	$data['menu']='data_users';
    	$data['mode']='ortu';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['content']='data_users/view_user_ortu';
        $data['data_users']=$this->M_data_users->get_users_ortu();
        $data['data_kelas']=$this->M_data_master->get_kelas()->result_array();
        $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
        
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        $data['nis']=$this->M_data_users->lihat_nis();
        $this->load->view('admin/partial/index_admin',$data);
    }

    function hapus_user_siswa($id_users) {
        $this->M_data_users->delete_pengguna($id_users);
        redirect('Data_users/siswa');
    }

    function hapus_user_orangtua($id_users) {
        $this->M_data_users->delete_pengguna($id_users);
        redirect('Data_users/ortu');
    }

    public function edit_user($id_users){
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email_admin' => $this->input->post('email'),
            'username' => $this->input->post('username')
            );

        if ($this->M_data_users->edit_user($id_users, $data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('data_users/siswa');
    }

    public function edit_user_ortu($id_users){
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email_admin' => $this->input->post('email'),
            'username' => $this->input->post('username')
            );

        if ($this->M_data_users->edit_user($id_users, $data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('data_users/ortu');
    }

}