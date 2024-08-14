
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Warung <span>Terverifikasi</span></h1>
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
    <div class="col-sm-12 col-12">
      <!--   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tbh_posisi">
          <i class="fas fa-plus-square"></i> Tambah
        </button> -->
      </div>
      <br>
      <div class="card card-outline card-success">
        <div class="card-header">
          <p class="card-title">Total Record : <?php echo $total_rows ?></p class="card-title">
            <div class="card-tools">
              <form action="<?php echo site_url('warung/index'); ?>" method="get">
                <div class="input-group input-group-sm" style="width: 170px;">
                  <input type="text" name="cari" class="form-control float-right" placeholder="Search" value="<?php echo $cari; ?>">
                  <div class="input-group-append">
                    <?php 
                    if ($cari <> '')
                    {
                      ?>
                      <a href="<?php echo site_url('warung'); ?>" class="btn btn-default">
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
                  <th>Pemilik</th>
                  <th>No HP</th>
                  <th>Nama Warung</th>
                  <th>lama sewa</th>
                  <th>letak</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody><?php 
              if (!empty($warung_data)) {
          # code...
                foreach ($warung_data as $warung)
                {
                  ?>
                  <tr>
                   <td><?php echo $warung->nama_lengkap ?></td>
                   <td><?php echo $warung->no_hp ?></td>
                   <td><?php echo $warung->nama_warung ?></td>
                   <td><?php echo $warung->lama_sewa ?> Tahun</td>
                   <td><?php echo $warung->keterangan ?></td>
                   <td>
                    <!-- <button class="btn btn-sm btn-info lht_minum" data-id=""><i class="fas fa-eye"></i></button> -->
                    <a class="btn btn-sm btn-danger" href="<?= site_url('warung/delete/'.$warung->idwarung) ?>" onclick="return confirm('Hapus Item Ini ?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php 
              }
            } else { ?>

             <center>
              <tr><td colspan="6" style="text-align: center;">--- Tidak Ada Data ---</td></tr>
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
<div class="modal fade" id="tbh_posisi">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Warung</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('warung/create_action') ?>" method="post">
        <div class="modal-body table-responsive p-0">
          <div class="col-sm-12">

           <div class="form-group">
            <label for="varchar">Kode warung </label>
            <input type="text" class="form-control" name="kode_warung" id="kode_warung" placeholder="ex: LG00" maxlength="4" required="required" />
          </div>
          <div class="form-group">
            <label for="varchar">Keterangan </label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required="required" />
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-primary">Simpan</button> 
        <button type="reset" class="btn btn-default">Reset</button> 
      </form>
      <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
      <!-- /.modal -->