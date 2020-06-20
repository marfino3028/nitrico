<!-- ======= Pricing Section ======= -->
<section id="produk" class="pricing">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Produk Kami</h2>
      <p>Varian Produk <?php echo $site->namaweb ?></p>
    </div>
    <div class="row" data-aos="fade-left">
      <?php foreach($produk as $produk) { ?>
      <div class="col-lg-6 col-md-6 mt-4 mt-lg-0">
        <div class="box" data-aos="zoom-in" data-aos-delay="400">
          <span class="advanced">Advanced</span>
          <h3><?php echo $produk->nama_produk ?></h3>
          <p><img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail"></p>
          <h4><sup>Rp.</sup><?php echo $this->website->angka($produk->harga_jual) ?><span></span></h4>
          <hr>
          <?php echo $produk->deskripsi ?>
          <div class="btn-wrap">
            <a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="btn-buy"><i class="fa fa-eye"></i> Detail Produk</a>
            <a href="<?php echo base_url('pemesanan') ?>" class="btn-buy"><i class="fa fa-shopping-cart"></i> Buy Now</a>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</section><!-- End Pricing Section -->