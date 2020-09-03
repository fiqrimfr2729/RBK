<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Sekolah</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Siswa</h6>
    <a href="javascript:;" class="btn btn-success float-right" data-toggle="modal" data-target="#tambahSiswa">Tambah Data</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
             <?php if ($this->session->userdata('level') == "admin") { ?>
              <th width="30%">Aksi</th>
            <?php } ?>
         
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_siswa as $siswa) { ?>
          <tr>
            <td align="center"><?php echo $no++; ?></td>
            <td><?php echo $siswa['NIS'] ?></td>
            <td><?php echo $siswa['nama_lengkap'] ?></td>
            <!-- Read kelas siswa -->
            <td> 
              <?php
              foreach ($data_kelas as $kelas) {
                if ($siswa['id_kelas']==$kelas['id_kelas']) {
                  echo $kelas['tingkatan'].' '.$kelas['nama_jurusan'].' '.$kelas['urutan_kelas'];
                } 
              }
              ?>
            </td>

            <td align="center">
              <a href="<?php echo site_url('Data_master/tambah_user_siswa') ?>/<?php echo $siswa['NIS'] ?>" class="btn btn-primary" style="margin-right: 10px"><i class="fa fa-plus"></i></a>
              <a href="javascript:;" data-toggle="modal" data-target="#detailSiswa<?php echo $siswa['NIS'] ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-search"></i></a>
              <a href="javascript:;" data-toggle="modal" data-target="#editSiswa<?php echo $siswa['NIS'] ?>" class="btn btn-success" style="margin-right: 10px"><i class="fas fa-edit"></i></a>
              <a href="javascript:;" data-toggle="modal" data-target="#hapusSiswa<?php echo $siswa['NIS'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Add Siswa Modal-->
<div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?php echo base_url('data_master/add_siswa'); ?>" method="post">

          <div class="form-group">       
            <label>Nama Lengkap</label>
             <input type="text" name="id_sekolah" class="form-control" value="<?php echo $this->session->userdata('id_sekolah'); ?>">
            <input type="text" name="nama_lengkap" placeholder="masukkan nama lengkap" class="form-control" required="">
          </div>

          <div class="form-group">
            <label>NIS</label>
            <input type="number" name="nis" placeholder="masukkan NIS" class="form-control" required="">
          </div>

          <div class="form-group">
            <label>NISN</label>
            <input type="number" name="nisn" placeholder="masukkan NISN" class="form-control" required="">
          </div>

          <div class="form-group">
            <label>Kelas</label>
            <select name="id_kelas" class="form-control">
              <option selected="" disabled="">--Pilih Kelas--</option>
              <?php foreach ($data_kelas as $kelas) { ?>
              <option value="<?php echo $kelas['id_kelas'] ?>"><?php echo $kelas['tingkatan'].' '.$kelas['nama_jurusan'].' '.$kelas['urutan_kelas']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">       
            <label>Jenis Kelamin</label>
            <div class="radio-inline">
              <label>
               <input name="jk" type="radio" required="" value="Laki-Laki"> Laki-laki
             </label>
           </div>
           <div class="radio-inline">
            <label>
             <input name="jk" type="radio" required="" value="Perempuan"> Perempuan
           </label>
         </div>
       </div>

       <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" placeholder="masukkan tempat lahir" name="tempat_lahir" class="form-control" required="">
      </div>

      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" placeholder="Tanggal lahir" name="tanggal_lahir" class="form-control" required="">
      </div>

      <div class="form-group">
        <label>Agama</label>
        <select name="agama" class="form-control" required="">
          <option selected="" disabled="">--Pilih Agama--</option>
          <option value="ISLAM">ISLAM</option>
          <option value="PROTESTAN">KRISTEN</option>
          <option value="KATOLIK">KATOLIK</option>
          <option value="HINDU">HINDU</option>
          <option value="BUDHA">BUDHA</option>
        </select>
      </div>

      <div class="form-group">       
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" placeholder="masukkan alamat"></textarea>
      </div>

      <div class="form-group">
        <label>No. Telepon</label>
        <input type="text" class="form-control" placeholder="nomor telepon" name="no_hp" required="" id="txtPhone"><span id="spnPhoneStatus"></span>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="email" class="form-control" required="">
      </div>

      <div class="form-group">       
        <label>Nama Ayah</label>
        <input type="text" name="nama_ayah" placeholder="nama ayah" class="form-control" required="">
      </div>

      <div class="form-group">       
        <label>Nama Ibu</label>
        <input type="text" name="nama_ibu" placeholder="nama ibu" class="form-control" required="">
      </div>

      <div class="form-group">       
        <label>Pekerjaan Ayah</label>
        <input type="text" name="pekerjaan_ayah" placeholder="pekerjaan" class="form-control" required="">
      </div>

      <div class="form-group">       
        <label>Pekerjaan Ibu</label>
        <input type="text" name="pekerjaan_ibu" placeholder="pekerjaan" class="form-control" required="">
      </div>

      <div class="form-group">       
        <label>Alamat Orangtua</label>
        <textarea class="form-control" name="alamat_ortu" placeholder="alamat orang tua"></textarea>
      </div>
      <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
        Simpan </font>
      </button>
    </form>
  </div>
</div>
</div>
</div>

<!-- Edit Siswa Modal-->
<?php foreach ($data_siswa as $siswa) { ?>
<div class="modal fade" id="editSiswa<?php echo $siswa['NIS'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>EDIT DATA SISWA</b></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?php echo base_url('data_master/edit_siswa/'.$siswa['NIS']); ?>" method="post">
          <div class="form-group">       
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" placeholder="Nama" class="form-control" value="<?php echo $siswa['nama_lengkap'] ?>">
          </div>

          <div class="form-group">
            <label>NIS</label>
            <input type="number" name="nis" placeholder="NIS" class="form-control" value="<?php echo $siswa['NIS'] ?>">
          </div>

          <div class="form-group">
            <label>NISN</label>
            <input type="number" name="nisn" placeholder="NISN" class="form-control" value="<?php echo $siswa['NISN'] ?>">
          </div>

          <div class="form-group">
            <label>Kelas</label>
            <select name="id_kelas" class="form-control">
              <option selected="" disabled="">--Please select--</option>
              <?php foreach ($data_kelas as $kelas) { ?>
              <option <?php if($kelas['id_kelas']==$siswa['id_kelas']){echo 'selected';} ?> value="<?php echo $kelas['id_kelas'] ?>"><?php echo $kelas['tingkatan'].' '.$kelas['nama_jurusan'].' '.$kelas['urutan_kelas']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">       
            <label>Jenis Kelamin</label>
            <div class="radio-inline">
              <label>
               <input name="jk" type="radio" required="" value="Laki-Laki" <?php if($siswa['jk']=='Laki-Laki'){echo "checked";} ?>>Laki-laki
             </label>
           </div>
           <div class="radio-inline">
            <label>
             <input name="jk" type="radio" required="" value="Perempuan" <?php if($siswa['jk']=='Perempuan'){echo "checked";} ?>>Perempuan
           </label>
         </div>
       </div>

       <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" placeholder="Tempat lahir" name="tempat_lahir" class="form-control" value="<?php echo $siswa['tempat_lahir'] ?>">
      </div>

      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" placeholder="Tanggal lahir" name="tanggal_lahir" class="form-control" value="<?php echo $siswa['tanggal_lahir'] ?>">
      </div>

      <div class="form-group">
        <label>Agama</label>
        <select name="agama" class="form-control" required="">
          <option selected="" disabled="">--Please select--</option>
          <option value="ISLAM" <?php if($siswa['agama']=="ISLAM"){echo"selected";} ?>>ISLAM</option>
          <option value="PROTESTAN" <?php if($siswa['agama']=="PROTESTAN"){echo"selected";} ?>>PROTESTAN</option>
          <option value="KATOLIK" <?php if($siswa['agama']=="KATOLIK"){echo"selected";} ?>>KATOLIK</option>
          <option value="HINDU" <?php if($siswa['agama']=="HINDU"){echo"selected";} ?>>HINDU</option>
          <option value="BUDHA" <?php if($siswa['agama']=="BUDHA"){echo"selected";} ?>>BUDHA</option>
          <option value="KONGHUCU" <?php if($siswa['agama']=="KONGHUCU"){echo"selected";} ?>>KONGHUCU</option>
        </select>
      </div>

      <div class="form-group">       
        <label>Alamat</label>
        <textarea class="form-control" name="alamat"><?php echo $siswa['alamat'] ?></textarea>
      </div>

      <div class="form-group">
        <label>No. Telep</label>
        <input type="text" class="form-control" placeholder="No Telepon" name="no_hp" id="txtPhone" value="<?php echo $siswa['no_hp'] ?>"><span id="spnPhoneStatus"></span>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="email" class="form-control" value="<?php echo $siswa['email'] ?>">
      </div>

      <div class="form-group">       
        <label>Nama Ayah</label>
        <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control" value="<?php echo $siswa['nama_ayah'] ?>">
      </div>

      <div class="form-group">       
        <label>Nama Ibu</label>
        <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control" value="<?php echo $siswa['nama_ibu'] ?>">
      </div>

      <div class="form-group">       
        <label>Pekerjaan Ayah</label>
        <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan" class="form-control" value="<?php echo $siswa['pekerjaan_ayah'] ?>">
      </div>

      <div class="form-group">       
        <label>Pekerjaan Ibu</label>
        <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan" class="form-control" value="<?php echo $siswa['pekerjaan_ibu'] ?>">
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

<!-- Detail Siswa Modal-->
<?php foreach ($data_siswa as $siswa) { ?>
<div class="modal fade" id="detailSiswa<?php echo $siswa['NIS'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>DETAIL SISWA</b></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">       
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" placeholder="Nama" class="form-control" disabled="" value="<?php echo $siswa['nama_lengkap'] ?>">
        </div>

        <div class="form-group">
          <label>NIS</label>
          <input type="number" name="nis" placeholder="NIS" class="form-control" disabled="" value="<?php echo $siswa['NIS'] ?>">
        </div>

        <div class="form-group">
          <label>NISN</label>
          <input type="number" name="nisn" placeholder="NISN" class="form-control" disabled="" value="<?php echo $siswa['NISN'] ?>">
        </div>

        <div class="form-group">
          <label>Kelas</label>
          <select name="id_kelas" class="form-control" disabled="">
            <option selected="" disabled="">--Please select--</option>
            <?php foreach ($data_kelas as $kelas) { ?>
            <option <?php if($kelas['id_kelas']==$siswa['id_kelas']){echo 'selected';} ?> value="<?php echo $kelas['id_kelas'] ?>"><?php echo $kelas['tingkatan'].' '.$kelas['nama_jurusan'].' '.$kelas['urutan_kelas']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">       
          <label>Jenis Kelamin</label>
          <input type="text" placeholder="Jenis kelamin" name="jk" class="form-control" disabled="" value="<?php echo $siswa['jk'] ?>">
        </div>

        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" placeholder="Tempat lahir" name="tempat_lahir" class="form-control" disabled="" value="<?php echo $siswa['tempat_lahir'] ?>">
        </div>

        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="date" placeholder="Tanggal lahir" name="tanggal_lahir" class="form-control" disabled="" value="<?php echo $siswa['tanggal_lahir'] ?>">
        </div>

        <div class="form-group">
          <label>Agama</label>
          <select name="agama" class="form-control" disabled="">
            <option><?php echo $siswa['agama'] ?></option>
          </select>
        </div>

        <div class="form-group">       
          <label>Alamat</label>
          <textarea class="form-control" name="alamat" disabled=""><?php echo $siswa['alamat'] ?></textarea>
        </div>

        <div class="form-group">
          <label>No. Telep</label>
          <input type="text" class="form-control" placeholder="No Telepon" name="no_hp" disabled="" id="txtPhone" value="<?php echo $siswa['no_hp'] ?>"><span id="spnPhoneStatus"></span>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" placeholder="email" class="form-control" disabled="" value="<?php echo $siswa['email'] ?>">
        </div>

        <div class="form-group">       
          <label>Nama Ayah</label>
          <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control" disabled="" value="<?php echo $siswa['nama_ayah'] ?>">
        </div>

        <div class="form-group">       
          <label>Nama Ibu</label>
          <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control" disabled="" value="<?php echo $siswa['nama_ibu'] ?>">
        </div>

        <div class="form-group">       
          <label>Pekerjaan Ayah</label>
          <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan" class="form-control" disabled="" value="<?php echo $siswa['pekerjaan_ayah'] ?>">
        </div>

        <div class="form-group">       
          <label>Pekerjaan Ibu</label>
          <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan" class="form-control" disabled="" value="<?php echo $siswa['pekerjaan_ibu'] ?>">
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- Delete Siswa Modal-->
<?php foreach ($data_siswa as $siswa) { ?>
<div class="modal fade" id="hapusSiswa<?php echo $siswa['NIS'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a class="btn btn-primary" href="<?php echo base_url('data_master/delete_siswa/'.$siswa['NIS']) ?>">Yes!</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>