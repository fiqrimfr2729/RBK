<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Siswa Kelas <?php echo $kelas[0]['tingkatan'] ?> <?php echo $kelas[0]['nama_jurusan'] ?> <?php echo $kelas[0]['urutan_kelas'] ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Siswa</h6>
       
      <a href="<?php echo site_url('Data_absensi/rekapAbsensiSiswa'); ?>" class="btn btn-danger float-right"> Kembali</a>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th width="30%">Aksi</th> 
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php
          
          foreach ($data_siswa as $siswa) { ?>
          <tr>
            <td align="center"><?php echo $no++; ?></td>
            <td align="center"><?php echo $siswa['nis'] ?></td>
            <td align="center"><?php echo $siswa['nama_siswa'] ?></td>
            <!-- Read kelas siswa -->
            <td> 
              <?php if($siswa['tingkatan']=='1'){echo "X";}elseif($siswa['tingkatan']=='2'){echo "XI";}elseif($siswa['tingkatan']=='3'){echo "XII";}echo ' '.$siswa['nama_jurusan'].' '.$siswa['urutan_kelas'];?>
            </td>
            <td align="center">
              <a href="<?php echo site_url('Data_absensi/detailRekap') ?>/<?php echo $siswa['nis'] ?>" class="btn btn-primary" style="margin-right: 10px"><i class="fas fa-search"></i>View Rekap</a>
            <td>
          </tr>

          <?php 
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

