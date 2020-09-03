<?php $this->load->view('ortu/partial/header'); ?>
<form action="<?php echo base_url('Ortu/do_change_password') ?>/<?php echo $this->session->userdata('id_users') ?>" method="post">
<center>
  <h2>Ubah Kata Sandi</h2>
    <br>
    <!-- Notification Change Password -->
    <?php if ($info = $this->session->flashdata('message')) {
      echo $info;
    } ?>
    <!-- End Notification Change Password -->
    <table class="table" border="0" style="border: 0px !important">
       <!-- <tr>
          <td>Current Password</td>
          <td>
              <input type="password" class="form-control" name="password_lama">
          </td>
       </tr> -->
       <tr>
          <td>Kata Sandi Baru</td>
          <td>
              <input type="password" class="form-control" name="password" placeholder="Masukkan sandi baru" required="">
          </td>
       </tr>
       <tr>
          <td>Konfirmasi Kata Sandi Baru</td>
          <td>
              <input type="password" class="form-control" name="password_konfirmasi" placeholder="Konfirmasi sandi baru" required="">
          </td>
       </tr>
    </table>
</center>
<hr>
<button type="submit" style="width: 100%" class="btn btn-primary">Simpan</button>
</form>
<?php $this->load->view('ortu/partial/footer'); ?>