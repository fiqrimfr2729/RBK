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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/users/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/users/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/users/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/admin/") ?>img/logo.jpg" sizes="32x32" />
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
        <?php $this->load->view('users/partial/tpl_header'); ?>
        <!-- BEGIN CONTAINER -->
        <div class="page-container page-content-inner page-container-bg-solid">
            
            <br>
            <!-- BEGIN CONTENT -->
            <div class="container-fluid container-lf-space">
                <?php $this->load->view($content); ?>
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
        
        <!-- BEGIN FOOTER -->
        <?php $this->load->view('users/partial/tpl_footer'); ?>
        <!-- END FOOTER -->
       
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/users/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

        <!-- TAMBAH SWEET ALERT YA -->
        <script src="<?=base_url()?>assets/users/scripts/sweetalert.min.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/users/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/users/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/users/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/users/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=base_url()?>assets/users/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <script src="<?php echo base_url(); ?>assets/users/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

        <!-- datedropper 3 -->
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/datedropper3/datedropper.js" type="text/javascript"></script>

        <!-- swiper 4.4.1 -->
        <script src="<?php echo base_url(); ?>assets/users/global/plugins/swiper/js/swiper.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/users/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/users/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/users/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

        <!-- <script src="<?php echo base_url(); ?>assets/users/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script> -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/users/layouts/layout7/scripts/layout.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <script type="text/javascript">
            var base_url = '<?php echo base_url(); ?>';
        </script>

        <script type="text/javascript">
            var burl = $('#base_url').val();

            $(document).ready(function(){
                $('.buttons-print').hide();
                $('.buttons-pdf').hide();
                $('.buttons-csv').hide();
            });
        </script>
        <script>
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#example').DataTable({
      initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
              var that = this;

              $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                  that
                  .search( this.value )
                  .draw();
                }
              } );
            } );
          }
        });


    } );

     </script>
    </body>

</html>
