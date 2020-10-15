<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Informasi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
  <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Komentar Pengumuman (<?php echo $pengumuman->judul ?>)</h6>

    <?php if ($this->session->userdata('level') == "guru") { ?>
    <a href="javascript:;" class="btn btn-success float-right" data-toggle="modal" data-target="#tambah_komentar">Tambah Komentar</a> 
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
           <th >Nama</th>
           <th >Tanggal</th>
           <th>Isi Komentar</th>
           <?php if ($this->session->userdata('level') == "guru") { ?>
           <th>Action</th>
           <?php } ?>

           <!-- <th>Status</th> -->
           <!-- <th width="30%">Aksi</th> -->
         </tr>
       </thead>
       <tbody>
        
        <?php $no = 1; ?>
        <?php foreach ($komentar as $informasi) { ?>
          <tr>
            <td align="center"><?php echo $no++; ?></td>
            <td align="center"><?php if($informasi->nama_siswa!=null){echo $informasi->nama_siswa;}else{echo $informasi->nama_guru;}  ?></td>
            <td align="center"><?php echo $informasi->tanggal ?></td>
            <td align="center"><?php echo $informasi->isi_komentar ?></td>
          
          <?php if ($this->session->userdata('level') == "guru"): ?>
          <td align="center">
            <a href="javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#komentar<?php echo $informasi->id_komentar; ?>">Hapus</a>
          </td>
          <?php endif; ?>

        </tr>

      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>



<!-- Add Komentar Modal-->
<div class="modal fade" id="tambah_komentar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Tambah Komentar</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="user" action="<?php echo base_url('Data_pengumuman/kirim_komentar'); ?>" method="post">
            
              <input type="hidden" class="form-control form-control" value="<?php echo $pengumuman->id_pengumuman ?>" name="id_pengumuman"  required="">
            <div class="form-group">
              <label>Isi Komentar</label>
              <textarea type="text" class="form-control" name="isi_komentar" placeholder="Masukkan komentar" autocomplete="off" required="" rows="8"></textarea>
            </div>
            <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">Simpan </font>
            </button>
          </form>
      </div>
    </div>
  </div>
</div>


<?php foreach ($komentar as $informasi) { ?>
  <div class="modal fade" id="komentar<?php echo $informasi->id_komentar ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin akan menghapus komentar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        Klik Ya jika anda yakin
            <form class="user" action="<?php echo base_url('data_pengumuman/hapus_komentar'); ?>" method="post">
              <div class="form-group">
                
                <input type="hidden" class="form-control form-control" name="id_pengumuman" autocomplete="off" value="<?php echo $pengumuman->id_pengumuman ?>" required="">
              </div>
              <div class="form-group">
              
              <input type="hidden" class="form-control form-control" name="id_komentar" value="<?php echo $informasi->id_komentar ?>" autocomplete="off" required="">
            </div>
              
            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" >Ya</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Edit Siswa Modal-->


