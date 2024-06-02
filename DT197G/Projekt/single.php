<?php get_header(); ?>

<main class="single-container">

<?php
    if(have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
                <article class="single-article">
                    <h2><?php the_title(); ?></h2>
                    <?php if(has_post_thumbnail()) {the_post_thumbnail('single', array('class' => 'single-img')); }?>
                    <?php the_content(); ?>
                </article>
            <?php
        }
    }
?>
</main>

<?php get_footer(); ?>