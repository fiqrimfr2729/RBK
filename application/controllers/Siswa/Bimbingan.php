<?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;

class Bimbingan extends CI_Controller{
    
    public function __Construct()
    {
        parent::__Construct();
        if($this->session->userdata('level') != 'siswa'){
            redirect(base_url("/Login"));
        }else{
            $this->load->model('M_data_master');
            $this->load->model('M_data_absensi');        
            $this->load->model('M_data_konseling');
            $this->load->model('M_data_users');
            $this->load->model('M_data_bimbingan');
        }
       
    }

    public function index(){
        $nis = $this->session->userdata('nis');
        $data['menu'] = 'bimbingan';
        $data['siswa'] = $this->M_data_master->get_siswa_by_nis($nis)->row();
        $data['bimbingan'] = $this->M_data_bimbingan->get_bimbingan_siswa($nis)->result();
        //echo var_dump($data['bimbingan']);
        $this->load->view('siswa/view_bimbingan_siswa', $data);
    }

    public function room_bimbingan($id_bimbingan){
        $id_sekolah = $this->session->userdata('id_sekolah');
        $nis = $this->session->userdata('nis');
        $siswa = $this->M_data_master->get_siswa_by_nis($nis)->row();

        $data['menu'] = 'bimbingan';
        $config = [
            'keyFilePath' => './bimkos-d7a96-firebase-adminsdk-15us9-4475d82d63.json',
            'projectId' => "bimkos-d7a96",
        ];
        $firestore = new FirestoreClient($config);

        $bimbingan =$this->M_data_bimbingan->get_bimbingan_where_id($id_bimbingan)->row(); 

        $usersRef = $firestore->collection('messages')->document($id_bimbingan)->collection($id_bimbingan);
        $snapshot = $usersRef->documents();

        // echo var_dump($snapshot);
        $data['guru'] = $this->M_data_master->get_guru_bk_by_tingkatan($siswa->tingkatan, $id_sekolah);
        $data['data_bimbingan'] = $bimbingan;
        $data['isi_bimbingan'] = $snapshot;

        $this->load->view('siswa/view_room_bimbingan', $data);
    }

    public function create_bimbingan(){
        $siswa = $this->M_data_master->get_siswa_by_nis($this->session->userdata('nis'))->row();
        $data = array(
            'id_bimbingan' => date('ymdhms'),
            'nis' => $this->session->userdata('nis'),
            'subject' => $this->input->post('subjek'),
            'isi_bim' => $this->input->post('isi_bimbingan'),
            'tgl_bim' => date('Y-m-d H:i:s'),
            'status' => false,
            'id_tingkatan' =>$siswa->tingkatan
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
        redirect('Siswa/bimbingan');
    }

    public function kirim_bimbingan(){
        $id_sekolah = $this->session->userdata('id_sekolah');
        $nis = $this->session->userdata('nis');
        $id_bimbingan = $this->input->post('id_bimbingan');
        $config = [
            'keyFilePath' => './bimkos-d7a96-firebase-adminsdk-15us9-4475d82d63.json',
            'projectId' => "bimkos-d7a96",
        ];
        $firestore = new FirestoreClient($config);
        $id_chat = date('ymdhms');

        $this->M_data_bimbingan->update_status_bimbingan_siswa($id_bimbingan);
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $data = [
            'content' => $this->input->post('isi_bimbingan'),
            'idFrom' => $nis,
            'idTo' => $this->input->post('nik'),
            'type' => 0,
            'timestamp' => $timestamp
        ];
        //echo var_dump($this->input->post('nik'));
        $firestore->collection('messages')->document($id_bimbingan)->collection($id_bimbingan)->document($timestamp)->set($data);

        redirect('Siswa/bimbingan/room_bimbingan/'.$id_bimbingan);
    }

    public function test_add_bimbingan(){
        $id_sekolah = $this->session->userdata('id_sekolah');
        $nis = $this->session->userdata('nis');
        $config = [
            'keyFilePath' => './bimkos-d7a96-firebase-adminsdk-15us9-4475d82d63.json',
            'projectId' => "bimkos-d7a96",
        ];
        $firestore = new FirestoreClient($config);
        $id_bimbingan = date('ymdhms');

        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $data = [
            'content' => $this->input->post('isi_bimbingan'),
            'idFrom' => $nis,
            'idTo' => $this->input->post('nik'),
            'type' => 0
        ];
        $firestore->collection('messages')->document($id_bimbingan)->collection($id_bimbingan)->document('ffwfawfea')->set($data);
    }

}

?>