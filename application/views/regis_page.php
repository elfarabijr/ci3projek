<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Canteen | Registrasi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>E-</b>CANTEEN</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Daftar sebagai membership</p>

        <?php if (isset($eror)) { ?>

          <div class="alert alert-<?= $btn; ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas <?= $ic; ?>"></i> <?= $msg; ?></h5>
            <small><?= $eror; ?></small>
          </div>
          <?php  } ?>

          <form action="<?= site_url('login/regisAkun') ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" id="pass1" placeholder="Password" name="pass" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" id="pass2" placeholder="Ulangi password" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-navy">
                  <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                  <label for="agreeTerms">
                   I agree to the <a href="#">terms</a>
                 </label>
               </div>
             </div>
             <!-- /.col -->
             <div class="col-4">
              <button type="submit" id="btnSubmit" class="btn bg-navy btn-block">Regis</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="<?= site_url('login') ?>" class="btn btn-block btn-primary">
            <i class="fab  mr-2"></i>
            Sudah memiliki akun ? login
          </a>
        </div>

        <!-- <a href="login.html" class="text-center">I already have a membership</a> -->
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    $(function () {
      $("#btnSubmit").click(function () {
        var password = $("#pass1").val();
        var confirmPassword = $("#pass2").val();
        if (password != confirmPassword) {
          alert("Konfirmasi password tidak Sesuai!");
          return false;
        }
        return true;
      });
    });
  </script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
</body>
</html>
