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
                        <th>Subjek</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($bimbingan as $data): ?>
                    <tr>
                        <td> <?php echo ++$i; ?> </td>
                        <td> <?php $originalDate = $data->tgl_bim;
										$newDate = date("d M Y H:i ", strtotime($originalDate)); echo $newDate; ?> </td>
                        <td> <?php echo $data->subjek; ?> </td>
                        <td> <?php echo $data->isi_bim; ?> </td>
                        <td> <?php if($data->status_by_guru=='1'){echo 'Sudah dibaca';}else{echo 'Belum dibaca';} ; ?> </td>
                        <td><a href="<?php echo base_url('Siswa/bimbingan/room_bimbingan/'.$data->id_bimbingan) ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-eye"></i> Lihat</a> </td>
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