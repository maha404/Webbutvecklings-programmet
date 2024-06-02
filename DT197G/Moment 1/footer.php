<footer>
    <div>
        <h4>Kontakt</h4>
        <hr>
        <br>
        <p>Tel: 06805530</p>
        <p>Mejl: skogab@dinskog.se</p>
    </div>
    <div class="about-box">
        <h4>Om oss</h4>
        <hr>
        <br>
        <p>Välkommen till Skog AB! Vi är ett ledande skogsbolag som är engagerade i att hantera skogstillgångar på ett hållbart sätt. Vi har en lång historia...</p>
        <a href="<?php echo site_url('/om-oss/') ?>">Läs mer</a>
    </div>
    <?php if(dynamic_sidebar('Footer') ) : else : endif; ?>
</footer>
    <?php wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js') ?>
    <?php wp_footer(); ?>

</body>
</html>