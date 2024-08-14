<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Ubah Makanan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ubah Makanan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
  <div class="container-fluid">

    <div class="col-sm-12 col-12">
      <a href="<?= site_url('makanan') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <br>
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Form Ubah Makanan</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?php echo $action; ?>" method="post" enctype='multipart/form-data'>
        <div class="card-body">
          <div class="form-group">
            <label for="varchar">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Makanan" value="<?php echo $nama; ?>" />
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
            <label for="varchar">Gambar</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>
          </div>
          <input type="hidden" name="idmenu" value="<?php echo $idmenu; ?>" />
          <input type="hidden" name="gbr" value="<?php echo $gbr; ?>" />
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