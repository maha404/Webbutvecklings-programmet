<?php

// Register menu
add_action('init', 'register_my_menus');

function register_my_menus() {
    register_nav_menus(array (
        'main-menu' => __('Huvudmeny')
    ));
}

// Create a wdgetarea
function skogab_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer'),
        'id' => 'Footer', 
        'before_widget' => '<div>', // The element that the widget should be inside
        'after_widget' => '</div>', 
        'before_title' => '<h3 class="footer_widget">', 
        'after_title' => '</h3>'
    ));
}

add_action ('widgets_init' , 'skogab_widgets_init');

// Activate post pictures
add_theme_support('post-thumbnails');

// Custom image sizes
add_image_size ('news-photos', 697, 449, true);
add_image_size ('about-image', 729, 490, true);
add_image_size ('service-icons', 150, 235, true);

?>