<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title><?= $site_title . $divider . $page_title; ?></title>
</head>
<body>

<header class="header_title">
        
    <h1>Webbutveckling 2</h1>
    
    <?php include("includes/nav.php"); ?>
</header>

<h2 class="site_title"><?= $site_title; ?></h2>

    <span class="dot"></span>
    <span class="dot" id="dot2"></span>
    <span id="dot3"></span>
    <span id="dot4"></span>

    <main class="main_content">
    
    <article>