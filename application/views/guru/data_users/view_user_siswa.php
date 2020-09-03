<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Users</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data User Siswa</h6>
    <!-- <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambah_user_siswa"> Tambah Data</button> -->
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
           <th width="5%">No</th>
           <th>Nama Lengkap</th>
           <th>Username</th>
           <th>Email</th>
           <th>Aksi</th>
         </tr>
       </thead>
       <tbody>
         <?php
         $no=1;
         foreach ($data_users as $key => $value) { ?>
         <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $value->nama_lengkap ?></td>
          <td><?php echo $value->username ?></td>
          <td><?php echo $value->email_admin ?></td>
          <td align="center">
            <a href="javascript:;" data-toggle="modal" data-target="#detailSiswa<?php echo $value->id_users ?>" class="btn btn-info" style="margin-right: 10px"><i class=" fa fa-search"></i> Detail</a>
            <a href="javascript:;" data-toggle="modal" data-target="#editSiswa<?php echo $value->id_users ?>" class="btn btn-warning" style="margin-right: 10px"><i class=" fa fa-edit"></i> Ubah</a>
            <a href="<?php echo site_url('Data_users/hapus_user_siswa') ?>/<?php echo $value->id_users ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>

        </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<!-- Tambah Data User -->
<div class="modal fade" id="tambah_user_siswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Orang Tua Siswa</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('Data_users/tambah_user_ortu'); ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">       
            <label>NIS</label>
            <select class="form-control" name="NIS">
              <option>== Silahkan Pilih ===</option>
              <?php foreach ($nis as $key => $value) { ?>
              <option value="<?php echo $value->NIS ?>"><?php echo $value->NIS ?> | <?php echo $value->nama_lengkap ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">       
            <label>Nama Orang Tua</label>
            <input type="text" name="nama_lengkap" placeholder="Nama Orang Tua" class="form-control">
          </div>
          <div class="form-group">       
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" class="form-control">
          </div>
          <div class="form-group">       
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control">
          </div>
          <div class="form-group">       
            <label>Email</label>
            <input type="email" name="email_admin" placeholder="Email" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Tambah Data User -->


<!-- Detail Siswa Modal-->
<?php foreach ($data_users as $key => $value) { ?>
<div class="modal fade" id="detailSiswa<?php echo $value->id_users ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Detail User</b></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">       
          <label>Nama Siswa/i</label>
          <input type="text" name="nama_lengkap" class="form-control" disabled="" value="<?php echo $value->nama_lengkap ?>">
        </div>

        <div class="form-group">
          <label>Nomor Induk Siswa (NIS)</label>
          <input type="number" name="nis" class="form-control" disabled="" value="<?php echo $value->NIS ?>">
        </div>

        <div class="form-group">       
          <label>Username</label>
          <input type="text" name="jk" class="form-control" disabled="" value="<?php echo $value->username ?>">
        </div>

        <div class="form-group">       
        <label>Email</label>
          <input type="text" name="jk" class="form-control" disabled="" value="<?php echo $value->email_admin ?>">
        </div>

      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php foreach ($data_users as $key => $value) { ?>
<div class="modal fade" id="editSiswa<?php echo $value->id_users ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Ubah Data</b></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?php echo base_url('data_users/edit_user/'.$value->id_users); ?>" method="post">
            
        <div class="form-group">       
          <label>Nama Siswa/i</label>
          <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $value->nama_lengkap ?>">
        </div>

        <div class="form-group">
          <label>Nomor Induk Siswa (NIS)</label>
          <input type="number" name="nis" class="form-control" disabled="" value="<?php echo $value->NIS ?>">
        </div>

        <div class="form-group">       
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?php echo $value->username ?>">
        </div>

        <div class="form-group">       
        <label>Email</label>
          <input type="text" name="email" class="form-control" value="<?php echo $value->email_admin ?>">
        </div>        
        <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
          SIMPAN </font>
        </button>
      </form>

      </div>
    </div>
  </div>
</div>
<?php } ?>