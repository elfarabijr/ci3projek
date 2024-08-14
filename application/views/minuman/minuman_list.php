
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Minuman List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Minuman List</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">


    <div class="card card-outline card-info">
      <div class="card-header">
        <h3 class="card-title">Minuman List</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Minuman</th>
              <th>Harga</th>
              <th>Stock</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach ($minuman_data as $minuman)
            {
              ?>
              <tr>
               <td ><?php echo $no ?></td>
               <td><?php echo $minuman->nama ?></td>
               <td><?php echo $minuman->harga ?></td>
               <td><?php echo $minuman->stock ?></td>
               <td style="text-align:center">
                <button class="btn btn-sm btn-info lht_minum" data-id="<?= $minuman->idmenu ?>"><i class="fas fa-eye"></i></button>
                <a class="btn btn-sm btn-success" href="<?= site_url('minuman/update/'.$minuman->idmenu) ?>"><i class="fas fa-edit"></i></a>
                <a class="btn btn-sm btn-danger" href="<?= site_url('minuman/delete/'.$minuman->idmenu) ?>" onclick="return confirm('Hapus Item Ini ?')"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <?php
            $no++ ;}
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Minuman</th>
              <th>Harga</th>
              <th>Stock</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

  </div>
</section>


<!-- modal -->
<div class="modal fade" id="lihatminuman">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Minuman</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive p-0">
        <table class="table table-bordered table-striped ">
          <tbody>
            <tr>
              <td rowspan="5" align="center">
                <img id="gbr" width="230px"/>
              </td>
            </tr>
            <tr>
              <td><b>ID Minuman</b></td>
              <td>:</td>
              <td id="id_mnm" class="mnm"></td> 
            </tr>
            <tr>
              <td><b>Nama Minuman</b></td>
              <td>:</td>
              <td id="nm_mnm" class="mnm"></td>
            </tr>
            <tr>
              <td><b>Harga</b></td>
              <td>:</td>
              <td id="hrg" class="mnm"></td>
            </tr>
            <tr>
              <td><b>Keterangan</b></td>
              <td>:</td>
              <td id="stok" class="mnm"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->