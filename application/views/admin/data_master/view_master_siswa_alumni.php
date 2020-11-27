<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Siswa Alumni <?php echo $kelas[0]['nama_jurusan'] ?> <?php echo $kelas[0]['urutan_kelas'] ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Siswa</h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Universitas/Bekerja</th>
            <th width="30%">Aksi</th>

            
          </tr>
        </thead>
        <tbody>
          <?php $i=0; foreach($data_siswa as $siswa): ?>
            <tr>
              <td align="center"> <?php echo ++$i; ?> </td>
              <td align="center"> <?php echo $siswa->nis ?> </td>
              <td align="center"> <?php echo $siswa->nama_siswa ?> </td>
              <td align="center"> <?php if($siswa->univ != null){
                if($siswa->univ->id_univ == 0){echo "Bekerja";}else{echo $siswa->univ->nama_universitas;}}else{echo "-";} ?> </td>
              <?php if ($this->session->userdata('level') == "admin"){ ?>
              <td align="center"> 
                <a href="javascript:;" title="detail" data-toggle="modal" data-target="#detailSiswa<?php echo $siswa->nis ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-list"></i></a>
                <a href="javascript:;" title="edit" data-toggle="modal" data-target="#editSiswa<?php echo $siswa->nis ?>" class="btn btn-warning" style="margin-right: 10px"><i class="fas fa-edit"></i></a>
                <a href="javascript:;" title="hapus" data-toggle="modal" data-target="#hapusSiswa<?php echo $siswa->nis ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
              </td>
              <?php }else{ ?>
              <td align="center"> 
                <a href="javascript:;" title="detail" data-toggle="modal" data-target="#detailSiswa<?php echo $siswa->nis ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-list"></i>  Detail</a>
                <a href="<?php echo base_url('data_bimbingan/get_bimbingan_siswa/').$siswa->nis ?>" title="detail" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-eye"></i>  Bimbingan </a>
              </td>
              <?php } ?>
            </tr>

          <?php endforeach; ?>
              
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php foreach ($data_siswa as $siswa) { ?>
  <div class="modal fade" id="hapusSiswa<?php echo $siswa->nis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="<?php echo base_url('data_master/delete_siswa/'.$siswa->nis) ?>">Yes!</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editSiswa<?php echo $siswa->nis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>EDIT DATA SISWA</b></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?php echo base_url('data_master/edit_siswa/'.$siswa->nis); ?>" method="post">
          <div class="form-group">       
            <label>Nama Lengkap</label>
            <input type="text" name="nama_siswa" placeholder="Masukan Nama Siswa" class="form-control" value="<?php echo $siswa->nama_siswa ?>">
          </div>

          <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" placeholder="Masukan NIS" class="form-control" value="<?php echo $siswa->nis ?>">
          </div>

          <div class="form-group">
            <label>NISN</label>
            <input type="text" name="nisn" placeholder="Masukan NISN" class="form-control" value="<?php echo $siswa->nisn ?>">
          </div>

          <div class="form-group">
            <label>Kelas</label>
            <select name="id_kelas" class="form-control">
              <option selected="" disabled="">--Please select--</option>
              <?php foreach ($data_kelas as $kelas) { ?>
              <option <?php if($kelas['id_kelas']==$siswa->id_kelas){echo 'selected';} ?> value="<?php echo $kelas['id_kelas'] ?>"><?php echo $kelas['tingkatan'].' '.$kelas['nama_jurusan'].' '.$kelas['urutan_kelas']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">       
            <label>Jenis Kelamin</label>
            <div class="radio-inline">
              <label>
               <input name="jk" type="radio" required="" value="Laki-Laki" <?php if($siswa->jk=='1'){echo "checked";} ?>>Laki-laki
             </label>
           </div>
           <div class="radio-inline">
            <label>
             <input name="jk" type="radio" required="" value="Perempuan" <?php if($siswa->jk=='0'){echo "checked";} ?>>Perempuan
           </label>
         </div>
       </div>

       <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" placeholder="Tempat lahir" name="tempat_lahir" class="form-control" value="<?php echo $siswa->tempat_lahir ?>">
      </div>

      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" placeholder="Tanggal lahir" name="tanggal_lahir" class="form-control" value="<?php echo $siswa->tanggal_lahir ?>">
      </div>


      <div class="form-group">       
        <label>Alamat</label>
        <textarea class="form-control" name="alamat"><?php echo $siswa->alamat ?></textarea>
      </div>

      <div class="form-group">
        <label>No. Telep</label>
        <input type="text" class="form-control" placeholder="No Telepon" name="no_hp" id="txtPhone" value="<?php echo $siswa->no_hp ?>"><span id="spnPhoneStatus"></span>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="email" class="form-control" value="<?php echo $siswa->email ?>">
      </div>

      <div class="form-group">       
        <label>Nama Ayah</label>
        <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control" value="<?php echo $siswa->nama_ayah ?>">
      </div>

      <div class="form-group">       
        <label>Nama Ibu</label>
        <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control" value="<?php echo $siswa->nama_ibu ?>">
      </div>

      
      <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
        Save </font>
      </button>
    </form>
  </div>
</div>
</div>
</div>

<div class="modal fade" id="detailSiswa<?php echo $siswa->nis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input type="text" name="nama_lengkap" placeholder="Nama" class="form-control" disabled="" value="<?php echo $siswa->nama_siswa ?>">
        </div>

        <div class="form-group">
          <label>NIS</label>
          <input type="text" name="nis" placeholder="NIS" class="form-control" disabled="" value="<?php echo $siswa->nis ?>">
        </div>

        <div class="form-group">
          <label>NISN</label>
          <input type="text" name="nisn" placeholder="NISN" class="form-control" disabled="" value="<?php echo $siswa->nisn ?>">
        </div>

        <div class="form-group">
          <label>Kelas</label>
          <input type="text" name="kelas" placeholder="Kelas" class="form-control" disabled="" value="<?php echo 'Alumni '.$siswa->singkatan_jurusan.' '.$siswa->urutan_kelas; ?>">
        </div>


        <div class="form-group">       
          <label>Jenis Kelamin</label>
          <input type="text" placeholder="Jenis kelamin" name="jk" class="form-control" disabled="" value="<?php if($siswa->jk==1){echo 'Laki-laki';}else{echo 'Perempuan';} ?>">
        </div>

        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text" placeholder="Tempat lahir" name="tempat_lahir" class="form-control" disabled="" value="<?php echo $siswa->tempat_lahir ?>">
        </div>

        <div class="form-group">
          <label>Tanggal Lahir</label>
          <input type="text" placeholder="Tanggal lahir" name="tanggal_lahir" class="form-control" disabled="" value="<?php echo $siswa->tanggal_lahir ?>">
        </div>

        <div class="form-group">       
          <label>Alamat</label>
          <textarea class="form-control" name="alamat" disabled=""><?php echo $siswa->alamat ?></textarea>
        </div>

        <div class="form-group">
          <label>No. Telep</label>
          <input type="text" class="form-control" placeholder="No Telepon" name="no_hp" disabled="" id="txtPhone" value="<?php echo $siswa->no_hp ?>"><span id="spnPhoneStatus"></span>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" placeholder="email" class="form-control" disabled="" value="<?php echo $siswa->email ?>">
        </div>

        <div class="form-group">       
          <label>Nama Ayah</label>
          <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="form-control" disabled="" value="<?php echo $siswa->nama_ayah ?>">
        </div>

        <div class="form-group">       
          <label>Nama Ibu</label>
          <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="form-control" disabled="" value="<?php echo $siswa->nama_ibu ?>">
        </div>

      </div>
    </div>
  </div>
</div>
<?php } ?>

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
            <label>Nama Siswa</label>
            <input type="hidden" name="id_sekolah" class="form-control" value="<?php echo $this->session->userdata('id_sekolah' ); ?>">
            <input type="text" name="nama_siswa" value="123" placeholder="Masukkan Nama Siswa" class="form-control" required="">
          </div>

          <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" value="123" placeholder="Masukkan NIS" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>NISN</label>
            <input type="text" name="nisn" value="123" placeholder="Masukkan NISN" class="form-control" required="">
          </div>

          <div class="form-group">
            <label>Kelas</label>
             <input type="hidden" name="id_kelas" class="form-control" value="<?php echo $id_kelas; ?>">
             <input type="text" name="nama kelas" class="form-control" value="<?php echo $nama_kelas['tingkatan'];?> <?php echo $nama_kelas['nama_jurusan']; ?> <?php echo $nama_kelas['urutan_kelas']; ?>" readonly>
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
        <input type="text" placeholder="masukkan tempat lahir" value="bb" name="tempat_lahir" class="form-control" required="">
      </div>

      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" placeholder="Tanggal lahir" value="bb" name="tanggal_lahir" class="form-control" required="">
      </div>

    
      <div class="form-group">       
        <label>Alamat</label>
        <textarea class="form-control" value="bb" name="alamat" placeholder="masukkan alamat"></textarea>
      </div>

      <div class="form-group">
        <label>Nomor Telepon</label>
        <input type="text" class="form-control" value="123" placeholder="nomor telepon" name="no_hp" required="" id="txtPhone"><span id="spnPhoneStatus"></span>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="bb" placeholder="email" class="form-control" required="">
      </div>

      <div class="form-group">       
        <label>Nama Ayah</label>
        <input type="text" name="nama_ayah" value="bb" placeholder="nama ayah" class="form-control" required="">
      </div>

      <div class="form-group">       
        <label>Nama Ibu</label>
        <input type="text" name="nama_ibu" value="bb" placeholder="nama ibu" class="form-control" required="">
      </div>

      <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
        Simpan </font>
      </button>
    </form>
  </div>
</div>

