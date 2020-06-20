<?php 
$kategori_funnel = $this->nav_model->nav_funnel();
foreach($kategori_funnel as $kategori_funnel) {
  $funnel   = $this->nav_model->funnel($kategori_funnel->id_kategori_funnel);
?>
<!-- ======= <?php echo $kategori_funnel->nama_kategori_funnel; ?> Section ======= -->
<section id="<?php echo $kategori_funnel->slug_kategori_funnel; ?>" class="about">

      
  <div class="container">
    <div class="col-xl-10 col-lg-10  offset-1 section-title" data-aos="fade-up">
          <h2><?php echo $kategori_funnel->nama_kategori_funnel ?></h2>
          <p><?php echo $kategori_funnel->nama_kategori_funnel ?></p>
    </div>
    <?php foreach($funnel as $funnel) { ?>
    <!-- START -->
    <div class="row">
      <div class="col-xl-10 col-lg-10 offset-1" data-aos="fade-right">
        <img src="<?php echo base_url('assets/upload/image/'.$funnel->gambar) ?>" class="img-fluid img-thumbnail" alt="<?php echo $funnel->judul_funnel ?>">
      </div>
      <div class="col-xl-10 col-lg-10 offset-1 icon-boxes d-flex flex-column py-5 px-lg-5" data-aos="fade-left">
        <h3><?php echo $funnel->judul_funnel ?></h3>
        <?php echo $funnel->isi ?>
      </div>
    </div>
    <!-- END -->
  <?php } ?>
  </div>
  <hr>
</section>
<!-- End <?php echo $kategori_funnel->nama_kategori_funnel; ?> Section -->
<?php } ?>