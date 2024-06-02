<?php get_header(); ?>

<main class="about-container">
    <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
            ?>
            <article class="about-box">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </article>
            <?php   
            } 
        } 
    ?>

</main>
<?php get_footer(); ?>