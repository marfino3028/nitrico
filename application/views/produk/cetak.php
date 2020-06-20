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
		<h1>KURSUS <?php echo strtoupper($produk->nama_produk) ?></h1>

    <table>
      <tbody>
        <tr>
          <td width="40%"><p class="about_text">
                      <strong><?php echo $this->website->namaweb() ?></strong>
                        <br><?php echo nl2br($site->alamat) ?>
                        <br>Telepon: <?php echo $site->telepon; ?>
                        <br>Whatsapp: <?php echo $site->hp; ?>
                        <br>Email: <?php echo $site->email; ?>
                    </p></td>
          <td><p><img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk; ?>" style="width: 5cm; height: auto; padding: 5px; border: solid thin #EEE;"></p></td>
        </tr>
      </tbody>
    </table>
                    

                    
		<table class="table">
          <tbody>
            <tr>
              <td width="40%">Biaya Produk Kelas (Workshop)</td>
              <td>: Rp <?php 
              $date1    = strtotime($produk->mulai_diskon); 
              $date2    = strtotime($produk->selesai_diskon); 
              $sekarang = strtotime(date('Y-m-d'));
              if($date1 <= $sekarang && $date2 >= $sekarang) { ?>
                <strong><?php echo $this->website->angka($produk->harga_diskon); ?> <sup class="text-danger"><del>Rp <?php echo $this->website->angka($produk->harga_jual); ?></del></sup></strong>
              <?php }else{ ?>
                <strong><?php echo $this->website->angka($produk->harga_jual); ?></strong>
              <?php } ?></td>
            </tr>
            <tr>
              <td>Biaya Produk Private</td>
              <td>: Rp <?php 
              
              if($date1 <= $sekarang && $date2 >= $sekarang) { ?>
                <strong><?php echo $this->website->angka($produk->harga_private_diskon); ?> <sup class="text-danger"><del>Rp <?php echo $this->website->angka($produk->harga_private); ?></del></sup></strong>
              <?php }else{ ?>
                <strong><?php echo $this->website->angka($produk->harga_private); ?></strong>
              <?php } ?>
              </td>
            </tr>
            <tr>
              <td>Durasi Produk</td>
              <td>: <?php echo $this->website->angka($produk->durasi_produk) ?> jam (<?php echo $produk->durasi_produk/2; ?> Sesi)</td>
            </tr>
                
                </tbody>
              </table>
              <hr>
              <?php echo $produk->isi;  ?>
               <hr>
		<small>Tanggal cetak: <?php echo date('d-M-Y H:i:s') ?> - <?php echo $site->namaweb ?></small>
		
	</div>
</body>
</html>