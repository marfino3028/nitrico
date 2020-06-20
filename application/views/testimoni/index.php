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
            <div class="col-md-12">
              <p class="text-center"><strong>Disclaimer:</strong><br>Ini adalah testimoni nyata tanpa rekayasa dari pelanggan kami, hasil setiap orang berbeda karena berbagai faktor yang bisa mempengaruhinya.</p>
              <hr>
            </div>
            <?php foreach($testimoni as $testimoni) { ?>
              <div class="col-md-6">
                <?php if($testimoni->gambar != "") { ?>
                <p class="text-center"><img src="<?php echo base_url('assets/upload/image/'.$testimoni->gambar) ?>" class="img img-responsive img-thumbnail"></p>
                  <?php } ?>
                <?php if($testimoni->video!="") { ?>
                  <iframe src="https://www.youtube.com/embed/<?php echo $testimoni->video ?>" class="youtube" style="width: 100%; height: auto; min-height: 400px;"></iframe>
                  <hr>
                <?php } ?>
                <div class="text-center">
                  <?php echo $testimoni->keterangan ?>
                  <p><strong>- <?php echo $testimoni->nama_client ?></strong></p>
                </div>
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

