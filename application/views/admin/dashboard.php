
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
<!--   <label>Selamat datang di Sistem Bimbingan Konseling SMAN 1 Sukagumiwang</label>
   -->
</div>

<!-- Content Row -->
<div class="row">


  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Jurusan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_jurusan ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-home fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Kelas</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_data_kelas ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-home fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Earnings (Monthly) Card Example -->
<!--   <div class="col-xl-6 col-md-6 col-xs-6 mb-6">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data siswa</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo count($data_siswa) ?></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Siswa</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_data_siswa; ?></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data bimbingan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data_bimbingan ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Earnings (Monthly) Card Example -->
  <!-- <div class="col-xl-6 col-md-6 col-xs-6 mb-6">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data pelanggaran</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data_pelanggaran ?></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa fa-exclamation-circle fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
 -->
</div>
<!-- Begin Page Content -->
<br>
<!-- Content Row -->
<div class="row">

  <div class="col-lg-12 col-xs-12">

    <!-- Bar Chart -->
    <!-- <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">REKAP KUNJUNGAN SISWA</h6>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url('admin/dashboard') ?>" method="post">
          <div class="form-group row">
            <div class="col-sm-3 mb-3 mb-sm-0">
              <label><b>Tahun</b></label>
              <select name="tahun" class="form-control">
                <?php foreach ($data_tahun as $tahun) { ?>
                  <?php if (!empty($tahun_dipilih)) {$tahun_dipilih=$tahun_dipilih;} ?>
                  <option <?php if($tahun['tahun']==$tahun_dipilih){echo"selected";} ?> value="<?php echo $tahun['tahun'] ?>"><?php echo $tahun['tahun'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0" style="margin-top: 30px">
              <button type="submit" class="btn btn-info">Lihat Data</button>
            </div>
          </div>
        </form>
        <?php if (!empty($data_kunjungan)) { ?>
          <table width="100%" class="table">
            <thead>
              <tr>
                <th style="padding: 10px" width="5%">No.</th>
                <th style="padding: 10px">Bulan</th>
                <th style="padding: 10px">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($data_kunjungan as $kunjungan) { ?>
                <tr>
                  <td style="padding: 10px"><?php echo $no++ ?>.</td>
                  <td style="padding: 10px"><?php echo date('F', mktime(0, 0, 0, $kunjungan['bulan'], 10)); ?></td>
                  <td style="padding: 10px"><?php echo $kunjungan['jumlah_pengunjung'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        <?php } ?>
      </div>
    </div>
 -->
  </div>
</div>
