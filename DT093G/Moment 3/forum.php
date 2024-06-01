<?php 
    $page_title = "Formulär";
    $site_title = "Formulär";
    include("includes/header.php");
?>

    <h3>Lösning på moment 2 - Formulär</h3>

    <h3>Del 1 - Skicka data med GET</h3>
    <?php 
    
    if(isset($_GET['first_name'], $_GET['last_name'])){ // Kollar om något är skrivet i fälten. 
         $first_name = $_GET['first_name']; // Lagrar för och efternamn som är angivet i vardera variabler. 
         $last_name = $_GET['last_name'];

        if($first_name != '' && $last_name != ''){ // Kollar om för och efternamn inte är en tom textsträng. 
            echo"Hej $first_name $last_name"; // Om ovan stämmer så skrivs för och efternamn ut. 
         }else{
            echo "Du behöver fylla i både förnamn och efternman!"; // Om ovan inte stämmer så skrivs ett felmeddelande ut. 
         }
    }
   
    ?>
    
    <form method="GET" action="forum.php">

    Förnamn <input type="text" id="first_name" name="first_name">
    <br>
    Efternamn <input type="text" id="last_name" name="last_name">
    <br>
    <input type="submit" value="Skicka">
    </form>
    
    <br>
    <hr>
    <br>
    
    <h3>Del 2 - Skicka data med POST</h3>
    <form action="calculate.php" method="POST">

    <label for="lenght">Ange längd:</label>
    <input type="number" id="lenght" name="lenght">
    <br>
    <label for="width">Ange bredd: </label>
    <input type="number" id="width" name="width">
    <br>
    <input type="submit" value="Räkna">
    </form>

<?php 
    include("includes/footer.php");
?>