<?php 
    $page_title = "Upprepningar";
    $site_title = "Upprepningar";
    include("includes/header.php");
?>

    <h3>Lösning på moment 2 - Upprepningar</h3>
        
        <h4>Del 1</h4>
        <?php 

            for($i=10; $i > 0; $i--){

                echo "<p>" . $i . "</p>";
            
            }
        ?>
        <br>
        <hr>
        <h4>Del 2</h4>
        <?php 

            $courses = array("Webbutveckling 1", "Introduktion till programmering i JavaScript", "Grafisk teknik för webb", "Webbanvändbarhet", "Databaser", "Webbutveckling 2", "Webbdesign för CSM", "Webbutveckling 3");
            
            foreach($courses as $course){
                echo "<ul><li>" . $course . "</li></ul>";
            }
        ?>
        <br>
        <hr>
        <h4>Del 3</h4>
        <?php 

            sort($courses); 

            foreach($courses as $course){
                echo "<ul><li>" . $course . "</li></ul>";
            }
        
        ?>
<?php 
    include("includes/footer.php");
?>