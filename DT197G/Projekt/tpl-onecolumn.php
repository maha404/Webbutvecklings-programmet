<?php /* Template Name: Undersida nyheter - En kolumn */?>

<?php get_header(); ?>

    <main class="one-column-container">

    <?php
        query_posts('category_name=nyheter&posts_per_page=3');
        if(have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                
                    <article>
                        <h3><?php the_title(); ?></h3>
                        <?php if(has_post_thumbnail()) {the_post_thumbnail('news', array('class' => 'single-img')); }?>
                        <br>
                        <?php echo get_the_date(); ?>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>">Läs mer</a>
                    </article>
                    <hr class="line">

                <?php
            }
        }
    ?>

    </main>

<?php get_footer(); ?>