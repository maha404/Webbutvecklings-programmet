<?php get_header(); ?>

<?php 
    query_posts('category_name=boende-inforuta');
        if ( have_posts() ) {
            while ( have_posts() ) {
            ?>
            <article class="cabin-infobox">
                <?php the_post(); ?>
                <?php the_content(); ?>
            </article>
            <?php
            }
        } 
    ?>
<main class="cabin-container">

<?php 
    query_posts('category_name=boenden');
     if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); 
        ?>
        
            <div class="wrapper">
                <article class="cabin-article-page">
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