<?php /* Template name: Blank sida */?>
<?php get_header(); ?>
<?php
if (have_posts()) {

    while (have_posts()): the_post();
    
    echo strip_tags(get_the_content(), '<p> <a>');

    endwhile;

}
?>
<?php get_footer(); ?>