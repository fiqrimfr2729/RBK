<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bimkos - Login</title>

  <!-- Place favicon.ico in the root directory -->
  <link rel="icon" type="image/png" href="<?php echo base_url("assets/admin/") ?>img/bimkos.png" sizes="10x10" />

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/admin/css/sb-admin-2.css" rel="stylesheet">

  <script>
       $(document).ready(function(){
           $('.captcha-refresh').on('click', function(){
               $.get('<?php echo base_url().'Login/refresh'; ?>', function(data){
                   $('#image_captcha').html(data);
               });
           });
       });
   </script>
   <script src="<?php echo base_url(); ?>/js/jquery.js"></script>


</head>

<!-- <body style="background-image: url('assets/admin/img/profil.jpg');

background-size: 1500px 700px;
background-repeat: no-repeat;"> -->
<body style="background-color: #6B8E23; 

background-size: 1500px 700px;
background-repeat: no-repeat;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h2 class="h4 text-gray-900 mb-4"><b> Sign In to Your Dashboard</b></h2>


                    <label>Please Log In</label>
                  </div>
                  <form class="user" action="<?php echo base_url('login/login_validation'); ?>" method="post">
                    <!-- Notifikasi -->
                    <?php if ($info = $this->session->flashdata('message')) {
                      echo $info;
                    } ?>
                    <!-- /Notifikasi -->
                    <div class="form-group">
                      <B><input type="text" class="form-control form-control-user" name="username" placeholder="username" autocomplete="off" required=""></B>
                    </div>
                    <div class="form-group">
                      <B><input type="password" class="form-control form-control-user" name="password" placeholder="password" autocomplete="off" required=""></B>
                    </div>
                                        <button type="submit" class="btn bg-info btn-user btn-block"><font color="white">
                     Log In </font>
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('login/forgot_password') ?>" style="text-decoration: none;">Lupa Password?</a>
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
