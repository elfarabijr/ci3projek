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
    <div class="card card-navy">
      <div class="card-body">
        <a href="<?= site_url('warung/profil') ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> kembali</a>
    </div>
</div>
<div class="card card-navy">
  <div class="card-header">
    <h3 class="card-title">Ubah Info Warung</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form action="<?= site_url('warung/ubah_action') ?>" method="post">
    <input type="hidden" name="idwarung" value="<?= $warung_data->idwarung ?>">
    <div class="card-body">
      <div class="form-group">
        <label for="varchar">Nama Warung</label>
        <input type="text" class="form-control" name="nama_warung" id="nama_warung" placeholder="Nama Warung" required value="<?= $warung_data->nama_warung ?>" />
    </div>
    <div class="form-group">
        <label for="int">Nomor HP </label>
        <input type="number" class="form-control" name="no_hp" id="no_hp" maxlength="14" min="0" placeholder="ex: 08.." value="<?= $warung_data->no_hp ?>" required />
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn bg-navy">Update</button>
    <button type="reset" class="btn btn-default">Reset</button>
</div>
</form>
</div>

</div>
</section>
