<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<link href="<?php echo base_url() ?>assets/css/css-print.css" rel="stylesheet" media="screen">
<link href="<?php echo base_url() ?>assets/css/css-print.css" rel="stylesheet" media="print">
</head>

<body>
<page size="A4" layout="portrait">
<div class="cetak">
    <h1><?php echo $title ?></h1>

    <table class="printer">
      <thead>
        <tr>
          <th width="25%">Kode Order</th>
          <th width="74%"><?php echo $pemesanan->kode_transaksi ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Nama Produk</td>
          
          <td><?php echo $pemesanan->nama_produk ?></td>
        </tr>
        <tr>
          <td>Quantity</td>
          
          <td><?php echo $pemesanan->jumlah_produk ?> Pcs</td>
        </tr>
        <tr>
          <td>Harga Produk</td>
          
          <td>Rp <?php echo $this->website->angka($pemesanan->harga_produk) ?></td>
        </tr>
        <tr>
          <td>Total</td>
          
          <td>Rp <?php echo $this->website->angka($pemesanan->total_harga) ?></td>
        </tr>
        <tr>
          <td>Nama Penerima</td>
          
          <td><?php echo $pemesanan->nama_pemesan ?></td>
        </tr>
         <tr>
          <td>Telepon/Whatapps</td>
          
          <td><?php echo $pemesanan->telepon_pemesan ?></td>
        </tr>
         <tr>
          <td>Email</td>
          
          <td><?php echo $pemesanan->email_pemesan ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          
          <td><?php echo nl2br($pemesanan->alamat) ?></td>
        </tr>
       
      </tbody>
    </table>

    <p>Jika Anda telah melakukan pembayaran. Anda dapat melakukan Konfirmasi Pembayaran di <?php echo base_url('pembayaran/konfirmasi') ?> atau Melihat Produk Lainnya di <?php echo base_url('produk') ?></p>
    <hr>
    <p><small><?php echo $this->website->namaweb() ?> - <?php echo $this->website->tagline() ?> | Printed on: <?php echo date('d-m-Y H:i:s') ?></small></p>
</div>
</page>
</body>
</html>