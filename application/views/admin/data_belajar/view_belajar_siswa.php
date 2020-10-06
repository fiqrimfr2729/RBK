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
           <th>Isi Pengumuman</th>
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
            echo "<td><a href=''><img src='assets/admin/pengumuman/" .$informasi['foto'] .  "' width='50px' class = 'img img-responsive img-thumbnail'></a></td>";
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

          <input type="file" class="form-control form-control" name="informasi" placeholder="Tempat Kejadian Pelanggaran" autocomplete="off" >

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


