<?php echo form_open_multipart(base_url('admin/staff/edit/'.$staff->id_staff),'id="tambah" class="form-horizontal"') ?>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Nama staff <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $staff->nama ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Jabatan</label>
  <div class="col-sm-9">
    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $staff->jabatan ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Telepon</label>
  <div class="col-sm-9">
    <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="<?php echo $staff->telepon ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Email staff</label>
  <div class="col-sm-9">
    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $staff->email ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Alamat website (jika ada)</label>
  <div class="col-sm-9">
    <input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<?php echo $staff->website ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Urutan</label>
  <div class="col-sm-9">
    <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $staff->urutan ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Tampilkan di website?</label>
  <div class="col-sm-9">
    <select name="status_staff" class="form-control">
      <option value="No">No</option>
      <option value="Yes" <?php if($staff->status_staff=="Yes") { echo "selected"; } ?>>Yes</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Tempat, tanggal lahir</label>
  <div class="col-sm-3">
    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat/kota kelahiran" value="<?php echo $staff->tempat_lahir ?>">
  </div>

  <div class="col-md-6">
    <input type="text" name="tanggal_lahir" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo date('d-m-Y',strtotime($staff->tanggal_lahir)) ?>" >
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Alamat rumah/kantor</label>
  <div class="col-sm-9">
    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"><?php echo $staff->alamat ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Keahlian yang dikuasai</label>
  <div class="col-sm-9">
    <textarea name="keahlian" id="keahlian" class="form-control" placeholder="Keahlian yang dikuasai"><?php echo $staff->keahlian ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Kata Kunci pencarian di Google</label>
  <div class="col-sm-9">
    <textarea name="keywords" id="keywords" class="form-control" placeholder="Keywords"><?php echo $staff->keywords ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Upload Foto/Logo</label>
  <div class="col-sm-9">
    <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo $staff->gambar ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right"></label>
  <div class="col-sm-9">
    <div class="btn-group">
      <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
      <button type="reset" name="reset" class="btn btn-info "><i class="fa fa-cut"></i> Reset</button>
      <a href="<?php echo base_url('admin/staff') ?>" name="reset" class="btn btn-warning "><i class="fas fa-redo"></i> Kembali</a>
    </div>
  </div>
</div>

<?php echo form_close(); ?>
