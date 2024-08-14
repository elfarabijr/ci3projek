<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-canteen | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>E-</b>CANTEEN</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login Untuk Memulai!</p>

        <?php if (isset($eror)) { ?>

          <div class="alert alert-<?= $btn; ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas <?= $ic; ?>"></i> <?= $msg; ?></h5>
            <small><?= $eror; ?></small>
          </div>
          <?php  } ?>

          <form action="<?= site_url('login/cekUser') ?>" method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="pass" placeholder="Password" required="required"> 
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-block bg-navy">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="<?= site_url('login/regis') ?>" class="btn btn-block btn-danger">
              <i class="fab  mr-2"></i> Daftar Akun!
            </a>
            <!-- <a href="" class="btn btn-block btn-primary">
              <i class="fab  mr-2"></i> Lupa Password ?
            </a> -->
            <a href="<?= base_url('') ?>" class="btn btn-block btn-primary">
              <i class="fas fa-shopping-cart mr-2"></i> Kembali
            </a>
          </div>
          <!-- /.social-auth-links -->

     <!--  <p class="mb-1">
        <a href="forgot-password.html">Lupa Password ?</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Buat Akun!</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
</body>
</html>
