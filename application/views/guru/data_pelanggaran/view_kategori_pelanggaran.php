<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Kategori Pelanggaran</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Kategori Pelanggaran</h6>
    <a href="javascript:;" class="btn btn-info float-right" data-toggle="modal" data-target="#tambahKategori">Tambah Kategori</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>Kategori Pelanggaran</th>
            <th width="30%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_kategori as $kategori) { ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $kategori['nama_kategori'] ?></td>
              <td align="center">
                <a href="javascript:;" data-toggle="modal" data-target="#editKategori<?php echo $kategori['id_kategori'] ?>" class="btn btn-warning" style="margin-right: 10px"><i class="fas fa-edit"></i> Ubah</a>
                  <a href="javascript:;" data-toggle="modal" data-target="#hapusKategori<?php echo $kategori['id_kategori'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Tambah Kategori Modal-->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="user" action="<?php echo base_url('data_pelanggaran/add_kategori'); ?>" method="post">
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" class="form-control form-control" name="kategori" placeholder="Masukkan nama kategori" autocomplete="off" required="">
            </div>
            <button type="submit" class="btn bg-info btn-user btn-block"><font color="white">
              Simpan </font>
            </button>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Kategori Modal-->
<?php foreach ($data_kategori as $kategori) { ?>
  <div class="modal fade" id="editKategori<?php echo $kategori['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kelola Kategori</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" action="<?php echo base_url('data_pelanggaran/edit_kategori/'.$kategori['id_kategori']); ?>" method="post">
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control form-control" name="kategori" placeholder="Nama kategori" autocomplete="off" value="<?php echo $kategori['nama_kategori'] ?>" required="">
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

<!-- Delete Kategori Modal-->
<?php foreach ($data_kategori as $kategori) { ?>
  <div class="modal fade" id="hapusKategori<?php echo $kategori['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger" href="<?php echo base_url('data_pelanggaran/delete_kategori/'.$kategori['id_kategori']) ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>