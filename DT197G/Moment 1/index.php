<?php get_header(); ?>
<main class="news-container">
        <h2 class="news-title-big">Nyheter</h2>

        <?php
            query_posts('category_name=news&posts_per_page=4');
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                ?>
                
                    <article class="news-box">
                        <?php if(has_post_thumbnail()) {the_post_thumbnail('news-photos', array('class' => 'news-box-img')); }?>
                        <h3><?php the_title();?></h3>
                        <p><?php echo get_the_date(); ?> - <?php the_time();?> </p>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>">Läs mer</a>
                        <hr class="line">
                    </article>
                <?php
                }
            }
            
            ?>

    </main>

<?php get_footer(); ?>    