<?php include('tambah_jadwal.php') ?>
<hr>
<?php
echo form_open(base_url('admin/produk/proses_jadwal'));
?>
<div class="row">
  <div class="col-md-6">
    <div class="input-group">
      <select name="status_jadwal_produk" class="form-control">
        <option value="Buka">Buka</option>
      	<option value="Tutup">Tutup</option>
      	<option value="Booked">Sudah dibooking (Booked)</option>
      	<option value="Batal">Batal</option>
      </select>
      <span class="input-group-btn" >
        <div class="btn-group">
        <button type="submit" class="btn btn-info btn-flat" name="update"><i class="fa fa-save"></i> UPDATE STATUS JADWAL</button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Tambah">
          <i class="fa fa-plus"></i> TAMBAH JADWAL
        </button>
        </div>
      </span>
    </div>
  </div>

  <div class="col-md-6">
    <?php if(isset($pagin)) { echo $pagin; } ?>
  </div>
    </div>
    <div class="clearfix"><hr></div>
    <div class="table-responsive mailbox-messages">
    <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr class="bg-info">
			<th width="5%">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
              </div>
            </th>
			<th width="15%">TANGGAL</th>
			<th width="15%">LOKASI</th>
			<th width="15%">KETERANGAN TANGGAL</th>
			<th width="15%">STATUS JADWAL</th>
			<th width="15%"></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($jadwal_produk as $jadwal_produk) { ?>
		<tr>
			<td class="text-center">
                <div class="icheck-primary">
                  <input type="checkbox" name="id_jadwal_produk[]" value="<?php echo $jadwal_produk->id_jadwal_produk ?>" id="check<?php echo $no ?>">
                  <label for="check<?php echo $no ?>"></label>
                </div>
              </td>
			<td><?php echo date('d-m-Y',strtotime($jadwal_produk->tanggal_mulai)) ?></td>
			<td><?php echo $jadwal_produk->nama_lokasi ?></td>
			<td><?php echo $jadwal_produk->keterangan_tanggal ?></td>
			<td><?php echo $jadwal_produk->status_jadwal_produk ?></td>
			<td>
				<div class="btn-group">
	           

	                <a href="<?php echo base_url('admin/produk/edit_jadwal/'.$jadwal_produk->id_jadwal_produk) ?>" 
	                  class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

	                  <a href="<?php echo base_url('admin/produk/delete_jadwal/'.$produk->id_produk.'/'.$jadwal_produk->id_jadwal_produk) ?>" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
	                </div>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
</div>