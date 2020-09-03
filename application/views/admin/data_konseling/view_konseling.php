<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Konseling</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Konseling Siswa</h6>
    <a href="javascript:;" class="btn btn-info float-right" data-toggle="modal" data-target="#tambahKonseling">Tambah Konseling</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Status</th>
            <th width="30%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_konseling as $konseling) { ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $konseling['NIS'] ?></td>

              <?php
                
                foreach ($data_siswa as $siswa) {
                  if ($siswa['NIS']==$konseling['NIS']) { ?>
                    
                    <td><?php echo $siswa['nama_lengkap'] ?></td>
                    <td> 
                      <?php
                        foreach ($data_kelas as $kelas) {
                          if ($siswa['id_kelas']==$kelas['id_kelas']) {
                            echo $kelas['tingkatan'].' '.$kelas['nama_jurusan'].' '.$kelas['urutan_kelas'];
                          } 
                        }
                      ?>
                    </td>

              <?php } } ?>
              
              <td align="center"><?php if ($konseling['status']==0) {
                echo "Belum Dibaca";
              } else {echo "Sudah Dibaca";} ?></td>
              <td align="center">
                <a href="javascript:;" data-toggle="modal" data-target="#detailKonseling<?php echo $konseling['id_konseling'] ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-search"></i> Detail</a>
                <a href="javascript:;" data-toggle="modal" data-target="#editKonseling<?php echo $konseling['id_konseling'] ?>" class="btn btn-warning" style="margin-right: 10px"><i class="fas fa-edit"></i> Ubah</a>
                  <!-- <a href="javascript:;" data-toggle="modal" data-target="#hapusKonseling<?php echo $konseling['id_konseling'] ?>" class="btn btn-danger">Delete</a> -->
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Add konseling Modal-->
<div class="modal fade" id="tambahKonseling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Konseling</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="user" action="<?php echo base_url('data_konseling/add_konseling'); ?>" method="post">
            <div class="form-group">
              <label>Nama Siswa</label>
              <select name="nis" class="form-control">
                <option selected="" disabled="">--Pilih Nama Siswa--</option>
                <?php foreach ($data_siswa as $siswa) { ?>
                  <option value="<?php echo $siswa['NIS'] ?>"><?php echo $siswa['nama_lengkap'] ?> <!-- - Skor kredit [<?php echo $siswa['skor'] ?> -->]</option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Subjek Konseling</label>
              <select name="pelanggaran" class="form-control">
                <option selected="" disabled="">--Pilih Subjek Konseling--</option>
                <?php foreach ($data_pelanggaran as $pelanggaran) { ?>
                  <option value="<?php echo $pelanggaran['id_pelanggaran'] ?>"><?php echo $pelanggaran['nama_pelanggaran'] ?> <!-- [bobot:<?php echo $pelanggaran['bobot'] ?>] --></option>
                <?php } ?>
              </select>
            </div>
            <!-- <div class="form-group">
              <label>TKP</label>
              <input type="text" class="form-control form-control" name="tkp" placeholder="Tempat Kejadian Pelanggaran" autocomplete="off" required="">
            </div>
            <div class="form-group">
              <label>Tanggal Kejadian</label>
              <input type="date" placeholder="Tanggal kejadian" name="waktu_pelanggaran" class="form-control" required="">
            </div> -->
            <div class="form-group">       
              <label><b><i>* Catatan</i></b></label>
              <textarea class="form-control" name="catatan" rows="8"></textarea>
            </div>
            <button type="submit" class="btn bg-info btn-user btn-block"><font color="white">
              Simpan </font>
            </button>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Detail konseling Modal-->
<?php foreach ($data_konseling as $konseling) { ?>
  <div class="modal fade" id="detailKonseling<?php echo $konseling['id_konseling'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Konseling</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" action="<?php echo base_url('data_konseling/edit_konseling/'.$konseling['id_konseling']); ?>" method="post">
              <div class="form-group">
                <label>Nama Siswa</label>
                <select name="nis" class="form-control" disabled="">
                  <?php foreach ($data_siswa as $siswa) { ?>
                    <option <?php if ($siswa['NIS']==$konseling['NIS']) {echo "selected";} ?> value="<?php echo $siswa['NIS'] ?>"><?php echo $siswa['nama_lengkap'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Subjek Konseling</label>
                <select name="pelanggaran" class="form-control" disabled="">
                  <?php foreach ($data_pelanggaran as $pelanggaran) { ?>
                    <option <?php if ($pelanggaran['id_pelanggaran']==$konseling['id_pelanggaran']) {echo "selected";} ?> value="<?php echo $pelanggaran['id_pelanggaran'] ?>"><?php echo $pelanggaran['nama_pelanggaran'] ?> <!-- [bobot:<?php echo $pelanggaran['bobot'] ?>] --></option>
                  <?php } ?>
                </select>
              </div>
              <!-- <div class="form-group">
                <label>TKP</label>
                <input type="text" class="form-control form-control" name="tkp" placeholder="Tempat kejadian pelanggaran" autocomplete="off" required="" value="<?php echo $konseling['tkp'] ?>" disabled="">
              </div>
              <div class="form-group">
                <label>Tanggal Kejadian</label>
                <input type="date" placeholder="Tanggal kejadian" name="waktu_pelanggaran" class="form-control" required="" value="<?php echo $konseling['waktu_pelanggaran'] ?>" disabled="">
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

<!-- Edit konseling Modal-->
<?php foreach ($data_konseling as $konseling) { ?>
  <div class="modal fade" id="editKonseling<?php echo $konseling['id_konseling'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Konseling</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" action="<?php echo base_url('data_konseling/edit_konseling/'.$konseling['id_konseling']); ?>" method="post">
              <div class="form-group">
                <label>Nama Siswa</label>
                <select name="nis" class="form-control">
                  <?php foreach ($data_siswa as $siswa) { ?>
                    <option <?php if ($siswa['NIS']==$konseling['NIS']) {echo "selected";} ?> value="<?php echo $siswa['NIS'] ?>"><?php echo $siswa['nama_lengkap'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Subjek Konseling</label>
                <select name="pelanggaran" class="form-control">
                  <?php foreach ($data_pelanggaran as $pelanggaran) { ?>
                    <option <?php if ($pelanggaran['id_pelanggaran']==$konseling['id_pelanggaran']) {echo "selected";} ?> value="<?php echo $pelanggaran['id_pelanggaran'] ?>"><?php echo $pelanggaran['nama_pelanggaran'] ?> <!-- [bobot:<?php echo $pelanggaran['bobot'] ?>] --></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
              <!--   <label>TKP</label>
                <input type="text" class="form-control form-control" name="tkp" placeholder="Tempat Kejadian Pelanggaran" autocomplete="off" required="" value="<?php echo $konseling['tkp'] ?>">
              </div>
              <div class="form-group">
                <label>Tanggal Kejadian</label>
                <input type="date" placeholder="Tanggal kejadian" name="waktu_pelanggaran" class="form-control" required="" value="<?php echo $konseling['waktu_pelanggaran'] ?>">
              </div> -->
              <div class="form-group">       
                <label><b><i>* Catatan</i></b></label>
                <textarea class="form-control" name="catatan" rows="8"><?php echo $konseling['catatan'] ?></textarea>
              </div>
              <button type="submit" class="btn bg-info btn-user btn-block"><font color="white">
                Simpan </font>
              </button>
            </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Delete konseling Modal-->
<?php foreach ($data_konseling as $konseling) { ?>
  <div class="modal fade" id="hapusKonseling<?php echo $konseling['id_konseling'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this data?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Click yes if you sure</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('data_konseling/delete_konseling/'.$konseling['id_konseling']) ?>">Yes!</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>