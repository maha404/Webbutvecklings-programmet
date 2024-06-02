<?php

class Menus {

    // Properties
    private $id;
    private $week;
    private $weekday;
    private $description;
    private $date;
    private $db;


    // Methods
    function __construct () {
        $this->db = new mysqli ('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216');
        if($this->db->connect_errno > 0) {
            die('Fel vid anslutning ['. $db->connect_error .']');
        }
    }

    // Get all the menus
    function getMenu () {
        $sql = "SELECT * FROM menus;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Get menus with the same week
    function getWeekMenu ($week) {
        $sql = "SELECT * FROM menus WHERE week=$week;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Get only the week number
    function getWeeks () {
        $sql = "SELECT DISTINCT week FROM menus;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Get one day with id
    function getMenuId ($id) {
        $sql = "SELECT * FROM menus WHERE id=$id;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Set the menu
    function setMenu (string $week, string $weekday, string $description, string $date) : bool {
        if ($week !== '' && $weekday !== '' && $description !== '' && $date !== '') {
           
            $week = $this->db->real_escape_string($week);
            $week = strip_tags($week);
            $this->week = $week;

            $weekday = $this->db->real_escape_string($weekday);
            $weekday = strip_tags($weekday);
            $this->weekday = $weekday;

            $description = $this->db->real_escape_string($description);
            $description = strip_tags($description);
            $this->description = $description;

            $date = $this->db->real_escape_string($date);
            $date = strip_tags($date);
            $this->date = $date;

            return true;

        } else {

            return false;
        }
    } 

    // Set menu and ID 
    function setMenuAndId (string $id, string $week, string $weekday, string $description, string $date) : bool {

        if ($week !== '' && $weekday !== '' && $description !== '' && $date !== '' && $id !== '') {

            $week = $this->db->real_escape_string($week);
            $week = strip_tags($week);
            $this->week = $week;

            $weekday = $this->db->real_escape_string($weekday);
            $weekday = strip_tags($weekday);
            $this->weekday = $weekday;

            $description = $this->db->real_escape_string($description);
            $description = strip_tags($description);
            $this->description = $description;

            $date = $this->db->real_escape_string($date);
            $date = strip_tags($date);
            $this->date = $date;

            $id = $this->db->real_escape_string($id);
            $id = strip_tags($id);
            $this->id = $id;

            
            return true;

        } else {

            return false;

        }

        
    }

    // Save menu
    function saveMenu () : bool {
        $sql = "INSERT INTO menus(week, weekday, description, date)VALUES('".$this->week."', '".$this->weekday."', '".$this->description."', '".$this->date."');";

        $result = mysqli_query($this->db, $sql);
        return true;
    }

    // Update the menu
    function updateMenu() {
        $sql = "UPDATE menus SET week='".$this->week."', weekday='".$this->weekday."', description='".$this->description."', date='".$this->date."' WHERE id=$this->id;";
        $result = mysqli_query($this->db, $sql);

        return true;
    }

    // Delete the whole week menu
    function deleteMenu ($week) {
        $sql = "DELETE FROM menus WHERE week=$week;";
        $result = mysqli_query($this->db, $sql);

        return true;
    }

    // Delete only one day
    function deleteDay ($id) {
        $sql = "DELETE FROM menus WHERE id=$id;";
        $result = mysqli_query($this->db, $sql);

        return true;
    }
    
}

?>