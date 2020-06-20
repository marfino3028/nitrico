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
            
            <?php foreach($funnel as $funnel) { ?>
              <div class="col-lg-5 col-md-5 col-sm-12">
                <img src="<?php echo base_url('assets/upload/image/'.$funnel->gambar) ?>" class="img-fluid img-thumbnail" alt="<?php echo $funnel->judul_funnel ?>">
              </div>
              <div class="col-lg-7 col-md-7 col-sm-12">
                <h3><?php echo $funnel->judul_funnel ?></h3>
                <?php echo $funnel->isi ?>
              </div>
              <div class="col-md-12">
                <hr>
              </div>
            <?php } ?>

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

