<p class="text-right">
  <a href="<?php echo base_url('admin/funnel') ?>" 
  class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
</p>
<hr>
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
echo form_open_multipart(base_url('admin/funnel/tambah'));
?>
<div class="row form-group">
<label class="col-md-3">Judul konten funnel</label>
<div class="col-md-9">
<input type="text" name="judul_funnel" class="form-control form-control-lg" placeholder="Judul konten funnel" value="<?php echo set_value('judul_funnel') ?>">
</div>
</div>

<div class="row form-group">
	<label class="col-md-3">Kategori dan Status</label>
	<div class="col-md-3">
		<select name="id_kategori_funnel" class="form-control">
			<?php foreach($kategori_funnel as $kategori_funnel) { ?>
				<option value="<?php echo $kategori_funnel->id_kategori_funnel ?>">
					<?php echo $kategori_funnel->nama_kategori_funnel ?>
				</option>
			<?php } ?>
		</select>
	</div>
	<div class="col-md-3">
		<select name="status_funnel" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Draft">Draft</option>
		</select>
	</div>
</div>

<div class="row form-group">
<label class="col-md-3">Upload gambar</label>
<div class="col-md-9">
<input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Isi funnel</label>
<div class="col-md-9">
<textarea name="isi" id="isi" class="form-control konten" placeholder="Isi funnel"><?php echo set_value('isi') ?></textarea>
</div>
</div>

<div class="row form-group">
<label class="col-md-3">Link / website yang terkait</label>
<div class="col-md-9">
<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo set_value('website') ?>">
</div>
</div>

<div class="row form-group">
<label class="col-md-3"></label>
<div class="col-md-9">
<div class="form-group">
<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
<input type="reset" name="reset" class="btn btn-info " value="Reset">
</div>
</div>
</div>
<?php
// Form close
echo form_close();
?>