<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pelanggaran</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Pelanggaran</h6>
    <a href="javascript:;" class="btn btn-info float-right" data-toggle="modal" data-target="#tambahPelanggaran">Tambah Data</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>Nama Pelanggaran</th>
            <th>Ketegori Pelanggaran</th>
            <th>Bobot</th>
            <th width="30%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_pelanggaran as $pelanggaran) { ?>
            <tr>
              <td align="center"><?php echo $no++ ?></td>
              <td><?php echo $pelanggaran['nama_pelanggaran'] ?></td>

              <?php
                
                foreach ($data_kategori as $kategori) {
                  if ($kategori['id_kategori']==$pelanggaran['id_kategori']) { ?>
                    
                    <td><?php echo $kategori['nama_kategori'] ?></td>

              <?php } } ?>
              
              <td><?php echo $pelanggaran['bobot'] ?></td>
              <td align="center">
                <a href="javascript:;" data-toggle="modal" data-target="#editPelanggaran<?php echo $pelanggaran['id_pelanggaran'] ?>" class="btn btn-warning" style="margin-right: 10px"><i class="fas fa-edit"></i> Ubah</a>
                  <a href="javascript:;" data-toggle="modal" data-target="#hapusPelanggaran<?php echo $pelanggaran['id_pelanggaran'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Tambah pelanggaran Modal-->
<div class="modal fade" id="tambahPelanggaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggaran</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="user" action="<?php echo base_url('data_pelanggaran/add_pelanggaran'); ?>" method="post">
            <div class="form-group">
              <label>Kategori Pelanggaran</label>
              <select name="kategori" class="form-control">
                <option selected="" disabled="">-- Pilih Kategori --</option>
                option
                <?php foreach ($data_kategori as $kategori) { ?>
                  <option value="<?php echo $kategori['id_kategori'] ?>"><?php echo $kategori['nama_kategori'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Pelanggaran</label>
              <input type="text" class="form-control form-control" name="pelanggaran" placeholder="Masukkan nama pelanggaran" autocomplete="off" required="">
            </div>
            <div class="form-group">
              <label>Bobot Skor Pelanggaran</label>
              <input type="number" class="form-control form-control" name="bobot" placeholder="Masukkan bobot pelanggaran" autocomplete="off" required="">
            </div>
            <button type="submit" class="btn bg-info btn-user btn-block"><font color="white">
              Simpan </font>
            </button>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit pelanggaran Modal-->
<?php foreach ($data_pelanggaran as $pelanggaran) { ?>
  <div class="modal fade" id="editPelanggaran<?php echo $pelanggaran['id_pelanggaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah pelanggaran</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" action="<?php echo base_url('data_pelanggaran/edit_pelanggaran/'.$pelanggaran['id_pelanggaran']); ?>" method="post">
              <div class="form-group">
              <label>Kategori pelanggaran</label>
                <select name="kategori" class="form-control">
                  <option selected="" disabled="">-- Please select --</option>
                  <?php foreach ($data_kategori as $kategori) { ?>
                    <option <?php if ($kategori['id_kategori']==$pelanggaran['id_kategori']) {echo"selected";} ?> value="<?php echo $kategori['id_kategori'] ?>"><?php echo $kategori['nama_kategori'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama pelanggaran</label>
                <input type="text" class="form-control form-control" name="pelanggaran" placeholder="Nama pelanggaran" autocomplete="off" required="" value="<?php echo $pelanggaran['nama_pelanggaran'] ?>">
              </div>
              <div class="form-group">
                <label>Bobot skor pelanggaran</label>
                <input type="number" class="form-control form-control" name="bobot" placeholder="Bobot pelanggaran" autocomplete="off" required="" value="<?php echo $pelanggaran['bobot'] ?>">
              </div>
              <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
                Save </font>
              </button>
            </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Delete pelanggaran Modal-->
<?php foreach ($data_pelanggaran as $pelanggaran) { ?>
  <div class="modal fade" id="hapusPelanggaran<?php echo $pelanggaran['id_pelanggaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="<?php echo base_url('data_pelanggaran/delete_pelanggaran/'.$pelanggaran['id_pelanggaran']) ?>">Yes!</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>