<p class="text-right">
	<a href="<?php echo base_url('admin/produk') ?>" class="btn btn-success btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
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
echo form_open_multipart(base_url('admin/produk/tambah'),'id="tambah" class="form-horizontal"');
?>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Kategori &amp; Status Produk</label>
	<div class="col-sm-3">
		<select name="id_kategori_produk" class="form-control">
			<?php foreach($kategori_produk as $kategori_produk) { ?>
				<option value="<?php echo $kategori_produk->id_kategori_produk ?>"><?php echo $kategori_produk->nama_kategori_produk ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="col-sm-3">
		<select name="status_produk" class="form-control">
			<option value="Publish">Publikasikan</option>
			<option value="Draft">Simpan sebagai draft</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Nama &amp; Kode Produk <span class="text-danger">*</span></label>
	<div class="col-sm-6">
		<input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required value="<?php echo set_value('nama_produk') ?>">
		<small class="text-gray">Setiap awal kata gunakan huruf capital. Misal: <strong>Coklat Nitrico</strong></small>
	</div>
	<div class="col-sm-2">
		<input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" required value="<?php echo set_value('kode_produk') ?>">
		<small class="text-gray">Huruf capital. Misal: <strong>WDEV</strong></small>
	</div>
</div>



<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Deskripsi Produk</label>
	<div class="col-sm-9">
		<textarea name="isi" id="isi"  class="form-control konten" placeholder="Deskripsi Produk"><?php echo set_value('isi') ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Deskripsi Ringkas &amp; Keywords Produk (untuk pencarian Google)</label>
	<div class="col-sm-4">
		<textarea name="deskripsi" class="form-control" placeholder="Deskripsi Produk"><?php echo set_value('deskripsi') ?></textarea>
		<small class="text-gray">Penjelasan secara ringkas produk</small>
	</div>
	<div class="col-sm-4">
		<textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo set_value('keywords') ?></textarea>
		<small class="text-gray">Gunakan koma sebagai pemisah, misal: <strong>web design, desain grafis, produk web, produk android</strong></small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Upload gambar</label>
	<div class="col-sm-9">
		<input type="file" name="gambar" class="form-control" required placeholder="Upload gambar" id="file">
		<div id="imagePreview"></div>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Harga Produk</label>
	<div class="col-sm-3">
		<input type="number" name="harga_jual" class="form-control" placeholder="Harga kelas" value="<?php echo set_value('harga_jual') ?>">
		<small class="text-gray">Harga jual</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" value="<?php echo set_value('harga_beli') ?>">
		<small class="text-gray">Harga beli</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Harga eceran terendah &amp; tertinggi</label>
	<div class="col-sm-3">
		<input type="number" name="harga_terendah" class="form-control" placeholder="Harga eceran terendah" value="<?php echo set_value('harga_terendah') ?>">
		<small class="text-gray">Harga eceran terendah</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="harga_tertinggi" class="form-control" placeholder="Harga eceran tertingi" value="<?php echo set_value('harga_tertinggi') ?>">
		<small class="text-gray">Harga eceran tertingi</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Diskon dan jenisnya</label>
	<div class="col-sm-3">
		<select name="jenis_diskon" class="form-control">
			<option value="Potongan">Potongan Harga (Rp)</option>
			<option value="Persentase">Persentase (%)</option>
		</select>
		<small class="text-gray">Jenis diskon</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="besar_diskon" class="form-control" placeholder="Besar Diskon" value="<?php echo set_value('besar_diskon') ?>">
		<small class="text-gray">Besaran Diskon. Misal: 100.000 atau 10%</small>
	</div>
	
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Periode Diskon (<small class="text-danger">Jika ada</small>)</label>
	<div class="col-sm-3">
		<input type="text" name="mulai_diskon" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo set_value('mulai_diskon') ?>">
		<small class="text-gray">Format: dd-mm-yyyy</small>
	</div>
	<div class="col-sm-3">
		<input type="text" name="selesai_diskon" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo set_value('selesai_diskon') ?>">
		<small class="text-gray">Format: dd-mm-yyyy</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Jumlah minimal &amp; Maksimal order (<small class="text-danger">Minimal dan maksimal</small>)</label>
	<div class="col-sm-3">
		<input type="number" name="jumlah_order_min" class="form-control" placeholder="Jumlah minimal" value="<?php echo set_value('jumlah_order_min') ?>">
		<small class="text-gray">Jumlah <strong>minimal</strong> order dalam 1 kelas</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="jumlah_order_max" class="form-control" placeholder="Jumlah maksimal" value="<?php echo set_value('jumlah_order_max') ?>">
		<small class="text-gray">Jumlah <strong>maksimal</strong> order dalam 1 kelas</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Satuan, Berat dan Ukuran</label>
	<div class="col-sm-2">
		<input type="text" name="satuan" class="form-control" placeholder="Satuan" value="<?php echo set_value('satuan') ?>">
		<small class="text-gray">Misal: Buah, Bungkus. Pak, Kilogram, Gram</small>
	</div>
	<div class="col-sm-2">
		<input type="number" name="berat" class="form-control" placeholder="Berat" value="<?php echo set_value('berat') ?>">
		<small class="text-gray">Dalam satuan <strong>gram</strong></small>
	</div>
	<div class="col-sm-2">
		<input type="text" name="ukuran" class="form-control" placeholder="Ukuran" value="<?php echo set_value('ukuran') ?>">
		<small class="text-gray">Misal: 10 x 20 x 30 cm</small>
	</div>
</div>



<div class="form-group row">
	<label class="col-sm-3 control-label text-right">Stok dan Urutan ditampilkan</label>
	<div class="col-sm-3">
		<input type="number" name="stok" class="form-control" placeholder="Stok" value="<?php echo set_value('stok') ?>">
		<small class="text-gray">Format angka.</small>
	</div>
	<div class="col-sm-3">
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>">
		<small class="text-gray">Format angka</small>
	</div>
</div>


<div class="form-group row">
	<label class="col-sm-3 control-label text-right"></label>
	<div class="col-sm-9">
		<div class="form-group btn-group pull-right">
			<button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
			<input type="reset" name="reset" class="btn btn-info " value="Reset">
		</div>
	</div>
</div>
<?php
// Form close
echo form_close();
?>

