 <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1><?php echo $title ?></h1>
            <h2><?php echo $site->tagline ?></h2>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="<?php echo $this->website->gambar() ?>" class="img-fluid animated" alt="">
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

<div class="site-section">
    <div class="container">
       

  <?php foreach($kategori_produk as $kategori_produk) { 
    $id_kategori_produk = $kategori_produk->id_kategori_produk;
    $produk   = $this->produk_model->kategori_all($id_kategori_produk);
    ?>
   <div class="row mb-4 justify-content-center text-center">
    <div class="col-lg-8 mb-4">
      <hr>
      <h2 class="section-title-underline mb-4">
        <span><?php echo $kategori_produk->nama_kategori_produk ?></span>
      </h2>
      <p><?php echo $kategori_produk->keterangan ?></p>
      <hr>
    </div>
  </div>

  <div class="row">
        <?php   foreach($produk as $produk) { ?>
        <div class="col-lg-6 col-md-6 mb-4">
        <div class="course-1-item">
              <figure class="thumnail">
                <a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>"><img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php  echo $produk->nama_produk ?>" class="img-fluid"></a>
                
                <div class="category"><h3><?php  echo $produk->nama_produk ?></h3></div>  
              </figure>
              <div class="course-1-content pb-1">
                
                <!-- <div class="rating text-center mb-1">
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                </div> -->
                <p class="desc mb-2"><?php echo $produk->deskripsi ?></p>
                <p><a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="btn btn-primary rounded-0 px-4">Daftar &amp; Lihat Detail</a></p>
              </div>
            </div>
          </div>
          <?php } ?>
      </div>
    <?php } ?>
    </div>    
  </div>