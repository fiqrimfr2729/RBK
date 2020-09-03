<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-list font-dark"></i>
                    <span class="caption-subject bold uppercase">List Bimbingan</span>
                </div>
                <div class="pull-right">
                    <a href="javascript:;" data-toggle="modal" data-target="#tambahBimbingan" class="btn btn-primary">Kirim Bimbingan</a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                    <thead>
                        <tr>
                            <th class="">No</th>
                            <th class="">Subjek</th>
                            <th class="">Isi Bimbingan</th>
                            <th class="">Tanggal Bimbingan</th>
                            <th class="">Status</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_bimbingan as $bimbingan) { ?>
                            <tr>
                                <td>1.</td>
                                <td><?php echo $bimbingan['subjek'] ?></td>
                                <td><?php echo $bimbingan['isi_bimbingan'] ?></td>
                                <td><?php echo $bimbingan['tanggal_bimbingan'] ?></td>
                                <td><?php if($bimbingan['status']==0 || $bimbingan['status']==1){echo"belum dibalas";}else{echo "sudah dibalas";} ?></td>
                                <td align="center">
                                    <a href="javascript:;" data-toggle="modal" data-target="#balasanBimbingan<?php echo $bimbingan['id_bimbingan'] ?>" class="btn btn-info">Lihat Balasan</a>
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
        <form class="user" action="<?php echo base_url('Users/kirim_bimbingan'); ?>" method="post">
          <div class="form-group">
            <label>Subjek Bimbingan</label>
            <select name="subjek" class="form-control">
                <option selected="" disabled="">-- Pilih Subjek --</option>
                <option value="pribadi">Pribadi</option>
                <option value="sosial">Sosial</option>
                <option value="karir">Karir</option>
                <option value="belajar">Belajar</option>
            </select>
          </div>
          <div class="form-group">
            <label>Isi Bimbingan</label>
            <textarea class="form-control" name="isi_bimbingan" placeholder="Tuliskan bmbingan yang ingin anda sampaikan" rows="10" required=""></textarea>
          </div>
          <button type="submit" class="btn btn-success" style="width: 100%"> Kirim
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php foreach ($data_bimbingan as $bimbingan) { ?>
<!-- lihat balasan bimbingan Modal-->
<div class="modal fade" id="balasanBimbingan<?php echo $bimbingan['id_bimbingan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><b>DETAIL BIMBINGAN</b></h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?php echo base_url('Users/kirim_bimbingan'); ?>" method="post">
          <div class="form-group">
            <label>Subjek Bimbingan</label>
            <input type="text" value="<?php echo $bimbingan['subjek'] ?>" disabled="" class="form-control">
          </div>
          <div class="form-group">
            <label>Tanggal Bimbingan</label>
            <input type="text" value="<?php echo $bimbingan['tanggal_bimbingan'] ?>" disabled="" class="form-control">
          </div>
          <div class="form-group">
            <label>Isi Bimbingan</label>
            <textarea class="form-control" name="isi_bimbingan" placeholder="Tuliskan bmbingan yang ingin anda sampaikan" rows="10" required="" disabled=""><?php echo $bimbingan['isi_bimbingan'] ?></textarea>
          </div>
          <?php if (!empty($bimbingan['isi_balasan'])) {?>
              <div class="form-group">
                <label>Isi Balasan</label>
                <textarea class="form-control" name="isi_bimbingan" placeholder="Tuliskan bmbingan yang ingin anda sampaikan" rows="10" required="" disabled=""><?php echo $bimbingan['isi_balasan'] ?></textarea>
              </div>
          <?php } else { ?>
            <h5><i>belum dibalas</i></h5><br><br>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>