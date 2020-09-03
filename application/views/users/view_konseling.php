<link rel="icon" type="image/png" href="<?php echo base_url("assets/admin/") ?>img/logo.jpg" sizes="32x32" />
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-list font-dark"></i>
                    <span class="caption-subject bold uppercase">List Konseling</span>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                    <thead>
                        <tr>
                            <th class="">No.</th>
                            <!-- <th class="">Kategori Pelanggaran</th> -->
                            <th class="">Subjek Konseling</th>
                           <!--  <th class="">Skor (-)</th> -->
                            <th class="">Catatan</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_konseling as $konseling) { ?>
                            <tr>
                                <td>1.</td>
                                <!-- <td><?php echo $konseling['nama_kategori'] ?></td> -->
                                <td><?php echo $konseling['nama_pelanggaran'] ?></td>
                                <!-- <td><?php echo $konseling['bobot'] ?></td> -->
                                <td><?php echo $konseling['catatan'] ?></td>
                                <td align="center">
                                    <a href="javascript:;" data-toggle="modal" data-target="#detailKonseling<?php echo $konseling['id_konseling'] ?>" class="btn btn-info" style="margin-right: 10px">Lihat Detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<!-- Detail konseling Modal-->
<?php foreach ($data_konseling as $konseling) { ?>
  <div class="modal fade" id="detailKonseling<?php echo $konseling['id_konseling'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"><b>DETAIL KONSELING</b></h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" action="<?php echo base_url('data_konseling/edit_konseling/'.$konseling['id_konseling']); ?>" method="post">
              <!-- <div class="form-group">
                <label>Kategori Pelanggaran</label>
                <input type="text" class="form-control form-control" name="kategori_pelanggaran" placeholder="Tempat kejadian pelanggaran" autocomplete="off" required="" value="<?php echo $konseling['nama_kategori'] ?>" disabled="">
              </div> -->
              <div class="form-group">
                <label>Subjek Konseling</label>
                <input type="text" class="form-control form-control" name="nama_pelanggaran" placeholder="Tempat kejadian pelanggaran" autocomplete="off" required="" value="<?php echo $konseling['nama_pelanggaran'] ?>" disabled="">
              </div>
              <!-- <div class="form-group">
                <label>TKP</label>
                <input type="text" class="form-control form-control" name="tkp" placeholder="Tempat kejadian pelanggaran" autocomplete="off" required="" value="<?php echo $konseling['tkp'] ?>" disabled="">
              </div>
              <div class="form-group">
                <label>Tanggal Kejadian</label>
                <input type="text" placeholder="Tanggal kejadian" name="waktu_pelanggaran" class="form-control" required="" value="<?php echo $konseling['waktu_pelanggaran'] ?>" disabled="">
              </div> -->
              <div class="form-group">       
                <label><b><i>* Catatan</i></b></label>
                <textarea class="form-control" name="catatan" rows="8" disabled=""><?php echo $konseling['catatan'] ?></textarea>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>