<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
        <div data-aos="zoom-out">
          <h1><?php echo $kategori_funnel->nama_kategori_funnel ?></h1>
          <h2><?php echo $kategori_funnel->keterangan ?></h2>
          <div class="text-center text-lg-left">
            <a href="<?php echo base_url('produk') ?>" class="btn-get-started scrollto">Produk Kami</a>
          </div>
        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <img src="<?php echo base_url('assets/upload/image/'.$kategori_funnel->gambar) ?>" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>
  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
  </svg>
</section><!-- End Hero -->

<section id="<?php echo $kategori_funnel->slug_kategori_funnel; ?>" class="about"> 
  <div class="container">
    <div class="col-xl-12 col-lg-12  section-title" data-aos="fade-up">
          <h2><?php echo $kategori_funnel->nama_kategori_funnel ?></h2>
          <p><?php echo $kategori_funnel->nama_kategori_funnel ?></p>
    </div>
    <?php foreach($funnel as $funnel) { ?>
    <!-- START -->
    <div class="row">
      <div class="col-xl-12 col-lg-12" data-aos="fade-right">
        <img src="<?php echo base_url('assets/upload/image/'.$funnel->gambar) ?>" class="img-fluid img-thumbnail" alt="<?php echo $funnel->judul_funnel ?>">
      </div>
      <div class="col-xl-12 col-lg-12 icon-boxes d-flex flex-column py-5 px-lg-5" data-aos="fade-left">
        <h3><?php echo $funnel->judul_funnel ?></h3>
        <?php echo $funnel->isi ?>
      </div>
    </div>
    <!-- END -->
  <?php } ?>
  </div>
  <hr>
</section>
