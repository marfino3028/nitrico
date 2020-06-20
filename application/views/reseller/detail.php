<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12">
              <p class="text-right">
                <a href="<?php echo base_url('reseller') ?>" class="btn btn-success btn-sm"><i class="fa fa-file-pdf"></i> Lihat Lainnya</a>
              </p>
              <hr>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12">
              <div class="owl-carousel owl-theme">
                <div class="item" data-hash="zero">
                  <img src="<?php echo base_url('assets/upload/client/'.$client->gambar) ?>" alt="<?php echo $client->nama; ?>" class="img img-thumbnail img-fluid">
                </div>
                
              </div>
  
                
            </div>

            <div class="col-lg-8 col-md-7 col-sm-12 client">
              
              <h1><?php echo $title ?></h1>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>