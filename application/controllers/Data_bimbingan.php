  <?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_bimbingan extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('M_data_bimbingan');
        $this->load->model('M_data_master');
        $this->load->model('M_data_users');
    }

    public function index(){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } elseif ($this->session->userdata('level') == 'siswa' || $this->session->userdata('level') == 'ortu') {
            redirect('users/dashboard');
        } else {
            $data['menu']='data_bimbingan';
            $data['content']='data_bimbingan/view_bimbingan';
            $data['user'] = $this->M_data_users->get_data_user_by_id();
            $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan()->result_array();
            $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
            $data['data_kelas']=$this->M_data_master->get_kelas()->result_array();
            $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
        	$this->load->view('admin/partial/index_admin',$data);
        }
    }

    public function baca_bimbingan($id_bimbingan){
        $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan_where_id($id_bimbingan)->result_array();
         $data['user'] = $this->M_data_users->get_data_user_by_id();

        if ($data['data_bimbingan'][0]['status']==0) {
            // UPDATE STATUS BIMBINGAN SUDAH DI BACA
            $data = array(
                    'status' => 1
            );
            $this->M_data_bimbingan->edit_bimbingan($id_bimbingan, $data);
        }
        
        $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan_where_id($id_bimbingan)->result_array();
        $data['menu']='data_bimbingan';

        $data['content']='data_bimbingan/view_detail_bimbingan';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['data_belum_dibaca']=$this->M_data_bimbingan->get_bimbingan_belum_dibaca()->result_array();
        $data['data_kelas']=$this->M_data_master->get_kelas()->result_array();
        $data['data_siswa']=$this->M_data_master->get_siswa()->result_array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function kirim_balasan($id_bimbingan){
        $data = array(
                'id_users' => $this->session->userdata('id_users'),
                'isi_balasan' => $this->input->post('balasan'),
                'tanggal_balasan' => date('Y-m-d H:i:s')
        );

        if ($this->M_data_bimbingan->edit_bimbingan($id_bimbingan, $data)) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Balasan berhasil dikirim!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Balasan gagal dikirim<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button></div>");
        }
        redirect('data_bimbingan/baca_bimbingan/'.$id_bimbingan);
    }
}