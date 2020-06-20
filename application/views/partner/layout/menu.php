<style type="text/css" media="screen">
  li.nav-item {
    padding-bottom: 2px !important;
    padding-top: 2px !important;
  }
  a.nav-link {
    margin-bottom: 0 !important;
    margin-top: 0 !important;
    padding-bottom: 5px !important;
    padding-top: 0px !important;
  }
  hr.sidebar-divider {
    margin-bottom: 2px !important;
    margin-top: 2px !important;
    padding-bottom: 5px !important;
    padding-top: 0px !important;
  }
  .sidebar-brand-text, .mx-1, .sidebar-brand-icon {
    font-size: 14px !important;
  }
  span.notif {
    padding: 5px !important;
    font-size: 0.55rem !important;
    font-weight: bold;
  }
  .sidebar .nav-item .nav-link span {
    font-size: 0.75rem !important;
  }
</style>
<!--Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-left" href="<?php echo base_url('partner/dasbor') ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-1"><?php echo $this->website->namaweb() ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('partner/dasbor') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- transaksi -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">PEMBELIAN &amp; PEMESANAN</div>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('keranjang') ?>">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Keranjang Belanja</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('partner/transaksi') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Riwayat Transaksi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('partner/pemesanan') ?>">
          <i class="fas fa-fw fa-store"></i>
          <span>Riwayat Pemesanan</span></a>
      </li>

      <?php if($this->session->userdata('jenis_client')=="Personal"){}else{ ?>
      <!-- PENJUALAN -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">PENJUALAN ANDA</div>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('partner/transaksi/penjualan') ?>">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Penjualan Anda</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('partner/transaksi') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Pemesanan via Reseller</span></a>
      </li>
    <?php } ?>
      <!-- AKUN -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">Akun dan Profil</div>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('partner/akun/profil') ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Update Profil</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('signin/logout') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar