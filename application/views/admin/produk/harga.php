<p><a href="<?php echo base_url('admin/harga_produk/produk/'.$produk->id_produk) ?>" class="btn btn-success btn-sm">
<i class="fa fa-dollar"></i> Kelola Harga Sewa</a></p>

<table class="table table-bordered" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Periode Sewa</th>
    <th>Harga</th>
    <th>Keterangan</th>
    <th>Status Harga</th>
</tr>
</thead>
<tbody>

<?php $h=1; foreach($harga_produk as $harga_produk) { ?>

<tr class="odd gradeX">
    <td><?php echo $h ?></td>
    <td><?php echo $harga_produk->nama_periode ?></td>
    <td>Rp <?php echo number_format($harga_produk->harga,'0',',','.') ?></td>
    <td><?php echo $harga_produk->keterangan ?></td>
    <td><?php echo $harga_produk->status_harga ?></td>
</tr>

<?php $h++; } ?>

</tbody>
</table>