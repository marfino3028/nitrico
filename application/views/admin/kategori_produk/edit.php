
<?php
// Error upload 
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open_multipart(base_url('admin/kategori_produk/edit/'.$kategori_produk->id_kategori_produk), array('class'	=> 'form-horizontal'));
?>

<div class="row form-group">
	<label class="col-md-3">Nama kategori produk</label>
	<div class="col-md-8">
		<input type="text" name="nama_kategori_produk" class="form-control" placeholder="Nama kategori produk" value="<?php echo $kategori_produk->nama_kategori_produk ?>" required>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Urutan kategori produk</label>
	<div class="col-md-8">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $kategori_produk->urutan ?>" required>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Gambar kategori produk</label>
	<div class="col-md-8">
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo $kategori_produk->gambar ?>">
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Keterangan kategori produk</label>
	<div class="col-md-8">
		<textarea name="keterangan"  class="form-control konten" placeholder="Keterangan" ><?php echo $kategori_produk->keterangan ?></textarea>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3"></label>
	<div class="col-md-8">
		<div class="form-group pull-right btn-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
			<a href="<?php echo base_url('admin/kategori_produk') ?>" class="btn btn-info"> Kembali</a>
		</div>
	</div>
</div>
	<?php
// Form close 
	echo form_close();
	?>

