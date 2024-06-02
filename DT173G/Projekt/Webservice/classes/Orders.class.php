<?php

class Orders {

    //Properties
    private $id;
    private $name;
    private $phonenumber;
    // private $weekday;
    private $description;
    // private $db;


    function __construct () {
        $this->db = new mysqli ('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216');
        if($this->db->connect_errno > 0) {
            die('Fel vid anslutning ['. $db->connect_error .']');
        }
    }

    // Set the order
    function setOrder(string $name, string $phonenumber, string $description) : bool {
       
        if($name !== '' && $phonenumber !== '' && $description !== '') {

            $name = $this->db->real_escape_string($name);
            $name = strip_tags($name);
            $this->name = $name;

            $phonenumber = $this->db->real_escape_string($phonenumber);
            $phonenumber = strip_tags($phonenumber);
            $this->phonenumber = $phonenumber;

            $description = $this->db->real_escape_string($description);
            $description = strip_tags($description);
            $this->description = $description;

            return true;

        } else {
            return false;
        }
       
    }

    function saveOrder () {
        $sql = "INSERT INTO orders(name, phonenumber, description)VALUES('".$this->name."', '".$this->phonenumber."', '".$this->description."');";
        $result = mysqli_query($this->db, $sql);

        return true;
    }


}



?>