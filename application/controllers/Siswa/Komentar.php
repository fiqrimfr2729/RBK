<?php
class Komentar extends CI_Controller {

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

    public function index() {
        $this->load->view('view_komentar');
    }

    public function kirimKomen($id_pengumuman) {
		$id_pengumuman = $this->input->post('id_pengumuman');
		$id_user = $this->input->post('id_user');
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
		redirect('users/detailPengumuman/' . $id_pengumuman);
	}

	public function balasKomen() {
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$isi_komentar = $this->input->post('isi_komentar');
		$this->db->query("INSERT INTO tbl_komen VALUES('','$id','$nama','$email','$isi_komentar')");
		redirect('','refresh');
	}

}