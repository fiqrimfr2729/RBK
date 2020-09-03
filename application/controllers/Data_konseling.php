<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_konseling extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('M_data_konseling');
        $this->load->model('M_data_pelanggaran');
        $this->load->model('M_data_master');
        $this->load->model('M_data_users');
        $this->load->model('M_data_bimbingan');
    }

    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } elseif ($this->session->userdata('level') == 'siswa' || $this->session->userdata('level') == 'ortu') {
            redirect('users/dashboard');
        } else {
            $data['menu']='data_konseling';
            $data['content']='data_konseling/view_konseling';
            $data['user'] = $this->M_data_users->get_data_user_by_id();
            $data['data_konseling']=$this->M_data_konseling->get_konseling()->result_array();
            $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
            $data['data_pelanggaran']=$this->M_data_pelanggaran->get_pelanggaran()->result_array();
            $data['data_kelas']=$this->M_data_master->get_kelas()->result_array();
            $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        	$this->load->view('admin/partial/index_admin',$data);
        }
    }

    public function add_konseling(){
        $data = array(
                'NIS' => $this->input->post('nis'),
                'id_pelanggaran' => $this->input->post('pelanggaran'),
                'catatan' => $this->input->post('catatan'),
                'waktu_pelanggaran' => $this->input->post('waktu_pelanggaran'),
                'waktu_input' => date('Y-m-d H:i:s'),
                'tkp' => $this->input->post('tkp')
        );

        if ($this->M_data_konseling->add_konseling($data)) {

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
        redirect('data_konseling');
    }

    public function edit_konseling($id_konseling){
        // AMBIL DATA PELANGGARAN AWAL
        $data_konseling=$this->M_data_konseling->get_konseling_by_id($id_konseling)->result_array();

        // AMBIL DATA BOBOT AWAL
        $data_bobot_awal=$this->M_data_pelanggaran->get_pelanggaran_by_id($data_konseling[0]['id_pelanggaran'])->result_array();

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

        if ($this->M_data_konseling->edit_konseling($id_konseling, $data)) {

            $this->M_data_master->edit_siswa($this->input->post('nis'), $update_skor);

            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        }
        redirect('data_konseling');
    }

    public function delete_konseling($id_konseling){
        if ($this->M_data_konseling->delete_konseling($id_konseling)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        }
        redirect('data_konseling');

    }

}