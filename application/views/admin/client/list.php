  
<div class="row">
<div class="col-md-6">
    <?php echo form_open(base_url('admin/client')) ?>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="keywords" value="<?php if($this->uri->segment(3)=="cari") { echo str_replace('_',' ',$this->uri->segment(4)); } ?>" placeholder="Cari siswa/client..." required>
      <span class="input-group-append">
            <button type="submit" name="cari" class="btn btn-info">Cari</button>
            <a href="<?php echo base_url('admin/client/tambah') ?>" class="btn btn-success ">
              <i class="fa fa-plus"></i> Tambah Baru
            </a>
      </span>
    </div>
    <?php echo form_close(); ?>
</div>
<div class="col-md-6">
    <?php if(isset($pagin)) { echo $pagin; } ?>
</div>

</div>
<?php
echo form_open(base_url('admin/client/proses'));
?>
<p class="text-right">
<div class="btn-group btn-group-justified">
    <!-- Button trigger modal -->
    <button class="btn btn-danger " type="submit" name="hapus" onClick="check();" >
      <i class="fas fa-trash-alt"></i>
    </button>
    
    
    <button class="btn btn-primary " type="submit" name="export" onClick="Export();" >
      <i class="fas fa-file-excel"></i> Export Excel (Terpilih)
    </button>

    <button class="btn btn-info " type="submit" name="exportAll" onClick="Export();" >
      <i class="fas fa-file-excel"></i> Export Semua
    </button>

  </div>
</p>
<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr class="bg-dark">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
        <th width="8%">FOTO</th>
        <th width="15%">NAMA</th>
        <th width="15%%">KONTAK</th>
        <th width="10%">JENIS</th>
        <th width="10%">STATUS</th>
        <th width="15%"></th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($client as $client) {
    $id_client = $client->id_client;
  ?>

  <tr>
    <td class="text-center">
        <div class="icheck-primary">
            <input type="checkbox" name="id_client[]" value="<?php echo $client->id_client ?>" id="check<?php echo $i ?>">
            <label for="check<?php echo $i ?>"></label>
        </div>
    </td>
    <td>
      <img class="img-thumbnail img-fluid" width="70" src="<?php if($client->gambar!="") { echo base_url('assets/upload/client/thumbs/'.$client->gambar); }else{ echo $this->website->icon(); } ?>">
    </td>
    <td><a href="<?php echo base_url('admin/client/detail/'.$client->id_client) ?>"><?php echo $client->nama ?></a><br>
        <small>
        <i class="fas fa-user"></i> <?php echo $client->pimpinan ?>
        <br><i class="fas fa-phone"></i> <?php echo $client->telepon ?>
        <hr class="jarak"><?php echo nl2br($client->alamat) ?></small></td>
    <td>
        <?php if($client->email=="") { echo '<span class="btn btn-warning btn-xs"><i class="fas fa-exclamation-triangle"></i> Masukkan alamat email</button>'; }else{ echo $client->email; } ?>
          <br><small>Password: <?php echo $client->password_hint ?></small>
        </td>
    <td><?php echo $client->jenis_client ?></td>
    <td><?php echo $client->status_verifikasi ?></td>
    <td>
      <div class="btn-group">
        <?php if($client->email!="") { ?>
        <a href="<?php echo base_url('admin/client/approval/'.$client->id_client) ?>" class="btn btn-success btn-sm approval-link"><i class="fa fa-lock"></i> Terima</a>
        <?php }else{ ?>
          <a href="#" class="btn btn-default btn-sm" onclick="akses(event)"><i class="fa fa-lock"></i> Terima</a>
        <?php } ?>
        <a href="<?php echo base_url('admin/client/detail/'.$client->id_client) ?>" class="btn btn-secondary btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
        <a href="<?php echo base_url('admin/client/cetak/'.$client->id_client) ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"></i></a>
        <a href="<?php echo base_url('admin/client/edit/'.$client->id_client) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('admin/client/delete/'.$client->id_client) ?>" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>


<?php echo form_close(); ?>