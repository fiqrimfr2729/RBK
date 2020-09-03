<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Data_akun extends CI_Controller {

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

    public function profil()
    {
        $data['judul'] = 'Profil Petugas';
        $data['users'] = $this->db->get_where('users', ['NIS' => $this->session->userdata('NIS')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/data_akun', $data);
        $this->load->view('templates/footer');
    } 
}