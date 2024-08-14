<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Warung Saya</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Warung</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="col-12">
      <!-- Widget: user widget style 1 -->
      <div class="card card-widget widget-user shadow-lg">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header text-white"
        style="background: url('<?= base_url() ?>template/dist/img/photo1.png') center center;">
        <h3 class="widget-user-username text-right"><?= $warung_data->nama_warung ?></h3>
        <h5 class="widget-user-desc text-right"><?= $warung_data->nama_lengkap ?></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="<?= base_url() ?>template/dist/img/usr.png" alt="User Avatar">
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-3 border-right">
            <div class="description-block">
              <h5 class="description-header"><?= $jml_terjual->tot ==''?'0': $jml_terjual->tot ?></h5>
              <span class="description-text">TERJUAL</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 border-right">
            <div class="description-block">
              <h5 class="description-header"><?= $jml_produk ?></h5>
              <span class="description-text">PRODUK</span>
            </div>
            <!-- /.description-block -->
          </div>
          <div class="col-sm-3 border-right">
            <div class="description-block">
              <h5 class="description-header"><?= $warung_data->no_hp ?></h5>
              <span class="description-text">HP</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3">
            <div class="description-block">
              <h5 class="description-header"><?= $warung_data->keterangan ?></h5>
              <span class="description-text">LETAK</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->
    <h5 class="mb-2">Pengaturan</h5>
    <div class="card card-success">
      <div class="card-body">
        <a href="<?= site_url('warung/ubah/'.$warung_data->idwarung) ?>" class="btn btn-secondary">ubah info warung</a>
      </div>
    </div>
  </div>
</div>
</div>
</section>