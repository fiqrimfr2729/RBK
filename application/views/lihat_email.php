<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hasil Pencarian</title>

  <!-- Place favicon.ico in the root directory -->
  <link rel="icon" type="image/png" href="<?php echo base_url("assets/admin/") ?>img/login_img.png" sizes="32x32" />

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/admin/') ?>css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-password-image"></div> -->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Lupa Password Anda?</h1>
                    <p class="mb-4">Cukup masukkan alamat email Anda di bawah ini dan kami akan mengirimkan Anda tautan untuk mereset kata sandi Anda!</p>
                  </div>
                  <form class="user" action="<?php echo base_url('Login/sandi_baru') ?>/<?php echo $emailku[0]->id_users ?>" method="post">
                    <!-- Notifikasi -->
                    
                    <!-- /Notifikasi -->
                    <div class="form-group">
                      <label>Email Anda</label>
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $emailku[0]->email_admin ?>" disabled="">
                    </div>
                    <div class="form-group">
                      <label>Username Anda</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $emailku[0]->username ?>" disabled="">
                    </div>
                    <div class="form-group">
                      <label>Kata Sandi</label>
                      <input type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="password" placeholder="Masukkan kata sandi" required="">
                    </div>
                    <div class="form-group">
                      <label>Konfirmasi Kata Sandi</label>
                      <input type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="re_password" placeholder="Masukkan kata sandi baru" required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Send Email
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url() ?>" style="text-decoration: none">Sudah punya akun? Login!</a>
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
  <script src="<?php echo base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/admin/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>
