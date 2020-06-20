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
              
              <p>Untuk melakukan reset password, masukkan alamat <strong>Email</strong> Anda lalu klik tombol <strong>Reset Password</strong>.</p>
              <p>Jika Anda belum memiliki akun, silakan <a href="<?php echo base_url('pendaftaran') ?>">Registrasi</a> atau <a href="<?php echo base_url('signin') ?>" title="Lupa Password">Login</a> jika sudah memiliki akun.</p>
            </div>
            <div class="col-md-7">
              <?php echo form_open(base_url('signin/forgot')); ?>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <small>Email Anda yang terdaftar.</small>
              </div>
              <div class="form-group">
                <button class="btn btn-success" name="login" value="login" type="submit">
                  <i class="fa fa-lock"></i> Reset Password
                </button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

