<!--Kod skriven av Maria Halvarsson -->
<?php

class BlogPost{
    //properties
    private $blogPost;
    private $title;
    private $db;

    //methods
    function __construct () {
        $this->db = new mysqli('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216');//Ansluter till databasen
            if($this->db->connect_errno > 0) { // Kollar efter felmeddelanden
                die('Fel vid anslutning ['. $db->connect_error . ']');
            }
    }
    
function setTitle () : bool {

    if($_POST['title'] == '') {
        return false;
    } else {
        $title = $_POST['title'];
        $title = $this->db->real_escape_string($title);
        $title = strip_tags($title);
        $this->title = $title; //sparar i propertien
        return true; 
    }
}


//set metod för att spara i propertien
function setPost () : bool {

    if($_POST['content'] == '') { //Kollar om input är tomt. 
        return false;
    } else {
        $content = $_POST['content'];
        $content = $this->db->real_escape_string($content);
        $content = strip_tags($content);
        $this->blogPost = $content; //spara i blogPost
        return true;
    }
    
}

function savePost () {

    $user_email = $_SESSION['email_login'];
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['name'];
    $image = $_FILES["file"]["name"];

    if(file_exists($image)) {
        $sql = "INSERT INTO blog(title, content, name, post_email, image_url, user_id)VALUES('". $this->title . "' , '". $this->blogPost . "', '".$user_name."','".$user_email."', '".$image."', '".$user_id."');";
        $result = mysqli_query($this->db, $sql); 
    } 
}

function getPost () : array {
    $user_email = $_SESSION['email_login'];

    $sql = "SELECT * FROM blog WHERE post_email = '".$user_email."';";
    //$sql = "SELECT blog.post_id, blog.title, blog.content, blog.time, blog.image_url, user.user_id, user.name FROM blog JOIN user on blog.user_id=user.user_id;";
    $result = mysqli_query($this->db, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function getUserPosts ($id) : array {
    $sql = "SELECT blog.post_id, blog.title, blog.content, blog.time, blog.image_url, user.user_id, user.name FROM blog INNER JOIN user on blog.user_id=user.user_id WHERE user.user_id = '".$id."';";
    $result = mysqli_query($this->db, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function getAllPost () : array {
    $sql = "SELECT * FROM blog ORDER BY time DESC LIMIT 5;";

    $result = mysqli_query($this->db, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


function getOnePost (int $id) {
    $id = intval($id);
    
    $sql = "SELECT * FROM blog WHERE post_id=$id;";
    $result = mysqli_query($this->db, $sql);
   
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
} 


function changePost(int $id, string $title, string $content) {
    if(!$this->setTitle($title)) return false;
    if(!$this->setPost($content)) return false;

    $sql = "UPDATE blog SET title= '". $this->title . "', content='".$this->blogPost."'  WHERE post_id = $id;";

    return mysqli_query($this->db, $sql);
}


function deletePost (int $id) : bool{
    $id = intval($id);
    $sql = "DELETE FROM blog WHERE post_id=$id;";
    return mysqli_query($this->db, $sql);
}

}


?>