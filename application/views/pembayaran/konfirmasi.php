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
              
              <p class="text-center">Baca informasi Panduan pembayaran sebelum melakukaan konfirmasi. <a href="<?php echo base_url('pembayaran') ?>">Panduan Pembayaran</a>.</p>
              <hr>

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
  Isi data pembayaran Anda dengan lengkap dan benar.
</p>
<hr>

<div class="form-group row">
    <label class="col-sm-3 control-label">Pilih rekening pembayaran</label>
    <div class="col-md-9">
      <select name="id_rekening" class="form-control select2">
        <?php foreach($rekening as $rekening) { ?>
        <option value="<?php echo $rekening->id_rekening ?>" <?php if(isset($_POST['id_rekening']) && $_POST['id_rekening']==$rekening->id_rekening) { echo "selected"; } ?>>
          <?php echo $rekening->nama_bank ?> (<?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->atas_nama ?>)
        </option>
        <?php } ?>
      </select>
      <small class="text-text-danger"><?php echo form_error('id_rekening') ?></small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Cara bayar</label>
    <div class="col-sm-9">
        <select name="cara_bayar" class="form-control" id="cara_bayar">
            <option value="Transfer">Transfer</option>
            <option value="Tunai">Tunai</option>
            <option value="Lainnya">Lainnya</option>
        </select>
        <small class="text-text-danger"><?php echo form_error('cara_bayar') ?></small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Tanggal bayar</label>
    <div class="col-sm-9">
        <input type="text" name="tanggal_bayar" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); }else{ echo date('d-m-Y'); } ?>">
        <small class="text-text-danger"><?php echo form_error('tanggal_bayar') ?></small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Upload bukti bayar
      <br><small class="text-gray">Format JPG, PNG, GIF. Maksimal 2 MB</small>
    </label>
    <div class="col-sm-9">
        <input type="file" name="bukti" placeholder="Upload bukti bayar" class="form-control">
        <small class="text-text-danger"><?php echo form_error('bukti') ?></small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Kode/Nomor Transaksi</label>
    <div class="col-sm-9">
        <input type="text" name="kode_transaksi" class="form-control" placeholder="Kode/Nomor transaksi" value="<?php echo set_value('kode_transaksi') ?>">
        <small class="text-text-danger"><?php echo form_error('kode_transaksi') ?></small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Jumlah Pembayaran</label>
    <div class="col-sm-9">
        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo set_value('jumlah') ?>">
        <small class="text-text-danger"><?php echo form_error('jumlah') ?></small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Nama Pemilik Rekening</label>
    <div class="col-sm-9">
        <input type="text" name="pengirim" class="form-control" placeholder="Nama Pemilik Rekening" value="<?php echo $this->session->userdata('pengirim'); ?>" required>
        <small class="text-text-danger"><?php echo form_error('pengirim') ?></small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Nama Bank</label>
    <div class="col-sm-9">
        <input type="text" name="nama_bank_pengirim" class="form-control" value="<?php echo set_value('nama_bank_pengirim'); ?>"  placeholder="Nama Bank" required>
        <small class="text-text-danger"><?php echo form_error('nama_bank_pengirim') ?></small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Nomor Rekening Pembayaran</label>
    <div class="col-sm-9">
        <input type="text" name="nomor_rekening_pengirim" class="form-control" value="<?php echo set_value('nomor_rekening_pengirim'); ?>" placeholder="Nomor rekening pembayaran" required>
        <small class="text-gray">Nomor rekening yang digunakan untuk membayar</small>
        <small class="text-text-danger"><?php echo form_error('nomor_rekening_pengirim') ?></small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label">Keterangan lain</label>
    <div class="col-sm-9">
        <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo set_value('keterangan') ?></textarea>
        <small class="text-text-danger"><?php echo form_error('keterangan') ?></small>
    </div>
</div>



<div class="form-group row">
    <label class="col-sm-3 control-label"></label>
<div class="col-sm-9">
    <div class="btn-group">
        <button type="submit" name="submit" class="btn btn-primary btn-lg" value="login">
          <i class="fa fa-save"></i> Simpan Data
        </button>
        <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">
          <i class="fa fa-times"></i> Reset
        </button>
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

