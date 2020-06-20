  
<div class="row">
<div class="col-md-6">
    <?php echo form_open(base_url('admin/pemesanan')) ?>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="keywords" value="<?php if($this->uri->segment(3)=="cari") { echo str_replace('_',' ',$this->uri->segment(4)); } ?>" placeholder="Cari..." required>
      <span class="input-group-append">
            <button type="submit" name="cari" class="btn btn-info">Cari</button>
            <a href="<?php echo base_url('admin/pemesanan/tambah') ?>" class="btn btn-success ">
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
echo form_open(base_url('admin/pemesanan/proses'));
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
        <th width="20%">PEMESAN</th>
        <th width="10%">RESELLER</th>
        <th width="15%">PRODUK</th>
        <th width="15%%">JUMLAH</th>
        <th width="10%">STATUS</th>
        <th width="15%"></th>
    </tr>
</thead>
<tbody>

  <?php 
  // Looping data user dg foreach
  $i=1;
  foreach($pemesanan as $pemesanan) {
    $id_pemesanan = $pemesanan->id_pemesanan;
  ?>

  <tr>
    <td class="text-center">
        <div class="icheck-primary">
            <input type="checkbox" name="id_pemesanan[]" value="<?php echo $pemesanan->id_pemesanan ?>" id="check<?php echo $i ?>">
            <label for="check<?php echo $i ?>"></label>
        </div>
    </td>
    <td>
      <?php echo $pemesanan->nama_pemesan ?>
      <br>
        <small>
          <i class="fas fa-user"></i> HP/WA: <?php echo $pemesanan->telepon_pemesan ?>
          <br><i class="fas fa-street-view"></i> Alamat: <?php echo $pemesanan->alamat ?>
        </small>
    </td>
    <td>
      <?php if($pemesanan->nama_partner=="") { echo '-'; }else{ ?>
      <?php echo $pemesanan->nama_partner ?>
      <br>
        <small>
          <i class="fas fa-user"></i> Kode: <?php echo $pemesanan->kode_client ?>
          <br><i class="fas fa-mobile"></i> HP/WA: <?php echo $pemesanan->telepon ?>
        </small>
      <?php } ?>
    </td>
    <td><?php echo $pemesanan->nama_produk ?></td>
    <td>
      <small>
        <i class="fas fa-shopping-cart"></i> Qty: <?php echo $pemesanan->jumlah_produk ?>
        <br><i class="fas fa-tag"></i> Harga: Rp <?php echo $this->website->angka($pemesanan->harga_produk) ?>
        <br><i class="fas fa-plus"></i> Total: Rp <?php echo $this->website->angka($pemesanan->total_harga) ?>
      </small>
    </td>
    <td><?php echo $pemesanan->status_pemesanan ?></td>
    <td>
      <div class="btn-group">
        <a href="<?php echo base_url('admin/pemesanan/detail/'.$pemesanan->id_pemesanan) ?>" class="btn btn-secondary btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
        <a href="<?php echo base_url('admin/pemesanan/cetak/'.$pemesanan->id_pemesanan) ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"></i></a>
        <a href="<?php echo base_url('admin/pemesanan/edit/'.$pemesanan->id_pemesanan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('admin/pemesanan/delete/'.$pemesanan->id_pemesanan) ?>" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
      </div>
    </td>
  </tr>

  <?php $i++; } //End looping ?>
</tbody>
</table>
</div>


<?php echo form_close(); ?>