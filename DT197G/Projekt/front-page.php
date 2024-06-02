<?php get_header(); ?>

<main class="frontpage-container">

<!-- News articles -->
 
<section class="news-article">

<?php
    query_posts('category_name=nyheter&posts_per_page=3');
    if(have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
             
                <article>
                    <h3><?php the_title(); ?></h3>
                    <?php the_date(); ?>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Läs mer</a>
                </article>
                <hr class="line">

            <?php
        }
    }
?>
</section>

<!-- Cabin posts -->
<?php 
    query_posts('category_name=boenden&posts_per_page=3');
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); 
        ?>
        <div class="wrapper">
            <article class="cabin-article" >
                <?php if(has_post_thumbnail()) {the_post_thumbnail('cabin'); }?>
                <div class="text">
                    <h2><?php the_title(); ?></h2>
                    <hr>
                    <?php the_excerpt(); ?>
                    <br>
                    <br>
                    <br>
                    <a href="<?php the_permalink(); ?>" class="button">Läs mer</a>
                </div>
            </article>
        </div>
        <?php
        } 
    } 
?>

</main>
<?php get_footer(); ?>