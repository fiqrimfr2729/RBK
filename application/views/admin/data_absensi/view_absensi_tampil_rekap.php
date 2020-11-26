<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Siswa Kelas <?php echo $kelas[0]['tingkatan'] ?> <?php echo $kelas[0]['nama_jurusan'] ?> <?php echo $kelas[0]['urutan_kelas'] ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Rekap Absensi Siswa</h6>
    <?php if ($this->session->userdata('level') == "admin") { ?>
      <a href="javascript:;" class="btn btn-info float-right" data-toggle="modal" data-target="#tambahSiswa">Tambah Rekap Absensi</a>&ensp;<?php } ?>
      <!--  <a target="_blank" href="<?php echo site_url('Data_master/cetak_kelas'); ?>/<?php echo $kelas[0]['id_kelas'] ?>" class="btn btn-danger float-right"><i class="fas fa-print"></i> Cetak</a> -->
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead align="center">
            <tr>
              <th width="5%">No</th>
              <!--  <th></th> -->
              <th>Tanggal</th>
              <th>File Rekap</th>
              
              <th width="30%">Aksi</th>
            </tr>
          </thead>
          <tbody> <?php $no = 1; ?>
            <?php foreach ($data_absensi as $siswa) { ?>
              <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $siswa->tanggal ?></td>
                <td><?php echo $siswa->file ?></td>
                <!-- Read kelas siswa -->

                  <td align="center">
                    
                    <a href="javascript:;" data-toggle="modal" data-target="#detailSiswa<?php echo $siswa->id_rekap ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-search"></i></a>
                    <a href="javascript:;" data-toggle="modal" data-target="#editSiswa<?php echo $siswa->id_rekap ?>" class="btn btn-warning" style="margin-right: 10px"><i class="fas fa-edit"></i></a>
                    <a href="javascript:;" data-toggle="modal" data-target="#hapusSiswa<?php echo $siswa->id_rekap ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                  </td>
                    </tr>
                  <?php }?>
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
              <h3 class="modal-title" id="exampleModalLabel">Tambah Data Rekap Absensi</h3>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <form class="user" action="<?php echo base_url('data_absensi/add_rekap'); ?>" method="post"> -->
                <?php echo form_open_multipart (base_url('data_absensi/add_rekap'));?>
                <input type="hidden" name="id_kelas" value="<?php echo $id_kelas?>">
                <input type="file" class="form-control form-control" name="rekap" placeholder="Tempat Kejadian Pelanggaran" autocomplete="off" required="">

                <div class="form-group"> </br>
                <label><b><i>* Tanggal</i></b></label>      
                  <input type="date" name="tanggal" class="form-control " required><br>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

      <!-- Detail Siswa Modal-->

      <!-- Delete Siswa Modal-->
