<!-- Sidebar -->

    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa fa-graduation-cap"></i>
        </div>
      
        <div class="sidebar-brand-text mx-3">BK SMKN 1 LOSARANG </div>
        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if(!empty($menu) && $menu == 'dashboard'){echo 'active';}; ?>">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Utama
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if(!empty($menu) && $menu == 'Data_master'){echo 'active';}; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Master</span>
        </a>
        <div id="collapsePages" class="collapse <?php if(!empty($menu) && $menu == 'Data_master'){echo 'show';}; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Data</h6>
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'jurusan'){echo 'active';}; ?>" href="<?php echo base_url('Data_master/jurusan') ?>">Jurusan</a>
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo base_url('Data_master/kelas') ?>">Kelas</a>
            <!-- <a class="collapse-item <?php if(!empty($mode) && $mode == 'siswa' && $menu =='Data_master'){echo 'active';}; ?>" href="<?php echo base_url('Data_master/siswa') ?>">Siswa</a> -->
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo site_url('Data_master/select_class'); ?>">Siswa</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if(!empty($menu) && $menu == 'data_users'){echo 'active';}; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Users</span>
        </a>
        <div id="collapseTwo" class="collapse <?php if(!empty($menu) && $menu == 'data_users'){echo 'show';}; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users</h6>
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'siswa' && $menu=='data_users'){echo 'active';}; ?>" href="<?php echo base_url('data_users/siswa') ?>">Siswa</a>
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'ortu'){echo 'active';}; ?>" href="<?php echo base_url('data_users/ortu') ?>">Orang Tua</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?php if(!empty($menu) && $menu == 'data_pelanggaran'){echo 'active';}; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-fa fa-exclamation-circle"></i>
          <span>Data Pelanggaran</span>
        </a>
        <div id="collapseUtilities" class="collapse <?php if(!empty($menu) && $menu == 'data_pelanggaran'){echo 'show';}; ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Pelanggaran</h6>
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'kategori_pelanggaran'){echo 'active';}; ?>" href="<?php echo base_url('data_pelanggaran/kategori_pelanggaran') ?>">Kategori Pelanggaran</a>
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'pelanggaran'){echo 'active';}; ?>" href="<?php echo base_url('data_pelanggaran/pelanggaran') ?>">Pelanggaran</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if(!empty($menu) && $menu == 'data_konseling'){echo 'active';}; ?>">
        <a class="nav-link" href="<?php echo base_url('data_konseling') ?>">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Konseling</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if(!empty($menu) && $menu == 'data_bimbingan'){echo 'active';}; ?>">
        <a class="nav-link" href="<?php echo base_url('data_bimbingan') ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Data Bimbingan</span></a>
      </li>

      <li class="nav-item <?php if(!empty($menu) && $menu == 'Data_absensi'){echo 'active';}; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Absensi</span>
        </a>
        <div id="collapsePages" class="collapse <?php if(!empty($menu) && $menu == 'Data_absensi'){echo 'show';}; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Absensi Data</h6>
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'jurusan'){echo 'active';}; ?>" href="<?php echo base_url('Data_absensi/jurusan') ?>">Jurusan</a>
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo base_url('Data_absensi/kelas') ?>">Kelas</a>
            <!-- <a class="collapse-item <?php if(!empty($mode) && $mode == 'siswa' && $menu =='Data_absensi'){echo 'active';}; ?>" href="<?php echo base_url('Data_absensi/siswa') ?>">Siswa</a> -->
            <a class="collapse-item <?php if(!empty($mode) && $mode == 'kelas'){echo 'active';}; ?>" href="<?php echo site_url('Data_absensi/select_class'); ?>">Siswa</a>
          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->