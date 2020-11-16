<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Guru BK</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Siswa</h6>
       <?php if ($this->session->userdata('level') == "admin") { ?>
      <a href="javascript:;" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah_guru"> <i class="fas fa-plus"></i> Tambah Guru</a>&ensp;<?php } ?>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>Nama Guru</th>
            <th>NIK</th>
            <th>Tingkatan</th>
             <th width="30%">Aksi</th>
            
          </tr>
        </thead>
        <tbody>
          <?php $i=0; foreach($data_guru as $guru): ?>
            <tr>
              <td align="center"> <?php echo ++$i; ?> </td>
              <td align="center"> <?php echo $guru->nama_guru ?> </td>
              <td align="center"> <?php echo $guru->nik ?> </td>
              <td align="center"> <?php if($guru->tingkatan=='1'){echo 'X (Sepuluh)';}elseif($guru->tingkatan=='2'){echo 'XI (Sebelas)';}else{echo 'XII (Duabelas)';} ?> </td>
              <td align="center"> 
              <?php if ($this->session->userdata('level') == "admin") : ?>
                <a href="javascript:;" title="Detail" data-toggle="modal" data-target="#detailGuru<?php echo $guru->nik ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-list"></i></a>
                <a href="javascript:;" title="Edit" data-toggle="modal" data-target="#editGuru<?php echo $guru->nik ?>" class="btn btn-warning" style="margin-right: 10px"><i class="fas fa-edit"></i></a>
                <a href="javascript:;" title="Hapus" data-toggle="modal" data-target="#hapusGuru<?php echo $guru->nik ?>" class="btn btn-danger" style="margin-right: 10px"><i class="fas fa-trash"></i></a>
              <?php else: ?>
                <a href="javascript:;" title="Detail" data-toggle="modal" data-target="#detailSiswa<?php echo $guru->nik ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-list"></i>  Detail</a>
              <?php endif; ?>
              </td>
            </tr>

          <?php endforeach; ?>
              
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php foreach ($data_guru as $guru) : ?>
  <div class="modal fade" id="hapusGuru<?php echo $guru->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin akan menghapus data guru ini?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik ya jika anda yakin?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <a class="btn btn-primary" href="<?php echo base_url('data_master/delete_guru/') ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editGuru<?php echo $guru->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Edit Data Guru</b></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?php echo base_url('data_master/edit_guru/'); ?>" method="post">
        <input type="hidden" name="id_guru" class="form-control" value="<?php echo $guru->id_guru; ?>">
        <input type="hidden" name="nik_lama" class="form-control" value="<?php echo $guru->nik; ?>">
        <input type="hidden" name="tingkatan_lama" class="form-control" value="<?php echo $guru->tingkatan; ?>">
          <div class="form-group">       
            <label>Nama Lengkap</label>
            <input type="text" name="nama_guru" placeholder="Masukan Nama Guru" class="form-control" value="<?php echo $guru->nama_guru ?>">
          </div>

          <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" placeholder="Masukan NIK" class="form-control" value="<?php echo $guru->nik ?>">
          </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" id="txtPhone" value="<?php echo $guru->email_guru ?>"><span id="spnPhoneStatus"></span>
        </div>

        <div class="form-group">       
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"><?php echo $guru->alamat_guru ?></textarea>
        </div>

      <div class="form-group">       
            <label>Tingkatan</label>
            <div class="radio-inline">
                <label>
                    <input name="tingkatan" type="radio" required="" value="1" <?php if($guru->tingkatan=='1'){echo 'checked';} ?> >X(Sepuluh)
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input name="tingkatan" type="radio" required="" value="2" <?php if($guru->tingkatan=='2'){echo 'checked';} ?>>XI(Sebelas)
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input name="tingkatan" type="radio" required="" value="3" <?php if($guru->tingkatan=='3'){echo 'checked';} ?>>XII(Duabelas)
                </label>
            </div>
       </div>
      
      <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
        Simpan </font>
      </button>
    </form>
  </div>
</div>
</div>
</div>

<div class="modal fade" id="detailGuru<?php echo $guru->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Detail Guru</b></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">       
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" placeholder="Nama" class="form-control" disabled="" value="<?php echo $guru->nama_guru ?>">
        </div>

        <div class="form-group">
          <label>NIK</label>
          <input type="text" name="nis" placeholder="NIS" class="form-control" disabled="" value="<?php echo $guru->nik ?>">
        </div>

        <div class="form-group">
          <label>Tingkatan</label>
          <input type="text" name="tingkatan" placeholder="NIS" class="form-control" disabled="" value="<?php if($guru->tingkatan=='1'){echo 'X (Sepuluh)';}if($guru->tingkatan=='2'){echo 'XI (Sebelas)';}else{'XII (Duabelas)';} ?>">
        </div>

        <div class="form-group">       
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" disabled><?php echo $guru->alamat_guru ?></textarea>
        </div>
       
        <div class="form-group">
          <label>Email Guru</label>
          <input type="text" placeholder="" name="" class="form-control" disabled="" value="<?php echo $guru->email_guru?>">
        </div>

      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<div class="modal fade" id="tambah_guru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?php echo base_url('data_master/add_guru'); ?>" method="post">

        <div class="form-group">       
            <label>Nama Guru</label>
            <input type="hidden" name="id_sekolah" class="form-control" value="<?php echo $this->session->userdata('id_sekolah' ); ?>">
            <input type="text" name="nama_guru" value="" placeholder="Masukkan Nama Guru" class="form-control" required="" autocomplete='off'>
        </div>

        <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" value="" placeholder="Masukkan NIK" class="form-control" required="" autocomplete='off'>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" placeholder="Masukan Email" value="" name="email" class="form-control" required="" autocomplete='off'>
        </div>

        <div class="form-group">       
            <label>Alamat</label>
            <textarea class="form-control" value="" name="alamat" placeholder="masukkan alamat"></textarea>
        </div>

        <div class="form-group">       
            <label>Tingkatan</label>
            <div class="radio-inline">
                <label>
                    <input name="tingkatan" type="radio" required="" value="1" >X(Sepuluh)
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input name="tingkatan" type="radio" required="" value="2" >XI(Sebelas)
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input name="tingkatan" type="radio" required="" value="3" >XII(Duabelas)
                </label>
            </div>
       </div>
      
      <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
        Simpan </font>
      </button>
    </form>
  </div>
</div>

<!-- Edit Siswa Modal-->


<!-- Detail Siswa Modal-->


<!-- Delete Siswa Modal-->

