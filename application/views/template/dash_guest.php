<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Daftar Warung</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Daftar Warung</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <?php if (isset($data_daftar)) { ?>
      <div class="col-sm-12 col-md-12">

        <div class="callout callout-info">
          <h5>Pemberitahuan!</h5>

          <p>Anda telah mendaftarkan warung Anda, harap tunggu konfirmasi selanjutnya..</p>
        </div>
        <div class="row mt-4">
          <div class="col-sm-4">
            <div class="position-relative p-3 bg-gray" style="height: 180px">
              <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-success text-lg">
                  Pending
                </div>
              </div>
              <h4><?= $data_daftar->namawarung ?></h4>
              <hr>
              Pemilik : <?= $this->session->userdata('nama') ?>
              <br />Telepon / WA : <?= $data_daftar->no_hp ?>
              <br />Lama Sewa : <?= $data_daftar->lamasewa ?> Tahun<br />
              <small></small>
            </div>
          </div>
        </div>
      </div>
      <?php } else { ?>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Bergabung Dengan Kami</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= site_url('utama/daftar') ?>" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="varchar">Nama Warung</label>
                <input type="text" class="form-control" name="nama_warung" id="nama_warung" placeholder="Nama Warung" required  />
              </div>
              <div class="form-group">
                <label for="int">Nomor HP </label>
                <input type="number" class="form-control" name="no_hp" id="no_hp" maxlength="14" min="0" placeholder="ex: 08.." required />
              </div>
              <div class="form-group">
                <label>Lama Sewa</label>
                <select class="form-control" name="lamasewa" id="lamasewa" required="">
                  <option value="1">1 Tahun</option>
                  <option value="2">2 Tahun</option>
                  <option value="3">3 Tahun</option>
                  <option value="5">5 Tahun</option>
                </select>
              </div>
              <div class="form-group">
                <label for="varchar">Letak Warung</label>
                <select class="form-control custom-select" name="letak">
                  <option selected disabled>-- pilih tempat --</option>
                  <?php foreach ($tempat as $tmpt) { ?>

                    <option value="<?= $tmpt->kode_letak ?>"><?= $tmpt->keterangan ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form>
          </div>
          <?php } ?>
        </div>
      </section>