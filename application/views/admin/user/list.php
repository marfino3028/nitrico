
<div class="row">
<div class="col-md-6">
    

<p>

    <?php include('tambah.php') ?>
</p>
</div>
</div>
<?php
echo form_open(base_url('admin/user/proses'));
?>
<input type="hidden" name="pengalihan" value="<?php echo str_replace('index.php/','',current_url()) ?>">
<p class="text-right">
<div class="btn-group">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-plus"></i> Tambah Pengguna
    </button>

    <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-info">
      <i class="fa fa-plus"></i> Tambah Pengguna (New Page)
    </a>
    
  </div>
</p>
<div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered table-hover" cellspacing="0" width="100%">
<thead>
    <tr class="bg-dark">
        <th>
            NO
        </th>
        <th style="vertical-align: middle;" class="text-center">NAMA PEGAWAI</th>
        <th style="vertical-align: middle;" class="text-center">NICK NAME</th>
        <th style="vertical-align: middle;" class="text-center">USERNAME</th>
        <th style="vertical-align: middle;" class="text-center">AKSES LEVEL</th>
        <th style="vertical-align: middle;" class="text-center">EMAIL</th>
        <th width="10%"></th>
    </tr>
</thead>
<?php $i=1; foreach($user as $user) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $user->nama_staff ?></td>
    <td><?php echo $user->nama ?></td>
    <td><?php echo $user->username ?></td>
    <td><?php echo $user->akses_level ?></td>
    <td><?php echo $user->email ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
      </a>
      </div>
    </td>
</tr>

<?php $i++; } ?>
</table>
</div>

<?php echo form_close(); ?>