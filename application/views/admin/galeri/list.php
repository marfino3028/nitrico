<script>
  $("button").click(function(){
    $("textarea").select();
    document.execCommand('copy');
});
</script>
<?php
echo form_open(base_url('admin/galeri/proses'));
?>
<p class="btn-group">
    <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fas fa-trash-alt"></i>
    </button> 
  <a href="<?php echo base_url('admin/galeri/tambah') ?>" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah Galeri</a>



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
    <th>Gambar</th>
    <th>Judul</th>
    <th>Kategori - Posisi</th>
    <th>Website</th>
    <th>Author</th>
    <th>Tanggal</th>
    <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($galeri as $galeri) { ?>

<tr class="odd gradeX">
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_galeri[]" value="<?php echo $galeri->id_galeri ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" width="60">
    </td>
    <td><?php echo $galeri->judul_galeri ?>
      
      <br><small>
        Urutan: <?php echo $galeri->urutan ?>
      <br>
      Status Tampil Teks: <?php echo $galeri->status_text ?><br>
      <textarea name="aa"><?php echo base_url('assets/upload/image/'.$galeri->gambar) ?></textarea>
      </small>

    </td>
    <td><?php echo $galeri->nama_kategori_galeri ?> - <?php echo $galeri->jenis_galeri ?></td>
    <td><?php echo $galeri->website ?></td>
    <td><?php echo $galeri->nama ?></td>
    <td><?php echo $galeri->tanggal ?></td>
    <td>
      <div class="btn-group">
      <a href="<?php echo base_url('galeri/read/'.$galeri->id_galeri) ?>" 
      class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>

      <a href="<?php echo base_url('admin/galeri/edit/'.$galeri->id_galeri) ?>" 
      class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

       <a href="<?php echo base_url('admin/galeri/delete/'.$galeri->id_galeri) ?>" 
      class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
    </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>