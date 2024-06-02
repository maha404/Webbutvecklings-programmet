<?php get_header(); ?>

<main class="about-container">
        
        <?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                   
                ?>
                <h2 class="about-title"><?php the_title(); ?></h2>
                 <article class="text-box">
                    <p><?php the_content(); ?></p>
                </article>   

                <?php
                } 
            } 
        ?>

</main>

<?php get_footer(); ?> 