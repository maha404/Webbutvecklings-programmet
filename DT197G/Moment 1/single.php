<?php get_header(); ?>

<main class="article-container">

<?php

 if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); 
        get_template_part('content', 'single');
    ?>
    <?php if(has_post_thumbnail()) {the_post_thumbnail('news-photos', array('class' => 'news-article-top-img')); }?>
        <article class="article-text">
            <h2 class=article-text><?php the_title(); ?></h2>
            <p><?php the_date()?> - <?php the_time();?></p>
            <hr>
            <p><?php the_content(); ?></p>
        </article>
<?php
    } 
} 

?>

</main>


<?php get_footer(); ?>