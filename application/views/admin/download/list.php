<?php
echo form_open(base_url('admin/download/proses'));
?>
<p class="btn-group">
  <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fas fa-trash-alt"></i>
    </button> 
  <a href="<?php echo base_url('admin/download/tambah') ?>" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah File</a>
  
</p>

<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
<tr class="bg-info">
    <tr class="bg-dark">
        <th width="5%">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
        </th>
    <th width="10%">UNDUH</th>
    <th width="25%">JUDUL</th>
    <th width="20%">KATEGORI - POSISI</th>
    <th>AUTHOR</th>
    <th width="15%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($download as $download) { ?>

<tr>
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_download[]" value="<?php echo $download->id_download ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td>
      <a href="<?php echo base_url('admin/download/unduh/'.$download->id_download) ?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i> Download</a>
    </td>
    <td><?php echo $download->judul_download ?>
      
      <br><small>
      Link:<br> 
      <textarea name="aa"><?php echo base_url('download/unduh/'.$download->id_download) ?></textarea>
      </small>

    </td>
    <td><?php echo $download->nama_kategori_download ?> - <?php echo $download->jenis_download ?></td>
    <td><?php echo $download->nama ?></td>
    <td>
      <div class="btn-group">
      <a href="<?php echo base_url('download/read/'.$download->id_download) ?>" 
      class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>

      <a href="<?php echo base_url('admin/download/edit/'.$download->id_download) ?>" 
      class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

      <a href="<?php echo base_url('admin/download/delete/'.$download->id_download) ?>" 
      class="btn btn-danger delete-link btn-sm"><i class="fas fa-trash-alt"></i></a>
    </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
<?php echo form_close(); ?>