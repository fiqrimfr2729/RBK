<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller {

  public function __Construct() {
    parent::__Construct();

    if($this->session->userdata('logged_in')){
      if ($this->session->userdata('level')=='admin') {
        redirect('admin/dashboard');
      } elseif($this->session->userdata('level')=='siswa') {
        redirect('users/dashboard');
      } else {
        redirect('ortu/dashboard');
      }
    }else{    
      $this->load->model('M_login');
      $this->load->model('M_data_master');
      $this->load->model('M_data_absensi');
      $this->load->model('M_data_users');
      $this->load->library('session');
      $this->load->helper('url');
      $this->load->helper('captcha'); 
    }
    
  }

  public function index() {
    $data['title']="Login";
    $this->load->view('view_login',$data);
  }

  public function login_validation() {
    $this->load->library('form_validation');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user =  $this->M_login->verifikasi($username, $password);

    echo var_dump($user);
    if($user['status']){
      if($user['level'] == 'admin') {
        $data_session = array(
            'logged_in' => true,
            'username' => $username,
            'status' => "login",
            'id_sekolah' => $user['id_sekolah'],
            'level' => 'admin'
        );
        $this->session->set_userdata($data_session);
        redirect(base_url("/Admin/dashboard"));
      }elseif($user['level']=='guru'){
        $data_session = array(
          'logged_in' => true,
          'username' => $username,
          'status' => "login",
          'id_sekolah' => $user['id_sekolah'],
          'level' => 'guru'
        );
        $this->session->set_userdata($data_session);
        redirect(base_url("/Admin/dashboard"));
      }elseif($user['level']=='siswa'){
        $data_session = array(
          'logged_in' => true,
          'nis' => $username,
          'status' => "login",
          'id_sekolah' => $user['id_sekolah'],
          'level' => 'siswa'
        );
        $this->session->set_userdata($data_session);
        redirect(base_url("/Users/dashboard"));
      }
    }


    // if ($this->M_login->verifikasi($username, $password)) {
      
    //   if($user){
    //   $get_data = $this->M_login->get_data_login($username);
    //     foreach ($get_data as $key) {
    //       $id_user = $key->id_user;
    //       if ($key->level == "admin") {
    //         $sql = "SELECT * FROM admin WHERE id_user = '$id_user'";
    //         $data_admin = $this->db->query($sql)->row_array();
    //         $session_data['logged_in'] = true;
    //         $session_data['NIK'] = $data_admin['NIK'];
    //       $session_data['nama_lengkap'] = $data_admin['nama_admin'];
    //       $session_data['email_admin'] = $data_admin['email_admin'];
    //       $session_data['level'] = $key->level;
    //       $session_data['username'] = $key->username;
    //       $session_data['id_users'] = $key->id_users;
    //       $session_data['id_user'] = $key->id_user;
    //       $session_data['id_sekolah'] = $data_admin['id_sekolah'];
    //       } elseif ($key->level == "guru") {
    //         $sql = "SELECT * FROM guru WHERE id_user = '$id_user'";
    //         $data_guru = $this->db->query($sql)->row_array();

    //         $session_data['logged_in'] = true;
    //       $session_data['NIK'] = $data_guru['nik'];
    //       $session_data['nama_lengkap'] = $data_guru['nama_guru'];
    //       $session_data['email_guru'] = $data_guru['email_guru'];
    //       $session_data['id_tingkatan'] = $data_guru['id_tingkatan'];
    //       $session_data['level'] = $key->level;
    //       $session_data['username'] = $key->username;
    //       $session_data['id_users'] = $key->id_users;
    //       $session_data['id_user'] = $key->id_user;
    //       $session_data['id_sekolah'] = $data_guru['id_sekolah'];
    //       } elseif ($key->level == "siswa") {
    //         $sql = "SELECT * FROM siswa WHERE id_user = '$id_user'";
    //         $data_siswa = $this->db->query($sql)->row_array();

    //       $data = $this->db->get_where('siswa', ['id_user' => $id_user])->row()->id_kelas;
    //       $id_tingkatan = $this->db->get_where('kelas', ['id_kelas' => $data])->row_array();
    //       $session_data['logged_in'] = true;
    //       $session_data['NIS'] = $data_siswa['NIS'];
    //       $session_data['nama_lengkap'] = $data_siswa['nama_lengkap'];
    //       $session_data['email_siswa'] = $data_siswa['email_siswa'];
    //       $session_data['level'] = $key->level;
    //       $session_data['username'] = $key->username;
    //       $session_data['id_users'] = $key->id_users;
    //       $session_data['id_user'] = $key->id_user;
    //       $session_data['id_sekolah'] = $data_siswa['id_sekolah'];
    //       $session_data['id_tingkatan'] = $id_tingkatan['id_tingkatan'];
    //       } 
          
    //     }
    //       $this->session->set_userdata($session_data);
    //       if ($this->session->userdata('level')=='admin') {
    //         redirect('Admin/dashboard');
    //       } elseif($this->session->userdata('level')=='siswa') {
    //         redirect('Users/dashboard');
    //       } elseif($this->session->userdata('level')=='guru') {
    //         redirect('Admin/dashboard');
    //       }
        
    //   } else {
    //     $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Username atau password salah<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //       <span aria-hidden='true'>&times;</span>
    //     </button></div>");
    //     redirect(base_url());
    //   }
      
    // } else {
    //   $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Username atau password salah<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //     <span aria-hidden='true'>&times;</span>
    //   </button></div>");
    //   redirect(base_url());
    // }
  }

public function forgot_password() {
  $this->load->view('forgot_password');
}

function cari_email() {
  $data['result']=$this->M_login->result_email();
  $this->load->view('cari_email',$data);
}

function view_email($id_users) {
  $data['emailku']=$this->M_login->lihat_email($id_users);
  $this->load->view('lihat_email',$data);
}

function sandi_baru($id_users) {
  $data=array(
    'password'=>md5($this->input->post('password'))
    );
  $this->M_login->ubah_sandi($data,$id_users);
  $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Kata Sandi berhasil diubah.<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>");
  redirect(base_url());
}

public function send_mail() {
    // $data_siswa = $this->M_login->read_email_siswa($this->input->post('email'))->result_array();
    // $data_admin = $this->M_login->read_email_admin($this->input->post('email'))->result_array();
    // if (!empty($data_siswa)) {
    //     $data = $this->M_login->read_email_siswa($this->input->post('email'))->result_array();
    //     $email = $data[0]['email'];
    //     $id_users = $data[0]['NIS'];
    // } else {
    //     $data = $this->M_login->read_email_admin($this->input->post('email'))->result_array();
    //     $email = $data[0]['email_admin'];
    //     $id_users = $data[0]['id_users'];
    // }

    // if (count($data)==1) {
          //Load email library
  $this->load->library('email');
          //SMTP & mail configuration
  $config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'rzl.sidqi@gmail.com',
    'smtp_pass' => 'HiBaihaqi',
    'smtp_crypto' => 'ssl',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'
    );
  $this->email->initialize($config);
  $this->email->set_mailtype("html");
  $this->email->set_newline("\r\n");
          //Email content
  $base_url = base_url('login/reset_password/');
  $htmlContent = "
  <html>
  <body>
    <link href='https://fonts.googleapis.com/css?family=Abel|Roboto' rel='stylesheet'>
    <div style='background-color: #f1f1f1; padding:20px; font-family: Roboto, sans-serif; font-color:black'>
      <div style='background-color: #7FFF00; padding-bottom: 5px'></div>
      <div style='background-color: #ffffff; padding: 10px; text-align: center; text-color:black'>
        <h1>Admin Sistem Bimbingan Konseling</h1>
        <h3>Silahkan Masuk pada halaman ini untuk mengubah Password Anda!</h3>
        <div style='text-align: center'>
          <a href='$base_url' style='background-color: #7FFF00; border: none; color: white; padding: 16px 32px; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; -webkit-transition-duration: 0.4s; transition-duration: 0.4s; cursor: pointer'><b>Reset Password</b></a>
        </div>
        <p>Email ini dikirimkan secara otomatis. Mohon tidak membalas ke email ini.</p>
      </div>
      <div style='background-color: #7FFF00; padding-bottom: 5px'></div>
    </div>
  </body>
  </html>
  ";
          // $this->email->to('kikismaulana1902@gmail.com');
  $this->email->from('rzl.sidqi@gmail.com','no-reply@sbk.com | Sistem Bimbingan Konseling Online');
  $this->email->subject('Reset Password ADMIN');
  $this->email->message($htmlContent);
          //Send email
  $this->email->send();
  $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Berhasil kirim tautan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>");
        //   redirect(base_url());
        // } else {
        //   $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Email tidak terdaftar!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        //                       <span aria-hidden='true'>&times;</span>
        //                     </button></div>");
        //   redirect('login/forgot_password');
        // }
}

public function reset_password($id) {
  $data['id']=$id;
  $this->load->view('reset_password',$data);
}

public function do_reset_password(){
  $id = $this->input->post('id');

  if ($this->input->post('password_baru') != $this->input->post('password_konfirmasi')) {
    $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Password baru dan konfirmasi tidak sesuai!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button></div>");
  } elseif(strlen($this->input->post('password_baru'))<8){
    $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Password min. 8 character!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button></div>");
  } else {
    $data = array(
      'password' =>md5($this->input->post('password_konfirmasi'))
      );
    $update = $this->M_login->reset_password($id, $data);
    $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Berhasi ! Silahkan login dengan password baru anda<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button></div>");
  }
  redirect('login/reset_password/'.$id);
}

    public function refresh()
    {
        $config = array(
            'img_url' => base_url() . 'image_for_captcha/',
            'img_path' => 'image_for_captcha/',
            'img_height' => 45,
            'word_length' => 5,
            'img_width' => '45',
            'font_size' => 10
        );
        $captcha = create_captcha($config);
        $this->session->unset_userdata('valuecaptchaCode');
        $this->session->set_userdata('valuecaptchaCode', $captcha['word']);
        echo $captcha['image'];
    }

    public function logout() {
      $this->session->sess_destroy();
      redirect(base_url('login'));
    }
}

