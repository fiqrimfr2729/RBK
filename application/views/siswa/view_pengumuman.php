<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('siswa/_partials/head_siswa') ?>
  <body>

  <?php $this->load->view('siswa/_partials/navbar_siswa') ?>
  
    <!-- END nav -->
    

   <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
          	<p class="mb-5">
              <img src="<?php echo base_url('assets/admin/pengumuman/'.$pengumuman->foto)?>" alt="" class="img-fluid">
            </p>
            <h2 class="mb-3"><?php echo $pengumuman->judul ?></h2>
            
            <p><?php echo $pengumuman->isi_pengumuman ?></p>
            
            <div class="tag-widget post-tag-container mb-5 mt-5">
              
            </div>
            

            <div class="pt-5 mt-5">
              <h3 class="mb-5"><?php echo $pengumuman->jumlah_komentar ?> Komentar</h3>
              <ul class="comment-list">
                <?php foreach($komentar as $data): ?>
                <li class="comment">
                  <div class="vcard bio">
                    <img src="<?php echo base_url('assets/admin/user.png')?>" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?php if($data->nama_siswa != null){echo $data->nama_siswa;}else{echo $data->nama_guru;} ?></h3>
                    <div class="meta mb-3"><?php $originalDate = $data->tanggal;
                                                    $newDate = date("F d, Y h:i a", strtotime($originalDate)); echo $newDate; ?></div>
                    <p><?php echo $data->isi_komentar ?><p>
                  </div>
                </li>

                <?php endforeach; ?>


              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Tinggalkan Komentar</h3>
                <form action="<?php echo base_url('Siswa/Pengumuman/kirim_komentar'); ?>" class="p-5 bg-light" method="post">
                <input type="hidden"  name="id_pengumuman" value="<?php echo $pengumuman->id_pengumuman ?>" required="">    
                  <div class="form-group">
                    <label for="message">Isi Komentar</label>
                    <textarea name="isi_komentar" id="isi_komentar" cols="30" rows="5" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            
            
        </div>
      </div>
    </section> <!-- .section -->

    
    <?php $this->load->view('siswa/_partials/footer_siswa') ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <?php $this->load->view('siswa/_partials/js') ?>

  
    
  </body>
</html>