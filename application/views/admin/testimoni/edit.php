<p class="text-right">
	<a href="<?php echo base_url('admin/testimoni') ?>" class="btn btn-success btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>
<hr>
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
echo form_open_multipart(base_url('admin/testimoni/edit/'.$testimoni->id_testimoni), array('class'	=> 'form-horizontal'));
?>

<div class="row form-group">
	<label class="col-md-3">Nama client</label>
	<div class="col-md-9">
		<input type="text" name="nama_client" class="form-control" placeholder="Nama client" value="<?php echo $testimoni->nama_client ?>" required>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Nama produk</label>
	<div class="col-md-9">
		<input type="text" name="nama_produk" class="form-control" placeholder="Nama produk" value="<?php echo $testimoni->nama_produk ?>" required>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Gambar testimoni</label>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo $testimoni->gambar ?>">
		<?php if($testimoni->gambar !='') { ?>
			<small>Gambar:<br>
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$testimoni->gambar) ?>" class="img img-thumbnail" style="max-height: 100px; height: auto; width: auto;">
			</small>
		<?php } ?>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Kode Video Youtube</label>
	<div class="col-md-9">
		<input type="text" name="video" class="form-control" placeholder="XT2VCXEtMk0" value="<?php echo $testimoni->video ?>">
		<small class="text-danger">Kode video Youtube. Misal: https://www.youtube.com/watch?v=<strong>XT2VCXEtMk0</strong>. <br>Ambil kode setelah <strong>= (sama dengan)</strong>, yaitu kode: <strong>XT2VCXEtMk0</strong></small>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Keterangan testimoni</label>
	<div class="col-md-9">
		<textarea name="keterangan"  class="form-control simple" placeholder="Keterangan" ><?php echo $testimoni->keterangan ?></textarea>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Status &amp; Urutan</label>
	<div class="col-md-4">
		<select name="status_testimoni" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Draft" <?php if($testimoni->status_testimoni=="Draft") { echo 'selected'; } ?>>Draft</option>
		</select>
	</div>
	<div class="col-md-5">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $testimoni->urutan ?>" required>
	</div>
</div>

<div class="row form-group">
	<label class="col-md-3"></label>
	<div class="col-md-9">
		<div class="form-group pull-right btn-group">
			<input type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
			<input type="reset" name="reset" class="btn btn-success " value="Reset">
		</div>
	</div>
	<div class="clearfix"></div>
</div>
	<?php
// Form close 
	echo form_close();
	?>

