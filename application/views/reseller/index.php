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
            </div>
            <div class="col-md-12 text-left">
              
              <p class="text-center">Anda ingin menjadi Reseller atau Distributor? Silakan lakukan <a href="<?php echo base_url('pendaftaran') ?>">Pendaftaran Online</a>.</p>
              <hr>
              
            </div>

            <?php  
            if($client) {
            foreach($client as $client) { ?>
            <div class="col-lg-3 col-md-4 col-sm-12 mb-4 client text-center">
                  <figure class="thumnail">
                    <a href="<?php echo base_url('client/detail/'.$client->kode_client) ?>">
                      <img src="<?php if($client->gambar== "") { echo $this->website->icon(); }else{ echo base_url('assets/upload/client/thumbs/'.$client->gambar); } ?>" alt="<?php  echo $client->nama ?>" class="img-fluid img-thumbnail">
                    </a>
                  </figure>
                  <div class="keterangan">
                      <h3 class="reseller">
                        <a href="<?php echo base_url('client/detail/'.$client->kode_client) ?>">
                          <?php  echo $client->nama ?>
                        </a>
                      </h3>
                    <p class="harga">
                      Jenis: <span class="text-success">
                      <?php if($client->jenis_client=="Distributor") { ?>
                        <i class="fa fa-store"></i> 
                      <?php }else{ ?>
                        <i class="fa fa-user"></i> 
                      <?php } ?>
                      <?php echo $client->jenis_client ?>
                      </span>
                      <br>Status: <span class="text-success"><i class="fa fa-check-circle"></i> <?php echo $client->status_verifikasi ?></span>
                    </p>
                  </div>
                  <div class="link-client">
                    <p>
                      <a href="<?php echo base_url('reseller/detail/'.$client->kode_client) ?>" class="btn btn-success btn-sm btn-block"><i class="fa fa-search"></i> Detail</a>
                    
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

