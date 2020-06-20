<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1><?php echo $title ?></h1>
              <hr>
              <?php echo form_open(base_url('produk/cari'), array('method'  => 'get','class'  => 'form-horizontal')); ?>
              <div class="input-group">                  
                <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci pencarian produk...." value="<?php echo $this->input->get('keywords') ?>" required>
                <span class="input-group-btn">
                  <button type="submit" name="submit" value="Search" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                </span>
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Urutkan
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo base_url('produk/urutkan/harga/murah') ?>">Harga termurah</a>
                    <a class="dropdown-item" href="<?php echo base_url('produk/urutkan/harga/mahal') ?>">Harga termahal</a>
                    <a class="dropdown-item" href="<?php echo base_url('produk/urutkan/nama/az') ?>">Nama produk A-Z</a>
                    <a class="dropdown-item" href="<?php echo base_url('produk/urutkan/nama/za') ?>">Nama produk Z-A</a>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
              <hr>
            </div>    

            <?php  
            if($produk) {
            foreach($produk as $produk) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 produk text-center">
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
                      <input type="hidden" name="quantity" id="<?php echo $produk->id_produk;?>" value="1" class="quantity">
                      <input type="hidden" name="pengalihan" id="<?php echo $produk->id_produk;?>" value="<?php echo str_replace('index.php/','',current_url()) ?>" class="pengalihan">
                      <a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Detail</a>
                      <?php if($this->website->cara_pesan()=='Keranjang Belanja') { ?>
                        <button type="button" name="submit" value="Add to cart" class="add_cart btn btn-danger btn-sm" data-productid="<?php echo $produk->id_produk;?>" data-productname="<?php echo $produk->nama_produk;?>" data-productprice="<?php echo $produk->harga_jual;?>">
                          <i class="fa fa-shopping-cart"></i> Add to cart
                        </button>
                      <?php }else{ ?>
                        <a href="<?php echo base_url('pemesanan?id_produk='.$produk->id_produk) ?>" class="btn btn-info btn-sm">
                          <i class="fa fa-shopping-cart"></i> Pesan Produk Ini
                        </a>
                      <?php } ?>
                    </p>
                </div>
                <?php echo form_close(); ?>
            </div>
          <?php }}else{ ?>
          <div class="col-md-12">
            <p class="alert alert-info">Produk tidak ditemukan. Gunakan kata kunci pencarian yang berbeda.</p>
          </div>
          <?php } ?>
          <div class="col-md-12">
            <hr>
          </div>
          <?php if(isset($pagin)) { ?>
            <div class="col-md-12">
              <p><?php echo $pagin; ?></p>
            </div>
          <?php } ?>
      </div>
    </div>
  </div>
</div>
</div>
</section><!-- End Hero -->
