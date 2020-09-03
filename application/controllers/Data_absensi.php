<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_absensi extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('M_data_absensi');
        $this->load->model('M_data_users');
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

    public function save_absensi()
    {

        $id_siswa = $this->input->post('id_siswa');
        $id_jurusan = $this->input->post('id_jurusan');
        // $Termino = $this->input->post('nama_siswa');
        $keterangan = $this->input->post('keterangan');
        $date = $this->input->post('date');
        $id_sekolah = $this->session->userdata('id_sekolah');
        foreach ($id_siswa as $key => $item) 
        {
            $insert_data[] = array(
                'NIS' => $item,
                'keterangan'=> $keterangan[$key],
                'id_jurusan' => $id_jurusan[$key],
                'tanggal' => $date,
                'id_sekolah' => $id_sekolah,
            );
        }
        //print_r($insert_data);die;
        $this->db->insert_batch('absensi',$insert_data);
        redirect ('data_absensi/select_class');

    }


    function tambah_user_siswa($NIS) {
        $siswa_view=$this->M_data_absensi->lihat_user($NIS);
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
        $this->M_data_absensi->tambah_user($data);
        redirect('Data_users/siswa');
    }

    public function jurusan(){
     $data['menu']='data_absensi';
     $data['mode']='jurusan';
     $data['content']='data_absensi/view_absensi_jurusan';
     $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
     $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
     $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
     $data['user'] = $this->M_data_users->get_data_user_by_id();
     $this->load->view('admin/partial/index_admin',$data);
 }

 public function add_jurusan(){
    $data = array(
        'nama_jurusan' => $this->input->post('jurusan')
    );

    if ($this->M_data_absensi->add_jurusan($data)) {
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    } else {
        $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    }
    redirect('data_absensi/jurusan');
}

public function edit_jurusan($id_jurusan){
    $data = array(
        'nama_jurusan' => $this->input->post('jurusan')
    );

    if ($this->M_data_absensi->edit_jurusan($id_jurusan, $data)) {
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    } else {
        $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    }
    redirect('data_absensi/jurusan');
}

public function delete_jurusan($id_jurusan){
    if ($this->M_data_absensi->delete_jurusan($id_jurusan)) {
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    } else {
        $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    }
    redirect('data_absensi/jurusan');
}

function cetak_kelas($id_kelas) {
    $this->load->library('mypdf');
    $data['kelas']=$this->M_data_absensi->get_kelas_sekarang($id_kelas)->row();
    $data['result_print']=$this->M_data_absensi->view_class($id_kelas);
    $this->mypdf->generate('admin/data_users/cetak_kelas',$data);
}

public function select_class() {
    $data['menu']='data_absensi';
    $data['mode']='kelas';
    $data['content']='data_absensi/view_absensi_pilih_kelas';
    $data['user'] = $this->M_data_users->get_data_user_by_id();
    $data['kelas']=$this->M_data_absensi->pilih_kelas();
    $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
    $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
    $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
    $data['data_tingkatan']=$this->M_data_absensi->get_tingkatan()->result_array();
    $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    $this->load->view('admin/partial/index_admin',$data);
}


public function rekap_absensi() {
    $data['menu']='data_absensi';
    $data['mode']='kelas';
    $data['content']='data_absensi/view_absensi_pilih_rekap';
    $data['user'] = $this->M_data_users->get_data_user_by_id();
    $data['kelas']=$this->M_data_absensi->pilih_kelas();
    $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
    $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
    $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
    $data['data_tingkatan']=$this->M_data_absensi->get_tingkatan()->result_array();
    $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    $this->load->view('admin/partial/index_admin',$data);
}


public function lihat_absensi() {
    $data['menu']='data_absensi';
    $data['mode']='kelas';
    $data['content']='data_absensi/view_absensi_lihat_absensi';
    $data['user'] = $this->M_data_users->get_data_user_by_id();
    $data['kelas']=$this->M_data_absensi->pilih_kelas();
    $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
    $data['data_absensi']=$this->M_data_absensi->get_absensi();
    $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
    $data['data_tingkatan']=$this->M_data_absensi->get_tingkatan()->result_array();
    $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    $this->load->view('admin/partial/index_admin',$data);
}


public function tampil_kelas() {
    $data['menu']='data_absensi';
    $data['mode']='kelas';
    $id_kelas=$this->input->GET('id_kelas',TRUE);
    $data['user'] = $this->M_data_users->get_data_user_by_id();
    $data['kelas']=$this->M_data_absensi->get_kelas_sekarang($id_kelas)->result_array();
    $data['data_siswa']=$this->M_data_absensi->tampilkan_siswa($id_kelas)->result_array();
    $data['content']='data_absensi/view_absensi_tampil_kelas';
    $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
    $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
    $data['data_tingkatan']=$this->M_data_absensi->get_tingkatan()->result_array();
    $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    $this->load->view('admin/partial/index_admin',$data);
}

public function tampil_rekap() {
    $data['menu']='data_absensi';
    $data['mode']='kelas';
    $id_kelas=$this->input->GET('id_kelas',TRUE);
    $data['user'] = $this->M_data_users->get_data_user_by_id();
    $data['kelas']=$this->M_data_absensi->get_kelas_sekarang($id_kelas)->result_array();
    $data['data_siswa']=$this->M_data_absensi->tampilkan_siswa($id_kelas)->result_array();
    $data['content']='data_absensi/view_absensi_tampil_rekap';
    $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
    $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
    $data['data_tingkatan']=$this->M_data_absensi->get_tingkatan()->result_array();
    $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    $this->load->view('admin/partial/index_admin',$data);
}

public function kelas(){
    $data['menu']='data_absensi';
    $data['mode']='kelas';
    $data['content']='data_absensi/view_absensi_kelas';
    $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
    $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
    $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
    $data['data_tingkatan']=$this->M_data_absensi->get_tingkatan()->result_array();
    $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    $this->load->view('admin/partial/index_admin',$data);
}

public function add_kelas(){
    $data = array(
        'id_tingkatan' => $this->input->post('tingkatan'),
        'id_jurusan' => $this->input->post('jurusan'),
        'urutan_kelas' => $this->input->post('urutan')
    );

    if ($this->M_data_absensi->add_kelas($data)) {
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    } else {
        $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    }
    redirect('data_absensi/kelas');
}

public function edit_kelas($id_kelas){
    $data = array(
        'id_tingkatan' => $this->input->post('tingkatan'),
        'id_jurusan' => $this->input->post('jurusan'),
        'urutan_kelas' => $this->input->post('urutan')
    );

    if ($this->M_data_absensi->edit_kelas($id_kelas, $data)) {
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    } else {
        $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    }
    redirect('data_absensi/kelas');
}

public function delete_kelas($id_kelas){
    if ($this->M_data_absensi->delete_kelas($id_kelas)) {
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    } else {
        $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    }
    redirect('data_absensi/kelas');

}

public function siswa(){
    $data['menu']='data_absensi';
    $data['mode']='siswa';
    $data['content']='data_absensi/view_absensi_siswa';
    $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
    $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
    $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    $this->load->view('admin/partial/index_admin',$data);
}


public function add_siswa(){


    $this->M_data_absensi->add_siswa();

    $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button></div>");
    
    redirect('data_absensi/siswa');
}


public function add_rekap(){

    $id_sekolah = $this->session->userdata('id_sekolah');
    $date = $this->input->post('tanggal');
    $insert_data = array(
        'file' => $this->_upload_excel(),
        'tanggal' => $date,
        'id_sekolah' => $id_sekolah);
$this->db->insert('rekap', $insert_data);
redirect('data_absensi/tampil_rekap?id_kelas='.$this->input->post('id_kelas'));
    // var_dump($insert_data);
}

public function rekapAbsensiSiswa()
{
    $data['menu']='data_absensi';
    $data['mode']='kelas';
    $data['content']='data_absensi/view_absensi_pilih_rekap_siswa';
    $data['user'] = $this->M_data_users->get_data_user_by_id();
    $data['kelas']=$this->M_data_absensi->pilih_kelas();
    $data['data_kelas']=$this->M_data_absensi->get_kelas()->result_array();
    $data['data_siswa']=$this->M_data_absensi->get_siswa()->result_array();
    $data['data_jurusan']=$this->M_data_absensi->get_jurusan()->result_array();
    $data['data_tingkatan']=$this->M_data_absensi->get_tingkatan()->result_array();
    $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
    $this->load->view('admin/partial/index_admin',$data);
}

  public function tampil_rekap_siswa() {
        $data['menu']='data_master';
        $data['mode']='kelas';
        $data['id_kelas']=$this->input->GET('id_kelas',TRUE);
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $id_kelas=$this->input->GET('id_kelas',TRUE);
        $data['kelas']=$this->M_data_master->get_kelas_sekarang($id_kelas)->result_array();
        $data['nama_kelas']=$this->M_data_master->get_kelas_sekarangbyid($id_kelas)->row_array();
        $data['data_siswa']=$this->M_data_master->tampilkan_siswa($id_kelas)->result_array();
        $data['content']='data_absensi/view_tampil_rekap';
        $data['data_kelas']=$this->M_data_master->get_kelas()->result_array();
        $data['data_jurusan']=$this->M_data_master->get_jurusan()->result_array();
        $data['data_tingkatan']=$this->M_data_master->get_tingkatan()->result_array();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function detailRekap($nis)
    {
         $data['menu']='data_master';
        $data['mode']='kelas';
        $data['id_kelas']=$this->input->GET('id_kelas',TRUE);
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $id_kelas=$this->input->GET('id_kelas',TRUE);
        $data['id_kelas'] = $id_kelas;
        $data['kelas']=$this->M_data_master->get_kelas_sekarang($id_kelas)->result_array();
        $data['nama_kelas']=$this->M_data_master->get_kelas_sekarangbyid($id_kelas)->row_array();
        $data['data_siswa']=$this->M_data_master->tampilkan_siswa($id_kelas)->result_array();
        $data['detail_siswa'] = $this->db->get_where('siswa', ['nis' => $nis])->row_array();
        $data['total_hadir'] = $this->db->get_where('absensi', ['nis' => $nis, 'keterangan' => "H"])->num_rows();
        $data['total_sakit'] = $this->db->get_where('absensi', ['nis' => $nis, 'keterangan' => "S"])->num_rows();
        $data['total_izin'] = $this->db->get_where('absensi', ['nis' => $nis, 'keterangan' => "I"])->num_rows();
        $data['total_absen'] = $this->db->get_where('absensi', ['nis' => $nis, 'keterangan' => "A"])->num_rows();
        $data['content']='data_absensi/view_detail_rekap';
        $data['data_kelas']=$this->M_data_master->get_kelas()->result_array();
        $data['data_jurusan']=$this->M_data_master->get_jurusan()->result_array();
        $data['data_tingkatan']=$this->M_data_master->get_tingkatan()->result_array();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        $this->load->view('admin/partial/index_admin',$data);

    }


public function _upload_excel() {
        // setting konfigurasi upload
    $config['upload_path'] = './assets/admin/rekap';
    $config['allowed_types'] = 'xlsx|xls';
        // load library upload
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('rekap')) {
        return $this->upload->data('file_name');
    } else {
        print($this->upload->display_errors());
        exit();
    }

}

public function edit_siswa($id_siswa){
    $data = array(
        'nis' => $this->input->post('nis'),
        'nisn' => $this->input->post('nisn'),
        'id_kelas' => $this->input->post('id_kelas'),
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'jk' => $this->input->post('jk'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        'email' => $this->input->post('email'),
        'agama' => $this->input->post('agama'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),
        'nama_ayah' => $this->input->post('nama_ayah'),
        'nama_ibu' => $this->input->post('nama_ibu'),
        'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
        'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
        'alamat_ortu' => $this->input->post('alamat_ortu')
    );

    if ($this->M_data_absensi->edit_siswa($id_siswa, $data)) {
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    } else {
        $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal di perbarui!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    }
    redirect('data_absensi/siswa');
}

public function delete_siswa($id_siswa){
    // AMBIL DATA NIS DAN NISN UNTUK DELETE DI DATA USERS
    $data = $this->M_data_absensi->get_siswa($id_siswa)->result_array();

    $delete_siswa = $this->M_data_absensi->delete_siswa($id_siswa);
    $delete_user_by_nis =  $this->M_data_absensi->delete_user_by_nis($data['nis']);
    $delete_user_by_nisn =  $this->M_data_absensi->delete_user_by_nisn($data['nisn']);

    if ($delete_siswa && $delete_user_by_nis && $delete_user_by_nisn) {
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil hapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    } else {
        $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal dihapus!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>");
    }
    redirect('data_absensi/siswa');

}

}