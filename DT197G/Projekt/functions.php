<?php

// Register menu
add_action('init', 'register_my_menus');

function register_my_menus() {
    register_nav_menus(array (
        'main-menu' => __('Huvudmeny')
    ));
}

// Create a wdgetarea
// function skogab_widgets_init() {
//     register_sidebar(array(
//         'name' => __('Footer'),
//         'id' => 'Footer', 
//         'before_widget' => '<div>', // The element that the widget should be inside
//         'after_widget' => '</div>', 
//         'before_title' => '<h3 class="footer_widget">', 
//         'after_title' => '</h3>'
//     ));
// }

// add_action ('widgets_init' , 'skogab_widgets_init');

// Activate custom header
$header_settings = array (
    'header-text'   => false,
    'width'         => 1920,
    'flex-width'    => true,
    'height'        => 497, 
    'flex-height'   => true, 
    'default-image' => get_template_directory_uri() . '/images/background.png',
);


add_theme_support('custom-header', $header_settings);


// Activate custom logo
function custom_logo_setup () {
    $logo_settings = array (
        'width'       => 471, 
        'flex-width'  => true, 
        'height'      => 217, 
        'flex-height' => true,
    );
    add_theme_support('custom-logo', $logo_settings);
}

add_action( 'after_setup_theme', 'custom_logo_setup' );

// Activate post pictures
add_theme_support('post-thumbnails');

// Custom image sizes 
add_image_size ('cabin', 376, 257, true);
add_image_size ('round-image', 500, 500, true);
add_image_size ('single', 300, 300, true);
add_image_size ('news', 300, 300, true);

?>