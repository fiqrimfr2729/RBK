<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Sekolah</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data  Jurusan</h6>
      <?php if ($this->session->userdata('level') == "admin") { ?>
      <a href="javascript:;" class="btn btn-info float-right" data-toggle="modal" data-target="#tambahJurusan">Tambah Jurusan</a>
       <?php } ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>Nama Jurusan</th>
            <th>Singkatan Jurusan</th>
            <?php if ($this->session->userdata('level') == "admin") { ?>
              <th width="30%">Aksi</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_jurusan as $jurusan) { ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td align="center"><?php echo $jurusan['nama_jurusan'] ?></td>
              <td align="center"><?php echo $jurusan['singkatan_jurusan'] ?></td>
               <?php if ($this->session->userdata('level') == "admin") { ?>
              <td align="center">
                <a href="" data-toggle="modal" data-target="#editJurusan<?php echo $jurusan['id_jurusan'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <a href="" data-toggle="modal" data-target="#hapusJurusan<?php echo $jurusan['id_jurusan'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
              </td>
                  <?php } ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Add Jurusan Modal-->
<div class="modal fade" id="tambahJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="user" action="<?php echo base_url('jurusan/add_jurusan'); ?>" method="post">
            <div class="form-group">
              <label>Nama Jurusan</label>
              <input type="text" class="form-control form-control" name="jurusan" placeholder="Masukkan nama jurusan" autocomplete="off" required="">
            </div>
            <div class="form-group">
              <label>Singkatan Jurusan</label>
              <input type="text" class="form-control form-control" name="singkatan" placeholder="Masukkan nama jurusan" autocomplete="off" required="">
            </div>
            <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">Simpan </font>
            </button>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Jurusan Modal-->
<?php foreach ($data_jurusan as $jurusan) { ?>
  <div class="modal fade" id="editJurusan<?php echo $jurusan['id_jurusan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Jurusan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" action="<?php echo base_url('jurusan/edit_jurusan/'.$jurusan['id_jurusan']); ?>" method="post">
              <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" class="form-control form-control" name="jurusan" placeholder="Nama jurusan" autocomplete="off" value="<?php echo $jurusan['nama_jurusan'] ?>" required="">
              </div>
              <div class="form-group">
              <label>Singkatan Jurusan</label>
              <input type="text" class="form-control form-control" name="singkatan" placeholder="Masukkan nama jurusan" value="<?php echo $jurusan['singkatan_jurusan'] ?>" autocomplete="off" required="">
            </div>
              <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
                Simpan </font>
              </button>
            </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Delete Jurusan Modal-->
<?php foreach ($data_jurusan as $jurusan) { ?>
  <div class="modal fade" id="hapusJurusan<?php echo $jurusan['id_jurusan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik Ya jika anda yakin</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?php echo base_url('jurusan/delete_jurusan/'.$jurusan['id_jurusan']) ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>