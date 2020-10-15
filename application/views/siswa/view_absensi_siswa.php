<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('siswa/_partials/head_siswa') ?>
  <body>
    
  <?php $this->load->view('siswa/_partials/navbar_siswa') ?>
  
    <!-- END nav -->
    

   <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
            
          <div class="col-lg-12 ftco-animate">
    
            <h2 class="mb-3"><?php echo "Data Absensi ". $siswa->nama_siswa; ?></h2>
            <a href="<?php echo base_url('Siswa/absensi/detail_absensi'); ?>" class="btn btn-info float-right"> <i class="fas fa-list"> </i> Detail Lengkap  </a>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hadir</td>
                        <td><h3 class="text-dark font-16 font-weight-medium" style="font-size: 20px;"><span class="badge badge-pill badge-success"><?php echo $absensi['hadir']; ?></span></h3></td>
                        
                    </tr>
                    <tr>
                        <td>Sakit</td>
                        <td><h3 class="text-dark font-16 font-weight-medium" style="font-size: 20px;"><span class="badge badge-pill badge-secondary"><?php echo $absensi['sakit']; ?></span></h3></td>
                        
                    </tr>
                    <tr>
                        <td>Izin</td>
                        <td><h3 class="text-dark font-16 font-weight-medium" style="font-size: 20px;"><span class="badge badge-pill badge-warning"><?php echo $absensi['izin']; ?></span></h3></td>
                        
                    </tr>
                    <tr>
                        <td>Tanpa Keterangan</td>
                        <td><h3 class="text-dark font-16 font-weight-medium" style="font-size: 20px;"><span class="badge badge-pill badge-danger"><?php echo $absensi['absen']; ?></span></h3></td>
                        
                    </tr>
 
                </tbody>
            </table>


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

  <?php $this->load->view('siswa/_partials/js') ?>

  
    
  </body>
</html>