<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Bimbingan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Bimbingan Siswa</h6>
      <a href="<?php echo base_url('data_bimbingan') ?>" class="btn btn-info float-right">Kembali</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table>
        <tbody width="100%">
          <tr>
            <td style="padding: 10px">NIS</td>
            <td style="padding: 10px">:</td>
            <td style="padding: 10px"><?php echo $data_bimbingan[0]['NIS'] ?></td>
          </tr>
          <tr>
            <td style="padding: 10px">Nama</td>
            <td style="padding: 10px">:</td>
            <td style="padding: 10px"><?php echo $data_bimbingan[0]['nama_lengkap'] ?></td>
          </tr>
          <tr>
            <td style="padding: 10px">Kelas</td>
            <td style="padding: 10px">:</td>
            <td style="padding: 10px">
                <?php
                  foreach ($data_kelas as $kelas) {
                    if ($data_bimbingan[0]['id_kelas']==$kelas['id_kelas']) {
                      echo $kelas['tingkatan'].' '.$kelas['nama_jurusan'].' '.$kelas['urutan_kelas'];
                    } 
                  }
                ?>
            </td>
          </tr>
          <tr>
            <td style="padding: 10px">Subjek</td>
            <td style="padding: 10px">:</td>
            <td style="padding: 10px"><?php echo $data_bimbingan[0]['subjek'] ?></td>
          </tr>
        </tbody>
      </table>
      <div style="padding: 10px">
        <h3>Isi Bimbingan</h3>
        <hr>
        <i><?php echo $data_bimbingan[0]['tanggal_bimbingan'] ?></i>
        <textarea rows="8" class="form-control" disabled=""><?php echo $data_bimbingan[0]['isi_bimbingan'] ?></textarea>
      </div>
      <form action="<?php echo base_url('Data_bimbingan/kirim_balasan/'.$data_bimbingan[0]['id_bimbingan']) ?>" method="post">
        <div style="padding: 10px">
          <?php if ($this->session->userdata('level') == "guru") { ?>
              
          
          <h3>Isi Balasan</h3>
          <hr>
          <div class="form-group">
            <?php if (!empty($data_bimbingan[0]['isi_balasan'])) {?>
              <i><?php echo $data_bimbingan[0]['tanggal_balasan'] ?></i>
            <?php } ?>
            <textarea rows="8" class="form-control" placeholder="Masukkan balasan bimbingan anda disini" name="balasan" <?php if (!empty($data_bimbingan[0]['isi_balasan'])) {echo"disabled";} ?>><?php if (!empty($data_bimbingan[0]['isi_balasan'])) {echo $data_bimbingan[0]['isi_balasan'];} ?></textarea>  
          </div>
          <div class="form-group float-right">
            <?php if (empty($data_bimbingan[0]['isi_balasan'])) {?>
              <button type="submit" class="btn btn-primary">Kirim</button>
            <?php } ?>
          </div>
        </div>
          <?php } ?>
      </form>
    </div>
  </div>
</div>