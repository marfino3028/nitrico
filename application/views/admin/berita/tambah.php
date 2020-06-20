<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');
// Error upload
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}
// Form open
echo form_open_multipart(base_url('admin/berita/tambah'),array('class'  =>'form-horizontal'));
?>
<p class="text-right">
  <a href="<?php echo base_url('admin/berita') ?>" 
  class="btn btn-success btn-sm" ><i class="fa fa-backward"></i> Kembali</a>
</p>
<hr>
<div class="row form-group">
  <label class="col-md-3">Judul berita/profil/layanan</label>
  <div class="col-md-6">
    <input type="text" name="judul_berita" class="form-control form-control-lg" placeholder="Judul berita/profil/layanan" required="required" value="<?php echo set_value('judul_berita') ?>">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3">Icon berita/profil/layanan</label>
  <div class="col-md-6">
    <input type="text" name="icon" class="form-control" placeholder="Icon berita/profil/layanan" value="<?php echo set_value('icon') ?>">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3">Status, Tanggal &amp; Jam Publish</label>
  <div class="col-md-2">
    <select name="status_berita" class="form-control select2">
      <option value="Publish">Publikasikan</option>
      <option value="Draft">Simpan sebagai draft</option>}
    </select>
  </div>
  <div class="col-md-2">
    <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo set_value('tanggal_publish'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
  </div>
  <div class="col-md-2">
    <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo set_value('jam_publish'); }else{ echo date('H:i:s'); } ?>">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3">Jenis &amp; Kategori Berita</label>
  <div class="col-md-3">
    <select name="jenis_berita" class="form-control select2">
     <option value="Berita">Berita</option>
     <option value="Profil">Profil</option>
     <option value="Layanan">Layanan</option>
     <option value="Keunggulan">Keunggulan</option>
   </select>
 </div>
 <div class="col-md-3">
  <select name="id_kategori" class="form-control select2">
   <?php foreach($kategori as $kategori) { ?>
     <option value="<?php echo $kategori->id_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
   <?php } ?>
 </select>
</div>
</div>

<div class="row form-group">
  <label class="col-md-3">Upload gambar &amp; Urutan</label>
  <div class="col-md-3">
    <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
  </div>
  <div class="col-md-3">
    <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>">
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3">Keywords dan Ringkasan<br>(untuk pencarian Google)</label>
  <div class="col-md-6">
    <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo set_value('keywords') ?></textarea>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3">Isi berita</label> 
  <div class="col-md-9">
    <div class="btn-group">
      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#gambar">
          <i class="fa fa-image"></i> Copy link gambar
      </button> 
      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#file">
          <i class="fa fa-file-pdf"></i> Copy Link File
      </button> 
    </div>
    <textarea name="isi" class="form-control konten" placeholder="Isi berita"><?php echo set_value('isi') ?></textarea>
  </div>
</div>

<div class="row form-group">
  <label class="col-md-3"></label>
  <div class="col-md-9">
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
      <input type="reset" name="reset" class="btn btn-info " value="Reset">
    </div>
  </div>
</div>

<?php
// Form close
echo form_close();
include('gambar.php');
include('files.php');
?>
