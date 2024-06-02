<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" >
    <style> @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap'); </style> 
    <script src="https://kit.fontawesome.com/f2e33cb8e2.js" crossorigin="anonymous"></script>
    <title> <?php bloginfo('name'); ?></title>
</head>
<body>
    
<header>

<!-- Desktop nav -->

    <!-- Images -->
    <div class="overlay">
        <!-- Custom header, enables the ablity for the Admin to upload and crop an image for the header -->
        <img class="header-img-desktop" src="<?php header_image(); ?>" width="<?php echo absint(get_custom_header()->width );?>" height="<?php echo absint(get_custom_header()->height); ?>" alt="">
    </div>
    
    <?php 

        $custom_logo_id = get_theme_mod('custom_logo'); // Gets the theme mofification value for the theme. 
        $image = wp_get_attachment_image_src($custom_logo_id, 'full'); // Gets the image that has been uploaded. 
        
        if ( has_custom_logo() ) { // Checks if an image exits/ if the site even has an custom logo
            $url = home_url();
            echo '<a href="'.$url.'"><img src="' . esc_url($image[0]) . '" alt="'. get_bloginfo('name') .'" class="logo-desktop"></a>'; // If an logo exists it will be placed on the site. 
        } else {

        }

    ?>

    <!-- Navigation -->
    <nav class="desktop-nav">
        <?php wp_nav_menu(array('theme_location' => 'main-menu', 
                                'menu_class' => 'nav-list', 
                                'container' => 'ul')); ?>
    </nav>

<!-- Mobile nav -->

    <!-- Icons and images -->
    <i class="fa-solid fa-bars" id="nav-icon"></i>

    <div class="overlay">
        <!-- Custom headers for both mobile and tablet screens -->
        <img class="header-img-tablet" src="<?= header_image(); ?>" width="<?php echo absint(get_custom_header()->width );?>" height="<?php echo absint(get_custom_header()->height); ?>" alt="">
        <img class="header-img-mobile" src="<?= header_image(); ?>" width="<?php echo absint(get_custom_header()->width );?>" height="<?php echo absint(get_custom_header()->height); ?>" alt="">
    </div>
    
    <?php
        // Custom logo for both mobile and tablet screens, only diffrence is the class. 
        $custom_logo_id = get_theme_mod('custom_logo');
        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
        
        if ( has_custom_logo() ) {
            echo '<img src="' . esc_url($image[0]) . '" alt="'. get_bloginfo('name') .'" class="logo-mobile">';
        } else {

        }
    ?>
    
    <!-- Navigation -->
    <nav class="mobile-nav">
        <?php wp_nav_menu(array('theme_location' => 'main-menu', 
                                'menu_class' => 'mobile-nav-list', 
                                'menu_id' => 'mobile-list', 
                                'container' => 'ul')); ?>
    </nav> 
</header>