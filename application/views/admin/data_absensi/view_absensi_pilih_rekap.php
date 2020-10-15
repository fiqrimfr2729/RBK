<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Absensi Kelas</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <form action="<?php echo site_url('Data_absensi/tampil_rekap'); ?>" method="GET">
       <div class="form-group">
        <label>Pilih Kelas</label>
        <select name="id_kelas" class="form-control" style="max-width: 300px;">
          <option selected="" disabled="">-- Silahkan Pilih --</option>
          <?php foreach ($kelas as $key => $value) { ?>
          <option value="<?php echo $value->id_kelas ?>"><?php if($value->tingkatan == '1'){echo 'X';}elseif($value->tingkatan == '2'){echo 'XI';}else{echo 'XII';} ?> <?php echo $value->singkatan_jurusan ?> <?php echo $value->urutan_kelas ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info"><i class="fa fa-file"></i> Pilih Kelas</button>
      </div>
    </form>
  </div>
</div>
</div>
