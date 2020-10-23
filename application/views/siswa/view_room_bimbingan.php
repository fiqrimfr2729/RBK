<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('siswa/view_bimbingan/head_bimbingan') ?>
  <body>
    
  <?php $this->load->view('siswa/_partials/navbar_siswa') ?>
  
    <!-- END nav -->
    

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
            
          <div class="col-lg-12 ftco-animate">
            
            
            <div id="frame">
	
	<div class="content">
		<div class="contact-profile">
			<img src=" <?php echo base_url ('assets/admin/user.png')?>" alt="" />
			<p><?php echo $guru->nama_guru; ?></p>
			
		</div>
		<div class="messages">
			<ul>
      <?php foreach($isi_bimbingan as $data): ?>
				<li class="<?php if($data['idFrom'] == $data_bimbingan->nis){echo "sent";}else{
					echo "replies";
				} ?>">
					<img src="<?php echo base_url ('assets/admin/user.png')?>" alt="" />
					<p><?php echo $data['content'] ?></p>
				</li>
				<?php endforeach; ?>
			
			</ul>
		</div>

		<div class="message-input">
			<div class="wrap">
      <form action="<?php echo base_url('Siswa/bimbingan/kirim_bimbingan'); ?>" method="post">
        <input type="text" name="isi_bimbingan" placeholder="Ketik bimbingan anda....." required autocomplete="off" />
        <input type="hidden" name="nik" value='<?php echo $guru->nik; ?>'/>
        <input type="hidden" name="id_bimbingan" value='<?php echo $data_bimbingan->id_bimbingan; ?>'/>
        <!-- <i class="fa fa-paperclip attachment" aria-hidden="true"></i> -->
        <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
      </form>
			</div>
		</div>
	</div>
</div>
            
            <p><?php  ?></p>
            
            <div class="tag-widget post-tag-container mb-5 mt-5">
              
            </div>
            

            

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            
            
        </div>
      </div>
    </section> <!-- .section -->


    
    <?php $this->load->view('siswa/_partials/footer_siswa') ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <?php $this->load->view('siswa/view_bimbingan/js_bimbingan') ?>

  
    
  </body>
</html>