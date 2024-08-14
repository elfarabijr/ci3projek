<aside class="main-sidebar sidebar-dark-navy elevation-4">
  <?php 
  $aktif = $this->session->userdata('ctrl'); 
  $role = $this->session->userdata('status'); 
  ?>
  <!-- Brand Logo -->
  <a href="#" class="brand-link navbar-navy">
    <img src="<?= base_url() ?>template/dist/img/logo_mini.png" alt="Kantin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E-KANTIN</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>template/dist/img/usr.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $this->session->userdata('nama'); ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <!-- guest -->
           <?php if ($role == 1) { ?>
            <li class="nav-item">
             <a href="<?= site_url('utama') ?>" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Daftar Warung
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-header">OPTION</li>
          <li class="nav-item">
            <a href="<?= base_url('login/logout') ?>" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Keluar</p>
            </a>
          </li>
          <?php } elseif ($role == 2) { ?>
            <!-- penjual -->
            <li class="nav-item">
              <a href="<?= site_url('utama') ?>" class="nav-link <?php $aktif == 'utama' ? print_r('active') : ''; ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Pesanan
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link <?php $aktif == 'makanan' ? print_r('active') : ''; ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Makanan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('makanan') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tersedia</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('makanan/create') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link <?php $aktif == 'minuman' ? print_r('active') : ''; ?>">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Minuman
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('minuman') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tersedia</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('minuman/create') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-header">PENGATURAN</li>
            <li class="nav-item">
              <a href="<?= site_url('warung/profil') ?>" class="nav-link <?php $aktif == 'warung' ? print_r('active') : ''; ?>">
                <i class="nav-icon fas fa-home text-warning"></i>
                <p>Warung</p>
              </a>
            </li>

            <li class="nav-header">OPTION</li>
            <li class="nav-item">
              <a href="<?= site_url('utama/form_password') ?>" class="nav-link <?php $aktif == 'ubahpass' ? print_r('active') : ''; ?>">
                <i class="nav-icon fas fa-edit text-warning"></i>
                <p>Ubah Password</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('login/logout') ?>" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Keluar</p>
              </a>
            </li>

            <?php } else { ?>
              <li class="nav-item">
                <a href="<?= site_url('utama') ?>" class="nav-link <?php $aktif == 'utama' ? print_r('active') : ''; ?>">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Pesanan
                    <!-- <span class="right badge badge-danger">New</span> -->
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link <?php $aktif == 'makanan' ? print_r('active') : ''; ?>">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Makanan
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= site_url('makanan') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tersedia</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= site_url('makanan/create') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link <?php $aktif == 'minuman' ? print_r('active') : ''; ?>">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Minuman
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= site_url('minuman') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tersedia</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= site_url('minuman/create') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah</p>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="nav-header">PENGATURAN</li>
              <li class="nav-item">
                <a href="#" class="nav-link <?php $aktif == 'warung' ? print_r('active') : ''; ?>">
                  <i class="nav-icon fas fa-shopping-cart text-warning"></i>
                  <p>
                    Atur Warung
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= site_url('warung/profil') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Warung Saya</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= site_url('warung/pendaftar') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List pendaftar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= site_url('warung') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Terverifikasi</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('letak') ?>" class="nav-link <?php $aktif == 'letak' ? print_r('active') : ''; ?>">
                  <i class="nav-icon fas fa-home text-warning"></i>
                  <p class="text">Posisi Toko </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('member') ?>" class="nav-link <?php $aktif == 'member' ? print_r('active') : ''; ?>">
                  <i class="nav-icon fas fa-users text-warning"></i>
                  <p>Member</p>
                </a>
              </li>

              <li class="nav-header">OPTION</li>
              <li class="nav-item">
                <a href="<?= site_url('utama/form_password') ?>" class="nav-link <?php $aktif == 'ubahpass' ? print_r('active') : ''; ?>">
                  <i class="nav-icon fas fa-edit text-warning"></i>
                  <p>Ubah Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('login/logout') ?>" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Keluar</p>
                </a>
              </li>
              <br>
              <?php } ?>

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <div class="content-wrapper">