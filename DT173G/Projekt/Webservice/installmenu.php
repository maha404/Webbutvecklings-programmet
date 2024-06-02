<?php

    // Anslutning till databasen
    $db = new mysqli('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216');
    if($db->connect_errno > 0) {
        die('Fel vid anslutning [' . $db->connect_error . ']');
    }

    // Skapa en tabell för alla kurser
    $sql = "DROP TABLE IF EXISTS menus;
            CREATE TABLE menus (
            id INT(11) PRIMARY KEY AUTO_INCREMENT,
            week VARCHAR(20),
            weekday VARCHAR(20), 
            description TEXT, 
            date VARCHAR(20) );";

    echo "<pre>$sql<pre>";

    if($db->multi_query($sql)) {
        echo "tabell installerad";
    } else {
        echo "fel vid anslutning";
    }

?>