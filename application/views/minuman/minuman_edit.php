<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Ubah Minuman</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ubah Minuman</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
  <div class="container-fluid">

    <div class="col-sm-12 col-12">
      <a href="<?= site_url('minuman') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <br>
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Form Ubah Minuman</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?php echo $action; ?>" method="post" enctype='multipart/form-data'>
        <div class="card-body">
          <div class="form-group">
            <label for="varchar">Nama Minuman</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Minuman" value="<?php echo $nama; ?>" />
          </div>
          <div class="form-group">
            <label for="int">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="Rp .." value="<?php echo $harga; ?>" />
          </div>
          
          <div class="form-group">
            <label>Stock</label>
            <select class="form-control" name="stock" required="">
              <option value="tersedia">Tersedia</option>
              <option value="habis">Habis</option>
            </select>
          </div>
          <div class="form-group">
            <label for="customFile">Gambar</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="gambar">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
          <input type="hidden" name="gbr" value="<?php echo $gbr; ?>" />
          <input type="hidden" name="idmenu" value="<?php echo $idmenu; ?>" />
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