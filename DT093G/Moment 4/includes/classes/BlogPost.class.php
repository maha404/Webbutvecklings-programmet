<?php

class BlogPost {

    //properties
    private $blogPost;
    private $title;
    private $db;

    //methods
    function __construct () {
        $this->db = new mysqli('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216'); //Ansluter till databasen
            if($this->db->connect_errno > 0) { // Kollar efter felmeddelanden
                die('Fel vid anslutning ['. $db->connect_error . ']');
            }
    }


    //set metod för att spara titeln i priopertien
    function setTitle () : bool {

        if($_POST['title'] == '') {
            return false;
        } else {
            $this->title = $_POST['title']; //sparar i propertien
            return true; 
        }
    }


    //set metod för att spara i propertien
    function setPost () : bool {

        if($_POST['content'] == '') { //Kollar om input är tomt. 
            return false;
        } else {
            $this->blogPost = $_POST['content']; //spara i blogPost
            return true;
        }
        
    }

    function savePost () {

        $sql = "INSERT INTO blogg(title, content)VALUES('". $this->title . "' , '". $this->blogPost . "');";
        $result = mysqli_query($this->db, $sql); 

    }

    function getPost () : array {
        $sql = "SELECT * FROM blogg ORDER BY time DESC;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    function deletePost (int $id) : bool{
        $id = intval($id);
        $sql = "DELETE FROM blogg WHERE id=$id;";
        return mysqli_query($this->db, $sql);
    }

    function getOnePost (int $id) {
        $id = intval($id);
        
        $sql = "SELECT * FROM blogg WHERE id=$id;";
        $result = mysqli_query($this->db, $sql);
       
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 

    function getRecent () {
        $sql = "SELECT * FROM blogg ORDER BY time DESC LIMIT 2;";
        
        $result = mysqli_query($this->db, $sql);
        
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}
?>