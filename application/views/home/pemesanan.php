 <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title text-center" data-aos="fade-up">
          <h2>Pemesanan produk</h2>
          <p>Isi data Anda dengan lengkap</p>
        </div>

        <div class="row">

          <div class="col-md-8 text-left" data-aos="fade-right" data-aos-delay="100">
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

              <div class="form-group row">
                  <label class="col-sm-4 control-label">Pilih produk pembayaran</label>
                  <div class="col-md-8">
                    <select name="id_produk" class="form-control select2">
                      <?php $produk= $this->produk_model->listing_all();
                      foreach($produk as $produk) { ?>
                      <option value="<?php echo $produk->id_produk ?>" <?php if(isset($_POST['id_produk']) && $_POST['id_produk']==$produk->id_produk) { echo "selected"; } ?>>
                        <?php echo $produk->nama_produk ?> (Rp <?php echo $this->website->angka($produk->harga_jual); ?>)
                      </option>
                      <?php } ?>
                    </select>
                    <small class="text-text-danger"><?php echo form_error('id_produk') ?></small>
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

            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                <img src="<?php echo $this->website->gambar() ?>" class="img img-thumbnail img-fluid">  
            </div>
        </div>

      </div>
    </section><!-- End Contact Section -->