<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Bimbingan Konseling - Login</title>

  <!-- Place favicon.ico in the root directory -->
  <link rel="icon" type="image/png" href="<?php echo base_url("assets/admin/") ?>img/login_img.png" sizes="32x32" />

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/admin/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ubah Kata Sandi</h1>
                  </div>
                  <form class="user" action="<?php echo base_url('login/do_reset_password'); ?>" method="post">
                    <!-- Notifikasi -->
                    <?php if ($info = $this->session->flashdata('message')) {
                      echo $info;
                    } ?>
                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                    <!-- /Notifikasi -->
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password_baru" placeholder="Kata sandi baru" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password_konfirmasi" placeholder="Konfirmasi kata sandi" autocomplete="off" required="">
                    </div>
                    <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color="white">
                      UBAH </font>
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url() ?>" style="text-decoration: none">Sudah punya akun? Masuk!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
