
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Posisi Toko</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Posisi Toko</li>
      </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="col-sm-12 col-12">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tbh_posisi">
          <i class="fas fa-plus-square"></i> Tambah
      </button>
  </div>
  <br>
  <div class="card card-outline card-success">
      <div class="card-header">
        <p class="card-title">Total Record : <?php echo $total_rows ?></p class="card-title">
            <div class="card-tools">
                <form action="<?php echo site_url('letak/index'); ?>" method="get">
                  <div class="input-group input-group-sm" style="width: 170px;">
                    <input type="text" name="cari" class="form-control float-right" placeholder="Search" value="<?php echo $cari; ?>">
                    <div class="input-group-append">
                        <?php 
                        if ($cari <> '')
                        {
                            ?>
                            <a href="<?php echo site_url('letak'); ?>" class="btn btn-default">
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
              <th>No.</th>
              <th>Kode Letak</th>
              <th>Keterangan</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody><?php $no=1;
      if (!empty($letak_data)) {
          # code...
          foreach ($letak_data as $letak)
          {
            ?>
            <tr>
             <td><?php echo $no ?></td>
             <td><?php echo $letak->kode_letak ?></td>
             <td><?php echo $letak->keterangan ?></td>
             <td>
                <!-- <button class="btn btn-sm btn-info lht_minum" data-id=""><i class="fas fa-eye"></i></button> -->
                <a class="btn btn-sm btn-success" href="<?= site_url('letak/update/'.$letak->kode_letak) ?>"><i class="fas fa-edit"></i></a>
                <a class="btn btn-sm btn-danger" href="<?= site_url('letak/delete/'.$letak->kode_letak) ?>" onclick="return confirm('Hapus Item Ini ?')"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++;
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
<div class="modal fade" id="tbh_posisi">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Posisi Toko</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form action="<?= site_url('letak/create_action') ?>" method="post">
      <div class="modal-body table-responsive p-0">
        <div class="col-sm-12">

         <div class="form-group">
            <label for="varchar">Kode Letak </label>
            <input type="text" class="form-control" name="kode_letak" id="kode_letak" placeholder="ex: LG00" maxlength="4" required="required" />
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