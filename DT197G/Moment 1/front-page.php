<?php get_header(); ?>

    <main class="homepage-container">
        
        <img class="top-picture" src="<?= get_template_directory_uri(); ?>/images/trad.jpg" alt="">
        
        <div class="wrapper"></div>
            <div class="text-container">
            <?php
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                    the_content();
                }
            }
            ?>
                <button>Kontakt</button>
            </div>
        
            <h2 id="offer-title">Våra tjänster</h2>
            <?php
            query_posts('category_name=tjanster');
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                ?>
                    <article id="post<?php the_id(); ?>">
                        <?php if(has_post_thumbnail()) {the_post_thumbnail('service-icons'); }?>
                        <hr>
                        <h3><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                    </article> 
                <?php
                }
            }
            ?>
            
            <h2 id="news-title">Senaste Nyheter</h2>
            <?php
            query_posts('category_name=news&posts_per_page=1');
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                ?>
                <?php if(has_post_thumbnail()) {the_post_thumbnail('medium', array('class' => 'news-img')); }?>
                    <article id="news-box">
                        <h3 class="article_title"><?php the_title();?></h3>
                        <p><?php the_date(); ?> - <?php the_time();?> </p>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>">Läs mer</a>
                    </article>
                <?php
                }
            }
            
            ?>
             

            <hr class="article-line">
    </main>
<?php get_footer(); ?>