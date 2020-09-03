<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data absensi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data absensi Kelas</h6>
    <a href="javascript:;" class="btn btn-info float-right" data-toggle="modal" data-target="#tambahKelas">Tambah Kelas</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>Nama Kelas</th>
            <th width="30%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_kelas as $kelas) { ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $kelas['tingkatan'].' '.$kelas['nama_jurusan'].' '.$kelas['urutan_kelas']; ?></td>
              <td align="center">
                <a href="javascript:;" data-toggle="modal" data-target="#editKelas<?php echo $kelas['id_kelas'] ?>" class="btn btn-warning" style="margin-right: 10px"><i class="fas fa-edit"></i> Ubah</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Add kelas Modal-->
<div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?php echo base_url('data_absensi/add_kelas'); ?>" method="post">
          <div class="form-group">
            <label>Tingkatan Kelas</label>
            <select name="tingkatan" class="form-control">
              <option selected="" disabled="">-- Silahkan Pilih --</option>
              <?php foreach ($data_tingkatan as $tingkatan) { ?>
                <option value="<?php echo $tingkatan['id_tingkatan'] ?>"><?php echo $tingkatan['tingkatan'] ?> - <?php echo $tingkatan['nama_tingkatan'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control">
              <option selected="" disabled="">-- Silahkan Pilih --</option>
              <?php foreach ($data_jurusan as $jurusan) { ?>
                <option value="<?php echo $jurusan['id_jurusan'] ?>"><?php echo $jurusan['nama_jurusan'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Urutan Kelas</label>
            <input type="text" class="form-control form-control" name="urutan" placeholder="masukkan urutan kelas" autocomplete="off" required="">
          </div>
          <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
            Simpan </font>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit kelas Modal-->
<?php foreach ($data_kelas as $kelas) { ?>
  <div class="modal fade" id="editKelas<?php echo $kelas['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" action="<?php echo base_url('data_absensi/edit_kelas/'.$kelas['id_kelas']); ?>" method="post">
              <div class="form-group">
                <label>Tingkatan Kelas</label>
                <select name="tingkatan" class="form-control">
                  <option selected="" disabled="">-- Silahkan Pilih --</option>
                  <?php foreach ($data_tingkatan as $tingkatan) { ?>
                    <option <?php if($tingkatan['id_tingkatan']==$kelas['id_tingkatan']){echo"selected";} ?> value="<?php echo $tingkatan['id_tingkatan'] ?>"><?php echo $tingkatan['tingkatan'] ?> - <?php echo $tingkatan['nama_tingkatan'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan" class="form-control">
                  <option selected="" disabled="">-- Silahkan Pilih --</option>
                  <?php foreach ($data_jurusan as $jurusan) { ?>
                    <option value="<?php echo $jurusan['id_jurusan'] ?>" <?php if($jurusan['id_jurusan']==$kelas['id_jurusan']){echo"selected";} ?>><?php echo $jurusan['nama_jurusan'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Urutan Kelas</label>
                <input type="text" class="form-control form-control-user" name="urutan" placeholder="Urutan kelas" autocomplete="off" value="<?php echo $kelas['urutan_kelas'] ?>" required="">
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

<!-- Delete kelas Modal-->
<?php foreach ($data_kelas as $kelas) { ?>
  <div class="modal fade" id="hapusKelas<?php echo $kelas['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="<?php echo base_url('data_absensi/delete_kelas/'.$kelas['id_kelas']) ?>">Yes!</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>