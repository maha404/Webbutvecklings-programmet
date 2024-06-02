<?php /* Template name: Om oss */?>
<?php get_header(); ?>
<main class="about-container">
    
<?php 
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
       
    ?>
    <h2 class="about-title"><?php the_title(); ?></h2>
     <article class="text-box">
        <?php the_content(); ?>
    </article>   

    <?php
    } 
} 
?>
</main>
<?php get_footer(); ?>