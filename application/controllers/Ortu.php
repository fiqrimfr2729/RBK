<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ortu extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        $this->load->model('M_login');
        $this->load->model('M_data_master');
        $this->load->model('M_data_absensi');
        
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
            redirect('ortu/dashboard');
        } else {
            $data['menu']='dashboard';
            $data['content']='dashboard';
            $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
            $data['data_jurusan']=$this->M_data_master->get_jurusan()->num_rows();
            $data['data_kelas']=$this->M_data_master->get_kelas()->num_rows();
            $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
            $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->num_rows();
            $data['data_kelas']=$this->M_data_absensi->get_kelas()->num_rows();
            
            $data['data_pelanggaran']=$this->M_data_pelanggaran->get_pelanggaran()->num_rows();
            $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan()->num_rows();
            $data['data_konseling']=$this->M_data_konseling->get_konseling()->num_rows();
            $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
            $data['data_tahun']=$this->M_data_bimbingan->get_tahun_bimbingan()->result_array();
            $data['data_bulan']=$this->M_data_bimbingan->get_bulan_bimbingan()->result_array();
            if (!empty($this->input->post('tahun'))) {
                $data['tahun_dipilih']=$this->input->post('tahun');
                $data['data_kunjungan']=$this->M_data_bimbingan->get_kunjungan_bimbingan_tahun($this->input->post('tahun'))->result_array();
            }else{
                $data['tahun_dipilih'] = '';
            }
            $this->load->view('ortu/partial/index_ortu',$data);
        }
    }

    // public function get_data_kunjungan(){
    //     $data=$this->M_data_bimbingan->get_kunjungan_bimbingan_tahun('2019')->result_array();
    //     echo json_encode($data);
    // }

    // public function change_password(){
    //     $id = $this->session->userdata('id_ortu');
    //     $data_ortu = $this->M_login->get_detail_ortu($id)->result_array();
    //     if (md5($this->input->post('password_lama')) != $data_ortu[0]['password']) {
    //         $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Password lama tidak sesuai!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //                           <span aria-hidden='true'>&times;</span>
    //                         </button></div>");
    //     } elseif ($this->input->post('password_baru') != $this->input->post('password_konfirmasi')) {
    //         $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Password baru dan konfirmasi tidak sesuai!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //                           <span aria-hidden='true'>&times;</span>
    //                         </button></div>");
    //     } elseif(strlen($this->input->post('password_baru'))<8){
    //         $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Password min. 8 character!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //                           <span aria-hidden='true'>&times;</span>
    //                         </button></div>");
    //     } else {
    //         $data = array(
    //             'password' =>md5($this->input->post('password_konfirmasi'))
    //         );
    //         $update = $this->M_login->reset_password($id, $data);
    //         $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Password berhasil di ubah.<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //                           <span aria-hidden='true'>&times;</span>
    //                         </button></div>");
    //     }
    //     redirect('ortu/dashboard/');
    // }

    function change_password($id_ortu) {
       $data=array(
        'password'=>md5($this->input->post('password'))
        );
       $this->M_login->ubah_sandi($data,$id_ortu);
      redirect('ortu/dashboard/');
   }
}