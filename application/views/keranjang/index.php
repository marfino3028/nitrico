<!-- ======= Hero Section ======= -->
<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1><?php echo $title ?></h1>
            </div>
            
            <div class="col-md-12">
              <?php if($this->session->userdata('nama_partner')=="") {}else{ ?>
                <p>Hai <strong class="text-success"><em><?php echo $this->session->userdata('nama_partner'); ?></em></strong>, berikut adalah data keranjang belanja Anda.</p>
              <?php } ?>
              <?php $keranjang = $this->cart->contents(); if($keranjang) { ?>
              <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th class="text-center" width="10%">Gambar</th>
                        <th class="text-left" width="35%">Produk</th>
                        <th class="text-center" width="10%">Qty</th>
                        <th class="text-right" width="15%">Harga (Rp)</th>
                        <th class="text-right" width="15%">Sub Total (Rp)</th>
                        <th class="text-center" width="15%"></th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach($keranjang as $keranjang) { 
                    $produk = $this->produk_model->detail($keranjang['id']);
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $no ?>.</td>
                        <td>
                          <a class="thumbnail pull-left" href="#">
                            <img class="img img-thumbnail img-fluid" src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>">
                          </a>
                        </td>
                        <td>
                          <a href="#"><?php echo $produk->nama_produk ?></a>
                          <br>Kategori:  <a href="#"><?php echo $produk->nama_kategori_produk ?></a>
                          <br>Status: <span class="text-success"><strong>In Stock</strong></span>
                        </td>
                        <td class="text-center">
                          <!-- <input type="number" class="form-control" name="qty" value="<?php echo $keranjang['qty'] ?>"> -->
                          <?php echo $this->website->angka($keranjang['qty']) ?>
                        </td>
                        <td class="text-right"><?php echo $this->website->angka($keranjang['price']) ?></td>
                        <td class="text-right"><?php echo $this->website->angka($keranjang['subtotal']) ?></td>
                        <td class="text-right">
                          <input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/','',current_url()) ?>" class="pengalihan">

                         <!--  <button type="button" data-rowid="<?php echo $keranjang['rowid'] ?>" class="update_cart btn btn-info btn-sm"><i class="fa fa-save"></i> Update</button>
 -->
                          <button type="button" id="<?php echo $keranjang['rowid'] ?>" class="romove_cart btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                        </td>
                    </tr>
                    <?php $no++; } ?>
                    <tr>
                        <td colspan="5" class="text-right">Subtotal</td>
                        <td class="text-right"><strong><?php echo $this->website->angka($this->cart->total()) ?></strong></td>
                        <td></td>
                    </tr>
                    <!-- <tr>
                        <td colspan="5" class="text-right">Estimated shipping</td>
                        <td class="text-right"><strong>6.94</strong></td>
                        <td></td>
                    </tr> -->
                    <tr>
                        <td colspan="5" class="text-right">Total</td>
                        <td class="text-right"><strong><?php echo $this->website->angka($this->cart->total()) ?></strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        
                        <td colspan="4"></td>
                        <td colspan="3" class="text-right">
                          <div class="btn-group">
                            <a href="<?php echo base_url('produk') ?>" class="btn btn-secondary">
                                <i class="fa fa-shopping-cart"></i> Lannjutkan Belanja
                            </a>
                            <button type="button" class="btn btn-success">
                               <i class="fa fa-check"></i> Checkout 
                            </button>
                          </div>
                      </td>
                    </tr>
                </tbody>
            </table>
          <?php }else{ ?>
            <p class="alert alert-info">Keranjang belanja Anda masih kosong.</p>
          <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

