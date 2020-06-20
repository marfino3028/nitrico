

<?php echo form_open_multipart(base_url('admin/user'),'id="tambah" class="form-horizontal"') ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group row">
        <label class="col-sm-3 control-label text-right">Staff/Pegawai</label>
        <div class="col-sm-9">
            <select name="id_staff" class="form-control  select2">
              <option value="">Pilih Staff/Pegawai</option>
              <?php foreach($staff as $staff) { ?>
              <option value="<?php echo $staff->id_staff ?>"><?php echo $staff->nama ?></option>
              <?php } ?>
            </select>
          </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 control-label text-right">Nick name <span class="text-danger">*</span></label>
        <div class="col-sm-9">
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo set_value('nama') ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 control-label text-right">Username <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>">
        </div>
      </div>


      <div class="form-group row">
        <label class="col-sm-3 control-label text-right">Password <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
        </div>
      </div>         
            
           
      <div class="form-group row">
        <label class="col-sm-3 control-label text-right">Email <span class="text-danger">*</span></label>
        <div class="col-sm-9">
          <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 control-label text-right">Level Hak Akses</label>
        <div class="col-sm-9">
          <select name="akses_level" class="form-control">
            <option value="Admin">Admin</option>
            <option value="Direktur">Direktur/Pimpinan</option>
            <option value="Staff">Staff</option>
          </select>
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
          <div class="btn-group">
              <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
              <button type="reset" name="reset" class="btn btn-info "><i class="fa fa-cut"></i> Reset</button>
              <button type="button" class="btn btn-secondary " data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          </div>
        </div>
      </div>
        
      </div>
  </div>
</div>
</div>
<?php echo form_close(); ?>