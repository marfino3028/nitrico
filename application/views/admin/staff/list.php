
<?php
echo form_open(base_url('admin/staff/proses'));
?>
<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <a href="<?php echo base_url('admin/staff/tambah') ?>" class="btn btn-success" >
      <i class="fa fa-plus"></i> Tambah Staff
    </a>
    
    <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fas fa-trash-alt"></i> Hapus
    </button>
    <button class="btn btn-primary" type="submit" name="export" onClick="Export();" >
      <i class="fas fa-file-excel"></i> Export Excel (Terpilih)
    </button>

    <button class="btn btn-info" type="submit" name="exportAll" onClick="Export();" >
      <i class="fas fa-file-excel"></i> Export Excel (Semua)
    </button>

    <a href="<?php echo base_url('admin/staff/import') ?>" class="btn btn-primary" >
      <i class="fa fa-upload"></i> Import Data Staff (Excel)
    </a>
    
  </div>
</p>
<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr class="bg-dark">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
        <th width="7%">FOTO</th>
        <th style="vertical-align: middle;" class="text-center"  width="20%">NAMA</th>
        <th style="vertical-align: middle;" class="text-center">JABATAN</th>
        <th style="vertical-align: middle;" class="text-center">KONTAK</th>
        <th style="vertical-align: middle;" class="text-center">JABATAN &amp; KEAHLIAN</th>
        <th style="vertical-align: middle;" class="text-center">STATUS</th>
        <th width="10%"></th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($staff as $staff) {
  ?>

  <tr>
    <td class="text-center">
      <div class="icheck-primary">
      <input type="checkbox" name="id_staff[]" value="<?php echo $staff->id_staff ?>" id="check<?php echo $i ?>">
      <label for="check<?php echo $i ?>"></label>
        </div>
    </td>
     <td>
      <img class="img-thumbnail img-fluid" width="70" src="<?php if($staff->gambar!="") { echo base_url('assets/upload/staff/thumbs/'.$staff->gambar); }else{ echo $this->website->icon(); } ?>">
    </td>
    <td><?php echo $staff->nama ?></td>
    <td><?php echo $staff->jabatan ?></td>
    <td><small><?php echo $staff->telepon ?>
      <br><?php echo $staff->email ?>
    </small></td>
    <td><?php echo $staff->jabatan ?>
      <small><BR><?php echo $staff->keahlian ?></small>
    </td>
    <td><?php echo $staff->status_staff ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/staff/detail/'.$staff->id_staff) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
        <a href="<?php echo base_url('admin/staff/edit/'.$staff->id_staff) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('admin/staff/delete/'.$staff->id_staff) ?>" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>

<?php echo form_close(); ?>