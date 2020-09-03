<?php foreach ($pengumuman as $pengumuman) { ?>
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


                        <!-- <img src="<?php echo base_url('assets/admin/pengumuman/' . $pengumuman->foto);?>" alt="About" width="475px" class="img img-responsive img-thumbnail"> -->
                    </div> <!-- single image -->
                </div> <!-- about image -->
            </div>
            <div class="col-lg-6">
                <div class="about-content mt-45">
               
                    <p class="mt-25"><?= $pengumuman['isi_pengumuman']; ?></p>
                        <a class="btn btn-primary" href="<?=base_url('users/detailPengumuman/' . $pengumuman['id_pengumuman'])?>">Komentar</a>

                       <!--  <div class="w3-panel w3-teal">
                            <p>Kolom Komentar:</p>
                        </div>
                        <form method="POST" action="<?php echo site_url('Komentar/kirimKomen') ?>">
                
                      <div class="form-row">
                        <div class="form-group col-sm-12">
                          <textarea rows="3" class="form-control"></textarea>
                      </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-sm-12" align="right">
                       <button class="btn btn-primary" type="submit">Kirim Komentar</button>
                   </div>
               </div>
           </form>
   
            <div class="w3-panel w3-pale-blue w3-leftbar w3-border-teal">
                <p>
                    <b>Ade Diana Apriliyani</b>
                    <br>Mantap Sekali Buuuuu
                    <br><button class="w3-button w3-tiny w3-teal">Balas</button>
                </p>
            </div>

            <div class="w3-panel w3-pale-blue w3-leftbar w3-border-teal child">
            <p>
                <b>Faiz Ramadhan</b>
                <br>Mantap Benerr
            </p>
        </div> -->
        </div>
    </div>
</div>
</div>
</section>
 <br>   
<?php } ?>
