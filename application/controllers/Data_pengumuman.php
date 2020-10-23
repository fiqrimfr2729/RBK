<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_pengumuman extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        if($this->session->userdata('level')!='admin' && $this->session->userdata('level')!='guru'){
            redirect(base_url("/Login"));
        }else{  
            $this->load->model('M_data_master');
            $this->load->model('M_data_absensi');        
            $this->load->model('M_data_konseling');
            $this->load->model('M_data_users');
            $this->load->model('M_data_belajar');
        }
    }

    public function index(){
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='data_pengumuman';
        $data['content']='data_pengumuman/view_pengumuman';
        $data['mode']='pengumuman';
        $data['pengumuman'] = $this->M_data_users->getAllPengumuman($id_sekolah);
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        // $data['data_belajar']=$this->M_data_belajar->get_belajar()->result_array();
        $data['data_siswa']=array();
        $data['data_pelanggaran']=array();
        $data['data_kelas']=array();
        $data['data_belum_dibaca']=array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function komentar($id_pengumuman){
        $id_sekolah = $this->session->userdata('id_sekolah');
        $data['menu']='data_pengumuman';
        $data['content']='data_pengumuman/view_komentar';
        $data['mode']='pengumuman';
        $data['komentar'] = $this->M_data_users->get_komentar($id_pengumuman);
        $data['pengumuman'] = $this->M_data_users->get_pengumuman_by_id($id_pengumuman);
        $data['user'] = $this->M_data_users->get_data_user_by_id();
        // $data['data_belajar']=$this->M_data_belajar->get_belajar()->result_array();
        
        $data['data_kelas']=array();
        $data['data_belum_dibaca']=array();
        $this->load->view('admin/partial/index_admin',$data);
    }

    public function kirim_komentar(){
        $id_pengumuman = $this->input->post('id_pengumuman');
		if($this->session->userdata('nis') != null){
			$id_user = $this->session->userdata('nis');
		}else{
			$id_user = $this->session->userdata('nik');
		}
		$isi_komentar = $this->input->post('isi_komentar');
		$created_at = date('Y-m-d h:i:s');
		// var_dump($created_at); exit();
		$data = [
			'id_user' => $id_user,
			'isi_komentar' => $isi_komentar,
			'id_pengumuman' => $id_pengumuman,
			'tanggal' => $created_at
		];

		$this->db->insert('komentar', $data);
		redirect('Data_pengumuman/komentar/' . $id_pengumuman);
    }

    public function hapus_komentar(){
        $id_komentar = $this->input->post('id_komentar');
        $id_pengumuman = $this->input->post('id_pengumuman');

        $this->M_data_belajar->delete_komentar($id_komentar);

        redirect("Data_pengumuman/komentar/$id_pengumuman");
    }


    public function add_belajar(){
        $data = array(
            'NIS' => $this->input->post('nis'),
            'id_pelanggaran' => $this->input->post('pelanggaran'),
            'catatan' => $this->input->post('catatan'),
            'waktu_pelanggaran' => $this->input->post('waktu_pelanggaran'),
            'waktu_input' => date('Y-m-d H:i:s'),
            'tkp' => $this->input->post('tkp')
        );

        if ($this->M_data_belajar->add_belajar($data)) {

            // AMBIL DATA BOBOT
            $data_bobot=$this->M_data_pelanggaran->get_pelanggaran_by_id($this->input->post('pelanggaran'))->result_array();
            // AMBIL DATA SISWA
            $data_siswa=$this->M_data_master->get_siswa_by_nis($this->input->post('nis'))->result_array();

            // KURANGI SKOR SISWA
            $update_skor=array(
                'skor' => $data_siswa[0]['skor']-$data_bobot[0]['bobot'],
            );

            $this->M_data_master->edit_siswa($this->input->post('nis'), $update_skor);

            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>Data berhasil disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>Data gagal disimpan!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button></div>");
        }
        redirect('data_belajar');
    }

    public function do_upload() {
        $date = new DateTime();
        $file = $date->getTimestamp();
        // setting konfigurasi upload
        $config['upload_path'] = './assets/admin/pengumuman';
        $config['allowed_types'] = 'gif|jpg|jpeg|docx|pdf|png';
        $config['file_name'] = $file;
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('informasi')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data();
            $result1 =$result['file_name'];
    
            $informasi = $this->input->post('isi_pengumuman');
            
            $data = array(
                          //Disimpan nama file Gambar
                'judul'             => $this->input->post('judul'),
                'nik'          => $this->session->userdata('nik'),
                'tgl_buat'         => date("Y-m-d H:i:s"),
                'isi_pengumuman'   => $informasi,
                'id_sekolah'       => $this->session->userdata('id_sekolah'),
                'foto'             => $result1

            );
            
            $this->db->insert('pengumuman', $data);
            redirect('data_pengumuman');

        }

    }

    public function hapus_data_pengumuman($id_pengumuman)
    {
        $this->M_data_belajar->delete_belajar($id_pengumuman);
        redirect('data_pengumuman');
    }


    
}