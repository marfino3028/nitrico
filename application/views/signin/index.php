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
            <div class="col-md-5 text-left">
              
              <p>Anda sudah memiliki akun? Silakan login pada form yang disediakan.</p>
              <p>Jika Anda belum memiliki akun, silakan <a href="<?php echo base_url('pendaftaran') ?>">Registrasi</a></p>
            </div>
            <div class="col-md-7">
              <?php echo form_open(base_url('signin')); ?>
              <input type="hidden" name="next_url" value="<?php echo $this->session->userdata('next_url'); ?>">
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username/email" required>
                <small class="text-danger"><?php echo form_error('username') ?></small>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <small class="text-danger"><?php echo form_error('password') ?></small>
              </div>
              <div class="form-group">
                <button class="btn btn-success" name="login" value="login" type="submit">
                  <i class="fa fa-lock"></i> Login
                </button>
                <button class="btn btn-outline-secondary" name="reset" value="reset" type="reset">
                  <i class="fa fa-times"></i> Reset
                </button>
                <br>
                <small><a href="<?php echo base_url('signin/forgot') ?>" title="Lupa Password">Lupa Password?</a></small>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

