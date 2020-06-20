<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('<?php echo $this->website->banner(); ?>')">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-md-8 offset-2">
        <?php echo form_open(base_url('produk'),array('method'  => 'get','class="horizontal"')) ?>
        <div class="input-group input-group-lg">                  
          <input type="text" name="keywords" class="form-control" placeholder="Cari produk...." value="<?php if(isset($_GET['keywords'])) { echo $this->security->xss_clean($_GET['keywords']); }else{ echo ''; } ?>" required>
          <span class="input-group-btn input-group-lg">
            <button type="submit" class="btn btn-warning btn-lg btn-flat" style="border-radius: 0 5px 5px 0;"><i class="fa fa-search"></i> Cari Produk</button>
          </span>
        </div>
        <small class="text-white">Misal: Codeigniter, Laravel, Android, Statistik, SPSS, Stata</small>
        <hr>
        <?php echo form_close(); ?>
      </div>
      <div class="clearfix"><br></div>
      <div class="col-lg-12">
        <h2 class="mb-0"><?php echo $title ?></h2>
        <p><?php echo $deskripsi ?></p>
      </div>
    </div>
  </div>
</div> 

<div class="custom-breadcrumns border-bottom">
  <div class="container">
    <a href="<?php echo base_url() ?>">Beranda</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current"><?php echo $title ?></span>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <p>Berikut adalah hasil pencarian Anda dengan kata kunci: <strong><?php echo $this->security->xss_clean($_GET['keywords']) ?></strong></p>

    <?php if($produk) { ?>
    <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr class="bg-info" style="color: white;">
          <th width="5%">NO</th>
          <th width="10%">GAMBAR</th>
          <th width="25%">NAMA</th>
          <th width="20%">KATEGORI</th>
          <th width="15%">BIAYA KELAS</th>
          <th width="15%">BIAYA PRIVATE</th>
          <th width="10%"></th>
        </tr>
      </thead>
      <tbody>

        <?php $i=1; foreach($produk as $produk) { ?>

          <tr class="odd gradeX">
            <td><?php echo $i ?></td>

            <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail" width="60"></td>
            <td><a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" target="_blank">
              <?php echo $produk->nama_produk ?> <sup><i class="fa fa-search"></i></sup></a>
              <br>Jumlah minimal siswa: <?php echo $produk->jumlah_siswa_min ?>
              <br>Jumlah maksimal siswa: <?php echo $produk->jumlah_siswa_max ?>
              <br>Durasi produk: <?php echo $produk->durasi_produk ?> jam
            </small>
          </td>

          <td><a href="<?php echo base_url('produk/kategori/'.$produk->slug_kategori_produk) ?>">
            <?php echo $produk->nama_kategori_produk ?></a></td>
            <td class="text-right"><?php $date1    = strtotime($produk->mulai_diskon); 
            $date2    = strtotime($produk->selesai_diskon); 
            $sekarang = strtotime(date('Y-m-d')); 
            if($date1 <= $sekarang && $date2 >= $sekarang) {
              ?>
              <strong><?php echo $this->website->angka($produk->harga_diskon); ?> <sup class="text-danger"><del>Rp <?php echo $this->website->angka($produk->harga_jual); ?></del></sup></strong>
            <?php }else{ ?>
              <strong><?php echo $this->website->angka($produk->harga_jual); ?></strong>
              <?php } ?></td>
              <td  class="text-right"><?php $date1    = strtotime($produk->mulai_diskon); 
              $date2    = strtotime($produk->selesai_diskon); 
              $sekarang = strtotime(date('Y-m-d')); 
              if($date1 <= $sekarang && $date2 >= $sekarang) {
                ?>
                <strong><?php echo $this->website->angka($produk->harga_private_diskon); ?> <sup class="text-danger"><del>Rp <?php echo $this->website->angka($produk->harga_private); ?></del></sup></strong>
              <?php }else{ ?>
                <strong><?php echo $this->website->angka($produk->harga_private); ?></strong>
                <?php } ?></td>

                <td>
                  <div class="btn-group">

                    <a class="btn btn-info btn-xs" href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" target="_blank"><i class="fa fa-eye"></i> Detail</a>

                  </div>

                </td>
              </tr>

              <?php $i++; } ?>

            </tbody>
          </table>
        <?php }else{ ?>

          <p class="alert alert-warning">Mohon maaf, tidak ditemukan data</p>

        <?php } ?>
        </div>
      </div>
