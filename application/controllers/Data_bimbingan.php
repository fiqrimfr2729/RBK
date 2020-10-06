  <?php

defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;

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
        }elseif ($this->session->userdata('level') == 'guru') {
            $id_sekolah = $this->session->userdata('id_sekolah');
            $nik = $this->session->userdata('nik');
            $guru = $this->M_data_master->get_guru($nik);
            $data['menu']='data_bimbingan';
            $data['mode']='bimbingan';
            $data['content']='data_bimbingan/view_bimbingan';
            $data['user'] = $this->M_data_users->get_data_user_by_id();
            $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan($id_sekolah, $nik)->result_array();
            $data['data_belum_dibaca']=array();
            $data['data_kelas']=array();
            $data['data_siswa']=array();
        	$this->load->view('admin/partial/index_admin',$data);
        }else {
            $id_sekolah = $this->session->userdata('id_sekolah');
            $nik = $this->session->userdata('nik');
            $guru = $this->M_data_master->get_guru($nik);
            $data['menu']='data_bimbingan';
            $data['mode']='bimbingan';
            $data['content']='data_bimbingan/view_bimbingan';
            $data['user'] = $this->M_data_users->get_data_user_by_id();
            $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan_admin($id_sekolah)->result_array();
            $data['data_belum_dibaca']=array();
            $data['data_kelas']=array();
            $data['data_siswa']=array();
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

    public function get_bimbingan($id_bimbingan){
        $config = [
            'keyFilePath' => './bimkos-d7a96-firebase-adminsdk-15us9-4475d82d63.json',
            'projectId' => "bimkos-d7a96",
        ];
        $firestore = new FirestoreClient($config);


        $bimbingan =$this->M_data_bimbingan->get_bimbingan_where_id($id_bimbingan)->row(); 

        $usersRef = $firestore->collection('messages')->document($id_bimbingan)->collection($id_bimbingan);
        $snapshot = $usersRef->documents();

        echo "Siswa : $bimbingan->nama_siswa <br>";
        echo "Tanggal : $bimbingan->tgl_bim <br>";
        echo "Subjek : $bimbingan->subjek <br><br>";

        foreach ($snapshot as $bimbingan) {
            echo ('bimbingan') . " : " . $bimbingan['content'] . "<br>";
            echo ('dari') . " : " . $bimbingan['idFrom'] . "<br>";
            echo ('untuk') . " : " . $bimbingan['idTo'] . "<br>";
            echo "<br>";
        }

        echo sprintf('Found %d documents!', $snapshot->size());
    }

    public function bimbingan($id_bimbingan){
        $config = [
            'keyFilePath' => './bimkos-d7a96-firebase-adminsdk-15us9-4475d82d63.json',
            'projectId' => "bimkos-d7a96",
        ];
        $firestore = new FirestoreClient($config);


        $bimbingan =$this->M_data_bimbingan->get_bimbingan_where_id($id_bimbingan)->row(); 

        $usersRef = $firestore->collection('messages')->document($id_bimbingan)->collection($id_bimbingan);
        $snapshot = $usersRef->documents();

        // echo var_dump($snapshot);

        $data['data_bimbingan'] = $bimbingan;
        $data['isi_bimbingan'] = $snapshot;

        
        $data['user'] = $this->M_data_users->get_data_user_by_id();
    
        $data['menu']='data_bimbingan';
        $data['mode']='bimbingan';

        $data['content']='data_bimbingan/view_bimbingan/view_bimbingan_guru';
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        $data['data_belum_dibaca']=array();
        $data['data_kelas']=array();
        $data['data_siswa']=array();
        $this->load->view('admin/data_bimbingan/view_bimbingan/view_bimbingan_guru', $data);
    }

    public function get_bimbingan_siswa($nis){
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        } elseif ($this->session->userdata('level') == 'siswa' || $this->session->userdata('level') == 'ortu') {
            redirect('users/dashboard');
        } else {
            $id_sekolah = $this->session->userdata('id_sekolah');
            
            $data['menu']='data_bimbingan';
            $data['mode']='bimbingan';
            $data['content']='data_bimbingan/view_bimbingan_siswa';
            $data['user'] = $this->M_data_users->get_data_user_by_id();
            $data['data_bimbingan']=$this->M_data_bimbingan->get_bimbingan_siswa($nis)->result_array();
            $data['data_belum_dibaca']=array();
            $data['data_kelas']=array();
            $data['data_siswa']=array();
        	$this->load->view('admin/partial/index_admin',$data);
        }
    }
}