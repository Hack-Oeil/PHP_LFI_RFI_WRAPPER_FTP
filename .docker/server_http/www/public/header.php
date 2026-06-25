<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta charset="utf-8">
<title><?= __("Wrapper de CV !") ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap"> 
<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./assets/css/styles.css">
<style>
    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        color: #333;
        min-height: 100vh;
    }
    .topSection {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        padding: 20px 0;
        margin-bottom: 40px;
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    .logo a {
        text-decoration: none;
        color: #2c3e50;
        transition: all 0.3s ease;
    }
    .logo a:hover {
        opacity: 0.8;
    }
    .logo h1 {
        font-size: 28px;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .logo img {
        height: 50px;
        border-radius: 8px;
    }
    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .lang-selector {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 5px 15px;
        font-size: 14px;
        font-weight: 600;
        color: #555;
        cursor: pointer;
        transition: all 0.3s ease;
        outline: none;
    }
    .lang-selector:hover, .lang-selector:focus {
        border-color: #3498db;
        box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
    }
    .premium-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        padding: 40px;
        margin-bottom: 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .premium-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(0,0,0,0.12);
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        padding: 12px 15px;
        transition: all 0.3s;
    }
    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52,152,219,0.25);
    }
    .btn-primary {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        border: none;
        border-radius: 8px;
        padding: 12px 25px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52,152,219,0.4);
    }
    .alert {
        border-radius: 10px;
        border: none;
    }
</style>
</head>
<body id="home">
<section class="main">
<div id="Content" class="topSection">
	<div id="Header">
	<div class="header-container">
		<div class="logo">
			<a href="./">
				<h1><img src="./assets/images/logo1.png" alt="Logo" /> <?= __("Hotel - Le Gros Dodo") ?></h1>
			</a>
		</div>
	</div>
	</div>
</div>
</section>
<section class="container spacing">
  <div class="col-md-8 mx-auto premium-card">
