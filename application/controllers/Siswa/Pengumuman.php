<?php
class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
        if($this->session->userdata('level') != 'siswa'){
            redirect(base_url("/Login"));
        }else{
            $this->load->model('M_data_master');
            $this->load->model('M_data_absensi');        
            $this->load->model('M_data_konseling');
            $this->load->model('M_data_users');
        }
       
	}

	public function pengumuman($id_pengumuman){
		$data['menu'] = 'pengumuman';
        $data['komentar'] = $this->M_data_users->get_komentar($id_pengumuman);
        $data['pengumuman'] = $this->M_data_users->get_pengumuman_by_id($id_pengumuman);
        //echo var_dump($data['komentar']);
        $this->load->view('siswa/view_pengumuman', $data);
    }

	public function detail_pengumuman($id_pengumuman){
		$data['menu'] = 'pengumuman';
		$data['komentar'] = $this->M_data_users->get_komentar($id_pengumuman);
        $data['pengumuman'] = $this->M_data_users->get_pengumuman_by_id($id_pengumuman);
        //echo var_dump($data['komentar']);
        $this->load->view('siswa/view_pengumuman', $data);
	}

	public function kirim_komentar() {
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
		redirect('Siswa/Pengumuman/detail_pengumuman/' . $id_pengumuman);
	}


	function kategori($slug){
		$data=$this->m_tulisan->get_kategori_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kategori=$q['kategori_id'];
			$jum=$this->m_tulisan->blog_perkategori_id($kategori);
	        $page=$this->uri->segment(4);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=15;
	        $config['base_url'] = base_url() . 'blog/kategori/'.$slug.'/';
	        $config['total_rows'] = $jum->num_rows();
	        $config['per_page'] = $limit;
	        $config['uri_segment'] = 4;
	        $config['first_link'] = 'Awal';
	        $config['last_link'] = 'Akhir';
	        $config['next_link'] = 'Next >>';
	        $config['prev_link'] = '<< Prev';
	        $this->pagination->initialize($config);
	        $x['page'] =$this->pagination->create_links();
			$x['data']=$this->m_tulisan->blog_perkategori_perpage_id($kategori,$offset,$limit);
			$x['kategori']=$this->m_tulisan->get_all_kategori_id();
			$x['judul']="Artikel ".$slug;
			$this->load->view('depan/v_blog',$x);
		}else{
			redirect('artikel');
		}
	}

	function detail($slug){
		    $data=$this->m_tulisan->get_berita_by_slug_id($slug);
		    if($data->num_rows() > 0){
		        $q=$data->row_array();
    			$kode=$q['tulisan_id'];
    			$this->m_tulisan->count_views($kode);
    			$x['data']=$this->m_tulisan->get_blog_by_kode($kode);
    			//$x['show_komentar']=$this->m_tulisan->show_komentar_by_tulisan_id($kode);
    			//$x['jumlah_komen']=$this->m_tulisan->count_komentar($kode)->num_rows();
    			$x['jum_views']=$this->m_tulisan->jum_views($kode);
    			//$x['lates_post']=$this->m_tulisan->post_terbaru();
    			//$x['kategori']=$this->m_kategori->get_all_kategori();
    			$this->load->view('frontend/blog_detail_view',$x);
		    }else{
		        redirect('blog');
		    }
			
		
	}

	function search_blog(){
		 if (isset($_GET['term'])) {
		  $result = $this->m_tulisan->search_blog($_GET['term']);
		   if (count($result) > 0) {
		    foreach ($result as $pr)
		     $arr_result[] = $pr->tulisan_judul;
		     echo json_encode($arr_result);
		   }
		 }
	}


	function cari_blog(){
		
        $judul=strip_tags(str_replace("'", "", $this->input->post('tulisan_judul')));
		$jum=$this->m_tulisan->cari_blog($judul);
		if($jum->num_rows()>0){
			$page=$this->uri->segment(3);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=15;
	        $config['base_url'] = base_url() . 'blog/cari_blog/';
	        $config['total_rows'] = $jum->num_rows();
	        $config['per_page'] = $limit;
	        $config['uri_segment'] = 3;
	        $config['first_link'] = 'Awal';
	        $config['last_link'] = 'Akhir';
	        $config['next_link'] = 'Next >>';
	        $config['prev_link'] = '<< Prev';
	        $this->pagination->initialize($config);
	        $x['page'] =$this->pagination->create_links();
			$x['data']=$this->m_tulisan->cari_blog_perpage($offset,$limit,$judul);
			$x['judul']="Pencarian ".$judul;
			$x['kategori']=$this->m_tulisan->get_all_kategori_id();
			$this->load->view('depan/v_blog',$x);
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger"> Artikel Yang Anda Cari Tidak Ditemukan. Silahkan cek kembali keyword Anda!</div>');
			redirect('artikel');
		}
		
	}

	function filter(){
		$kategori=$this->input->post('kategori');
		if(!empty($kategori)){
			$this->session->set_userdata('kategori',$kategori);
			redirect('blog/kategori/'.$kategori);
		}else{
			$this->session->unset_userdata('kategori');
			redirect('artikel');
		}
	}

	function filters(){
		$kategori=$this->input->post('kategori');
		if(!empty($kategori)){
			$this->session->set_userdata('kategori',$kategori);
			redirect('blog/categories/'.$kategori);
		}else{
			$this->session->unset_userdata('kategori');
			redirect('articles');
		}
	}


}