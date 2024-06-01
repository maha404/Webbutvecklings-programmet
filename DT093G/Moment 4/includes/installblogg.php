<?php

//Ansluter till databasen
    $db = new mysqli('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216');
    if($db->connect_errno > 0){
        die('fel vid anslutning');
    }

//SQL-frågor ------------->

        //Skapar en tabell för blogginläggen
        $sql = "DROP TABLE IF EXISTS blogg;
        CREATE TABLE blogg(
        id INT(11) PRIMARY KEY AUTO_INCREMENT, 
        title VARCHAR(50), 
        content VARCHAR(1600), 
        time timestamp NOT NULL DEFAULT current_timestamp() );
        ";


        echo "<pre>$sql<pre>";

        //skcika sql-frågan till servern
        if($db->multi_query($sql)) {
            echo "Tabell installerad";
        } else {
            echo "Fel vid installation";
        }

?>