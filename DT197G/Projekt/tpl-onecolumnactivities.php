<?php /* Template Name: Aktiviteter - En kolumn */?>
<?php get_header(); ?>

<main class="one-column-container">

<?php
        query_posts('category_name=aktiviteter');
        if(have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                    <article class="activities">
                        <h3><?php the_title(); ?></h3>
                        <?php if(has_post_thumbnail()) {the_post_thumbnail('news', array('class' => 'single-img')); }?>
                        <?php the_content(); ?>
                    </article>
                    <hr class="line">

                <?php
            }
        }
    ?>

</main>

<?php get_footer(); ?>