<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Sekolah</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Kelas</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <form action="<?php echo site_url('Data_master/tampil_kelas'); ?>" method="GET">
       <div class="form-group">
        <label>Pilih Kelas</label>
        <select name="id_kelas" class="form-control" style="max-width: 300px;">
          <option selected="" disabled="">-- Silahkan Pilih --</option>
          <?php foreach ($kelas as $key => $value) { ?>
          <option value="<?php echo $value->id_kelas ?>"><?php echo $value->tingkatan ?> <?php echo $value->nama_jurusan ?> <?php echo $value->urutan_kelas ?></option>
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
