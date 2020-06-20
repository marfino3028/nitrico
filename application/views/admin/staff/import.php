<div class="row">
	<div class="col-md-7">
		<div class="alert alert-warning text-center">
			<h3>Perhatian</h3>
			<hr>
			<p>Pastikan file excel yang akan Anda unggah sudah sesuai dengan template di bawah ini. Jika template tidak sesuai, maka data tidak akan bisa diimport dengan baik.</p>
			<p>Unduh template data: <a href="<?php echo base_url('assets/upload/file/template_staff.xlsx') ?>"><i class="fa fa-download" target="_blank"></i> Unduh Template Import Staff</a></p>
		</div>
		<hr>
		<?php echo form_open_multipart(base_url('admin/staff/import'),'id="tambah"  class="form-horizontal"') ?>

		<div class="form-group row">
		  <label class="col-sm-3 control-label text-right">Upload File Excel</label>
		  <div class="col-sm-9">
		      <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo set_value('gambar') ?>">
		  </div>
		</div>

		<div class="form-group row">
		  <label class="col-sm-3 control-label text-right"></label>
		  <div class="col-sm-9">
		    <div class="btn-group">
		        <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Upload dan Import Data</button>
		        <button type="reset" name="reset" class="btn btn-info "><i class="fa fa-cut"></i> Reset</button>
		        <a href="<?php echo base_url('admin/staff') ?>" class="btn btn-secondary " data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
		    </div>
		  </div>
		</div>
		<?php echo form_close(); ?>
	</div>
	<div class="col-md-5">

	</div>
</div>