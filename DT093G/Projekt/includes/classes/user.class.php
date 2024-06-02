<!--Kod skriven av Maria Halvarsson -->
<?php

class User {
    //properties
    private $db;
    private $email;
    private $name;
    private $password;

    //Constructor för att läsa in databasen
    function __construct () {
        $this->db = new mysqli('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216'); //Ansluter till databasen
            if($this->db->connect_errno > 0) { // Kollar efter felmeddelanden
                die('Fel vid anslutning ['. $db->connect_error . ']');
            }
    }

    // Kollar om användaren skrivit in något i email-fältet
    function setEmail() : bool {
       
        if($_POST['email_reg'] != '') {
            
            $email = $_POST['email_reg'];
            $email = $this->db->real_escape_string($email);
            $email = strip_tags($email);

            $sql = "SELECT * FROM user WHERE email = '$email';";
            $result = $this->db->query($sql);

            if($result->num_rows > 0) {
                // Finns i databasen.
                return false;
            } else {
                // Finns inte i databasen
                $this->email = $email; //spara i propertie
                return true;  
            }
            
        } else {
            return false;
        }


    }

    //funktion som kollar om användaren skrivit in något i fältet användarnamn
    function setName() : bool {

        if($_POST['name_reg'] == ''){
            return false;
        } else {
            $name = $_POST['name_reg'];
            $name = $this->db->real_escape_string($name);
            $name = strip_tags($name);
            $this->name = $name; //spara i propertie
            return true;
        }
    }

    //Kollar om användaren skrivit in något i lösenordsfältet
    function setPassword () : bool {
        if($_POST['password_reg'] == '') {
            return false;
        } else {
            $password = $_POST['password_reg'];
            $password = $this->db->real_escape_string($password);
            $this->password = $password; //spara i propertie
            return true;
        }
    }

    //funktion som loggar in användaren som finns i databasen
    function logIn(string $email, string $name, string $password) : bool {
        
        $sql = "SELECT * FROM user WHERE email = '$email' AND name = '$name';";
    
        $result = $this->db->query($sql);

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_pass = $row['password'];

            if(password_verify($password, $stored_pass)) {
                $_SESSION['email_login'] = $email;
                echo "<p>LogIn kördes</p>";
                header("Location: user.php");
                return true;
            }else {
                return false;
            }

        } else {
            return false;
        }
    }

    function adminPage () {
        if(!isset($_SESSION['email_login'])) {
            header("Location: login.php");
            exit;
        }
    }

    function getAllUsers () {
        $sql = "SELECT * FROM user;";

        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function getName () {

        $email = $_SESSION['email_login'];

        $sql = "SELECT * FROM user WHERE email = '$email';";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //funktion som sparar 
    function saveUser(string $email, string $name, string $password) {
        if(!$this->setEmail($email)) return false;
        if(!$this->setName($name)) return false;
        if(!$this->setPassword($password)) return false;

        $hashed_pass = password_hash($this->password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO user(email, name, password)VALUES('". $this->email . "' ,'". $this->name . "' , '". $hashed_pass . "');";
        $result = mysqli_query($this->db, $sql);

    }
    
}

?>