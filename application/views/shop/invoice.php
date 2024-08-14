
<section class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Invoice</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Keranjang</a></li>
          <li class="breadcrumb-item active">Invoice</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="callout callout-info">
          <h5><i class="fas fa-info"></i> Info:</h5>
          Harap siapkan uang pas sebesar <?= 'Rp '.number_format($invoice_data->total,2,',','.') ?> untuk pembayaran tagihan kepada pengantar.
        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <img width="3%" src="<?= base_url() ?>template/dist/img/logo_mini.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span>E-KANTIN</span>
                <!-- <small class="float-right"></small> -->
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <address>
                <strong>E-KANTIN</strong><br>
                Menara PLN, Jl. Lkr. Luar Barat, RT.1/RW.1, Duri Kosambi Kecamatan Cengkareng, Kota Jakarta Barat<br>
                <b>Phone: </b>+1 234 56789012<br>
                <b>Email: </b>info@ekantin.id
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
             <!--  To
              <address>
                <strong>John Doe</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (555) 539-1037<br>
                Email: john.doe@example.com
              </address> -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Invoice #<?= $invoice_data->kode_invoice ?></b><br>
              <b>Tanggal: </b><?= date('d-m-Y',strtotime($invoice_data->tgl_dikeluarkan)) ?><br>
              <b>Order ID:</b> <?= sha1($invoice_data->kode_invoice) ?><br> 
              <b>Pemesan:</b> <?= $invoice_data->nama_lengkap ?><br>
              <b>Email:</b> <?= $invoice_data->email ?><br>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Produk</th>
                    <th>Kuantitas</th>
                    <th>Harga (Rp)</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($item_data as $data) : ?>
                  <tr>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->qtty ?>x</td>
                    <td><?= number_format($data->harga,2,',','.') ?></td>
                    <td><?= number_format($data->harga * $data->qtty,2,',','.') ?></td>
                  </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <p class="lead">Metode Pembayaran:</p>
              <button class="btn btn-small btn-info">COD</button>
              <!-- <img src="../../dist/img/credit/visa.png" alt="Visa"> -->
              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Catatan untuk penjual:<br>
                <small class="text-info">"<?= $invoice_data->catatan ?>"
                </small>
              </p>
            </div>
            <!-- /.col -->
            <div class="col-6">

              <div class="table-responsive">
                <table class="table">

                  <tr>
                    <th style="width: 50%">Total:</th>
                    <td><?= 'Rp '.number_format($invoice_data->total,2,',','.') ?></td>
                  </tr>
<!--                       <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr> --> 
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?= site_url('shop/pesanan') ?>" class="btn btn-success float-right"><i class="fas fa-shopping-cart"></i> Pesanan Saya
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->