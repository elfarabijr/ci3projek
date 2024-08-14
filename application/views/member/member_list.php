
<!-- Content Header (Page header) -->
<div class="content-header">
  <?php if (isset($msg)) { ?>

    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
      Email Telah digunakan!!! Harap gunakan email lain.
    </div>
    
    <?php } ?>

    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Member E-Kantin</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Member E-Kantin</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="col-sm-12 col-12">
        <button type="button" class="btn bg-navy" data-toggle="modal" data-target="#tbh_member">
          <i class="fas fa-plus-square"></i> Tambah
        </button>
      </div>
      <br>
      <div class="card card-outline card-navy">
        <div class="card-header">
          <p class="card-title">Total Record : <?php echo $total_rows ?></p class="card-title">
            <div class="card-tools">
              <form action="<?php echo site_url('member/index'); ?>" method="get">
                <div class="input-group input-group-sm" style="width: 170px;">
                  <input type="text" name="cari" class="form-control float-right" placeholder="Search" value="<?php echo $cari; ?>">
                  <div class="input-group-append">
                    <?php 
                    if ($cari <> '')
                    {
                      ?>
                      <a href="<?php echo site_url('member'); ?>" class="btn btn-default">
                        <i class="fas fa-times"></i>
                      </a>
                      <?php
                    }
                    ?>
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-hover text-nowrap table-head-fixed">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody><?php 
              if (!empty($member_data)) {

                foreach ($member_data as $member)
                {
                  ?>
                  <tr>
                   <td><?= $member->nama_lengkap ?></td>
                   <td><?= $member->email ?></td>
                   <td><?= $member->gender ?></td>
                   <td><?= $member->alamat ?></td>
                   <td>
                    <!-- <button class="btn btn-sm btn-info lht_minum" data-id=""><i class="fas fa-eye"></i></button> -->
                    <a class="btn btn-sm btn-danger" href="<?= site_url('member/delete/'.$member->id_member) ?>" onclick="return confirm('Hapus Item Ini ?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php 
              }
            } else { ?>

             <center>
              <tr><td colspan="4" style="text-align: center;">--- Tidak Ada Data ---</td></tr>
            </center>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</section>


<!-- modal -->
<div class="modal fade" id="tbh_member">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Member</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('member/create_action') ?>" method="post">
        <div class="modal-body table-responsive p-0">
          <div class="col-sm-12">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" id="pass1" placeholder="Password" name="pass" required="required">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="form-group mb-3">
              <!-- <label>Gender</label> -->
              <select class="form-control custom-select" name="gender">
                <option selected disabled>-- pilih gender --</option>
                <option value="laki-Laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <textarea class="form-control" rows="3" placeholder="Alamat ..." name="alamat"></textarea>
            </div>
            <div class="form-group mb-3">
              <select class="form-control custom-select" name="ket" required="">
                <option >-- role user --</option>
                <option value="1">Guest</option>
                <option value="2">Penjual</option>
                <option value="3">Administrator</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary">Simpan</button> 
          <button type="reset" class="btn btn-default">Reset</button> 
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->