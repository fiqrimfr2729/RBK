<!DOCTYPE html>

<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Sistem Bimbingan dan Konseling Online</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Sistem bimbingan dan konseling online SMA" name="description" />
    <meta content="Rizalludin Sidqi Baihaqi" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/users/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/users/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/users/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/users/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/users/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url();?>assets/users/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/users/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>assets/users/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/users/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />

    <link href="<?=base_url()?>assets/users/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/users/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?php echo base_url();?>assets/users/global/plugins/mapplic/mapplic/mapplic.css" rel="stylesheet" type="text/css" /> -->

    <!-- datedropper 3 -->
    <link href="<?php echo base_url();?>assets/users/global/plugins/datedropper3/datedropper.css" rel="stylesheet" type="text/css" />

    <!-- swiper 4.4.1 -->
    <link href="<?php echo base_url();?>assets/users/global/plugins/swiper/css/swiper.min.css" rel="stylesheet" type="text/css" />

    <!-- signature pad -->
    <link href="<?php echo base_url();?>assets/users/global/plugins/signature-pad/css/signature-pad.css" rel="stylesheet" type="text/css" />     

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url();?>assets/users/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url();?>assets/users/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url();?>assets/users/layouts/layout7/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/users/layouts/layout7/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->

    <link rel="shortcut icon" href="#" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid" style="">
        <!--BEGIN HEADER -->
        <div class="page-header navbar-fixed-top" style="background-color: #00BFFF">
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
                                    <a href="<?php echo base_url('Ortu/dashboard'); ?>">Home</a>
                                </li>
                        <!-- <?php if ($this->session->userdata('level')=='ortu') { ?>
                            <li>
                                <a href="<?php echo base_url('Ortu/sp'); ?>">Daftar SP</a>
                            </li>
                            <?php } ?> -->

                            <?php if ($this->session->userdata('level')=='siswa') { ?>
                            <li>
                                <a href="<?php echo base_url('Ortu/bimbingan'); ?>">Bimbingan</a>
                            </li>
                            <?php } ?>

                            <li>
                                <a href="<?php echo base_url('Ortu/konseling'); ?>">Konseling</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('Ortu/change_password'); ?>">Ganti Kata Sandi</a>
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
                                    <span class="bold" style="margin-right: 8px"><a href="<?php echo base_url('Ortu/bimbingan'); ?>" style="text-decoration: none">Lihat bimbingan</a></span>
                                    <?php } ?>

                                    <span class="bold"><a href="<?php echo base_url('Ortu/konseling'); ?>" style="text-decoration: none">Lihat konseling</a></span>
                                </h3>

                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">

                                    <?php if ($this->session->userdata('level')=='siswa') { ?>
                                    <?php foreach ($notif_balasan as $isi_bimbingan) { ?>

                                    <li>

                                        <a href="<?php echo base_url('Ortu/bimbingan/'.$isi_bimbingan['id_bimbingan']); ?>" style="text-decoration: none">

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

                                        <a href="<?php echo base_url('Ortu/konseling/'.$isi_konseling['id_konseling']); ?>" style="text-decoration: none">

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
   