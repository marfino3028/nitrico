<?php
$site               = $this->konfigurasi_model->listing();
$nav_funnel         = $this->nav_model->nav_funnel();
$nav_kategori_produk= $this->nav_model->nav_kategori_produk();
?>

<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="<?php echo base_url() ?>"><span>
          <img src="<?php echo $this->website->logo() ?>" alt="<?php echo $this->website->namaweb() ?>" style="min-height: 50px; width: auto;">
        </span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="<?php echo base_url() ?>"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          
            <li class="active"><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="drop-down"><a href="<?php echo base_url('review') ?>">Apa itu Nitrico?</a>
              <ul>
                <?php foreach($nav_funnel as $nav_funnel) { ?>
                <li><a href="<?php echo base_url('review/kategori/'.$nav_funnel->slug_kategori_funnel) ?>">
                  <?php echo $nav_funnel->nama_kategori_funnel ?>
                </a></li>
                <?php } ?>
              </ul>
            </li>
            <li class="drop-down"><a href="<?php echo base_url('produk') ?>">Produk</a>
              <ul>
                <?php foreach($nav_kategori_produk as $nkp) { ?>
                <li><a href="<?php echo base_url('produk/kategori/'.$nkp->slug_kategori_produk) ?>"><?php echo $nkp->nama_kategori_produk ?></a></li>
                <?php } ?>
                <li><a href="#"><hr style="margin: 0; padding: 0;"></a></li>
                <li><a href="<?php echo base_url('produk') ?>">Semua Produk</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('testimoni') ?>">Testimoni</a></li>
            <?php if($this->session->userdata('username_partner')=="") { 
              $keranjang = $this->cart->contents();
              ?>
              <li class="drop-down"><a href="#">Partner</a>
                <ul>
                  <li><a href="<?php echo base_url('reseller') ?>">Reseller &amp; Distributor</a></li>
                  <li><a href="<?php echo base_url('pendaftaran') ?>">Pendaftaran</a></li>
                  <li><a href="<?php echo base_url('signin') ?>">Login</a></li>
                </ul>
              </li>  
              <li>
                <?php if($this->website->cara_pesan()=='Keranjang Belanja') { ?>
                  <a href="<?php echo base_url('keranjang') ?>" class="orange" title="Form Pemesanan"><div class="belanja"><i class="fa fa-shopping-cart"></i><sup class="text-warning" style="padding-left: 3px; ">(<?php if($keranjang) { echo count($keranjang); }else{ echo 0; } ?>)</sup></div></a>
                <?php }else{ ?>
                  <a href="<?php echo base_url('pemesanan') ?>" class="orange" title="Form Pemesanan"><div class="belanja"><i class="fa fa-shopping-cart"></i> Form Order</div></a>
                <?php } ?>
              </li>
            <?php }else{ ?>
              <li class="drop-down"><a href="#" class="text-kuning"><i class="fa fa-shopping-cart"></i> <?php echo $this->session->userdata('nama_partner'); ?></a>
              <ul>
                <li><a href="<?php echo base_url('partner/dasbor') ?>"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('keranjang') ?>"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
                <li><a href="<?php echo base_url('partner/transaksi') ?>"><i class="fa fa-book"></i> Transaksi</a></li>
                <li><a href="<?php echo base_url('signin/logout') ?>"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
              </ul>
            </li>  
            <?php } ?>         
            
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->