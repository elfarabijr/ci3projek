<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-KANTIN | Lockscreen</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition lockscreen">
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
      <a href="<?= base_url() ?>template/index2.html"><b>E-</b>KANTIN</a>
    </div>
    <?php if (isset($eror)) { ?>
      <div class="lockscreen-item">
        <div class="alert alert-<?= $btn; ?> alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas <?= $ic; ?>"></i> <?= $msg; ?></h5>
          <small><?= $eror; ?></small>
        </div>
      </div>
      <?php  } ?> 
      <!-- User name -->
      <div class="lockscreen-name"><?= $this->session->userdata('nama') ?></div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="<?= base_url() ?>template/dist/img/usr.png" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form method="POST" class="lockscreen-credentials" action="<?= site_url('login/cekscren') ?>">
          <div class="input-group">
            <input type="password" name="pass" class="form-control" placeholder="password">

            <div class="input-group-append">
              <button type="submit" class="btn">
                <i class="fas fa-arrow-right text-muted"></i>
              </button>
            </div>
          </div>
        </form>
        <!-- /.lockscreen credentials -->

      </div>
      <!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Masukan password untuk melanjutkan..
      </div>
      <div class="text-center">
        <a href="<?= site_url('shop') ?>">Kembali ke halaman utama</a>
      </div>
      <div class="lockscreen-footer text-center">
       &copy; 2021 <b><a href="#" class="text-black">E-KANTIN</a></b><br>
     </div>
   </div>
   <!-- /.center -->

   <!-- jQuery -->
   <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>
