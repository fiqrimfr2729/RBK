<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_belajar extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('M_data_belajar');
        $this->load->model('M_data_pelanggaran');
        $this->load->model('M_data_master');
        $this->load->model('M_data_users');
        $this->load->model('M_data_bimbingan');
        $this->load->model('M_data_konseling');
    }

    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } elseif ($this->session->userdata('level') == 'siswa' || $this->session->userdata('level') == 'ortu') {
            redirect('users/dashboard');
        } else {
            $data['menu']='data_belajar';
            $data['content']='data_belajar/view_belajar_siswa';
            $data['mode']='pengumuman';
            $data['data_informasi']=$this->M_data_belajar->get_belajar();
            $data['user'] = $this->M_data_users->get_data_user_by_id();
            // $data['data_belajar']=$this->M_data_belajar->get_belajar()->result_array();
            $data['data_siswa']=array();
            $data['data_pelanggaran']=array();
            $data['data_kelas']=array();
            $data['data_belum_dibaca']=array();
            $this->load->view('admin/partial/index_admin',$data);
        }
    }


    public function add_belajar(){
        $data = array(
            'NIS' => $this->input->post('nis'),
            'id_pelanggaran' => $this->input->post('pelanggaran'),
            'catatan' => $this->input->post('catatan'),
            'waktu_pelanggaran' => $this->input->post('waktu_pelanggaran'),
            'waktu_input' => date('Y-m-d H:i:s'),
            'tkp' => $this->input->post('tkp')
        );

        if ($this->M_data_belajar->add_belajar($data)) {

            // AMBIL DATA BOBOT
            $data_bobot=$this->M_data_pelanggaran->get_pelanggaran_by_id($this->input->post('pelanggaran'))->result_array();
            // AMBIL DATA SISWA
            $data_siswa=$this->M_data_master->get_siswa_by_nis($this->input->post('nis'))->result_array();

            // KURANGI SKOR SISWA
            $update_skor=array(
                'skor' => $data_siswa[0]['skor']-$data_bobot[0]['bobot'],
            );

            $this->M_data_master->edit_siswa($this->input->post('nis'), $update_skor);

            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        }
        redirect('data_belajar');
    }

    public function do_upload() {
        $date = new DateTime();
        $file = $date->getTimestamp();
        // setting konfigurasi upload
        $config['upload_path'] = './assets/admin/pengumuman';
        $config['allowed_types'] = 'gif|jpg|jpeg|docx|pdf|png';
        $config['file_name'] = $file;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('informasi')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data();
            $result1 =$result['file_name'];
    
            $informasi = $this->input->post('view_belajar');
            
            $data = array(
                          //Disimpan nama file Gambar
                'nik'          => $this->session->userdata('nik'),
                'tgl_buat'         => date("Y-m-d H:i:s"),
                'isi_pengumuman'   => $informasi,
                'id_sekolah'       => $this->session->userdata('id_sekolah'),
                'foto'             => $result1

            );
            
            $this->db->insert('pengumuman', $data);
            redirect('data_belajar');

        }

    }

    public function hapusDataBelajar($id_pengumuman)
    {
        $this->M_data_belajar->delete_belajar($id_pengumuman);
        redirect('data_belajar');
    }


    public function edit_belajar($id_belajar){
        // AMBIL DATA PELANGGARAN AWAL
        $data_belajar=$this->M_data_belajar->get_belajar_by_id($id_belajar)->result_array();

        // AMBIL DATA BOBOT AWAL
        $data_bobot_awal=$this->M_data_pelanggaran->get_pelanggaran_by_id($data_belajar[0]['id_pelanggaran'])->result_array();

        // AMBIL DATA BOBOT BARU
        $data_bobot=$this->M_data_pelanggaran->get_pelanggaran_by_id($this->input->post('pelanggaran'))->result_array();

        // AMBIL DATA SKOR SISWA
        $data_siswa=$this->M_data_master->get_siswa_by_nis($this->input->post('nis'))->result_array();

        // KURANGI SKOR SISWA
        $update_skor=array(
            'skor' => $data_siswa[0]['skor']+$data_bobot_awal[0]['bobot']-$data_bobot[0]['bobot'],
        );

        $data = array(
            'NIS' => $this->input->post('nis'),
            'id_pelanggaran' => $this->input->post('pelanggaran'),
            'catatan' => $this->input->post('catatan'),
            'waktu_pelanggaran' => $this->input->post('waktu_pelanggaran'),
            'waktu_input' => date('Y-m-d H:i:s'),
            'tkp' => $this->input->post('tkp')
        );

        if ($this->M_data_belajar->edit_belajar($id_belajar, $data)) {

            $this->M_data_master->edit_siswa($this->input->post('nis'), $update_skor);

            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        }
        redirect('data_belajar');
    }

    public function delete_belajar($id_belajar){
        if ($this->M_data_belajar->delete_belajar($id_belajar)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        }
        redirect('data_belajar');

    }

}