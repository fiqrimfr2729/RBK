<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Sekolah</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data  Kelas</h6>
    <?php if ($this->session->userdata('level') == "admin") { ?>
    <a href="javascript:;" class="btn btn-info float-right" data-toggle="modal" data-target="#tambahKelas">Tambah Kelas</a>
    <a href="javascript:;" style="margin-right: 10px" class="btn btn-success float-right" data-toggle="modal" data-target="#updateTingkat">Perbarui Tingkatan</a><?php } ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>Nama Kelas</th>
            <th>Jurusan</th>
            <th>Tahun Masuk</th>
             <?php if ($this->session->userdata('level') == "admin") { ?>
              <th width="30%">Aksi</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_kelas as $kelas) { ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td align="center"><?php if($kelas['tingkatan']==1){echo 'X';}elseif($kelas['tingkatan']==2){echo 'XI';}else{echo 'XII';} echo ' '.$kelas['singkatan_jurusan'].' '.$kelas['urutan_kelas']; ?></td>
              <td align="center"><?php echo $kelas['nama_jurusan'] ?></td>
              <td align="center"><?php echo $kelas['tahun_masuk'] ?></td>
                  <?php if ($this->session->userdata('level') == "admin") { ?>
              <td align="center">
                <a href="javascript:;" data-toggle="modal" data-target="#editKelas<?php echo $kelas['id_kelas'] ?>" class="btn btn-warning" style="margin-right: 10px"><i class="fas fa-edit"></i> Ubah</a>
              </td>
              <?php } ?>
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
        <form class="user" action="<?php echo base_url('Kelas/add_kelas'); ?>" method="post">
          <div class="form-group">
            <label>Tingkatan Kelas</label>
            <select name="tingkatan" class="form-control">
              <option selected="" disabled="">-- Silahkan Pilih --</option>
              <option value="1">X - Sepuluh</option>
              <option value="2">XI - Sebelas</option>
              <option value="3">XII - Dua Belas</option>
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
            <label>Jumlah Kelas</label>
            <input type="number" class="form-control form-control" name="jumlah_kelas" value="0" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Tahun Masuk</label>
            <input type="number" class="form-control form-control" name="tahun_masuk" value="2020" autocomplete="off" required="">
          </div>
          <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
            Simpan </font>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="updateTingkat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Perbarui Tingkatan</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?php echo base_url('kelas/naik_kelas'); ?>" method="post">
          Memperbarui tingkatan kelas akan mengubah semua tingkatan kelas 1 tingkat lebih tinggi
          <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
            Perbarui </font>
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
            <form class="user" action="<?php echo base_url('kelas/edit_kelas/'); ?>" method="post">
            <div class="form-group">
               
                <input type="hidden" class="form-control form-control" name="id_kelas" placeholder="masukkan tahun masuk kelas" autocomplete="off" value="<?php echo $kelas['id_kelas'] ?>" required="">
              </div>
              <div class="form-group">
                <label>Tingkatan Kelas</label>
                <select name="tingkatan" class="form-control">
                  <option selected="" disabled="">-- Silahkan Pilih --</option>
                  <option <?php if($kelas['tingkatan']==1){echo 'selected';} ?> value="1">X - Sepuluh</option>
                  <option <?php if($kelas['tingkatan']==2){echo 'selected';} ?> value="2">XI - Sebelas</option>
                  <option <?php if($kelas['tingkatan']==3){echo 'selected';} ?> value="3">XII - Dua Belas</option>
                </select>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan" class="form-control">
                  <option  disabled="">-- Silahkan Pilih --</option>
                  <?php foreach ($data_jurusan as $jurusan) { ?>
                    <option value="<?php echo $jurusan['id_jurusan'] ?>" <?php if($jurusan['id_jurusan']==$kelas['id_jurusan']){echo"selected";} ?>><?php echo $jurusan['nama_jurusan'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Urutan Kelas</label>
                <input type="number" class="form-control form-control" name="urutan" placeholder="Urutan kelas" autocomplete="off" value="<?php echo $kelas['urutan_kelas'] ?>" required="">
              </div>
              <div class="form-group">
                <label>Tahun Masuk</label>
                <input type="number" class="form-control form-control" name="tahun_masuk" placeholder="masukkan tahun masuk kelas" autocomplete="off" value="<?php echo $kelas['tahun_masuk'] ?>" required="">
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
          <a class="btn btn-primary" href="<?php echo base_url('data_master/delete_kelas/'.$kelas['id_kelas']) ?>">Yes!</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>