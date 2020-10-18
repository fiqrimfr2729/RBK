<!-- Sidebar -->

<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar" style="color: black;">

  <!-- Sidebar - Brand -->

  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard') ?>">
    <div class="sidebar-brand-icon rotate-n-30">
      <!-- <i class="fas fa-address-card"></i> -->
      <?php if ($this->session->userdata('id_sekolah') == 1) { ?>
        <img src="<?= base_url('assets/admin/img/logo2.jpg')?>" width="55px">
      <?php } else { ?>
         <img src="<?= base_url('assets/admin/img/tukdana.png')?>" width="55px" height="55px">
      <?php } ?>
     

    </div>

    <div class="sidebar-brand-text mx-3" ><?php echo $user['nama_sekolah']?> </div>

  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php if(!empty($menu) && $menu == 'dashboard'){echo 'active';}; ?>">
    <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <b><span>Dashboard</span></a></b>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      <b><span>Menu Utama</span></b>
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if(!empty($menu) && $menu == 'Data_master'){echo 'active';}; ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-folder-open"></i>
        <b><span>Data Sekolah</span></b>
      </a>
      <div id="collapsePages" class="collapse <?php if(!empty($menu) && $menu == 'Data_master'){echo 'show';}; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header"><b>Data Sekolah</b></h6>
          <a class="collapse-item <?php if(!empty($mode) && $mode == 'admin/jurusan'){echo 'active';}; ?>" href="<?php echo base_url('Jurusan') ?>"><b>Jurusan</b></a>
          <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo base_url('Kelas') ?>"><b>Kelas</b></a>
          <a class="collapse-item <?php if(!empty($mode) && $mode == 'siswa'){echo 'active';}; ?>" href="<?php echo site_url('Data_master/select_class'); ?>"><b>Siswa</b></a>
          <a class="collapse-item <?php if(!empty($mode) && $mode == 'guru'){echo 'active';}; ?>" href="<?php echo site_url('Data_master/guru'); ?>"><b>Guru</b></a>
        </div>
      </div>
    </li>

    <li class="nav-item <?php if($menu == 'alumni'){echo 'active';}; ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAlumni" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-folder-open"></i>
        <b><span>Data Alumni</span></b>
      </a>
      <div id="collapseAlumni" class="collapse <?php if(!empty($menu) && $menu == 'Data_alumni'){echo 'show';}; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header"><b>Data Alumni</b></h6>
          <a class="collapse-item <?php if($mode == 'data_alumni'){echo 'active';}; ?>" href="<?php echo base_url('Alumni') ?>"><b>Alumni</b></a>
          <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo base_url('Alumni/Universitas') ?>"><b>Universitas</b></a>
        </div>
      </div>
    </li>
    

    <!-- Nav Item - Pages Collapse Menu -->
    <?php if ($this->session->userdata('level') == "admin") { ?>
      <li class="nav-item <?php if(!empty($menu) && $menu == 'data_users'){echo 'active';}; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <b><span>Data Users</span></b>
        </a>   
        <div id="collapseTwo" class="collapse <?php if(!empty($menu) && $menu == 'data_users'){echo 'show';}; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><b>Users</b></h6>
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'siswa' && $menu=='data_users'){echo 'active';}; ?>" href="<?php echo base_url('data_users/siswa') ?>"><b>Users</b></a>
            <!--   <a class="collapse-item <?php if(!empty($mode) && $mode == 'ortu' && $menu=='data_users'){echo 'active';}; ?>" href="<?php echo base_url('data_users/ortu') ?>"><b>ortu</b></a> -->
          </div>
        </div>
        </li><?php } ?>



        <!-- Nav Item - Tables -->
        <li class="nav-item <?php if(!empty($menu) && $menu == 'data_bimbingan'){echo 'active';}; ?>">
          <a class="nav-link" href="<?php echo base_url('data_bimbingan') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <b> <span>Data Bimbingan</span></b></a>
          </li>

          <li class="nav-item <?php if(!empty($menu) && $menu == 'Data_absensi'){echo 'active';}; ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbsensi" aria-expanded="true" aria-controls="collapseAbsensi">
              <i class="fas fa-fw fa-folder"></i>
              <b> <span>Data Absensi</span></b>
            </a>

            <div id="collapseAbsensi" class="collapse <?php if(!empty($menu) && $menu == 'Data_absensi'){echo 'show';}; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><b>Absensi Data</b></h6>
                <!-- <a class="collapse-item <?php if(!empty($mode) && $mode == 'jurusan'){echo 'active';}; ?>" href="<?php echo base_url('Data_absensi/jurusan') ?>">Jurusan</a> -->
                <?php if ($this->session->userdata('level') == "admin") { ?>
                  <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo site_url('Data_absensi/select_class'); ?>"><b>Absen Siswa</b></a><?php } ?>

                  <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo site_url('Data_absensi/select_class_absen'); ?>"><b>Lihat Absensi</b></a>
                  <!-- <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo base_url('Data_absensi/rekapAbsensiSiswa') ?>"><b>Lihat Rekap Absensi</b></a> -->
                  <?php if ($this->session->userdata('level') == "admin") { ?>
                    <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo base_url('Data_absensi/rekap_absensi') ?>"><b>Rekap Absensi</b></a>
                    <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo base_url('Data_absensi/rekapAbsensiSiswa') ?>"><b>Lihat Rekap Absensi</b></a>
                  <?php } ?> 

                  </div>
                </div>

                <li class="nav-item <?php if(!empty($menu) && $menu == 'data_pengumuman'){echo 'active';}; ?>">
                  <a class="nav-link" href="<?php echo base_url('data_pengumuman') ?>">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <b> <span>Data Pengumuman</span></b></a>
                  </li>

                  <!-- <li class="nav-item <?php if(!empty($menu) && $menu == 'data_akun'){echo 'active';}; ?>">
                    <a class="nav-link" href="<?php echo base_url('data_akun') ?>">
                      <i class="fas fa-chalkboard-teacher"></i>
                      <b> <span>Profil</span></b></a>
                    </li> -->
        <!-- <li class="nav-item <?php if(!empty($menu) && $menu == 'Data_absensi'){echo 'active';}; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
         <b> <span>Data Absensi coba</span></b>
        </a>
      </li> -->
      <!-- <a class="collapse-item <?php if(!empty($mode) && $mode == 'siswa' && $menu =='Data_absensi'){echo 'active';}; ?>" href="<?php echo base_url('Data_absensi/siswa') ?>">Siswa</a> -->



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->