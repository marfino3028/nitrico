

<?php echo form_open_multipart(base_url('admin/staff'),'id="tambah" class="form-horizontal"') ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Staff Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Nama staff <span class="text-danger">*</span></label>
          <div class="col-sm-9">
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama') ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Jabatan</label>
          <div class="col-sm-9">
            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo set_value('jabatan') ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Telepon</label>
          <div class="col-sm-9">
            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Email staff</label>
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
          <label class="col-sm-3 control-label text-right">Urutan</label>
          <div class="col-sm-9">
            <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Tampilkan di website?</label>
          <div class="col-sm-9">
            <select name="status_staff" class="form-control">
              <option value="No">No</option>
              <option value="Yes">Yes</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Tempat, tanggal lahir</label>
          <div class="col-sm-4">
            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat/kota kelahiran" value="<?php echo set_value('tempat_lahir') ?>">
          </div>    
          <div class="col-sm-4">
            <input type="text" name="tanggal_lahir" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo set_value('tanggal_lahir') ?>" >
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Alamat rumah/kantor</label>
          <div class="col-sm-9">
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Keahlian yang dikuasai</label>
          <div class="col-sm-9">
            <textarea name="keahlian" id="keahlian" class="form-control" placeholder="Keahlian yang dikuasai"><?php echo set_value('keahlian') ?></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Kata Kunci pencarian di Google</label>
          <div class="col-sm-9">
            <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Keywords" value="<?php echo set_value('keywords') ?>">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 control-label text-right">Upload Foto/Logo</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" value="<?php echo set_value('gambar') ?>">
            </div>
          </div>
        </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label text-right"></label>
            <div class="col-sm-9">
              <div class="form-group btn-group">
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
</div>
</div>
<?php echo form_close(); ?>