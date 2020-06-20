
<script>
$('.waktu').timepicker({
    timeFormat: 'h:mm',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
})
</script>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    
</div>
<div class="modal-body">

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
echo form_open_multipart(base_url('admin/produk/jadwal/'.$produk->id_produk),array('class'	=> 'form-horizontal'));
?>
<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Status Jadwal Produk <span class="text-danger">*</span></label>
	<div class="col-sm-9">
      <select name="status_jadwal_produk" class="form-control select2">
      	<option value="Buka">Buka</option>
      	<option value="Tutup">Tutup</option>
      	<option value="Booked">Sudah dibooking (Booked)</option>
      	<option value="Batal">Batal</option>
      </select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Lokasi Produk <span class="text-danger">*</span></label>
	<div class="col-sm-9">
      <select name="id_lokasi" class="form-control select2">
      	<?php foreach($lokasi as $lokasi) { ?>
      	<option value="<?php echo $lokasi->id_lokasi ?>">
      		<?php echo $lokasi->nama_lokasi ?>
      	</option>
      	<?php } ?>
      </select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Tanggal dan Jam Mulai<span class="text-danger">*</span></label>
	<div class="col-sm-4">
      <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo set_value('tanggal_mulai') ?>">
      <small class="text-gray">Tanggal mulai</small>
	</div>
	<div class="col-sm-4">
      <input type="text" name="jam_mulai" id="jam_mulai" class="form-control waktu" placeholder="00:00:00" value="<?php echo set_value('jam_mulai') ?>">
      <small class="text-gray">Jam mulai</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Tanggal dan Jam Selesai<span class="text-danger">*</span></label>
	<div class="col-sm-4">
      <input type="text" name="tanggal_selesai" id="tanggal_selesai" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo set_value('tanggal_selesai') ?>">
      <small class="text-gray">Tanggal selesai</small>
	</div>
	<div class="col-sm-4">
      <input type="text" name="jam_selesai" id="jam_selesai" class="form-control waktu" placeholder="00:00:00" value="<?php echo set_value('jam_selesai') ?>">
      <small class="text-gray">Jam selesai</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Keterangan Tanggal<span class="text-danger">*</span></label>
	<div class="col-sm-9">
      <input type="text" name="keterangan_tanggal" class="form-control" placeholder="Keterangan tanggal" value="<?php echo set_value('keterangan_tanggal') ?>" required>
      <small class="text-gray">Misal: 22,23,26,27 Mei 2019</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-12 control-label text-left">Keterangan <span class="text-danger">*</span></label>
	<div class="col-sm-12">
      <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="isi"><?php echo set_value('keterangan') ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right"></label>
	<div class="col-sm-9">
		<div class="btn-group">
			<button type="submit" name="submit" class="btn btn-primary " value="Simpan Data">
				<i class="fa fa-save"></i> Simpan Data
			</button>
			<button type="button" class="btn btn-danger " data-dismiss="modal">
				<i class="fa fa-times"></i> Close
			</button>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<?php
// Form close 
echo form_close();
?>

</div>
</div>
</div>
</div>
