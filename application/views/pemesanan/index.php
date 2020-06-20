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
            <div class="col-md-8 text-left">
              <?php
              $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              ?>
              <?php
              if($this->session->flashdata('sukses'))
              {
              echo '<div class="alert alert-success text-justify">';
              echo $this->session->flashdata('sukses');
              echo '</div>';
              }
              if($this->session->flashdata('warning'))
              {
              echo '<div class="alert alert-warning text-justify"><i class="fa fa-warning"></i> ';
              echo $this->session->flashdata('warning');
              echo '</div>';
              }
              if($this->session->flashdata('gagal'))
              {
              echo '<div class="alert alert-danger text-justify"><i class="fa fa-warning"></i> ';
              echo $this->session->flashdata('gagal');
              echo '</div>';
              }

              echo validation_errors('<p class="alert alert-warning">','</p>');
              ?>

              <?php echo form_open_multipart($actual_link, 'class="form-horizontal"'); 
              ?>

              <p class="alert alert-info">
                Isi data pemesanan Anda dengan lengkap dan benar.
              </p>

              <?php if($client) { ?>
              <div class="form-group row">
                  <label class="col-sm-4 control-label">Reseller Anda adalah <strong><?php echo $client->nama ?></strong><span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                      <input type="text" name="kode_reseller" class="form-control" value="<?php if(isset($_POST['kode_reseller'])) { echo set_value('kode_reseller'); }else{ echo $client->kode_client; } ?>"  placeholder="Jumlah" min="1" max="5" readonly disabled>
                      <small class="text-text-danger"><?php echo form_error('kode_reseller') ?></small>
                  </div>
              </div>

            <?php } ?>

              <div class="form-group row">
                  <label class="col-sm-4 control-label">Pilih produk pembayaran</label>
                  <div class="col-md-8">
                    <select name="id_produk" class="form-control select2">
                      <?php foreach($produk as $produk) { ?>
                      <option value="<?php echo $produk->id_produk ?>" <?php if(isset($_POST['id_produk']) && $_POST['id_produk']==$produk->id_produk) { echo "selected"; }elseif(isset($_GET['id_produk']) && $_GET['id_produk']==$produk->id_produk) { echo 'selected'; } ?>>
                        <?php echo $produk->nama_produk ?> (Rp <?php echo $this->website->angka($produk->harga_jual); ?>)
                      </option>
                      <?php } ?>
                    </select>
                    <small class="text-text-danger"><?php echo form_error('id_produk') ?></small>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 control-label">Jumlah <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                      <input type="number" name="jumlah_produk" class="form-control" value="<?php if(isset($_POST['jumlah_produk'])) { echo set_value('jumlah_produk'); }else{ echo 1; } ?>"  placeholder="Jumlah" min="1" max="5" required>
                      <small class="text-text-danger"><?php echo form_error('jumlah_produk') ?></small>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 control-label">Nama Anda <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                      <input type="text" name="nama_pemesan" class="form-control" placeholder="Nama Anda" value="<?php echo $this->session->userdata('nama_pemesan'); ?>" required>
                      <small class="text-text-danger"><?php echo form_error('nama_pemesan') ?></small>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 control-label">Nomor HP/Whatsapp <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                      <input type="text" name="telepon_pemesan" class="form-control" value="<?php echo set_value('telepon_pemesan'); ?>"  placeholder="Nomor HP/Whatsapp" required>
                      <small class="text-text-danger"><?php echo form_error('telepon_pemesan') ?></small>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                      <input type="email" name="email_pemesan" class="form-control" value="<?php echo set_value('email_pemesan'); ?>"  placeholder="Email Anda" required>
                      <small class="text-text-danger"><?php echo form_error('email_pemesan') ?></small>
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-sm-4 control-label">Alamat Pengiriman</label>
                  <div class="col-sm-8">
                      <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
                      <small class="text-text-danger"><?php echo form_error('alamat') ?></small>
                  </div>
              </div>



              <div class="form-group row">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <div class="btn-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" value="login">
                          <i class="fa fa-save"></i> Kirim pesanan
                        </button>
                        <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">
                          <i class="fa fa-times"></i> Reset
                        </button>
                    </div>
                </div>
              </div>
              <?php echo form_close(); ?> 
            </div>

            <div class="col-md-4">
                <img src="<?php echo $this->website->gambar() ?>" class="img img-thumbnail img-fluid">  
            </div>

            <div class="col-md-12">
               <hr>
                <p>Anda sudah melakukan pembayaran? Silakan lakukan <a href="<?php echo base_url('pembayaran/konfirmasi') ?>">Konfirmasi Pembayaran</a>.</p>
                <hr>
             </div>     
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

