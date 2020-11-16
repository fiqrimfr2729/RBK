<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('siswa/_partials/head_siswa') ?>
  	<body>
	  <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Bimbingan <i>Konseling</i></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="<?php echo base_url('Siswa/absensi'); ?>" class="nav-link">Absensi</a></li>
	          <li class="nav-item"><a href="<?php echo base_url('Siswa/bimbingan'); ?>" class="nav-link">Bimbingan</a></li>
	          <li class="nav-item"><a href="<?php echo base_url('Siswa/dashboard/logout'); ?>" class="nav-link">Logout</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
  
	  
    <!-- END nav -->
    
    <div class="hero-wrap " data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate">
			  <h2 class="subheading">Selamat Datang <?php echo $siswa->nama_siswa ?></h2>
			  <div class="mouse">
					<a href="" class="mouse-icon">
						<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
					</a>
				</div>
          	<h1 class="mb-4 mb-md-0"><?php echo $sekolah ?></h1>
          	<div class="row">
          		<div class="col-md-7">
          			
          		</div>
          	</div>
          </div>
        </div>
      </div>
    </div>

   	<section class="ftco-section">
   		<div class="container">
   			<div class="row">
   				<div class="col-md-12">

                   <?php foreach($pengumuman as $data): ?>

   					<div class="case">
   						<div class="row">
   							<div class="col-md-6 col-lg-6 col-xl-8 d-flex">
   								<a href="<?php echo base_url('Siswa/Pengumuman/detail_pengumuman/'.$data->id_pengumuman)?>" class="img w-100 mb-3 mb-md-0" style="background-image: url(<?php echo base_url('assets/admin/pengumuman/'.$data->foto)?>);"></a>
   							</div>
   							<div class="col-md-6 col-lg-6 col-xl-4 d-flex">
   								<div class="text w-100 pl-md-3">
                                    <span class="subheading">pengumuman</span>
   									<h2><a href="<?php echo base_url('Siswa/Pengumuman/detail_pengumuman/'.$data->id_pengumuman)?>"><?php echo $data->judul ?></a></h2>
   									
   									<div class="meta">
   										<p class="mb-0"><a href="#"><?php $originalDate = $data->tgl_buat;
										$newDate = date("F d, Y h:i a", strtotime($originalDate)); echo $newDate; ?></a> | <a href="#"><?php echo $data->jumlah_komentar. ' Komentar'  ?></a></p>
   									</div>
   								</div>
   							</div>
   						</div>
   					</div>
                    
                   <?php endforeach; ?>
   					
   					
   				</div>
   			</div>
   			<div class="row mt-5">
          <div class="col text-center">
            
          </div>
        </div>
   		</div>
   	</section>

    
    <?php $this->load->view('siswa/_partials/footer_siswa') ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php $this->load->view('siswa/_partials/js') ?>
    
  </body>
</html>