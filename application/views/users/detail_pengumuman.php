<section id="about" class="about-area pt-80 pb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="about-image mt-50 clearfix">

          <div data-aos="fade-right" class="about-btn">
            <!-- <a class="main-btn" href="#"><span>27</span> Years Experience</a> -->
          </div>
          <br>
          <div class="single-image image-tow float-right">

            
            <?php
 //string yang akan dipecah
            $teks = $pengumuman['foto'];
 //pecah string berdasarkan string "," 
            $pecah = explode(".", $teks);
 //mencari element array 0
            $hasil = $pecah[1];
            ?>
           <?php if ($hasil=="jpg") { ?>

            
                        <img src="<?php echo base_url('assets/admin/pengumuman/' . $pengumuman['foto']);?>" alt="About" width="475px" class="img img-responsive img-thumbnail"> 

           <?php } elseif ($hasil=="png") { ?>
           <img src="<?php echo base_url('assets/admin/pengumuman/' . $pengumuman['foto']);?>" alt="About" width="475px" class="img img-responsive img-thumbnail"> 
           <?php } else { ?>
            <a href="<?=base_url('assets/admin/pengumuman/' . $pengumuman['foto'])?>" target="_blank"><img src="<?php echo base_url('assets/admin/pengumuman/IMG-20200303-WA0022.jpg');?>" alt="About" width="50px" class="img img-responsive img-thumbnail"> <?=$pengumuman['foto']?></a> 
         <?php } ?>
            <!-- <img src="<?php echo base_url('assets/admin/pengumuman/' . $pengumuman['foto']);?>" alt="About" width="475px" class="img img-responsive img-thumbnail"> -->
          </div> <!-- single image -->
        </div> <!-- about image -->
      </div>
      <div class="col-lg-6">
        <div class="about-content mt-45">
          <h3 class="about-title mt-10"><?=$pengumuman['isi_pengumuman']?></h3>
          <!-- <p class="mt-25">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages
            <br> <br>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> -->
            <!-- <a class="btn btn-primary" href="<?=base_url('users/detailPengumuman')?>">Komentar</a> -->
            <hr style="width: 10px;"> 
           <div class="alert alert-success" role="alert">
            <!-- <b><p style="color: black; font-size: 16px;" align="center">Komentar </p></b> -->
            <?php foreach ($komentar as $komentar) { ?>
              <?php if ($komentar->id_pengumuman == $pengumuman['id_pengumuman']) { ?>
              <div class="w3-panel w3-pale-blue w3-leftbar w3-border-teal">
              <p style="color: grey;">
                <b style="color: black;"><?=$komentar->nama_lengkap?></b>
                <br><?=$komentar->isi_komentar?>
                 <p style="font-size: 10px;"><?=$komentar->created_at?></p>
              </p>

            </div>
          
            <?php } ?>
            <?php } ?>
            
           
          </div>
            <div class="w3-panel w3-teal">
              <p>Kolom Komentar:</p>
            </div>
            <form method="POST" action="<?php echo site_url('Komentar/kirimKomen/' . $pengumuman['id_pengumuman'])?>">
              <input type="hidden" name="id_pengumuman" value="<?=$pengumuman['id_pengumuman']?>">
              <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
              <div class="form-row">
                <div class="form-group col-sm-12">
                  <textarea rows="3" class="form-control" name="isi_komentar"></textarea>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-sm-12" align="right">
                 <button class="btn btn-primary" type="submit">Kirim Komentar</button>
               </div>
             </div>
           </form>

           
         </div>
       </div>
     </div>
   </div>
 </section>
 <br>   

