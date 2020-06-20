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
              
              <p class="text-center">Isi data Anda dengan lengkap dan benar. Data yang lengkap akan mempermudah kami dalam menghubungi dan melakukan verifikasi.</p>
              <hr>
              
              <?php echo form_open(base_url('pendaftaran')); ?>
              <input type="hidden" name="next_url" value="<?php echo $this->session->userdata('next_url'); ?>">

              <div class="form-group row">
                <label class="col-md-3">Nama lengkap</label>
                <div class="col-md-9">
                  <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required>
                  <small class="text-danger"><?php echo form_error('nama') ?></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3">Nomor HP/Whatsapp</label>
                <div class="col-md-9">
                  <input type="text" name="telepon" class="form-control" placeholder="Nomor HP/Whatsapp" required>
                  <small class="text-danger"><?php echo form_error('telepon') ?></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3">Email (Username)</label>
                <div class="col-md-9">
                  <input type="email" name="username" class="form-control" placeholder="Email (Username)" required>
                  <small class="text-danger"><?php echo form_error('username') ?></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3">Password</label>
                <div class="col-md-9">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                  <small class="text-danger"><?php echo form_error('password') ?></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3">Jenis mitra</label>
                <div class="col-md-9">
                  <select name="jenis_client" class="form-control">
                    <option value="Distributor">Distributor</option>
                    <option value="Reseller">Reseller</option>
                  </select>
                  <small class="text-danger"><?php echo form_error('jenis_client') ?></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3"></label>
                <div class="col-md-9">
                <button class="btn btn-success" name="login" value="login" type="submit">
                  <i class="fa fa-lock"></i> Daftar Sebagai Mitra
                </button>
                <button class="btn btn-outline-secondary" name="reset" value="reset" type="reset">
                  <i class="fa fa-times"></i> Reset
                </button>
                <br>
                <small>Sudah memiliki akun? <a href="<?php echo base_url('signin') ?>" title="Lupa Password">Login di sini</a></small>
              </div>
            </div>
              <?php echo form_close(); ?>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

