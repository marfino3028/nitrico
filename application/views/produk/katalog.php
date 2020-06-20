<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/print.css') ?>" media="print">
	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/print.css') ?>" media="screen"> -->
</head>
<body>
	<div class="cetak">
		<h1>DAFTAR HARGA KURSUS <?php echo strtoupper($site->namaweb) ?></h1>
                    <p class="about_text">
                      <strong><?php echo $this->website->namaweb() ?></strong>
                        <br><?php echo nl2br($site->alamat) ?>
                        <br>Telepon: <?php echo $site->telepon; ?>
                        <br>Whatsapp: <?php echo $site->hp; ?>
                        <br>Email: <?php echo $site->email; ?>
                    </p>
		<table class="display table table-bordered table-striped" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="5%">NO</th>
          <th width="55%">NAMA</th>
          <th  class="text-right" width="10%">HARGA KELAS</th>
          <th  class="text-right" width="10%">HARGA PRIVATE</th>
          <th  width="10%">DURASI</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($kategori_produk as $kategori_produk) { 
          $id_kategori_produk = $kategori_produk->id_kategori_produk;
          $produk             = $this->produk_model->kategori_all($id_kategori_produk);
          ?>

          <tr>
            <th colspan="5"><?php echo strtoupper($kategori_produk->nama_kategori_produk) ?></th>
          </tr>


          <?php $i=1; foreach($produk as $produk) { ?>

            <tr class="odd gradeX">
              <td class="text-center"><?php echo $i ?></td>
              <td><strong><?php echo $produk->nama_produk ?></strong><br><?php echo $produk->keywords ?></td>
              <td class="text-right"><?php echo number_format($produk->harga_jual,'0',',','.') ?></td>
              <td class="text-right"><?php echo number_format($produk->harga_private,'0',',','.') ?></td>
              <td><?php echo $produk->durasi_produk ?> jam</td>
              </tr>
              <?php $i++; } ?>
            <?php } ?>
          </tbody>
        </table>

        <h2>LOKASI KURSUS</h2>
        <table>
          <thead>
            <tr>
              <th width="5%">NO</th>
              <th width="25%">NAMA / KOTA</th>
              <th>ALAMAT</th>
            </tr>
          </thead>
          <tbody>
            <?php  $noe=1; foreach($lokasi as $lokasi) { ?>
            <tr>
              <td><?php echo $noe; ?></td>
              <td><?php echo $lokasi->nama_lokasi ?></td>
              <td><?php echo nl2br($lokasi->alamat) ?><br><?php  echo strtoupper($lokasi->nama_kabupaten.' - '.$lokasi->nama_provinsi); ?>
                <br>Telepon: <?php echo $lokasi->telepon ?>
                <br>Whatsapp: <?php echo $lokasi->hp ?>
                <br>Email: <?php echo $lokasi->email ?></td>
            </tr>
          <?php $noe++;} ?>
          </tbody>
        </table>

        <h4>Rekening Pembayaran</h4>
        <ul>
          <?php foreach($rekening as $rekening) { ?>
          <li><?php echo strtoupper($rekening->nama_bank) ?> (<?php echo strtoupper($rekening->nomor_rekening) ?> a.n <?php echo strtoupper($rekening->atas_nama) ?>)</li>
          <?php } ?>
        </ul>
		<small>Tanggal cetak: <?php echo date('d-M-Y H:i:s') ?> - <?php echo $site->namaweb ?></small>
		
	</div>
</body>
</html>