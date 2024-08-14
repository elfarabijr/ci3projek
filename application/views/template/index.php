<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-KANTIN | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php 
    $this->load->view('template/navbar'); 
    $this->load->view('template/sidebar');    
    $this->load->view($isi);
    ?>
    
  </div>
  <footer class="main-footer">
    <!-- <strong>Copyright &copy; 2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div> -->
    <strong>&copy; 2021 <a href="#">Aiotech</a></strong>

    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
<!--   <aside class="control-sidebar control-sidebar-dark">
  </aside>
-->  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>template/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>template/dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>template/plugins/toastr/toastr.min.js"></script>
<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

</script>
<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["colvis"]
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- detail makanan -->
<script type="text/javascript">
  $(document).on("click", '.lihat', function() {
    $(".modal-body .bdg").empty();

    var idp = $(this).data('id');

    $.post(
      "<?= site_url('makanan/lihatmkn') ?>", {
        id: idp
      },
      function(data) {
        var obj = JSON.parse(data);
        var imgsrc = "<?= base_url()?>upload/menu/" + obj.gambar ;
        $(".modal-body #id_mkn").text(idp);
        $(".modal-body #nm_mkn").text(obj.nama);
        $(".modal-body #id_wrg").text(obj.id_warung);
        $(".modal-body #hrg").text(obj.harga);
        $(".modal-body #stok").text(obj.stock);
        $('.modal-body #gbr').attr('src',imgsrc);     
      });
    
    $('#lihatdetail').modal('show');
  });
</script>

<!-- detail minuman -->
<script type="text/javascript">
  $(document).on("click", '.lht_minum', function() {
    $(".modal-body .mnm").empty();

    var idp = $(this).data('id');

    $.post(
      "<?= site_url('minuman/lihatmnm') ?>", {
        id: idp
      },
      function(data) {
        var obj = JSON.parse(data);
        var imgsrc = "<?= base_url()?>upload/menu/" + obj.gambar ;
        $(".modal-body #id_mnm").text(idp);
        $(".modal-body #nm_mnm").text(obj.nama);
        $(".modal-body #id_wrg").text(obj.id_warung);
        $(".modal-body #hrg").text(obj.harga);
        $(".modal-body #stok").text(obj.stock);
        $('.modal-body #gbr').attr('src',imgsrc);     
      });
    
    $('#lihatminuman').modal('show');
  });
</script>
<script type="text/javascript">
  $(function() {
    $("#editpass").click(function() {
      var iduser = $("#iduser").val();
      var passold = $("#passold").val();
      var password = $("#pass").val();
      var confirmPassword = $("#pass1").val();
      if (password =='' | password != confirmPassword) {
        Toast.fire({
          icon: 'error',
          title: 'Konfirmasi Password anda tidak sesuai!.'
        })
        return false;
      } 
      else {
        $.ajax({
          url : '<?= site_url("utama/passcek") ?>',
          data : {
            'id': iduser,
            'pas': passold,
          },
          type: 'post',
          success:function(data) {
            var obj = JSON.parse(data);
            if (obj == null) {
              Toast.fire({
                icon: 'error',
                title: ' Password yang dimasukan tidak sesuai!'
              })
            } else {

             $.post("<?= site_url('utama/ubah_password') ?>",
             {
              id: iduser,
              pass: password,
            },
            function(data) {
             Toast.fire({
              icon: 'success',
              title: ' Password Telah Berhasil dirubah!'
            })  

           });
             $("#passold").val('');
             $("#pass").val('');
             $("#pass1").val('');
           }
         },
         error:function(){
          Toast.fire({
            icon: 'error',
            title: ' Gagal memperbarui password!'
          })
        }
      });
      }
    })
  });
</script>

</body>
</html>