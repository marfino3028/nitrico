<?php 
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Error upload
if(isset($error)) {
  echo '<div class="alert alert-warning">';
  echo $error;
  echo '</div>';
}

echo form_open_multipart(base_url('admin/client/tambah'),'id="tambah" class="form-horizontal"') ?>
<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Jenis client</label>
  <div class="col-sm-9">
    <select name="jenis_client" class="form-control">
      <option value="Distributor">Distributor</option>
      <option value="Personal">Personal</option>
      <option value="Reseller">Reseller</option>
    </select>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Nama client <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama') ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Nama Pimpinan/UP/Panggilan <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="pimpinan" id="pimpinan" class="form-control" placeholder="Nama Pimpinan" value="<?php echo set_value('pimpinan') ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Telepon</label>
  <div class="col-sm-9">
    <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Email client</label>
  <div class="col-sm-9">
    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Alamat website (jika ada)</label>
  <div class="col-sm-9">
    <input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<?php echo set_value('website') ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Alamat rumah/kantor</label>
  <div class="col-sm-9">
    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
  </div>
</div>



<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Tampilkan testimoni?</label>
  <div class="col-sm-9">
    <select name="status_testimoni" class="form-control">
      <option value="No">No</option>
      <option value="Yes">Yes</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Tampilkan di website?</label>
  <div class="col-sm-9">
    <select name="status_client" class="form-control">
      <option value="No">No</option>
      <option value="Yes">Yes</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Tempat, tanggal lahir</label>
  <div class="col-sm-3">
    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat/kota kelahiran" value="<?php echo set_value('tempat_lahir') ?>">
  </div>
  <div class="col-sm-4">
    <input type="text" name="tanggal_lahir" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo set_value('tanggal_lahir') ?>" >
  </div>
</div>



<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Isi testimoni</label>
  <div class="col-sm-9">
    <textarea name="isi_testimoni" id="isi_testimoni" class="form-control" placeholder="Testimoni"><?php echo set_value('isi_testimoni') ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Kata Kunci pencarian di Google</label>
  <div class="col-sm-9">
    <textarea name="keywords" id="keywords" class="form-control" placeholder="Keywords"><?php echo set_value('keywords') ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Upload Foto/Logo</label>
  <div class="col-sm-9">
    <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo set_value('gambar') ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right"></label>
  <div class="col-sm-9">
    <div class="form-group btn-group">
      <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
      <button type="reset" name="reset" class="btn btn-info "><i class="fa fa-cut"></i> Reset</button>
      <a href="<?php echo base_url('admin/client') ?>" name="reset" class="btn btn-warning "><i class="fas fa-redo"></i> Kembali</a>
    </div>
  </div>
</div>

<?php echo form_close(); ?>

