<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data absensi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Lihat Data absensi Siswa</h6>
   <!--  <a href="javascript:;" class="btn btn-success float-right" data-toggle="modal" data-target="#tambahSiswa">Tambah Data</a>
  --> </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="example" class="table table-bordered display" style="width:100%">
       
        <thead>
          <tr align="center">
            <th width="5%">No</th>
            <th align="center">Hari, Tanggal</th>
            <!-- <th align="center">Nama Siswa</th> -->
            <!-- <th align="center">NIS</th> -->
            <!-- <th align="center">Kelas</th> -->
            <th  width="30%">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_absensi as $absensi) { ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td align="center"><?php echo $absensi['tanggal'] ?></td>
              <!-- <td align="center"><?php echo $absensi['nama_lengkap'] ?></td> -->
              <!-- <td align="center"><?php echo $absensi['NIS'] ?></td> -->
              <!-- <td align="center"><?php echo $absensi['id_jurusan'] ?></td> -->
              <td align="center"><?php echo $absensi['Keterangan'] ?></td>
              <!-- Read kelas siswa -->


             <!--  <td align="center">
              <a href="<?php echo site_url('Data_absensi/tambah_user_siswa') ?>/<?php echo $siswa['NIS'] ?>" class="btn btn-primary" style="margin-right: 10px"><i class="fa fa-plus"></i></a>
              <a href="javascript:;" data-toggle="modal" data-target="#detailSiswa<?php echo $siswa['NIS'] ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-search"></i></a>
              <a href="javascript:;" data-toggle="modal" data-target="#editSiswa<?php echo $siswa['NIS'] ?>" class="btn btn-success" style="margin-right: 10px"><i class="fas fa-edit"></i></a>
              <a href="javascript:;" data-toggle="modal" data-target="#hapusSiswa<?php echo $siswa['NIS'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </td> -->
          </tr>
        <?php } ?>
      </tbody>
       <tfoot>
          <tr>
            <th>No</th>
            <th>Hari, Tanggal</th>
            <!-- <th>Nama Siswa</th> -->
            <!-- <th>NIS</th> -->
             <!-- <th>Kelas</th> -->
            <th>Keterangan</th>
          </tr>
        </tfoot>
    </table>
   
  </div><br>
   <div class="right">
      <a href="<?=base_url('users/lihatRekap/' . $this->session->userdata('NIS'))?>" class="btn btn-primary pull-right">Lihat Rekap</a>
    </div>
</div>
</div>

