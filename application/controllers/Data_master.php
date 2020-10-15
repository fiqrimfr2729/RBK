<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_master extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('M_data_master');
        $this->load->model('M_data_users');
        $this->load->model('M_data_bimbingan');
        $this->load->library('form_validation');
    }

    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } elseif ($this->session->userdata('level') == 'siswa' || $this->session->userdata('level') == 'guru') {
            redirect('users/dashboard');
        } else {
            echo "PAGE NOT FOUND!";
        }
    }

    
    public function jurusan(){
        $data['menu']='data_master';
        $data['mode']='jurusan';
        $data['content']='data_master/view_master_jurusan';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['data_jurusan']=$this->M_data_master->get_jurusan()->result_array();
        $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function add_jurusan(){
        $data = array(
            'nama_jurusan' => $this->input->post('jurusan'),
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
        redirect('data_master/jurusan');
    }

    public function edit_jurusan($id_jurusan){
        $data = array(
            'nama_jurusan' => $this->input->post('jurusan')
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
        redirect('data_master/jurusan');
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
        redirect('data_master/jurusan');
    }

    function cetak_kelas($id_kelas) {
        $this->load->library('mypdf');
        $data['kelas']=$this->M_data_master->get_kelas_sekarang($id_kelas)->row();
        $data['result_print']=$this->M_data_master->view_class($id_kelas);
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $this->mypdf->generate('admin/data_users/cetak_kelas',$data);
    }

    public function select_class() {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='data_master';
        $data['mode']='kelas';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['content']='data_master/view_master_pilih_kelas';
        $data['kelas']=$this->M_data_master->pilih_kelas($id_sekolah);
        
       
        $data['data_belum_dibaca']=array();
        //echo var_dump($data['data_kelas']);
        $this->load->view('admin/partial/index_admin',$data);
    }
    

    public function tampil_kelas() {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='data_master';
        $data['mode']='kelas';
        $data['id_kelas']=$this->input->GET('id_kelas',TRUE);
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $id_kelas=$this->input->GET('id_kelas',TRUE);
        $data['kelas']=$this->M_data_master->get_kelas_sekarang($id_kelas)->result_array();
        $data['nama_kelas']=$this->M_data_master->get_kelas_sekarangbyid($id_kelas)->row_array();
        $data['data_siswa']=$this->M_data_master->tampilkan_siswa($id_kelas)->result_array();
        $data['content']='data_master/view_master_tampil_kelas';
        $data['data_kelas']=$this->M_data_master->get_kelas($id_sekolah)->result_array();
        $data['data_jurusan']=$this->M_data_master->get_jurusan($id_sekolah)->result_array();
        $data['data_tingkatan']=array();
        $data['data_belum_dibaca']=array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function kelas(){
        $data['menu']='data_master';
        $data['mode']='kelas';
        $data['content']='data_master/view_master_kelas';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['data_kelas']=$this->M_data_master->get_kelas()->result_array();
        $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
        $data['data_jurusan']=$this->M_data_master->get_jurusan()->result_array();
        $data['data_tingkatan']=$this->M_data_master->get_tingkatan()->result_array();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function add_kelas(){
        $data = array(
            'tingkatan' => $this->input->post('tingkatan'),
            'id_jurusan' => $this->input->post('jurusan'),
            'urutan_kelas' => $this->input->post('urutan'),
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'tahun_masuk' => $this->input->post('tahun_masuk')
            );

        if ($this->M_data_master->add_kelas($data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('data_master/kelas');
    }

    public function naik_kelas(){
        if($this->M_data_master->naik_kelas()){
            redirect('data_master/kelas');
        }
    }
    
    public function turun_kelas(){
        if($this->M_data_master->turun_kelas()){
            redirect('data_master/kelas');
        }

    }

    public function edit_kelas($id_kelas){
        $data = array(
            'id_tingkatan' => $this->input->post('tingkatan'),
            'id_jurusan' => $this->input->post('jurusan'),
            'urutan_kelas' => $this->input->post('urutan')
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
        redirect('data_master/kelas');
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
        redirect('data_master/kelas');

    }

    public function siswa(){
            $data['menu']='data_master';
            $data['mode']='siswa';
            $data['content']='data_master/view_master_siswa';
            $data['user'] = $this->M_data_users->get_data_user_by_id();
            $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
            $data['data_kelas']=$this->M_data_master->get_kelas()->result_array();
            $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
            $this->load->view('admin/partial/index_admin',$data);
    }

    function tambah_user_siswa($NIS) {
        $siswa_view=$this->M_data_master->lihat_user($NIS);
        $NIS=$siswa_view[0]->NIS;
        $nama_lengkap=$siswa_view[0]->nama_lengkap;
        $username=$siswa_view[0]->NIS;
        $password=$siswa_view[0]->NIS;
        $email_admin=$siswa_view[0]->email;
        $data=array(
            'NIS'=>$NIS,
            'nama_lengkap'=>$nama_lengkap,
            'username'=>$username,
            'password'=>md5($password),
            'email_admin'=>$email_admin,
            'level'=>'siswa'
            );
        $this->M_data_master->tambah_user($data);
        redirect('Data_users/siswa');
    }

    public function add_siswa(){
        $this->form_validation->set_error_delimiters('', '');
        $id_kelas = $this->input->post('id_kelas');

        $this->form_validation->set_rules('nis', 'NIS', 'required|is_unique[siswa.nis]',
            array(
                'required' => 'NIS Tidak boleh kosong',
                'is_unique' => 'Data NIS sudah ada'
            ));

        $data = array(
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'id_kelas' => $this->input->post('id_kelas'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'jk' => $this->input->post('jk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'id_user' => $this->input->post('nis')
        );

        $data_user = array(
            'id_user' => $this->input->post('nis'),
            'password' => password_hash('Siswa123', PASSWORD_DEFAULT)
        );

        if($this->form_validation->run()){
            $this->M_data_master->add_siswa($data, $data_user);

            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button></div>");
            
            redirect('data_master/tampil_kelas?id_kelas='.$id_kelas);
        }else{
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>".validation_errors(). "!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button></div>");
            redirect('data_master/tampil_kelas?id_kelas='.$id_kelas);
        }
        
    }

    public function edit_siswa($id_siswa){
        $id_kelas = $this->input->post('id_kelas');
        $data = array(
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'id_kelas' => $this->input->post('id_kelas'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'jk' => $this->input->post('jk'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'email' => $this->input->post('email'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
        );

        if ($this->M_data_master->edit_siswa($id_siswa, $data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('data_master/tampil_kelas?id_kelas='.$id_kelas);
    }

    public function hapusJurusan($id_jurusan)
    {
        $this->M_data_master->delete_jurusan($id_jurusan);
        redirect('Data_master/jurusan');
    }

    public function delete_siswa($nis){
        $siswa = $this->M_data_master->get_siswa_by_nis($nis)->row();
        $delete_siswa = $this->M_data_master->delete_siswa($nis);
        // $delete_user_by_nis =  $this->M_data_users->delete_user_by_nis($data['NIS']);
        // $delete_user_by_nisn =  $this->M_data_users->delete_user_by_nisn($data['nisn']);
        // if ($delete_siswa && $delete_user_by_nis && $delete_user_by_nisn) {
        if ($delete_siswa) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
          </button></div>");
        }
        redirect('data_master/tampil_kelas?id_kelas='.$siswa->id_kelas);
    }

    


}
