<script type="text/javascript">
    // To conform clear all data in cart.
    function clear_cart() {
        var result = confirm('Are you sure want to clear all bookings?');

        if (result) {
            window.location = "<?php echo base_url('belanja/hapus/all') ?>";
        } else {
            return false; // cancel button
        }
    }
</script>


<?php $nav_jual2           = $this->nav_model->nav_kategori_produk(); ?>
  <!-- Title Page -->
  <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/template/images/heading-pages-02.jpg);">
    <h2 class="l-text2 t-center">
      <?php echo $title ?>
    </h2>
    <p class="m-text13 t-center">
      <?php echo $site->namaweb.' - '.$site->tagline ?>
    </p>
  </section>


<!-- breadcrumb -->
  <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
    <a href="<?php echo base_url() ?>" class="s-text16">Home <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i></a>

    <a href="<?php echo base_url($this->uri->segment(1)) ?>" class="s-text16">
      <?php echo ucfirst($this->uri->segment(1)) ?>
      <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <span class="s-text17">
      <?php echo $title ?>
    </span>
  </div>

 <!-- Content page -->
  <section class="bgwhite p-t-55 p-b-65">
    <div class="container">
      <div class="row">

      <div class="col-md-12">
        <p class="alert alert-warning">Masukkan data Anda dengan lengkap untuk mendapatkan penawaran</p>
     
<?php 
// Error
echo validation_errors('<div class="alert alert-warning"><small>','</small></div>');
// form
echo form_open(base_url('banyak'), ' class="alert alert-info"')
?>
<table class="table table-bordered table-hover table-striped" id="searchable">
<thead class="bordered-darkorange">
<tr>
    <th>PILIH</th>
    <th>GAMBAR</th>
    <th>NAMA</th>
    <th>KATEGORI</th>
    <th  class="text-right">HARGA</th>
    <th>JENIS - STATUS</th>
    
</tr>
</thead>
<tbody>

<?php $i=1; foreach($barang as $barang) { 
$id_barang = $barang->id_barang;
$kelas    = 'rombel1';
$check = $this->kelas_model->check($kelas,$id_barang);
  ?>

<input type="hidden" name="kelas" value="rombel1">
<tr class="odd gradeX">
    <td><input type="checkbox" name="id_barang[]" value="<?php echo $barang->id_barang ?>" <?php if($check) { echo "checked"; }else{ } ?>></td>
    <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$barang->gambar) ?>" class="img img-responsive img-thumbnail" width="60"></td>
    <td><a href="<?php echo base_url('barang/detail/'.$barang->slug_barang) ?>" target="_blank">
    <?php echo $barang->nama_barang ?> <sup><i class="fa fa-search"></i></sup></a>
    <br><small>Warna: <?php echo $barang->warna ?></small>
    </td>
    <td> <a href="<?php echo base_url('admin/barang/kategori/'.$barang->id_kategori_barang) ?>">
    <?php echo $barang->nama_kategori_barang ?>
    </a></td>
    <td class="text-right"><?php echo number_format($barang->harga_jual,'0',',','.') ?></td>
    <td>
    <a href="<?php echo base_url('admin/barang/jenis_barang/'.$barang->jenis_barang) ?>">
    <small>
    <?php if($barang->jenis_barang=="Blind") { ?>
    <span class="btn btn-success btn-xs">
    <i class="fa fa-map-o"></i> <?php echo $barang->jenis_barang ?>
    </span>
    <?php }else{ ?>
    <span class="btn btn-primary btn-xs">
    <i class="fa fa-folder-open"></i> <?php echo $barang->jenis_barang ?>
    </span>
    <?php } ?>
    </small>
    </a> - 
    <a href="<?php echo base_url('admin/barang/status_barang/'.$barang->status_barang) ?>">
    <?php echo $barang->status_barang ?>
    </a>
    </td>
  
</tr>

<?php $i++; } ?>

</tbody>
</table>

<input type="submit" name="submit">
   
<?php echo form_close(); ?>


      </div>
 </div>
</div>
</section>
