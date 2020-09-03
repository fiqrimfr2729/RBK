  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <center>
                <!-- <img src="assets/admin/images/head_surat.png" width="100%" /> -->
                <h3 class="card-title">Data Kelas <?php echo $kelas->tingkatan ?> <?php echo $kelas->nama_jurusan ?> <?php echo $kelas->urutan_kelas ?></h3>
              </center>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table class="table-form" border="1" width="100%" cellpadding="0" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>No</center></th>
                      <th><center>NIS</center></th>
                      <th><center>NISN</center></th>
                      <th><center>Nama Siswa/i</center></th>
                      <th><center>Jenis Kelamin</center></th>
                      <th><center>TTL</center></th>
                      <th><center>Agama</center></th>
                      <th><center>Alamat</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    if (sizeof($result_print)>0) {
                    foreach($result_print as $hasil){ 
                      ?>
                      <tr>
                        <td><center><?php echo $no++; ?></center></td>
                        <td><center><?php echo $hasil->NIS; ?></center></td>
                        <td><center><?php echo $hasil->NISN; ?></center></td>
                        <td><center><?php echo $hasil->nama_lengkap; ?></center></td>
                        <td><center><?php echo $hasil->jk; ?></center></td>
                        <td><center><?php echo $hasil->tempat_lahir; ?> <?php echo $hasil->tanggal_lahir; ?></center></td>
                        <td><center><?php echo $hasil->agama; ?></center></td>
                        <td><center><?php echo $hasil->alamat; ?></center></td>
                      </tr>
                      <?php
                    }
                    } else {
                      ?>
                      <tr>
                        <td colspan="8"><center><?php echo "Data Masih Kosong"; ?></center></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>