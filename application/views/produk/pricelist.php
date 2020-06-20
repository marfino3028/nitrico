<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('<?php echo $this->website->banner(); ?>')">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
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
    <a href="<?php echo base_url('produk') ?>">Produk</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current"><?php echo $title ?></span>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
         <p>Berikut ini adalah daftar harga produk di <strong><?php echo $this->website->namaweb() ?></strong>.</p> 
      </div>
      <div class="col-md-4">
        <p class="text-right"><a href="<?php echo base_url('produk/katalog') ?>" target="_blank" class="btn btn-success text-right"><i class="fa fa-file-pdf"></i> Download Daftar Harga (PDF)</a> </p>
      </div>
   
      
    </div>

    <table class="display table table-bordered table-striped" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="5%">NO</th>
          <th width="10%">GAMBAR</th>
          <th width="20%">NAMA</th>
          <th width="20%">KATEGORI</th>
          <th  class="text-right" width="15%">HARGA KELAS</th>
          <th  class="text-right" width="15%">HARGA PRIVATE</th>
          <th  width="10%">DURASI</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($kategori_produk as $kategori_produk) { 
          $id_kategori_produk = $kategori_produk->id_kategori_produk;
          $produk             = $this->produk_model->kategori_all($id_kategori_produk);
          ?>

          <tr>
            <th colspan="7"><?php echo strtoupper($kategori_produk->nama_kategori_produk) ?></th>
          </tr>


          <?php $i=1; foreach($produk as $produk) { ?>

            <tr class="odd gradeX">
              <td class="text-center"><?php echo $i ?></td>
              <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail" width="80"></td>
              <td><a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" target="_blank">
                <?php echo $produk->nama_produk ?> </a>
              </td>
              <td><a href="<?php echo base_url('produk/kategori/'.$produk->slug_kategori_produk) ?>">
                <?php echo $produk->nama_kategori_produk ?></a></td>
              <td class="text-right"><?php echo number_format($produk->harga_jual,'0',',','.') ?></td>
              <td class="text-right"><?php echo number_format($produk->harga_private,'0',',','.') ?></td>
              <td><?php echo $produk->durasi_produk ?> jam</td>
              </tr>
              <?php $i++; } ?>
            <?php } ?>
          </tbody>
        </table>
      </div>    
    </div>