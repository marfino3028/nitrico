<div class="ps-section pt-80 pb-80">
  <div class="container">
    <div class="ps-product--detail">
      <div class="row">
        <div class="col-md-12 text-right">
          
            <a class="ps-btn ps-btn" href="<?php echo base_url('home') ?>">Menu<i class="fa fa-birthday-cake"></i></a>
            <a class="ps-btn ps-btn" href="<?php echo base_url('produk') ?>">All products<i class="fa fa-search"></i></a>
            <a class="ps-btn ps-btn" href="<?php echo base_url('produk/kategori/'.$produk->slug_kategori_produk) ?>"><?php echo $produk->nama_kategori_produk ?><i class="fa fa-sitemap"></i></a>
          
          <hr>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
          <div class="ps-product__thumbnail">
            <?php $now        = time(); // or your date as well
            $your_date  = strtotime($produk->tanggal);
            $datediff   = $now - $your_date;

            $hari = round($datediff / (60 * 60 * 24));

            ?><?php if($hari <= 30) { ?>
              <div class="ps-badge"><span>
                New
              </span></div>
            <?php } ?>
            <div class="owl-slider primary" data-owl-auto="true" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-nav-left="&lt;i class=&quot;fa fa-angle-left&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;fa fa-angle-right&quot;&gt;&lt;/i&gt;">
              <div class="ps-product__image"><a href="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>"><img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $title ?>"></a></div>
              <?php if($gambar) { foreach($gambar as $gambar) { ?>
              <div class="ps-product__image"><a href="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>"><img src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>" alt="<?php echo $title ?>"></a></div>
              <?php }} ?>
            </div>
            <div class="owl-slider second mb-30 detail-agita" data-owl-auto="true" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="20" data-owl-nav="false" data-owl-dots="false" data-owl-animate-in="" data-owl-animate-out="" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="4" data-owl-nav-left="&lt;i class=&quot;fa fa-angle-left&quot;&gt;&lt;/i&gt;" data-owl-nav-right="&lt;i class=&quot;fa fa-angle-right&quot;&gt;&lt;/i&gt;">
              <img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $title ?>">
              <?php if($gambar2) { foreach($gambar2 as $gambar2) { ?>
              <img src="<?php echo base_url('assets/upload/image/'.$gambar2->gambar) ?>" alt="<?php echo $title ?>">
              <?php }} ?>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 ">
          <header>
            <h3 class="ps-product__name"><?php echo $title ?></h3>
            <p class="ps-product__price">Rp. <?php echo number_format($produk->harga_jual,'0',',','.') ?></p>
            <!-- <a class="ps-product__quickview popup-modal" href="#quickview-modal" data-effect="mfp-zoom-out">QUICK OVERVIEW</a> -->
            <div class="ps-product__description">
              <?php echo $produk->isi ?>
            </div>
            <div class="ps-product__meta">
              <p class="category">Category: <a href="<?php echo base_url('produk/kategori/'.$produk->slug_kategori_produk) ?>"><?php echo $produk->nama_kategori_produk ?></a></p>
            </div>

          </header>
          <footer>
            <div class="row">
              <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12 "><a class="ps-btn--fullwidth ps-btn" href="https://wa.me/<?php echo str_replace('+','',$site->hp) ?>?text=Haloo, Saya tertarik dengan produk *<?php echo $title ?>* di <?php echo $site->namaweb ?>. Mohon untuk bisa dibantu bagaimana cara pemesannya.">Order by Whatsapp<i class="fa fa-whatsapp"></i></a>
              </div>
              <!-- <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12 ">
                <p class="ps-product__sharing">Share with:<a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-google-plus"></i></a><a href="#"><i class="fa fa-twitter"></i></a></p>
              </div> -->
            </div>
          </footer>
        </div>
      </div>

    </div>
  </div>
</div>
</div>