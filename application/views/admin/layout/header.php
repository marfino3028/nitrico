<?php 
$pendaftar      = $this->dasbor_model->pendaftar('Pending');
$pendaftar_all  = $this->dasbor_model->pendaftar_all('Pending');
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
      <a href="<?php echo base_url('admin/dasbor') ?>" class="btn btn-sm"><i class="fa fa-tachometer-alt"></i> Dasbor</a> 
      <a href="<?php echo base_url() ?>" class="btn btn-sm" target="_blank"><i class="fa fa-home"></i> Beranda</a>
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">3+</span>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Alerts Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500">December 12, 2019</div>
                <span class="font-weight-bold">A new monthly report is ready to download!</span>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="mr-3">
                <div class="icon-circle bg-success">
                  <i class="fas fa-donate text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500">December 7, 2019</div>
                $290.29 has been deposited into your account!
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="mr-3">
                <div class="icon-circle bg-warning">
                  <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500">December 2, 2019</div>
                Spending Alert: We've noticed unusually high spending for your account.
              </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
          </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user fa-fw"></i> Mitra
            <!-- Counter - Messages -->
            <?php if($pendaftar) { ?>
              <span class="badge badge-danger badge-counter"><?php echo $pendaftar->total; ?></span>
            <?php } ?>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              Terdapat <?php echo $pendaftar->total ?> Pendaftaran Mitra Baru
            </h6>
            <?php if($pendaftar_all) { foreach($pendaftar_all as $pendaftar_all) { ?>
            <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('admin/client/detail/'.$pendaftar_all->id_client) ?>">
              <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="<?php if($pendaftar_all->gambar=="") { echo $this->website->icon(); }else{ echo base_url('assets/upload/client/thumbs/'.$pendaftar_all->gambar); } ?>" alt="">
                <div class="status-indicator bg-success"></div>
              </div>
              <div class="font-weight-bold">
                <div class="text-truncate"><?php echo $pendaftar_all->nama ?></div>
                <div class="small text-gray-500"><?php echo $pendaftar_all->jenis_client ?> · <?php echo $pendaftar_all->telepon ?></div>
              </div>
            </a>
            <?php }} ?>
            
            <a class="dropdown-item text-center small text-gray-500" href="<?php echo base_url('admin/client') ?>">Lihat semua mitra...</a>
          </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
            <img class="img-profile rounded-circle" src="<?php if($this->session->userdata('foto_profil')=="") { echo $this->website->icon(); }else{ echo $this->session->userdata('foto_profil'); } ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?php echo base_url('admin/akun') ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Update Profile
            </a>
            <?php if($this->session->userdata('akses_level')=="Admin") { ?>
            <a class="dropdown-item" href="<?php echo base_url('admin/konfigurasi') ?>">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Setting Website
            </a>
            <a class="dropdown-item" href="<?php echo base_url('admin/activity') ?>">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800"><?php echo $title ?></h1>
      

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $title ?></h6>
        </div> -->
        <div class="card-body">
          <div class="table-responsive" style="min-height: 500px;">