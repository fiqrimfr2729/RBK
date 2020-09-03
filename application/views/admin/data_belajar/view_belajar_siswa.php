<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Informasi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
  <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Pengumuman</h6>

    <?php if ($this->session->userdata('level') == "guru") { ?>
    <a href="javascript:;" class="btn btn-success float-right" data-toggle="modal" data-target="#tambahPengumuman">Tambah Pengumuman</a> 
  <?php } ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
           <?php if ($this->session->userdata('level') == "admin") { ?>

           <?php } ?>

           <th width="5%">No</th>
           <!--  <th></th> -->
           <th >File</th>
           <th>Judul</th>
           <th>Tanggal Publish</th>
           <?php if ($this->session->userdata('level') == "guru") { ?>
           <th>Action</th>
           <?php } ?>

           <!-- <th>Status</th> -->
           <!-- <th width="30%">Aksi</th> -->
         </tr>
       </thead>
       <tbody>
        <?php
 //string yang akan dipecah
        $teks = "";
 //pecah string berdasarkan string "," 
        $pecah = explode(",", $teks);
 //mencari element array 0
        $hasil = $pecah[0];
 //tampilkan hasil pemecahan
        echo $hasil;
        ?>
        <?php $no = 1; ?>
        <?php foreach ($data_informasi as $informasi) { ?>
          <tr>
            <td align="center"><?php echo $no++; ?></td>

            <?php
 //string yang akan dipecah
            $teks = $informasi['foto'];
 //pecah string berdasarkan string "," 
            $pecah = explode(".", $teks);
 //mencari element array 0
            $hasil = $pecah[1];
            if ($hasil=="jpg") { 

              echo "<td><img src='assets/admin/pengumuman/" . $informasi['foto'] . "' width='150px' class = 'img img-responsive img-thumbnail'></td>";

            } elseif ($hasil=="png") {
             echo "<td><img src='assets/admin/pengumuman/" . $informasi['foto'] . "' width='150px' class = 'img img-responsive img-thumbnail'></td>";
           } else {
            echo "<td><a href=''><img src='assets/admin/pengumuman/IMG-20200303-WA0022.jpg' width='50px' class = 'img img-responsive img-thumbnail'>     ".$informasi['foto']. "</a></td>";
          }
 //tampilkan hasil pemecahan
 // var_dump($data); exit();
          ?>



          <td align="center"><?php echo $informasi['isi_pengumuman'] ?></td>
          <td align="center"><?php echo $informasi['tgl_buat'] ?></td>
            <?php if ($this->session->userdata('level') == "guru") { ?>
          <td align="center">
            <!-- <a href="javascript:;" data-toggle="modal" data-target="#detailbelajar<?php echo $informasi['id_pengumuman'] ?>" class="btn btn-info" style="margin-right: 10px"><i class=" fa fa-search"></i> Detail</a>
            -->    
                    
            <a href="<?= base_url('data_belajar/hapusDataBelajar/' . $informasi['id_pengumuman'])?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
          </td>
        <?php } ?>

        </tr>

      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>



<!-- Add Siswa Modal-->
<div class="modal fade" id="tambahPengumuman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="myManagInformasi">Tambah Data Pengumuman</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="user" action="<?php echo base_url('data_belajar/do_upload'); ?>" method="post" enctype='multipart/form-data'>
        <div class="form-group">

          <input type="file" class="form-control form-control" name="informasi" placeholder="Tempat Kejadian Pelanggaran" autocomplete="off" required="">

          <div class="form-group">       
            <label><b><i>* Catatan</i></b></label>
            <textarea class="form-control" name="view_belajar" rows="8"></textarea>
          </div>

          

          <div class="modal-footer">
           <!-- <button type="button" class="btn bg-info btn-user btn-block" data-dismiss="modal">Close</button> -->
           <button type="submit" class="btn bg-info btn-user btn-block"><font color="white">
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
<?php foreach ($data_informasi as $informasi) { ?>
  <div class="modal fade" id="hapusPengumuman<?php echo $informasi['id_pengumuman']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-primary" href="<?php echo base_url('data_master/delete_siswa/'.$informasi['id_pengumuman']) ?>">Yes!</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>


