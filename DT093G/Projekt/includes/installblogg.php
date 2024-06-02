<!--Kod skriven av Maria Halvarsson -->
<?php

//anslut till databasen
    $db = new mysqli('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216');
    if($db->connect_errno > 0){
        die('fel vid anslutning');
    }


//sql frågor-------------------------->

    //Skapar en tabell för användaren
    $sql = "DROP TABLE IF EXISTS blog;
            CREATE TABLE blog(
            post_id INT(11) PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(50), 
            content text, 
            time timestamp NOT NULL DEFAULT current_timestamp(),
            name VARCHAR(20),
            post_email VARCHAR(128), 
            image_url VARCHAR(100), 
            user_id INT(11) );
            ";
    
    echo "<pre>$sql<pre>";

    //skcika sql-frågan till servern
    if($db->multi_query($sql)) {
        echo "Tabell installerad";
    } else {
        echo "Fel vid installation";
        
    }
?>