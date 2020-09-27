<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller {

    public function __Construct()
    {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } elseif ($this->session->userdata('level') == 'admin') {
            redirect('admin/dashboard');
        }
        $this->load->model('M_login');
        $this->load->model('M_data_bimbingan');
        $this->load->model('M_data_master');
        $this->load->model('M_data_absensi');        
        $this->load->model('M_data_konseling');
        $this->load->model('M_data_users');
    }

    public function dashboard(){
        $data['content']='users/dashboard';
        if (!empty($this->session->userdata('nis'))) {
            $data_siswa = $this->M_data_master->get_siswa_by_nis($this->session->userdata('nis'))->result_array();
        } else {
            $data_siswa = $this->M_data_master->get_siswa_by_nisn($this->session->userdata('nis'))->result_array();
        }
        $data['data_siswa']= $data_siswa;
        $data['notif_balasan']=array();
        $data['notif_konseling']=array();

        $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan_where_users($this->session->userdata('nis'))->result_array();
        $data['data_konseling']=array();
        $this->load->view('users/partial/tpl_index',$data);
    }

    public function change_password(){
        $data['content']='users/change_password';
        $data['notif_balasan']=$this->M_data_bimbingan->get_bimbingan_sudah_dibalas($this->session->userdata('NIS'))->result_array();
        $data['notif_konseling']=$this->M_data_konseling->get_konseling_belum_dibaca($this->session->userdata('NIS'))->result_array();
        $this->load->view('users/partial/tpl_index',$data);
    }

    // public function do_change_password(){
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
    //     redirect('users/change_password');
    // }

    function do_change_password($id_users) {
        $data=array(
            'password'=>md5($this->input->post('password'))
        );
        $this->M_login->ubah_sandi($data,$id_users);
        redirect('Users/change_password');
    }

    public function bimbingan($notif=null){
        // UPDATE STATUS BIMBINGAN SUDAH DI BACA
        if (!empty($notif)) {
            $data = array(
                'status' => 2
            );
            $this->M_data_bimbingan->edit_bimbingan($notif, $data);
        }

        $data['notif_konseling']=$this->M_data_konseling->get_konseling_belum_dibaca($this->session->userdata('NIS'))->result_array();
        $data['notif_balasan']=$this->M_data_bimbingan->get_bimbingan_sudah_dibalas($this->session->userdata('NIS'))->result_array();
        $data['content']='users/view_bimbingan';
        $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan_where_users($this->session->userdata('NIS'))->result_array();
        $this->load->view('users/partial/tpl_index',$data);
    }

    public function kirim_bimbingan(){
        $siswa = $this->M_data_master->get_siswa_by_nis($this->session->userdata('nis'))->row();
        $data = array(
            'nis' => $this->session->userdata('nis'),
            'subjek' => $this->input->post('subjek'),
            'isi_bimbingan' => $this->input->post('isi_bimbingan'),
            'tanggal' => date('Y-m-d H:i:s'),
            'dibaca' => false,
            'tingkatan' =>$siswa->tingkatan
        );
        // var_dump($data);exit();

        if ($this->M_data_bimbingan->add_bimbingan($data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        }
        redirect('users/bimbingan');
    }


    public function lihat_absensi() {
        $data['mode']='kelas';
        $data['content']='users/Absensi';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['kelas']=$this->M_data_absensi->pilih_kelas();
        $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
        $data['data_absensi']=$this->M_data_absensi->get_absensi();
        $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
        $data['data_tingkatan']=$this->M_data_absensi->get_tingkatan()->result_array();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        $this->load->view('users/partial/tpl_index',$data);
    }

    public function lihatRekap($nis) {
        $data['mode']='kelas';
        $data['content']='users/viewRekap';
         $data['detail_siswa'] = $this->db->get_where('siswa', ['nis' => $nis])->row_array();
        $data['total_hadir'] = $this->db->get_where('absensi', ['nis' => $nis, 'keterangan' => "H"])->num_rows();
        $data['total_sakit'] = $this->db->get_where('absensi', ['nis' => $nis, 'keterangan' => "S"])->num_rows();
        $data['total_izin'] = $this->db->get_where('absensi', ['nis' => $nis, 'keterangan' => "I"])->num_rows();
        $data['total_absen'] = $this->db->get_where('absensi', ['nis' => $nis, 'keterangan' => "A"])->num_rows();
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['kelas']=$this->M_data_absensi->pilih_kelas();
        $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
        $data['data_absensi']=$this->M_data_absensi->get_absensi();
        $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
        $data['data_tingkatan']=$this->M_data_absensi->get_tingkatan()->result_array();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        $this->load->view('users/partial/tpl_index',$data);
    }



    public function pengumuman(){
        $data['content']='users/pengumuman';
        $data['pengumuman'] = $this->M_data_users->getAllPengumuman();
        if (!empty($this->session->userdata('NIS'))) {
            $data_siswa = $this->M_data_master->get_siswa_by_nis($this->session->userdata('NIS'))->result_array();
        } else {
            $data_siswa = $this->M_data_master->get_siswa_by_nisn($this->session->userdata('NIS'))->result_array();
        }
        $data['data_siswa']= $data_siswa;
        //$data['notif_balasan']=$this->M_data_bimbingan->get_bimbingan_sudah_dibalas($this->session->userdata('NIS'))->result_array();
        $data['notif_balasan']=array();
        //$data['notif_konseling']=$this->M_data_konseling->get_konseling_belum_dibaca($this->session->userdata('NIS'))->result_array();
        $data['notif_konseling']=array();

        //$data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan_where_users($this->session->userdata('NIS'))->result_array();
        $data['data_bimbingan']=array();
        //$data['data_konseling']=$this->M_data_konseling->get_konseling_where_users_nis()->result_array();
        $data['data_konseling']=array();
        $this->load->view('users/partial/tpl_index',$data);

    }

    public function detailPengumuman($id_pengumuman){
        $data['content']='users/detail_pengumuman';
        $data['komentar'] = $this->M_data_users->getAllKomentar();
        $data['pengumuman'] = $this->M_data_users->getAllPengumumanById($id_pengumuman);
        if (!empty($this->session->userdata('NIS'))) {
            $data_siswa = $this->M_data_master->get_siswa_by_nis($this->session->userdata('NIS'))->result_array();
        } else {
            $data_siswa = $this->M_data_master->get_siswa_by_nisn($this->session->userdata('NIS'))->result_array();
        }
        $data['data_siswa']= $data_siswa;
        $data['notif_balasan']=$this->M_data_bimbingan->get_bimbingan_sudah_dibalas($this->session->userdata('NIS'))->result_array();
        $data['notif_konseling']=$this->M_data_konseling->get_konseling_belum_dibaca($this->session->userdata('NIS'))->result_array();

        $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan_where_users($this->session->userdata('NIS'))->result_array();
        $data['data_konseling']=$this->M_data_konseling->get_konseling_where_users_nis()->result_array();
        $this->load->view('users/partial/tpl_index',$data);

    }

    public function konseling($notif=null){
        // UPDATE STATUS KONSELING SUDAH DI BACA
        if (!empty($notif)) {
            $data = array(
                'status' => 1
            );
            $this->M_data_konseling->edit_konseling($notif, $data);
        }

        $data_siswa=$this->M_data_master->get_siswa_by_nisn($this->session->userdata('NISN'))->result_array();
        if (!empty($data_siswa)) {
            $siswa=$data_siswa[0]['NIS'];
        } else {
            $siswa=$this->session->userdata('NIS');
        }


        $data['content']='users/view_konseling';
        $data['data_konseling']=$this->M_data_konseling->get_konseling_where_users($siswa)->result_array();
        $data['notif_balasan']=$this->M_data_bimbingan->get_bimbingan_sudah_dibalas($this->session->userdata('NIS'))->result_array();
        $data['notif_konseling']=$this->M_data_konseling->get_konseling_belum_dibaca($this->session->userdata('NIS'))->result_array();
        $this->load->view('users/partial/tpl_index',$data);
    }

    public function sp(){
        $data['content']='users/view_sp';
        $data['notif_konseling']=$this->M_data_konseling->get_konseling_belum_dibaca($this->session->userdata('NIS'))->result_array();
        $this->load->view('users/partial/tpl_index',$data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
      }
}