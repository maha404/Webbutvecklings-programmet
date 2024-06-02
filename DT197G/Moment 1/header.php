<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" >
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    </style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri(); ?>/images/favicon.ico">
        <script src="https://kit.fontawesome.com/f2e33cb8e2.js" crossorigin="anonymous"></script>
    <title> <?php bloginfo('name'); ?></title>
    
</head>
<body>
    <!-- Main menu, desktop-->
    <nav class="desktop-nav">
        <a href="<?php echo home_url();?>"><img src="<?= get_template_directory_uri(); ?>/images/loggaskogab.webp" alt=""></a>
            <?php wp_nav_menu(array('theme_location' => 'main-menu',
                                    'menu_class' => 'nav-container')); ?>
    </nav>

    <!-- Main menu, mobile -->
    <img src="<?= get_template_directory_uri(); ?>/images/loggaskogab.webp" alt="" width="90" class="small-logo">
    <nav>
    <i class="fa-solid fa-bars fa-2xl" id="menu-icon"></i>
        <?php wp_nav_menu(array('theme_location' => 'main-menu',
                                'menu_class' => 'mobile-nav', 
                                'menu_id' => 'mobile-list')); ?>
    </nav>