<?php get_header(); ?>

<main class="underside-container">

<?php 
    query_posts('category_name=sommar-aktiviteter');
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); 
        ?>
        <article class="underside-article">
            <div class="picture-container">
                <?php if(has_post_thumbnail()) {the_post_thumbnail('medium', array('class' => 'article-img')); }?>
            </div>
            <div class="article-text">
                <h4><?php the_title(); ?></h4>
                <?php the_content(); ?>
            </div>
        </article>
        
        <?php
        } 
    } 
?>

</main>

<?php get_footer(); ?>