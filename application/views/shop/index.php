<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-KANTIN IT-PLN | HOME</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed accent-navy">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-success">
      <div class="container">
        <a href="<?= base_url() ?>" class="navbar-brand">
          <img src="<?= base_url() ?>template/dist/img/logo_mini.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">E-KANTIN</span>
        </a>

        <!-- <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="<?= base_url('') ?>" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('tentang') ?>" class="nav-link">Tentang</a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('kontak') ?>" class="nav-link">Kontak</a>
            </li>

          </ul>

          <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> -->
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('shop/lihatkeranjang') ?>">
            <i class="fa fa-cart-plus" ></i>
            <span class="badge badge-warning navbar-badge" id="isi_keranjang"></span>
          </a>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user-circle fa-lg"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- <span class="dropdown-header">15 Notifications</span> -->

            <?php if ($this->session->userdata('nama') == '') { ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item">
                <i class="fas fa-circle fa-xs text-danger mr-2"></i> Anda Belum Login!!
                <!-- <span class="float-right text-muted text-sm">2 days</span> -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= site_url('login') ?>" class="dropdown-item dropdown-footer">Login</a>
              <?php } else { ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item">
                  <i class="fas fa-circle fa-xs text-success mr-2"></i> <?= $this->session->userdata('nama') ?>
                  <!-- <span class="float-right text-muted text-sm">2 days</span> -->
                </a>
                <a class="dropdown-item" href="<?= site_url('shop/pesanan') ?>">
                  <i class="fas fa-book mr-2"></i> Pesanan Saya
                </a>
                <a class="dropdown-item" href="<?= site_url('login/scren') ?>">
                  <i class="fa fa-cart-plus mr-2"></i> Mulai Jual
                  <!-- <span class="float-right text-muted text-sm">2 days</span> -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= site_url('login/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
                <?php } ?>
              </div>
            </li>
          </ul>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        </div>
      </nav>
      <!-- /.navbar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <?php 
    // $this->load->view('template/navbar'); 
    // $this->load->view('template/sidebar');    
        $this->load->view($isi);
        ?>

      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Syarat & Ketentuan
        </div>
        <!-- Default to the left -->
        <!-- <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
        <strong>&copy; 2021 E-Kantin IT-PLN.</strong>
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>template/plugins/toastr/toastr.min.js"></script>
    <script>
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    </script>
    <!-- detail makanan -->
    <script type="text/javascript">

      // detail makanan
      $(document).on("click", '.detail', function() {
        $(".modal-body .bdg").empty();

        var idp = $(this).data('id');

        $.post(
          "<?= site_url('shop/lihatmenu') ?>", {
            id: idp
          },
          function(data) {
            var obj = JSON.parse(data);
            var imgsrc = "<?= base_url()?>upload/menu/" + obj.gambar ;
            $(".modal-body #idmenu").val(idp);
            $(".modal-body #nm_mkn").text(obj.nama);
            $(".modal-body #id_wrg").text(obj.nama_warung);
            $(".modal-body #hrg").text(obj.harga);
            $(".modal-body #stok").text(obj.stock);
            $('.modal-body #gbr').attr('src',imgsrc);     
          });

        $('#lihatdetail').modal('show');
      });

      // detail minuman
      $(document).on("click", '.detailmnm', function() {
        $(".modal-body .bdg").empty();

        var idp = $(this).data('id');

        $.post(
          "<?= site_url('shop/lihatmenu') ?>", {
            id: idp
          },
          function(data) {
            var obj = JSON.parse(data);
            var imgsrc = "<?= base_url()?>upload/menu/" + obj.gambar ;
            $(".modal-body #idmenu").val(idp);
            $(".modal-body #nm_mnm").text(obj.nama);
            $(".modal-body #id_wrg").text(obj.nama_warung);
            $(".modal-body #hrg").text(obj.harga);
            $('.modal-body #gbrmnm').attr('src',imgsrc);     
          });

        $('#lihatmnm').modal('show');
      });

      // reset modal jml menu
      $(document).ready(function() {
        $("#lihatmnm").on("hidden.bs.modal", function() {
          $(':input', this).val('1');
        });
      });

      $(document).ready(function() {
        $("#lihatdetail").on("hidden.bs.modal", function() {
          $(':input', this).val('1');
        });
      });

    </script>

    <!-- jumlah beli -->
    <script type="text/javascript">
      function kurang(){
        var now = $('#jml_beli').val();
        var skr = parseInt(now);
        if (skr != 1) {
          skr -=1;
        }
        $('#jml_beli').val(skr);
      }

      function tbh(){
        var now = $('#jml_beli').val();
        var skr = parseInt(now)+1;
        $('#jml_beli').val(skr);
      }
    </script>

    <script type="text/javascript">
      function kurangmnm(){
        var now = $('#jml_mnm').val();
        var skr = parseInt(now);
        if (skr != 1) {
          skr -=1;
        }
        $('#jml_mnm').val(skr);
      }

      function tbhmnm(){
        var now = $('#jml_mnm').val();
        var skr = parseInt(now)+1;
        $('#jml_mnm').val(skr);
      }
    </script>
    <!-- end jumlah beli -->
    <!-- tambah ke cart -->
    <script type="text/javascript">
      function addm(){
        var idmkn = $('#idmenu').val();
        var now = $('#jml_beli').val();
        var iduser = '<?= $this->session->userdata('iduser') ?>';
        var jmlskr = parseInt(now);

        $.ajax({
          url : '<?= site_url("shop/addkeranjang") ?>',
          data : {
            'id_barang': idmkn,
            'qtty': jmlskr,
            'id_member': iduser
          },
          type: 'post',
          success:function(respons) {
            jml_krjg();
            Toast.fire({
              icon: 'success',
              title: 'Item telah ditambahkan ke keranjang anda.'
            })  
          },
          error:function(){
            Toast.fire({
              icon: 'error',
              title: 'Gagal Menyimpan!! Login Terlebih dahulu untuk menambahkan item!.'
            })
          }
        });
        
      }

      function addcart(){
        var idmnm = $('#idmenu').val();
        var now = $('#jml_mnm').val();
        var iduser = '<?= $this->session->userdata('iduser') ?>';
        var jmlskr = parseInt(now);

        $.ajax({
          url : '<?= site_url("shop/addkeranjang") ?>',
          data : {
            'id_barang': idmnm,
            'qtty': jmlskr,
            'id_member': iduser
          },
          type: 'post',
          success:function(respons) {
            jml_krjg();
            Toast.fire({
              icon: 'success',
              title: 'Item telah ditambahkan ke keranjang anda.'
            })  
          },
          error:function(){
            Toast.fire({
              icon: 'error',
              title: 'Gagal Menyimpan!! Login Terlebih dahulu untuk menambahkan item!.'
            })
          }
        });
      }
    </script>
    <script type="text/javascript">
     $(document).ready(function() {
      jml_krjg();}
      );

     function jml_krjg(){
      $.ajax({
        url : '<?= site_url("shop/jml_keranjang") ?>',
        type: 'get',
        success:function(data) {
          var obj = JSON.parse(data);
          $('#isi_keranjang').text(obj);
        },
        error:function(){
          $('#isi_keranjang').text('0');
        }
      });
    }
  </script>
</body>
</html>