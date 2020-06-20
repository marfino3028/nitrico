<?php
echo form_open(base_url('admin/video/proses'));
?>
<p class="btn-group">
  <a href="<?php echo base_url('admin/video/tambah') ?>" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah Video Youtube</a>

  <button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fas fa-trash-alt"></i> Hapus
    </button> 

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
        <th width="12%">VIDEO</th>
        <th width="19%">JUDUL</th>
        <th width="21%">POSISI</th>
        <th width="20%">KETERANGAN</th>
        <th width="17%"></th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($video as $video) { ?>
    <tr class="odd gradeX">
        <td class="text-center">
          <div class="icheck-primary">
            <input type="checkbox" class="icheckbox_flat-blue " name="id_video[]" value="<?php echo $video->id_video ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
        </td>
        <td class="video"> <iframe src="https://www.youtube.com/embed/<?php echo $video->video ?>"></iframe></td>
        <td>
		<?php echo $video->judul ?> - <?php echo $video->urutan ?>
        <sup><a href="<?php echo base_url('video/detail/'.$video->id_video) ?>"><i class="fa fa-link"></i></a></sup>
        <br><small>Lang: <span class="flag-icon <?php if($video->bahasa=="English") { echo "flag-icon-gb"; }else{ echo "flag-icon-id"; } ?>"></span> <?php echo $video->bahasa ?></small>
        </td>
        <td><?php echo $video->posisi ?></td>
        <td><?php echo $video->keterangan ?></td>
        <td>
        
            <div class="btn-group">
        <a href="<?php echo base_url('admin/video/edit/'.$video->id_video) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
       
       
         <a href="<?php echo base_url('admin/video/delete/'.$video->id_video) ?>" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
     </div>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>
</div>
<?php echo form_close(); ?>