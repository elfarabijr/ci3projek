<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Minuman</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tambah Minuman</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Form Minuman</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?php echo $action; ?>" method="post" enctype='multipart/form-data'>
        <div class="card-body">
          <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" required  />
          </div>
          <div class="form-group">
            <label for="int">Harga <?php echo form_error('harga') ?></label>
            <input min="1000"  type="number" class="form-control" name="harga" id="harga" placeholder="Rp .." value="<?php echo $harga; ?>" required  />
          </div>
          <div class="form-group">
            <label>Stock</label>
            <select class="form-control" name="stock" id="stock" required="">
              <option value="Tersedia">Tersedia</option>
              <option value="Habis">Habis</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="varchar">Gambar <?php echo form_error('gambar') ?></label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar" required >
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>
          </div>
          <input type="hidden" name="idmenu" value="<?php echo $idmenu; ?>" />
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-info">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
    </div>

  </div>
</section>