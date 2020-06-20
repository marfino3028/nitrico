<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12">
              <p class="text-right">
                <a href="<?php echo base_url('produk') ?>" class="btn btn-success btn-sm"><i class="fa fa-file-pdf"></i> Produk Lainnya</a>
                <a href="<?php echo base_url('produk/cetak/'.$produk->slug_produk) ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-file-pdf"></i> Cetak</a>
              </p>
              <hr>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12">
              <div class="owl-carousel owl-theme">
                <div class="item" data-hash="zero">
                  <img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk; ?>" class="img img-thumbnail img-fluid">
                </div>
                <?php if($gambar) { foreach($gambar as $gambar) { ?>
                <div class="item" data-hash="one<?php echo $gambar->id_gambar_produk ?>">
                  <img src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>" alt="<?php echo $produk->nama_produk; ?>" class="img img-thumbnail img-fluid">
                </div>
                <?php }} ?>
              </div>
                <?php $gambar         = $this->gambar_produk_model->produk($id_produk); ?>
                <div class="row">
                  <a class="button secondary url col-lg-3 col-md-3 col-sm-3 col-xs-3 url" href="#zero">
                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk; ?>" class="img img-thumbnail img-fluid" >
                  </a> 
                  <?php if($gambar) { foreach($gambar as $gambar) { ?>
                  <a class="button secondary col-lg-3 col-md-3 col-sm-3 col-xs-3 url" href="#one<?php echo $gambar->id_gambar_produk ?>">
                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>" alt="<?php echo $produk->nama_produk; ?>" class="img img-thumbnail img-fluid" >
                  </a> 
                  <?php }} ?>
                </div>
                
            </div>

            <div class="col-lg-8 col-md-7 col-sm-12 produk">
              
              <h1><?php echo $title ?></h1>
              <h5>Rp 
                <span class="harga"><?php 
                $date1    = strtotime($produk->mulai_diskon); 
                $date2    = strtotime($produk->selesai_diskon); 
                $sekarang = strtotime(date('Y-m-d'));
                if($date1 <= $sekarang && $date2 >= $sekarang) { ?>
                  <strong><?php echo $this->website->angka($produk->harga_jual); ?> 
                    <sup class="text-danger">
                      <del>
                        Rp <?php echo $this->website->angka($produk->harga_jual); ?>    
                      </del>
                    </sup>
                  </strong>
                <?php }else{ ?>
                  <strong><?php echo $this->website->angka($produk->harga_jual); ?></strong>
                <?php } ?>
                </span>
              </h5>
              <hr>
                <p><strong>Ukuran:</strong>
                  <br><?php echo $produk->ukuran; ?> | Berat: <?php echo $produk->berat; ?> gram
                </p>
                <?php echo form_open(base_url('keranjang/tambah'),array('class' => 'form-horizontal')); ?>
                <hr>
                <div class="input-group">                  
                  <input type="number" name="quantity" id="<?php echo $produk->id_produk;?>" class="quantity form-control col-md-2" min="<?php echo $produk->jumlah_order_min ?>" max="<?php echo $produk->jumlah_order_max ?>" value="1" required>

                   <input type="hidden" name="pengalihan" id="<?php echo $produk->id_produk;?>" value="<?php echo str_replace('index.php/','',current_url()) ?>" class="pengalihan">

                  <span class="input-group-btn">
                    <?php if($this->website->cara_pesan()=='Keranjang Belanja') { ?>
                      <button type="submit" name="submit" value="Add to cart" class="add_cart btn btn-info" data-productid="<?php echo $produk->id_produk;?>" data-productname="<?php echo $produk->nama_produk;?>" data-productprice="<?php echo $produk->harga_jual;?>"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    <?php }else{ ?>
                      <a href="<?php echo base_url('pemesanan?id_produk='.$produk->id_produk) ?>" class="btn btn-info">
                        <i class="fa fa-shopping-cart"></i> Pesan Produk Ini
                      </a>
                    <?php } ?>
                  </span>
                </div>
                <hr>
                <?php echo form_close(); ?>
                <p><strong>Deskripsi:</strong>
                  <br><?php echo nl2br($produk->deskripsi) ?></p>
                <?php echo $produk->isi; ?>
            </div>
            <?php $produk_all = $this->produk_model->kategori_detail($kategori_produk->id_kategori_produk,$id_produk); if($produk_all) { ?>
            <div class="col-md-12">
              <hr>
              <h3>Produk <?php echo $kategori_produk->nama_kategori_produk ?> lainnya</h3>
              <hr>
              
            </div>
            <?php  }
            if($produk_all) {
            foreach($produk_all as $produk) { ?>
            <div class="col-lg-3 col-md-3 col-sm-12 mb-4 produk text-center">
                <?php echo form_open(base_url('keranjang/tambah')); ?>
                  <figure class="thumnail">
                    <a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>">
                      <img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php  echo $produk->nama_produk ?>" class="img-fluid img-thumbnail">
                    </a>
                  </figure>
                  <div class="keterangan">
                      <h3>
                        <a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>">
                          <?php  echo $produk->nama_produk ?>
                        </a>
                      </h3>
                    <p class="harga">Rp <?php echo $this->website->angka($produk->harga_jual); ?></p>
                  </div>
                  <div class="link-produk">
                    <p>
                      <a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Detail</a>
                      <button type="submit" name="submit" value="Add to cart" class="btn btn-danger btn-sm"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    </p>
                </div>
                <?php echo form_close(); ?>
            </div>
          <?php }} ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>