<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><i class="fas fa-cog"></i> Ubah Password</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">ubah password</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="card card-navy">
      <div class="card-header">
        <h3 class="card-title">Form Ubah Password</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <input type="hidden" name="iduser" id="iduser" value="<?= $this->session->userdata('iduser') ?>">
      <div class="card-body">
        <div class="form-group">
          <label for="varchar">Password Lama</label>
          <input type="password" class="form-control" name="passold" id="passold" placeholder="password lama" required" />
        </div>
        <div class="form-group">
          <label for="varchar">Password Baru</label>
          <input type="password" class="form-control" name="pass" id="pass" placeholder="password baru" required" />
        </div>
        <div class="form-group">
          <label for="varchar">Ulangi Password</label>
          <input type="password" class="form-control" name="pass1" id="pass1" placeholder="ulangi password" required" />
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button class="btn bg-navy" id="editpass">Update</button>
      </div>
    </div>

  </div>
</section>
