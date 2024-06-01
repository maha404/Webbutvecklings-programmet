<?php

class User {
    //properties
    private $db;
    private $username;
    private $password;

    //Constructor för att läsa in databasen
    function __construct () {
        $this->db = new mysqli('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216'); //Ansluter till databasen
            if($this->db->connect_errno > 0) { // Kollar efter felmeddelanden
                die('Fel vid anslutning ['. $db->connect_error . ']');
            }
    }

    //funktion som kollar om användaren skrivit in något i fältet användarnamn
    function setUser() : bool {

        if($_POST['username'] == '' && $_POST['password'] == ''){
            return false;
        } else {
            $this->username = $_POST['username'];//sparar i propertie
            $this->setPassword(); //kallar på funktionen för att spara lösenord
            return true;
        }
    }

    function setPassword () : bool {
        if($_POST['password'] == '' && $_POST['username'] == '') {
            return false;
        } else {
            $this->password = $_POST['password']; //spara i propertie
            $this->saveUser(); //Kallar på denna funktion för att spara både lösenord och användarnamn
            return true;
        }
    }

    //funktion som loggar in användaren som finns i databasen
    function logIn(string $username, string $password) : bool {
        
        $sql = "SELECT * FROM user WHERE username = '$username';";
    
        $result = $this->db->query($sql);

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_pass = $row['password'];

            if(password_verify($password, $stored_pass)) {
                $_SESSION['username_login'] = $username;
                return true;
            }else {
                return false;
            }

        } else {
            return false;
        }
    }

    function adminPage () {
        if(!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit;
        }
    }

    //funktion som sparar användarens användarnamn och lösenord till databasen
    function saveUser() {

        $hashed_pass = password_hash($this->password, PASSWORD_DEFAULT);

        echo "användarnamn och lösenord sparat";
        $sql = "INSERT INTO user(username, password)VALUES('". $this->username . "' , '". $hashed_pass . "');";
        $result = mysqli_query($this->db, $sql);
    }
    
}
?>