<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller {

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
            $data['menu']='dashboard';
            $data['content']='dashboard';
            $data['mode']='dashboard';
            $data['nama_sekolah'] = $this->M_data_master->get_nama_sekolah($id_sekolah);
            $data['total_data_kelas']=$this->M_data_master->get_kelas($id_sekolah)->num_rows();
            $data['total_data_siswa']=$this->M_data_master->get_total_siswa($id_sekolah)->num_rows();
            $data['total_data_jurusan']=$this->M_data_master->get_total_jurusan($id_sekolah)->num_rows();
            $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
            
            $data['data_pelanggaran']=10;
            $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan_admin($id_sekolah)->num_rows();
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

    // public function get_data_kunjungan(){
    //     $data=$this->M_data_bimbingan->get_kunjungan_bimbingan_tahun('2019')->result_array();
    //     echo json_encode($data);
    // }

    // public function change_password(){
    //     $id = $this->session->userdata('id_users');
    //     $data_users = $this->M_login->get_detail_users($id)->result_array();
    //     if (md5($this->input->post('password_lama')) != $data_users[0]['password']) {
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
    //     redirect('admin/dashboard/');
    // }

    function change_password($id_users) {
       $data=array(
        'password'=>md5($this->input->post('password'))
        );
       $this->M_login->ubah_sandi($data,$id_users);
      redirect('admin/dashboard/');
   }

   public function logout() {
    $this->session->sess_destroy();
    redirect(base_url('login'));
  }
}