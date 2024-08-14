
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-success"><i class="fa fa-shopping-cart"></i> Pesanan Saya<small></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pesanan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<?php if (isset($pesanan_data)) { 
  if(!empty($pesanan_data)) { ?>
    <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Pesanan</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
           <!--  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> -->
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
            <thead>
              <tr>
                <th style="width: 1%">
                  #
                </th>
                <th style="width: 20%">
                  Kode Invoice
                </th>
                <th style="width: 30%">
                  Total Bayar
                </th>
                <th>
                  Catatan
                </th>
                <th style="width: 8%" class="text-center">
                  Status
                </th>
                <th style="width: 20%">
                </th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($pesanan_data as $data) : ?>
                <tr>
                  <td>
                    #
                  </td>
                  <td>
                    <a>
                      <?= $data->kode_invoice ?>
                    </a>
                    <br/>
                    <small>
                      Tanggal <?= date('d-m-Y',strtotime($data->tgl_dikeluarkan)) ?>
                    </small>
                  </td>
                  <td>
                    <?= 'Rp '.number_format($data->total,2,',','.') ?>
                  </td>
                  <td>
                    <input class="form-control" type="text" readonly="" value="<?= $data->catatan ?>">
                  </td>
                  <td class="project-state">
                    <span class="badge badge-secondary">dalam perjalanan</span>
                  </td>
                  <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="<?= site_url('shop/detailpesanan/'.$data->kode_invoice) ?>">
                      <i class="fas fa-eye">
                      </i>
                      detail
                    </a>
                  </td>
                </tr>
              <?php  endforeach; ?>
            </tbody>
          </table>
        </div>
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
        <div class="callout callout-success">
          <h5>Ooopss!</h5>

          <p>Belum ada pesanan yang tersimpan.</p>
        </div>
        <div class="mt-4">
          <center>
            <a href="<?= site_url('shop') ?>" class="btn btn-info">Mulai Belanja</a>
          </center>
        </div>
      </div>
    </div>
    <?php      }
  } else { ?>
   <div class="content">
    <div class="container">
      <div class="callout callout-success">
        <h5>Ooopss!</h5>

        <p>Belum ada pesanan yang tersimpan.</p>
      </div>
      <div class="mt-4">
        <center>
          <a href="<?= site_url('shop') ?>" class="btn btn-info">Mulai Belanja</a>
        </center>
      </div>
    </div>
  </div>
  <?php } ?>
