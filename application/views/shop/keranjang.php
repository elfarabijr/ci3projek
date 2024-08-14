
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-success"><i class="fa fa-cart-plus"></i> Keranjang Saya<small></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Keranjang</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<?php if (isset($keranjang_data)) { 
  if(!empty($keranjang_data)) { ?>
    <div class="content">
      <div class="container">
        <div class="card card-solid">
          <form action="<?= site_url('shop/cekout') ?>" method="post">
            <div class="card-body p-0 table-responsive">

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Gambar</th>
                    <th>Nama Menu</th>
                    <th>Harga satuan (Rp)</th>
                    <th>Jumlah</th>
                    <th>Sub-Total (Rp)</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sub=0;
                  foreach ($keranjang_data as $data) : ?>
                    <tr>
                      <td>#</td>
                      <td><img src="<?= base_url()?>upload/menu/<?= $data->gambar ?>" width="120px"></td>
                      <td>
                        <?= $data->nama ?>
                      </td>
                      <td><?= $data->harga ?></td>
                      <td><?= $data->qtty ?></td>
                      <td><?= $data->harga * $data->qtty ?></td>
                      <td><a class="btn-sm " href="<?= site_url('shop/hapusitem/'.$data->id_keranjang) ?>" onclick="return confirm('Hapus Item dari Keranjang?')"><i class="fa fa-times-circle"></i></a></td>
                    </tr>
                    <?php $sub += $data->harga * $data->qtty; endforeach; ?>
                  </tbody>
                </table>

                <div class="float-right">
                  <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Total :</label>
                            <input type="text" value="<?= 'Rp '.number_format($sub,2,',','.') ?>" class="form-control" placeholder="<?= $sub ?>" disabled>
                            <input type="hidden" name="idmember" value="<?= $this->session->userdata('iduser') ?>">
                            <input type="hidden" name="total_bayar" value="<?= $sub ?>">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Masukan Catatan</label>
                            <textarea class="form-control" rows="3" placeholder="Contoh: yang pedes karetnya kasih 2 ya bu..." name="catatan"></textarea>
                          </div>
                        </div>
                      </div>                
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="<?= site_url('shop') ?>" class="btn btn-info"><i class="fas fa-arrow-left"></i> Lanjut Belanja</a>
                <button type="submit" class="btn btn-success float-right" onclick="return confirm('Pesan Sekarang?')"><i class="far fa-credit-card"></i> Pesan
                </button>
              </div>
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
      <?php } else { ?>
        <div class="content">
          <div class="container">
            <div class="callout callout-info">
              <h5>Ooopss!</h5>

              <p>Keranjang anda masih kosong.</p>
            </div>
            <div class="mt-4">
              <center>
                <a href="<?= site_url('shop') ?>" class="btn btn-info">Lanjut Belanja</a>
              </center>
            </div>
          </div>
        </div>
        <?php      }
      } else { ?>
       <div class="content">
        <div class="container">

          <div class="callout callout-warning">
            <h5 class="text-warning">Warning!</h5>

            <p>Anda tidak dapat menyimpan menu kedalam keranjang dan melihat daftar keranjang sebelum anda login!!<br>Harap login terlebih dahulu untuk melanjutkan! </p>
          </div>
          <div class="mt-4">
            <center>
              <a href="<?= site_url('shop') ?>" class="btn btn-success">Kembali</a>
            </center>
          </div>
        </div>
      </div>
      <?php } ?>
