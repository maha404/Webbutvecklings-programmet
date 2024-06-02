<?php 

class User {
    // Properties
    private $username;
    private $password;
    private $api_key;
    private $db;

    // Methods
    function __construct () {
        $this->db = new mysqli ('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216');
        if($this->db->connect_errno > 0) {
            die('Fel vid anslutning ['. $db->connect_error .']');
        }
    }

    function setUser (string $username, string $password, string $api_key) : bool {
        if($username !== '' && $password !== '' && $api_key !== '') {

            $username = $this->db->real_escape_string($username);
            $username = strip_tags($username);
            $this->username = $username;

            $password = $this->db->real_escape_string($password);
            $password = strip_tags($password);
            $this->password = $password;
            
            $api_key = $this->db->real_escape_string($api_key);
            $api_key = strip_tags($api_key);
            $this->api_key = $api_key;

            return true;
        } else {
            return false;
        }
    }

    function logIn (string $username, string $password, string $api_key) : bool {

        $sql = "SELECT * FROM admin WHERE username = '".$this->username."' AND password = '".$this->password."' AND api_key = '".$this->api_key."';";

        $result = $this->db->query($sql);

        if($result !== false && $result->num_rows > 0 ) {
            return true;
        } else {
            return false;
        }

        
    }

    function getUser () {
        $sql = "SELECT api_key FROM admin;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


}

?>