<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?> | <?php echo $this->website->namaweb(); ?></title>
  <!-- icon -->
  <link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url() ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <!-- JQUERY UI -->
  <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css') ?>">
  <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js') ?>" type="text/javascript"></script>
  <!-- timepicker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-timepicker/jquery.timepicker.min.css">
  <!-- Custom styles for this page -->
  <link href="<?php echo base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- sweetalert -->
  <script src="<?php echo base_url() ?>assets/sweetalert/js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/sweetalert/css/sweetalert.css">
  <!-- TINYMCE -->
  <script src="<?php echo base_url() ?>assets/js/tinymce/tinymce.min.js"></script>
  <style type="text/css" media="screen">
    body {
      color: #000 !important;
    }
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: #bfbfbf  !important;
      opacity: 1; /* Firefox */
    }
    form small.text-gray {
      color: #bfbfbf !important;
    }
    br {
      margin: 0 !important;
      padding:  0 !important;
    }
    hr.jarak {
      padding: 2px 0;
      margin: 2px 0;
    }
    iframe.youtube {
      max-width: 200px;
      height: auto;
    }
  </style>
</head>

<body id="page-top">