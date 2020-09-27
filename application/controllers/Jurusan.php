<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
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
        }
    }

    public function index(){
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='data_master';
        $data['mode']='jurusan';
        $data['content']='data_master/view_master_jurusan';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['data_jurusan']=$this->M_data_master->get_jurusan($id_sekolah)->result_array();
        $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
        $data['data_belum_dibaca']=array();
        //var_dump($data);
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function add_jurusan(){
        $data = array(
            'nama_jurusan' => $this->input->post('jurusan'),
            'singkatan_jurusan' => $this->input->post('singkatan'),
            'id_sekolah' => $this->session->userdata('id_sekolah')
            );

        if ($this->M_data_master->add_jurusan($data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('/jurusan');
    }

    public function delete_jurusan($id_jurusan){
        if ($this->M_data_master->delete_jurusan($id_jurusan)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('/jurusan');
    }

    public function edit_jurusan($id_jurusan){
        $data = array(
            'nama_jurusan' => $this->input->post('jurusan'),
            'singkatan_jurusan' => $this->input->post('singkatan')
            );

        if ($this->M_data_master->edit_jurusan($id_jurusan, $data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('/jurusan');
    }
}

?>