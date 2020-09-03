<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Detail Rekap : <?= $detail_siswa['nama_lengkap']; ?></h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Detail Rekap Absensi <?= $detail_siswa['nama_lengkap']?></h6>
       
      <a href="<?php echo site_url('Data_absensi/rekapAbsensiSiswa'); ?>" class="btn btn-danger float-right">Kembali</a>
  </div>

  <div class="card-body">
    <!-- <div class="table-responsive"> -->
      <!-- <div class="container"> -->

      <div class="col-md-12">

           <!-- <h3 class="mb-5">Detail Data Sidang Tugas Akhir <?=$detail_siswa['nama_lengkap'];?> </h3> -->
           <div class="block-content">
            <div class="row mt-4">
              <div class="col-md-4">
                <strong><p>NIS</p></strong>
                <h5 class="text-dark mb-0 font-16 font-weight-medium" style="font-size: 14px; "><?=$detail_siswa['NIS']?></h5>
                <br>
                <strong><p>Nama Lengkap</p></strong>
                <h5 class="text-dark mb-0 font-16 font-weight-medium" style="font-size: 14px;"><?=$detail_siswa['nama_lengkap']?></h5>
                <br>
                <strong><p>Jenis Kelamin</p></strong>
                <h5 class="text-dark mb-0 font-16 font-weight-medium" style="font-size: 14px;"><?=$detail_siswa['jk']?></h5>
                <br>
                <strong><p>TTL</p></strong>
                <h5 class="text-dark mb-0 font-16 font-weight-medium" style="font-size: 14px;"><?=$detail_siswa['tempat_lahir']?>, <?=$detail_siswa['tanggal_lahir']?></h5>
                <br>

              </div>
              <div class="col-md-4">

               <strong><p>Email</p></strong>
               <h5 class="text-dark mb-0 font-16 font-weight-medium" style="font-size: 14px;"><?=$detail_siswa['email']?></h5>
               <br>
               <strong><p>Agama</p></strong>
               <h5 class="text-dark mb-0 font-16 font-weight-medium" style="font-size: 14px;"><?=$detail_siswa['agama']?></h5>
               <br>
               <strong><p>Alamat</p></strong>
               <h5 class="text-dark mb-0 font-16 font-weight-medium" style="font-size: 14px;"><?=$detail_siswa['alamat']?></h5>
               <br>
               <strong><p>No Telephone</p></strong>
               <h5 class="text-dark mb-0 font-16 font-weight-medium" style="font-size: 14px;"><?=$detail_siswa['no_hp']?></h5>
               <br>

             </div>
             <div class="col-md-4">
               <strong><p>Hadir</p></strong>
               <h5 class="text-dark font-16 font-weight-medium" style="font-size: 16px;"><span class="badge badge-pill badge-success"><?=$total_hadir;?></span></h5>
               
               <strong><p>Sakit</p></strong>
               <h5 class="text-dark font-16 font-weight-medium" style="font-size: 16px;"><span class="badge badge-pill badge-warning"><?=$total_sakit;?></span></h5>
               
               <strong><p>Izin</p></strong>
               <h5 class="text-dark font-16 font-weight-medium" style="font-size: 16px;"><span class="badge badge-pill badge-default"><?=$total_izin;?></span></h5>

                 <strong><p>Absen</p></strong>
                 <h5 class="text-dark font-16 font-weight-medium" style="font-size: 16px;"><span class="badge badge-pill badge-danger"><?=$total_absen;?></span></h5>
             </div>

   <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>
</div>

