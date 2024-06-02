<!--Kod skriven av Maria Halvarsson -->
<?php

//anslut till databasen
    $db = new mysqli('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216');
    if($db->connect_errno > 0){
        die('fel vid anslutning');
    }


//sql frågor-------------------------->

    //Skapar en tabell för användaren
    $sql = "DROP TABLE IF EXISTS user;
            CREATE TABLE user(
            user_id INT(11) PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(128),
            name VARCHAR(100) NOT NULL, 
            password VARCHAR(350) NOT NULL );
            ";
    
    echo "<pre>$sql<pre>";

    //skcika sql-frågan till servern
    if($db->multi_query($sql)) {
        echo "Tabell installerad";
    } else {
        echo "Fel vid installation";
        
    }
?>