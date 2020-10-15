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
    
            <h2 class="mb-3"><?php echo "Data Bimbingan ". $siswa->nama_siswa; ?></h2>
            <a href="javascript:;" data-toggle="modal" data-target="#tambahBimbingan" class="btn btn-success float-right"> <i class="fas fa-plus"> </i> Bimbingan  </a>
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
                        <td> <?php echo $data->subject; ?> </td>
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

  <!-- Add bimbingan Modal-->
  <div class="modal fade" id="tambahBimbingan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"><b>KIRIM BIMBINGAN</b></h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user" action="<?php echo base_url('Siswa/bimbingan/create_bimbingan'); ?>" method="post">
            <div class="form-group">
              <label>Subjek Bimbingan</label>
              <select name="subjek" class="form-control" required>
                  <option selected="" disabled="">-- Pilih Subjek --</option>
                  <option value="Pribadi">Pribadi</option>
                  <option value="Sosial">Sosial</option>
                  <option value="Karir">Karir</option>
                  <option value="Belajar">Belajar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Isi Bimbingan</label>
              <textarea class="form-control" name="isi_bimbingan" placeholder="Tuliskan bmbingan yang ingin anda sampaikan" rows="10" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-success" style="width: 100%"> Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('siswa/_partials/js') ?>

  
    
  </body>
</html>