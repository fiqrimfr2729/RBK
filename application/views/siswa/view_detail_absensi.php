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
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($absensi as $data): ?>
                    <tr> 
                        <td><?php echo ++$i ?></td>
                        <td><?php echo $data->tanggal ?></td>
                        <?php if($data->keterangan == 'H'): ?>
                        <td><h3 class="text-dark font-16 font-weight-medium" style="font-size: 20px;"><span class="badge badge-pill badge-success"><?php echo "Hadir"; ?></span></h3></td> 
                        <?php elseif($data->keterangan == 'S'): ?>
                        <td><h3 class="text-dark font-16 font-weight-medium" style="font-size: 20px;"><span class="badge badge-pill badge-warning"><?php echo "Sakit"; ?></span></h3></td> 
                        <?php elseif($data->keterangan == 'I'): ?>
                        <td><h3 class="text-dark font-16 font-weight-medium" style="font-size: 20px;"><span class="badge badge-pill badge-secondary"><?php echo "Izin"; ?></span></h3></td> <td><h3 class="text-dark font-16 font-weight-medium" style="font-size: 20px;"><span class="badge badge-pill badge-secondary"><?php echo "Izin"; ?></span></h3></td> 
                        <?php elseif($data->keterangan == 'A'): ?>
                        <td><h3 class="text-dark font-16 font-weight-medium" style="font-size: 20px;"><span class="badge badge-pill badge-danger"><?php echo "Absen"; ?></span></h3></td> 
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
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