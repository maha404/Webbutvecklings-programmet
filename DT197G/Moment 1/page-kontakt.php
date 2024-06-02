<?php get_header(); ?>

<main class="contact-container">
    
    <?php if(have_posts()) {
            
            while(have_posts()) {
                the_post();
            ?>
            <h2 class="contact-title"><?php the_title(); ?></h2>
            <div class="form">
                <?php the_content(); ?>
            </div>
            <?php
            }
        }
    ?>
        
</main>

<?php get_footer(); ?> 