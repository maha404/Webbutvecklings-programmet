<?php 
    $page_title = "Variabler";
    $site_title = "Variabler";
    include("includes/header.php");
?>

    <h3>Lösning på moment 2 - Variabler</h3>
        <?php
            $name = "Maria Halvarsson";
            $email = "maha2216@student.miun.se";
            $age = 22; 
        ?>
        <p><?= "Hej! Jag heter $name, är $age år gammal och nås på följande e-post:" ?> <a href="mailto:<?= $email ?>"><?= $email ?></a></p>

<?php 
    include("includes/footer.php");
?>

