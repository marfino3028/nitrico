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
      <a class="sidebar-brand d-flex align-items-center justify-content-left" href="<?php echo base_url('admin/dasbor') ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-1"><?php echo $this->website->namaweb() ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/dasbor') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- TRANSAKSI -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">Transaksi &amp; Pembayaran</div>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/dasbor') ?>">
          <i class="fas fa-fw fa-shopping-cart"></i> <span>Penjualan</span> <span class="badge badge-danger badge-counter notif">100</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/pemesanan') ?>">
          <i class="fas fa-fw fa-money-bill-alt"></i> <span>Pemesanan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/client') ?>">
          <i class="fas fa-fw fa-users"></i> <span>Customer &amp; Partner</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/testimoni') ?>">
          <i class="fas fa-fw fa-comments"></i> <span>Testimoni Customer</span></a>
      </li>
      <!-- PRODUK -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">Produk &amp; Layanan</div>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/produk') ?>">
          <i class="fas fa-fw fa-book"></i> <span>Produk &amp; Layanan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/produk/tambah') ?>">
          <i class="fas fa-fw fa-plus"></i> <span>Tambah Produk</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/kategori_produk') ?>">
          <i class="fas fa-fw fa-tags"></i> <span>Kategori Produk</span></a>
      </li>
      <!-- FUNNEL -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">KONTEN FUNNEL</div>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/funnel') ?>">
          <i class="fas fa-fw fa-book"></i> <span>Data Konten Funnel</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/funnel/tambah') ?>">
          <i class="fas fa-fw fa-plus"></i> <span>Tambah Konten Funnel</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/kategori_funnel') ?>">
          <i class="fas fa-fw fa-tags"></i> <span>Kategori Konten Funnel</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">Konten Website</div>
      <hr class="sidebar-divider">
      <!-- Berita -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#berita" aria-expanded="true" aria-controls="berita">
          <i class="fas fa-fw fa-newspaper"></i>
          <span>Berita &amp; Profil</span>
        </a>
        <div id="berita" class="collapse" aria-labelledby="berita" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('admin/berita') ?>"><i class="fa fa-newspaper"></i> Data Berita</a>
            <a class="collapse-item" href="<?php echo base_url('admin/berita/tambah') ?>"><i class="fa fa-plus"></i> Tambah Berita</a>
            <a class="collapse-item" href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> Kategori Berita</a>
          </div>
        </div>
      </li>
      <!-- Download -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#download" aria-expanded="true" aria-controls="collapse">
          <i class="fas fa-fw fa-download"></i>
          <span>File Unduhan</span>
        </a>
        <div id="download" class="collapse" aria-labelledby="download" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('admin/download') ?>"><i class="fa fa-newspaper"></i> Data File</a>
            <a class="collapse-item" href="<?php echo base_url('admin/download/tambah') ?>"><i class="fa fa-plus"></i> Tambah File</a>
            <a class="collapse-item" href="<?php echo base_url('admin/kategori_download') ?>"><i class="fa fa-tags"></i> Kategori File</a>
          </div>
        </div>
      </li>
      <!-- Galeri -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Galeri" aria-expanded="true" aria-controls="collapse">
          <i class="fas fa-fw fa-image"></i>
          <span>Banner &amp; Galeri</span>
        </a>
        <div id="Galeri" class="collapse" aria-labelledby="Galeri" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('admin/galeri') ?>"><i class="fa fa-newspaper"></i> Data Galeri</a>
            <a class="collapse-item" href="<?php echo base_url('admin/galeri/tambah') ?>"><i class="fa fa-plus"></i> Tambah Galeri</a>
            <a class="collapse-item" href="<?php echo base_url('admin/kategori_galeri') ?>"><i class="fa fa-tags"></i> Kategori Galeri</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/video') ?>">
          <i class="fab fa-fw fa-youtube"></i> <span>Video Youtube</span></a>
      </li>
      <!-- Galeri -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Staff" aria-expanded="true" aria-controls="collapse">
          <i class="fas fa-fw fa-sitemap"></i>
          <span>Staff &amp; Team</span>
        </a>
        <div id="Staff" class="collapse" aria-labelledby="Staff" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('admin/staff') ?>"><i class="fa fa-newspaper"></i> Data Staff</a>
            <a class="collapse-item" href="<?php echo base_url('admin/staff/tambah') ?>"><i class="fa fa-plus"></i> Tambah Staff</a>
            <a class="collapse-item" href="<?php echo base_url('admin/kategori_staff') ?>"><i class="fa fa-tags"></i> Kategori Staff</a>
          </div>
        </div>
      </li>
      <!-- Konfigurasi -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Konfigurasi" aria-expanded="true" aria-controls="collapse">
          <i class="fa fa-fw fa-cog"></i>
          <span>Setting</span>
        </a>
        <div id="Konfigurasi" class="collapse" aria-labelledby="Konfigurasi" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-newspaper"></i> Setting Website</a>
            <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i> Ganti Logo</a>
            <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-tree"></i> Ganti Icon</a>
            <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi/email') ?>"><i class="fa fa-envelope"></i> Setting Email</a>
            <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi/gambar') ?>"><i class="fa fa-lock"></i> Ganti Gambar Login</a>
            <a class="collapse-item" href="<?php echo base_url('admin/rekening') ?>"><i class="fa fa-money-check"></i> Rekening Pembayaran</a>
            <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi/pembayaran') ?>"><i class="fa fa-comment-dollar"></i> Panduan Pembayaran</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar