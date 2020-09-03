<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_pelanggaran extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('M_data_pelanggaran');
        $this->load->model('M_data_bimbingan');
        $this->load->model('M_data_master');
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

    public function kategori_pelanggaran(){
    	$data['menu']='data_pelanggaran';
    	$data['mode']='kategori_pelanggaran';
        $data['content']='data_pelanggaran/view_kategori_pelanggaran';
        $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
        $data['data_kategori']=$this->M_data_pelanggaran->get_kategori()->result_array();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    	$this->load->view('admin/partial/index_admin',$data);
    }

    public function add_kategori(){
        $data = array(
                'nama_kategori' => $this->input->post('kategori')
        );

        if ($this->M_data_pelanggaran->add_kategori($data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        }
        redirect('data_pelanggaran/kategori_pelanggaran');
    }

    public function edit_kategori($id_kategori){
        $data = array(
                'nama_kategori' => $this->input->post('kategori')
        );

        if ($this->M_data_pelanggaran->edit_kategori($id_kategori, $data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        }
        redirect('data_pelanggaran/kategori_pelanggaran');
    }

    public function delete_kategori($id_kategori){
        if ($this->M_data_pelanggaran->delete_kategori($id_kategori)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        }
        redirect('data_pelanggaran/kategori_pelanggaran');

    }

    public function pelanggaran(){
    	$data['menu']='data_pelanggaran';
    	$data['mode']='pelanggaran';
        $data['content']='data_pelanggaran/view_pelanggaran';
        $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
        $data['data_pelanggaran']=$this->M_data_pelanggaran->get_pelanggaran()->result_array();
        $data['data_kategori']=$this->M_data_pelanggaran->get_kategori()->result_array();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    	$this->load->view('admin/partial/index_admin',$data);
    }

    public function add_pelanggaran(){
        $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'nama_pelanggaran' => $this->input->post('pelanggaran'),
                'bobot' => $this->input->post('bobot')
        );

        if ($this->M_data_pelanggaran->add_pelanggaran($data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        }
        redirect('data_pelanggaran/pelanggaran');
    }

    public function edit_pelanggaran($id_pelanggaran){
        $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'nama_pelanggaran' => $this->input->post('pelanggaran'),
                'bobot' => $this->input->post('bobot')
        );

        if ($this->M_data_pelanggaran->edit_pelanggaran($id_pelanggaran, $data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        }
        redirect('data_pelanggaran/pelanggaran');
    }

    public function delete_pelanggaran($id_pelanggaran){
        if ($this->M_data_pelanggaran->delete_pelanggaran($id_pelanggaran)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        }
        redirect('data_pelanggaran/pelanggaran');

    }

}