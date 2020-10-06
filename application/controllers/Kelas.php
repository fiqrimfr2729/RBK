<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

class Kelas extends CI_Controller
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
            // $fire_store = new FirestoreClient();
            
        }
    }

    public function index(){           
            
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='data_master';
        $data['mode']='kelas';
        $data['content']='data_master/view_master_kelas';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['data_kelas']=$this->M_data_master->get_kelas($id_sekolah)->result_array();
        $data['data_siswa']=array();
        $data['data_jurusan']=$this->M_data_master->get_jurusan($id_sekolah)->result_array();
       
        $data['data_belum_dibaca']=array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function test(){
        
        
    }

    public function add_kelas(){
        $id_jurusan = $this->input->post('jurusan');
        $id_tingkatan = $this->input->post('tingkatan');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $jumlah_tambah_kelas =(int)$this->input->post('jumlah_kelas');

        $jumlah_kelas = $this->M_data_master->get_jumlah_kelas($id_jurusan, $id_tingkatan, $tahun_masuk);

        $i = 0;
        $data = array();
        $batas = $jumlah_kelas+$jumlah_tambah_kelas;
        do{
            $jumlah_kelas++;
            $data_kelas = array( 
                'tingkatan' => $this->input->post('tingkatan'),
                'id_jurusan' => $this->input->post('jurusan'),
                'urutan_kelas' => $jumlah_kelas,
                'tahun_masuk' => $this->input->post('tahun_masuk')
            );
            $data[$i] = $data_kelas;

            $i++;

            
            
        }while($jumlah_kelas < $batas);

        //echo var_dump($data);
        // $data = array(
        //     'id_tingkatan' => $this->input->post('tingkatan'),
        //     'id_jurusan' => $this->input->post('jurusan'),
        //     'urutan_kelas' => $this->input->post('urutan'),
        //     'id_sekolah' => $this->session->userdata('id_sekolah'),
        //     'tahun_masuk' => $this->input->post('tahun_masuk')
        //     );

        if ($this->M_data_master->add_all_kelas($data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('kelas');
    }

    public function edit_kelas(){
        $id_kelas = $this->input->post('id_kelas');
        $data = array(
            'tingkatan' => $this->input->post('tingkatan'),
            'id_jurusan' => $this->input->post('jurusan'),
            'urutan_kelas' => $this->input->post('urutan'),
            'tahun_masuk' => $this->input->post('tahun_masuk')
            );

        if ($this->M_data_master->edit_kelas($id_kelas, $data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('/Kelas');
    }

    public function naik_kelas(){
        if($this->M_data_master->naik_kelas()){
            redirect('kelas');
        }
    }

    public function turun_kelas(){
        if($this->M_data_master->turun_kelas()){
            redirect('/kelas');
        }

    }

    public function delete_kelas($id_kelas){
        if ($this->M_data_master->delete_kelas($id_kelas)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('/kelas');

    }

}

?>