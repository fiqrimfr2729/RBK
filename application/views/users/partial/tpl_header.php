<!--BEGIN HEADER -->
<div class="page-header navbar-fixed-top" style="background-color: #6B8E23  ">
    <!-- BEGIN HEADER INNER -->
    <div class="clearfix">
        <!-- BEGIN BURGER TRIGGER -->
        <div class="burger-trigger">
            <button class="menu-trigger" style="opacity: 0.5">
                <img src="<?php echo base_url(); ?>assets/users/layouts/layout7/img/m_toggler.png" alt="" style=""> 
            </button>
            <div class="menu-overlay menu-overlay-bg-transparent">
                <div class="menu-overlay-content">
                    <ul class="menu-overlay-nav text-uppercase">
                        <li>
                           <b> <a href="<?php echo base_url('users/dashboard'); ?>">Home</a></b>
                        </li>
                        <!-- <?php if ($this->session->userdata('level')=='ortu') { ?>
                            <li>
                                <a href="<?php echo base_url('users/sp'); ?>">Daftar SP</a>
                            </li>
                        <?php } ?> -->

                        <?php if ($this->session->userdata('level')=='siswa') { ?>
                            <li>
                                <b><a href="<?php echo base_url('users/bimbingan'); ?>">Bimbingan</a></b>
                            </li>
                        <?php } ?>

                        <!-- <li>
                            <b><a href="<?php echo base_url('users/konseling'); ?>">Konseling</a></b>
                        </li> -->

                        <li>
                           <b> <a href="<?php echo base_url('users/change_password'); ?>">Ganti Kata Sandi</a></b>
                        </li>
                        <li>
                           <b> <a href="<?php echo base_url('users/lihat_absensi'); ?>">Absensi</a></b>
                        </li>
                        <li>
                           <b> <a href="<?php echo base_url('users/pengumuman'); ?>">Pengumuman</a></b>
                        </li>

                        <li>
                            <a href="<?php echo base_url('Login/logout'); ?>">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="menu-bg-overlay">
                <button class="menu-close">&times;</button>
            </div>
            <!-- the overlay element -->
        </div>
        <!-- END NAV TRIGGER -->
        
        <!-- END LOGO -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell" style="color: white"></i>
                        <?php if (!empty($notif_balasan) || !empty($notif_konseling)) { ?>
                            <span class="badge badge-danger"> <?php if ($this->session->userdata('level')=='siswa') { echo count($notif_balasan)+count($notif_konseling); } else { echo count($notif_konseling);} ?> </span>
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <?php if ($this->session->userdata('level')=='siswa') { ?>
                                    <span class="bold" style="margin-right: 8px"><a href="<?php echo base_url('users/bimbingan'); ?>" style="text-decoration: none">Lihat bimbingan</a></span>
                                <?php } ?>

                             <!--    <span class="bold"><a href="<?php echo base_url('users/konseling'); ?>" style="text-decoration: none">Lihat konseling</a></span> -->
                            </h3>
                            
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                
                                <?php if ($this->session->userdata('level')=='siswa') { ?>
                                    <?php foreach ($notif_balasan as $isi_bimbingan) { ?>

                                        <li>

                                            <a href="<?php echo base_url('users/bimbingan/'.$isi_bimbingan['id_bimbingan']); ?>" style="text-decoration: none">

                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> Balasan Bimbingan <?php echo ucfirst($isi_bimbingan['subjek']) ?>
                                                </span>

                                            </a>

                                        </li>

                                    <?php } ?>
                                <?php } ?>

                                <?php foreach ($notif_konseling as $isi_konseling) { ?>

                                    <li>

                                        <a href="<?php echo base_url('users/konseling/'.$isi_konseling['id_konseling']); ?>" style="text-decoration: none">

                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-warning"></i>
                                                </span> Pelanggaran <?php echo ucfirst($isi_konseling['nama_kategori']) ?>
                                            </span>

                                        </a>

                                    </li>

                                <?php } ?>

                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER