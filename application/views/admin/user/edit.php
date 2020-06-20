<?php echo form_open_multipart(base_url('admin/user/edit/'.$user->id_user),'id="tambah"') ?>
<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Staff/Pegawai</label>
  <div class="col-sm-9">
    <select name="id_staff" class="form-control select2">
      <option value="">Pilih Staff/Pegawai</option>
      <?php foreach($staff as $staff) { ?>
        <option value="<?php echo $staff->id_staff ?>" <?php if($staff->id_staff==$user->id_staff) { echo "selected";} ?>><?php echo $staff->nama ?></option>
      <?php } ?>
    </select>
  </div>
</div>


<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Nick name <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->nama ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Username <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>">
  </div>
</div>


<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Password <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $user->password ?>">
  </div>
</div>    

<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Email <span class="text-danger">*</span></label>
  <div class="col-sm-9">
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>">
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Level Hak Akses</label>
  <div class="col-sm-9">
    <select name="akses_level" class="form-control">
      <option value="Admin">Admin</option>
      <option value="Staff" <?php if($user->akses_level=="Staff") { echo "selected"; } ?>>Staff</option>
      <option value="Direktur" <?php if($user->akses_level=="Direktur") { echo "selected"; } ?>>Direktur/Pimpinan</option>
    </select>
  </div>
</div>
<div class="form-group row">
  <label class="col-sm-3 control-label text-right">Upload Foto/Logo</label>
  <div class="col-sm-9">

    <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo $user->gambar ?>">
  </div>
</div>

<div class="form-group row">
  <label class="col-sm-3 control-label text-right"></label>
  <div class="col-sm-9">
    <div class="form-group btn-group text-right">
      <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
      <button type="reset" name="reset" class="btn btn-info "><i class="fa fa-cut"></i> Reset</button>
      <a href="<?php echo base_url('admin/user') ?>" class="btn btn-secondary " data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
    </div>

  </div>

  <?php echo form_close(); ?>