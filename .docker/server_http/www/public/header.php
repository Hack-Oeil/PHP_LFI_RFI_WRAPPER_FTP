<?php $absoluteUrl = $_SERVER['HTTP_X_FORWARDED_PREFIX_PROXY'] ?? URL_BASE ?? ''; ?>
<!DOCTYPE HTML>
<html lang="fr"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Wrapper de CV !</title>
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold"> 
<link rel="stylesheet" type="text/css" href="<?= $absoluteUrl; ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= $absoluteUrl; ?>/assets/css/styles.css">
</head>
<body id="home">
<section class="main">
<div id="Content" class="wrapper topSection">
	<div id="Header">
	<div class="wrapper">
		<div class="logo"><h1><img src="<?= $absoluteUrl; ?>/assets/images/logo1.png" />Hotel - Le Gros Dodo</h1></div>
		</div>
	</div>
</div>
</section>
<section class="container spacing">
  <div class="col-6 mx-auto">
