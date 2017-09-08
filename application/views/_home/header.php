<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title; ?></title>
  <?php
    // print_r($_SESSION);
    $theme = $this->session->userdata('theme');
    if($theme == "bootstrap3"){
      echo link_tag('assets\bootstrap3\css\bootstrap.min.css'); // bootstrap v3
    }else if( $theme == 'semantic2'){
      echo link_tag('assets\semantic\semantic.min.css'); // semantic v2.2.12
    }else{
      echo link_tag('assets\bootstrap\css\bootstrap.min.css'); // bootstrap v4 Beta
    }
    // echo link_tag('assets\bulma\bulma.min.css'); // bulma v0.4.2
    echo link_tag('assets\fontawesome\css\font-awesome.min.css');
  ?>
  <script src="<?= base_url('assets\jquery\jquery.min.js') ?>"></script>
</head>
<body>
