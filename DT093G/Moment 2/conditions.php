<?php 
    $page_title = "Villkor";
    $site_title = "Villkor";
    include("includes/header.php");
?>

    <h3>Lösning på moment 2 - Villkor</h3>
        
        <?php
        /* Klockslag */
            $date = date("Y-m-d : H:i");
        ?>
        <p><?= "Datum/klockslag: $date" ?></p>


        <?php 

            $today = date("w");

            if($today = 0){
                echo "Idag är det söndag";
            }
        
        ?>

        <?php 
            
        $time = date("H");

        if($time > 18 || $time <= 5){
            echo "Det är kväll/natt"; 
        }elseif($time < 6 || $time <= 8) {
            echo "Det är morgon";
        }elseif($time <= 9 || $time < 12){
            echo "Det är förmiddag";
        }else{
            echo "Det är eftermiddag";
        }

        ?>
            <br>
            <br>
        <?php 

            $day = date("w");
            
            switch ($day) {
                case 0 :
                    echo "Idag är söndag";
                    break;
                case 1 : 
                    echo "Idag är måndag";
                    break;
                case 2 : 
                    echo "Idag är tisdag";
                    break;
                case 3 : 
                    echo "Idag är onsdag"; 
                    break;
                case 4 : 
                    echo "Idag är torsdag";
                    break; 
                case 5 : 
                    echo "Idag är fredag"; 
                    break;
                case 6 : 
                    echo "Idag är lördag";
                    break;
            }
        
        ?>

<?php 
    include("includes/footer.php");
?>
