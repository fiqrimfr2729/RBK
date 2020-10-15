<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Siswa Kelas  <?php
                    if($kelas[0]['tingkatan']=='1'){echo "X";}elseif($kelas[0]['tingkatan']=='2'){echo "XI";}elseif($kelas[0]['tingkatan']=='3'){echo "XII";}
                    echo ' '.$kelas[0]['nama_jurusan']. ' ' . $kelas[0]['urutan_kelas'];
                    ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <!-- <div class="card-header py-3">
      <h6 class="float-left text-primary font-weight-bold" style="margin-top: 10px">Data Siswa</h6>
      <a href="javascript:;" class="btn btn-info float-right" data-toggle="modal" data-target="#tambahSiswa">Tambah Absensi</a>&ensp;
      <a target="_blank" href="<?php echo site_url('Data_absensi/cetak_kelas'); ?>/<?php echo $kelas[0]['id_kelas'] ?>" class="btn btn-danger float-right"><i class="fas fa-print"></i> Cetak</a>
    </div> -->

    <div class="card-body">
      <div class="table-responsive">

        <form action="<?php echo base_url('data_absensi/save_absensi') ?>" method="post" name="form_absensi" id="form_absensi" enctype="multipart/form-data">
        <a class="btn bg-gradient-info btn-user "><font color = "white">Tanggal Absensi <?php echo $tanggal?></font></a>

        
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead align="center">
            <tr>
              <th width="5%">No</th>
              <th>NIS</th>
              <th>Nama Siswa</th>
              <th>Kelas</th>
              <th width="35%">Kehadiran</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php
            if (sizeof($data_siswa)>0) {
              foreach ($data_siswa as $siswa) { ?>
                <tr>

                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $siswa->nis ?>
                    <input type="hidden" name="id_jurusan[]" value="<?php echo $siswa->id_jurusan ?>">
                    <input type="hidden" name="id_siswa[]" value="<?php echo $siswa->nis ?>">
                    <input type="hidden" name="date" value="<?php echo $tanggal ?>">
                  </td>
                  <td><?php echo $siswa->nama_siswa ?></td>
                  <!-- Read kelas siswa -->
                  <td> 
                    <?php
                    if($siswa->tingkatan=='1'){echo "X";}elseif($siswa->tingkatan=='2'){echo "XI";}elseif($siswa->tingkatan=='3'){echo "XII";}
                    echo ' '.$siswa->singkatan_jurusan. ' ' . $siswa->urutan_kelas;
                    ?>
                  </td>

                  <td align="center">
                    <div class="btn-group">  
                      <select name="keterangan[]" id="Keterangan" class="form-control" required >
                        <option selected disabled>Pilih</option>
                        <?php if($siswa->absensi != null): ?>
                        <option <?php if($siswa->absensi->keterangan=="S"){echo "selected";} ?> value="S">Sakit</option>
                        <option <?php if($siswa->absensi->keterangan=="A"){echo "selected";} ?> value="A">Absen</option>
                        <option <?php if($siswa->absensi->keterangan=="H"){echo "selected";} ?> value="H">Hadir</option>
                        <option <?php if($siswa->absensi->keterangan=="I"){echo "selected";} ?> value="I">Izin</option>
                        <?php else: ?>
                        <option value="S">Sakit</option>
                        <option value="A">Absen</option>
                        <option value="H">Hadir</option>
                        <option value="I">Izin</option>
                        <?php endif; ?>
                      </select>
                    </div>
                           
              <td>
              </tr>
            <?php }
          } ?>
        </tbody>
      </table>
      
      <button type="submit" class="btn bg-gradient-info btn-user btn-block"><font color = "white">simpan</font></button>

      </form>
    </div>
  </div>
</div>



  <script type="text/javascript">
    $(document).ready(function() {
    // validate the comment form when it is submitted
    $("#form_absensi").validate({
        rules: {
            "keterangan[]": "required"
        },
        messages: {
            "keterangan[]": "pilih keterangan",
        }
    });
});
</script>