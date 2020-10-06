<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Guru extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        $this->load->model('M_login');
        $this->load->model('M_data_master');
        $this->load->model('M_data_absensi');
        $this->load->model('M_data_users');
        $this->load->model('M_data_bimbingan');
        $this->load->model('M_data_konseling');
        $this->load->model('M_data_pelanggaran');
    }

    public function index(){
        echo "PAGE NOT FOUND!";
    }

    public function dashboard()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } elseif ($this->session->userdata('level') == 'siswa' || $this->session->userdata('level') == 'ortu') {
            redirect('users/dashboard');
        } else {
            $id_sekolah = $this->session->userdata('id_sekolah');
            $nik = $this->session->userdata('nik');
            $guru = $this->M_data_master->get_guru($nik);
            $data['menu']='dashboard';
            $data['content']='dashboard';
            $data['mode']='dashboard';
            $data['nama_sekolah'] = $this->M_data_master->get_nama_sekolah($id_sekolah);
            $data['total_data_kelas']=$this->M_data_master->get_kelas($id_sekolah)->num_rows();
            $data['total_data_siswa']=$this->M_data_master->get_total_siswa($id_sekolah)->num_rows();
            $data['total_data_jurusan']=$this->M_data_master->get_total_jurusan($id_sekolah)->num_rows();
            $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
            
            $data['data_pelanggaran']=10;
            $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan($id_sekolah, $nik)->num_rows();
            $data['data_konseling']=0;
            $data['data_belum_dibaca']=array();

            // $data['data'] =  $this->session->userdata('id_user');
            $data['user'] = $this->M_data_users->get_data_user_by_id();
            // $test = $data['users'];
            // var_dump($test);exit();
            if (!empty($this->input->post('tahun'))) {
                $data['tahun_dipilih']=$this->input->post('tahun');
                $data['data_kunjungan']=$this->M_data_bimbingan->get_kunjungan_bimbingan_tahun($this->input->post('tahun'))->result_array();
            }else{
                $data['tahun_dipilih'] = '';
            }
            $this->load->view('admin/partial/index_admin',$data);
        }
    }
}