<?php
$site   = $this->konfigurasi_model->listing();
echo form_open(base_url('admin/berita/proses'));
?>
<?php 
$url_navigasi = $this->uri->segment(2); 
if($this->uri->segment(3) != "") { 
 ?>
 <p class="text-right">
<a href="<?php echo base_url('admin/'.$url_navigasi) ?>"  class="btn btn-success btn-sm">
 <i class="fa fa-backward"></i> Kembali</a>
 </p>
 <hr>
 <?php } ?>

<p class="btn-group">
  
<button class="btn btn-danger" type="submit" name="hapus" onClick="check();" >
      <i class="fas fa-trash-alt"></i>
    </button> 
  <button class="btn btn-warning" type="submit" name="draft" onClick="check();" >
      <i class="fa fa-times"></i> Draft
  </button>

   <button class="btn btn-primary" type="submit" name="publish" onClick="check();" >
      <i class="fa fa-check"></i> Publish
  </button>

  
    <a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-success ">
  <i class="fa fa-plus"></i> Tambah Baru</a>

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
    <th width="10%">GAMBAR</th>
    <th width="35%">JUDUL</th>
    <th width="15%">KATEGORI</th>
    <th width="10%">JENIS</th>
    <th width="10%">STATUS</th>
    <th width="10%">AUTHOR</th>
    <th width="15%">ACTION</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($berita as $berita) { ?>

<tr class="odd gradeX">
    <td class="text-center">
      <div class="icheck-primary">
        <input type="checkbox" class="icheckbox_flat-blue " name="id_berita[]" value="<?php echo $berita->id_berita ?>">
        <label for="check<?php echo $i ?>"></label>
      </div>
    </td>
    <td>
    <?php if($berita->gambar!="") { ?>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" class="img img-thumbnail img-responsive" width="60">
      <?php }else{ ?>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$site->icon) ?>" class="img img-thumbnail img-responsive" width="60">
      <?php } ?>
    </td>
    <td>
    <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>">
    <?php echo $berita->judul_berita ?> <sup><i class="fa fa-pencil"></i></sup>
    </a>
      <small>
        <br>Posted: <?php echo date('d M Y H:i: s',strtotime($berita->tanggal_post)) ?>
        <br>Published: <?php echo date('d M Y H:i: s',strtotime($berita->tanggal_publish)) ?>
        <?php if($berita->jenis_berita=="Promo") { ?>
          <br>Promo: <span class="text-danger"><strong><?php echo date('d M Y',strtotime($berita->tanggal_mulai)) ?> s/d <?php echo date('d M Y ',strtotime($berita->tanggal_selesai)) ?></strong></span>
        <?php } ?>
        <br>Urutan: <?php echo $berita->urutan ?>
        <br>Icon: <i class="<?php echo $berita->icon ?>"></i> <?php echo $berita->icon ?>
        <br>Tgl posting: <?php echo date('d-m-Y',strtotime($berita->tanggal_publish)) ?>
      </small>
    </td>
    <td>
    <a href="<?php echo base_url('admin/berita/kategori/'.$berita->id_kategori) ?>">
    <?php echo $berita->nama_kategori ?><sup><i class="fa fa-link"></i></sup>
    </a>
    </td>
    <td>
    <a href="<?php echo base_url('admin/berita/jenis_berita/'.$berita->jenis_berita) ?>">
    <?php echo $berita->jenis_berita ?><sup><i class="fa fa-link"></i></sup>
    </a></td>
    <td><a href="<?php echo base_url('admin/berita/status_berita/'.$berita->status_berita) ?>"><?php echo $berita->status_berita ?><sup><i class="fa fa-link"></i></sup>
    </a></td>
    <td>
    <a href="<?php echo base_url('admin/berita/author/'.$berita->id_user) ?>">
    <?php echo $berita->nama ?><sup><i class="fa fa-link"></i></sup>
    </a></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" 
        class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>

        <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" 
        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

        <a href="<?php echo base_url('admin/berita/delete/'.$berita->id_berita) ?>" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
<?php echo form_close(); ?>