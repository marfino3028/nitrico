<?php
// Site
$site_info = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo strip_tags($site_info->tentang).', '.$title ?>">
<meta name="keywords" content="<?php echo $site_info->keywords.', '.$title  ?>">
<meta name="author" content="<?php echo $site_info->namaweb ?>">
<?php echo $site_info->metatext ?>
<!-- icon -->
<link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">
<!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <!-- Custom fonts for this template -->
  <link href="<?php echo base_url() ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() ?>assets/template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/template/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/template/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/template/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/template/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/template/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/template/assets/vendor/aos/aos.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?php echo base_url() ?>assets/template/assets/css/style.css" rel="stylesheet">
   <script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <!-- JQUERY UI -->
  <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css') ?>">
  <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js') ?>" type="text/javascript"></script>
  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/owlcarousel/docs/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/owlcarousel/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
  <script src="<?php echo base_url() ?>assets/owlcarousel/docs/assets/owlcarousel/owl.carousel.min.js"></script>
  <!-- sweetalert -->
  <script src="<?php echo base_url() ?>assets/sweetalert/js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/sweetalert/css/sweetalert.css">
  <style type="text/css" media="screen">
    a.orange {
      color: #FFF;
    }
    .belanja {
      padding: 6px;
      min-width: 35px;
      height: 35px;
      border-radius: 6px;
      background-color: #666;
      color: #FFF;
      border: solid 2px #000;
    }
    .nav-menu {
      margin-top: 10px;
    }
    .kotak {
      color: #666 !important;
      background-color: #FFF;
      margin: 2% 0 10% 0;
      padding: 20px 20px 40px 20px;
      border-radius: 20px;
      border: solid 10px #ffcc00;
    }
    .kotak h1 {
      color: #571C5C !important;
      font-size: 22px !important;
    }
    /* Produk */
    h3.reseller {
      font-size: 18px;
    }
    .produk {
      min-height: 300px;
    }
    .produk img:hover {
      background-color: orange;
    }
    .produk .harga {
      color: #d8730e;
    }
    .produk h3, .produk h1 {
      font-size: 18px;
    }
    .produk p, .produk h3 {
      padding: 0 0 5px 0 !important;
      margin: 0 !important;
    }
    .produk .keterangan {
      text-align: center;
    }
    .produk .link-produk {
      padding-top: 10px;
    }
    .produk h1 {
      margin: 0 0 5px 0 !important;
      padding: 0 !important;
      border-bottom: solid thin #EEE;
    }
    /* table */
    table.table td, table.table.th {
      padding: 5px 10px;
    }
    a.text-kuning {
      color: yellow;
    }
    a:hover.text-kuning {
      color: #F5F5F5;
    }
  </style>
</head>

<body>