
<!-- Main content -->
<div class="content">
  <div class="container">
    <div class="card card-solid">
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"> MENU <small>Makanan & Minuman</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Menu</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div class="card-body pb-0">
        <!-- <h5>Yukk pilih Menu mu hari ini</h5> -->
        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Makanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Minuman</a>
          </li>

        </ul>
        <div class="tab-content" id="custom-content-below-tabContent">
          <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
            <br>
            <div class="row d-flex align-items-stretch">
              <?php foreach ($makanan_data as $makanan) : ?>
                <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                  <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                      <?= $makanan->nama_warung ?>
                      <?php if($makanan->stock =='Habis') { ?>
                        <div class="ribbon-wrapper">
                          <div class="ribbon bg-secondary">
                            Habis
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-6">
                            <p style="font-size: 14px"><b><?= $makanan->nama ?></b></p>
                            <small> <b>Rp. </b> <?= $makanan->harga ?></small>
                          </div>
                          <div class="col-6 text-center">
                            <img src="<?= base_url() ?>upload/menu/<?= $makanan->gambar ?>" alt="user-avatar" class="img-square img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="text-right">
                          <button class="btn btn-sm <?= $makanan->stock == 'Habis' ? 'bg-secondary disabled' : 'bg-teal detail'?> " data-id="<?= $makanan->idmenu ?>">
                            <i class="fa fa-plus-square"></i> tambah
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>
            <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
             <br>
             <div class="row d-flex align-items-stretch">
              <?php foreach ($minuman_data as $minuman) : ?>
                <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                  <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                      <?= $minuman->nama_warung ?>
                      <?php if($minuman->stock =='Habis') { ?>
                        <div class="ribbon-wrapper">
                          <div class="ribbon bg-secondary">
                            Habis
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-6">
                            <p style="font-size: 14px"><b><?= $minuman->nama ?></b></p>
                            <small> <b>Rp. </b> <?= $minuman->harga ?></small>
                          </div>
                          <div class="col-6 text-center">
                            <img src="<?= base_url() ?>upload/menu/<?= $minuman->gambar ?>" alt="user-avatar" class="img-square img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="text-right">
                          <!-- <a href="#" class="btn btn-sm bg-danger">
                            <i class="fas fa-heart"></i>
                          </a> -->
                          <button class="btn btn-sm  <?= $minuman->stock == 'Habis' ? 'bg-secondary disabled' : 'bg-teal detailmnm'?> " data-id="<?= $minuman->idmenu ?>">
                            <i class="fa fa-plus-square"></i> tambah
                          </button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>

              </div>
            </div>

          </div>
          <div class="tab-custom-content">
            <!-- <p class="lead mb-0">Menu Favorit</p> -->
          </div>




        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->


  <!-- modal -->
  <div class="modal fade" id="lihatdetail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Menu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bdg">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none" id="nm_mkn"></h3>
              <div class="col-12">
                <img id="gbr" class="product-image" alt="Product Image" width="80%" height="80%">
              </div>
              <input type="hidden" name="idmenu" id="idmenu" value="">
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3" id="nm_mkn"></h3>
              <p id="id_wrg"></p>

              <hr>
              <h4 class="mt-3">Rp <small id="hrg"></small></h4>
              <div class="btn-group ">
                <span class="btn btn-secondary " onclick="kurang()">
                  <i class="fas fa-minus"></i>
                </span>
                <input type="text" class="form-control" name="jml_beli" id="jml_beli" disabled="disabled" value="1" />
                <!-- <span class="btn btn-info  disabled" id="jml_beli">"24"</span> -->
                <button class="btn btn-secondary " onclick="tbh()">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat col-12" onclick="addm()">
                  <i class="fas fa-cart-plus fa-lg "></i>
                  Add to Cart
                </div>
              </div>
              <br>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- modal -->
  <div class="modal fade" id="lihatmnm">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Menu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bdg">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none" id="nm_mnm"></h3>
              <div class="col-12">
                <img id="gbrmnm" class="product-image" alt="Product Image" width="80%" height="80%">
              </div>
              <input type="hidden" name="idmenu" id="idmenu" value="">
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3" id="nm_mnm"></h3>
              <p id="id_wrg"></p>

              <hr>
              <h4 class="mt-3">Rp <small id="hrg"></small></h4>
              <div class="btn-group ">
                <span class="btn btn-secondary " onclick="kurangmnm()">
                  <i class="fas fa-minus"></i>
                </span>
                <input type="text" class="form-control" name="jml_mnm" id="jml_mnm" disabled="disabled" value="1"  />
                <!-- <span class="btn btn-info  disabled" id="jml_beli">"24"</span> -->
                <button class="btn btn-secondary " onclick="tbhmnm()">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat col-12" onclick="addcart()">
                  <i class="fas fa-cart-plus fa-lg "></i>
                  Add to Cart
                </div>
              </div>
              <br>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
