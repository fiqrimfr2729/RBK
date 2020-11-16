
<!-- Topbar -->
<div class="header_top" style="background-color: #FFE75E;">
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <?php if (count($data_belum_dibaca)>0) { ?>
          <span class="badge badge-danger badge-counter"><?php echo count($data_belum_dibaca); ?></span>
        <?php } ?>
      </a>
      <!-- Dropdown - Alerts -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
          Pemberitahuan Bimbingan
        </h6>
        <?php foreach ($data_belum_dibaca as $data) { ?>
          <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('Data_bimbingan/bimbingan/'.$data['id_bimbingan']) ?>">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500"><?php echo $data['tgl_bim'] ?></div>
              <span class="font-weight-bold">Bimbingan dari <?php echo $data['nama_siswa'] ?> belum dibaca</span>
            </div>
          </a>
        <?php } ?>
        <a class="dropdown-item text-center small text-gray-500" href="<?php echo base_url('Data_bimbingan/') ?>">Show All Bimbingan</a>
      </div>
    </li>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php if($this->session->userdata('level')=='admin'){echo 'Admin';}else{
          $guru = $this->db->from('guru')->where('nik', $this->session->userdata('nik'))->get()->row();
          echo $guru->nama_guru;
        } ?></span>
        <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/admin/img/login_img.jpg">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#changePassword">
          <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
          Ganti Kata Sandi
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Keluar
        </a>
      </div>
    </li>

  </ul>

</nav>
<!-- End of Topbar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih keluar jika anda ingin mengakhiri sesi.</div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-danger" href="<?php echo base_url('admin/logout') ?>">Keluar</a>
      </div>
    </div>
  </div>
</div>

<!-- Change Password Modal-->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Kata Sandi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="user" action="<?php echo base_url('Admin/change_password'); ?>/<?php echo $this->session->userdata('id_users') ?>" method="post">
           
          <div class="form-group">
              <input type="password" class="form-control form-control-user" name="password_lama" placeholder="Kata sandi lama" autocomplete="off" required="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user" name="password_baru" placeholder="Kata sandi baru" autocomplete="off" required="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user" name="password_konfirmasi" placeholder="Konfirmasi kata sandi baru" autocomplete="off" required="">
            </div>
            <button type="submit" class="btn bg-info btn-user btn-block"><font color="white">
              Ganti </font>
            </button>
          </form>
      </div>
    </div>
  </div>
</div>