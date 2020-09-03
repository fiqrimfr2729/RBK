<?php $this->load->view('ortu/partial/header'); ?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container page-content-inner page-container-bg-solid">

	<br>
	<!-- BEGIN CONTENT -->
	<div class="container-fluid container-lf-space">
		<div class="row">
            <div class="col-md-12">
        <center>
            <h3><b>Selamat datang, Bapak <?php echo $this->session->userdata('nama_lengkap'); ?></b></h3>
      <br>
            <label><b>Kredit Skor Anak Anda</b></label>
            <h3><b><?php echo $data_siswa[0]['skor']; ?></b></h3>
      <?php
      if ($data_siswa[0]['skor']=='100') {
        echo "<h3><b>Sangat Baik</b></h3>";
      } elseif($data_siswa[0]['skor']<'100' && $data_siswa[0]['skor']>'79') {
        echo "<h3><b>Baik</b></h3>";
      } elseif($data_siswa[0]['skor']<'80' && $data_siswa[0]['skor']>'69') {
        echo "<h3><b>Cukup</b></h3>";
      } elseif($data_siswa[0]['skor']<'70' && $data_siswa[0]['skor']>'59') {
        echo "<h3><b>Kurang</b></h3>";
      } elseif($data_siswa[0]['skor']<'60') {
        echo "<h3><b>Sangat Buruk</b></h3>
        <label>(silahkan konsultasikan dengan Guru BK)</label>
        ";
      }
      ?>
        </center>
    <br>
    </div>

		</div>
	</div>

    <div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-list font-dark"></i>
                    <span class="caption-subject bold uppercase">Riwayat Konseling</span>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                    <thead>
                        <tr>
                            <th class="">No.</th>
                            <th class="">Kategori Pelanggaran</th>
                            <th class="">Pelanggaran</th>
                            <th class="">Skor (-)</th>
                            <!-- <th class="">Catatan</th>
                            <th class="">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_konseling as $konseling) { ?>
                            <tr>
                                <td>1.</td>
                                <td><?php echo $konseling['nama_kategori'] ?></td>
                                <td><?php echo $konseling['nama_pelanggaran'] ?></td>
                                <td><?php echo $konseling['bobot'] ?></td>
                               <!--  <td><?php echo $konseling['catatan'] ?></td>
                                <td align="center">
                                    <a href="javascript:;" data-toggle="modal" data-target="#detailKonseling<?php echo $konseling['id_konseling'] ?>" class="btn btn-info" style="margin-right: 10px">Lihat Detail</a>
                                </td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>

	<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
</div>


<?php $this->load->view('ortu/partial/footer'); ?>