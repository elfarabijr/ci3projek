
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Ubah Posisi Toko</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ubah Posisi Toko</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
  <div class="container-fluid">

    <div class="col-sm-12 col-12">
      <a href="<?= site_url('letak') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <br>
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Form Ubah Posisi Toko</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?php echo $action; ?>" method="post" enctype='multipart/form-data'>
        <div class="card-body">
          <div class="form-group">
            <label for="varchar">Kode Letak <?php echo form_error('kode_letak') ?></label>
            <input type="text" class="form-control" name="kode_letak" id="kode_letak" placeholder="ex: LG00" required="required" maxlength="4" value="<?php echo $kode_letak; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" required="required" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
          </div>
          <div class="form-group">
            <label for="varchar">Status <?php echo form_error('stat') ?></label>
            <select class="form-control custom-select" name="letak">
              <option value="Tersedia" <?php $stat == 'Tersedia' ? print_r('selected') : ''; ?> >Tersedia</option>
              <option value="Ditempati" <?php $stat == 'Ditempati' ? print_r('selected') : ''; ?> >Ditempati</option>
            </select>
          </div>
          <input type="hidden" name="kode_letak_lama" value="<?php echo $kode_letak; ?>" />
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
    </div>

  </div>
</section>