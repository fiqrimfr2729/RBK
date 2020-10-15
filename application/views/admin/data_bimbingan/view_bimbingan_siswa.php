<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Bimbingan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Bimbingan Siswa</h6>
   <!--  <a href="javascript:;" class="btn btn-info float-right" data-toggle="modal" data-target="#catatBimbingan">Tambah Bimbingan</a> -->
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead align="center">
          <tr>
            <th width="5%">No</th>
            <th>Subjek</th>
            <th>Tanggal</th>
            <th>Isi</th>
            <th>Tingkat</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach($data_bimbingan as $bimbingan): ?>
            <tr>
              <td align="center"><?php echo $no++ ?> </td>
              <td align="center"><?php echo $bimbingan['subject'] ?> </td>
              <td align="center"><?php echo $bimbingan['tgl_bim'] ?> </td>
              <td align="center"><?php echo $bimbingan['isi_bim'] ?> </td>
              <td align="center"> <?php if($bimbingan['id_tingkatan'] == '1'){echo 'X';}elseif($bimbingan['id_tingkatan'] == '2'){echo 'XI';}elseif($bimbingan['id_tingkatan'] == '3'){echo 'XII';} ?> </td>
              <td align="center"> <a href="<?php echo base_url('Data_bimbingan/rekap_bimbingan/'.$bimbingan['id_bimbingan']) ?>" class="btn btn-info" style="margin-right: 10px"><i class="fas fa-eye"></i> Lihat</a> </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Add bimbingan Modal-->
  <div class="modal fade" id="catatBimbingan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bimbingan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user" action="<?php echo base_url('data_konseling/add_konseling'); ?>" method="post">
            <div class="form-group">
              <label>Tanggal Bimbingan</label>
              <input type="date" placeholder="tanggal bimbingan" name="waktu_bimbingan" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Nama Siswa</label>
              <select name="nis" class="form-control">
                <option selected="" disabled="">--Pilih Nama Siswa--</option>
                <?php foreach ($data_siswa as $siswa) { ?>
                  <option value="<?php echo $siswa['NIS'] ?>"><?php echo $siswa['nama_lengkap'] ?> <!-- - Skor kredit [<?php echo $siswa['skor'] ?>] --></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Jenis Bimbingan</label>
              <select name="subjek" class="form-control">
                <option selected="" disabled="">-- Pilih --</option>
                <option value="Pribadi">Pribadi</option>
                <option value="Sosial">Sosial</option>
                <option value="Karir">Karir</option>
                <option value="Belajar">Belajar</option>
              </select>
            </div>
            <div class="form-group">       
              <label><i>* Permasalahan</i></label>
              <textarea class="form-control" name="catatan" rows="8"></textarea>
            </div>
            <button type="submit" class="btn bg-info btn-user btn-block"><font color="white">
            Simpan </font>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>