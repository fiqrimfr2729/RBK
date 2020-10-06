<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Universitas </h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Universitas</h6>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>Nama Universitas</th>
            <th>Jumlah Alumni</th>
            <th width="30%">Aksi</th>

          </tr>
        </thead>
        <tbody>
          <?php $no = 0; ?>
          <?php foreach ($universitas as $data) { ?>
            <tr>
              <td align="center"><?php echo ++$no ?></td>
              <td align="center"><?php echo $data->nama_universitas ?></td>
              <td align="center"><?php echo $data->jumlah. '' ?></td>
              <td align="center">
                <a href="<?php echo site_url('Alumni/list_alumni_universitas?id_universitas=').$data->id_universitas; ?>" class="btn btn-primary" style="margin-right: 10px"><i class="fas fa-list"></i> Lihat Alumni</a>
              </td>
              
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>