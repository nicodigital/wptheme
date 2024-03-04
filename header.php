<?php include 'init.php'?>
<!DOCTYPE html>
<html lang="<?=$lang?>" data-platform="<?=$platform?>" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $meta_title ?></title>
    <meta name="description" content="<?php echo $description ?>">
    <meta name='viewport' content='initial-scale=1, viewport-fit=cover'>
    <link rel="canonical" href="<?=$canonical_url?>" />
    <base href="<?=$base_url?>" target="_self">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@500&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

   <!--css-->
   <?php include 'inc/css.php'; ?>
   <!--preload-->
   <?php include 'inc/preload.php';?>
   
    <!--js-->
    <?php include 'inc/js.php' ?>

    <?php 
      include 'inc/open-graph.php';
      include 'inc/richsnippets.php';
      include 'inc/track-codes.php';
    ?>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <?php include 'inc/favicon.php' ?>
      <meta http-equiv="cleartype" content="on">
      <meta name="MobileOptimized" content="width">
      <meta name="HandheldFriendly" content="true">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <meta name="format-detection" content="telephone=no" >
      <meta name="author" content="web: [<?=$author_name?>]: <?=$author_url?>">
      
</head>
<body id="top" class="<?=$slug ?> toggler" data-scroll="top" data-page="<?=$slug ?>" >

  <header class="container py-2 xg:py-4">
    <div class="row">
        <div class="col-[1/5] sm:col-[1/3] md:col-[1/3] flex align-middle" >
            <?php include 'layout/components/brand.php'; ?>
        </div>
        <div class="col-[1/12] md:col-[7/13]">
          <?php include 'layout/components/menu.php'; ?>
        </div>
      </div>
  </header>

<?php 
include 'layout/components/burger.php';
include 'layout/modals.php'; 

