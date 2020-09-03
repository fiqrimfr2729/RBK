<div class="card mb-3" style="max-width: 590px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/dist/img/profile/') . $user['image']; ?>" class="card-img" style="border:0px; width:200px; height:200px;"  alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['nama']; ?></h5>
                        <p class="card-text"><?= $user['email']; ?>.</p>
                        <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user['date_created']);?></small></p>
                        <br>
                        <a href="<?= base_url('petugas/edit_user'); ?>" class="btn btn-primary btn-flat btn-xs">Edit Profil</a>
                        <a href="<?= base_url('petugas/ubahpassword'); ?>" class="btn btn-primary btn-flat btn-xs">Ubah Password</a>


                    </div>
                </div>
              </div>
            </div>