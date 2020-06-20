<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<?php
echo form_open(base_url('admin/funnel/proses'));
?>
<p class="btn-group">
    <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fas fa-trash-alt"></i>
    </button> 
  <a href="<?php echo base_url('admin/funnel/tambah') ?>" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah Funnel</a>
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
      <th width="8%">Gambar</th>
      <th width="25%">Judul</th>
      <th width="15%">Kategori</th>
      <th width="30%">Website</th>
      <th width="8%">Status</th>
      <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($funnel as $funnel) { ?>

<tr class="odd gradeX">
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_funnel[]" value="<?php echo $funnel->id_funnel ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$funnel->gambar) ?>" width="60">
    </td>
    <td><?php echo $funnel->judul_funnel ?></td>
    <td><?php echo $funnel->nama_kategori_funnel ?></td>
    <td><?php echo $funnel->website ?></td>
    <td><?php echo $funnel->status_funnel ?></td>
    <td>
      <div class="btn-group">
      <a href="<?php echo base_url('funnel/read/'.$funnel->id_funnel) ?>" 
      class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>

      <a href="<?php echo base_url('admin/funnel/edit/'.$funnel->id_funnel) ?>" 
      class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

       <a href="<?php echo base_url('admin/funnel/delete/'.$funnel->id_funnel) ?>" 
      class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
    </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>