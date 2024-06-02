<?php

class Courses {
    // Properties
    private $code;
    private $name;
    private $progression;
    private $courseSyllabus;
    private $id;
    private $db;


    // Methods
    function __construct () {
        $this->db = new mysqli('studentmysql.miun.se', 'maha2216', 'rQN74Dyw5B', 'maha2216');
        if($this->db->connect_errno > 0) {
            die('Fel vid anslutning [' . $db->connect_error . ']');
        }
    }

    // Sparar all information i en och samma metod
    function setCourse (string $code, string $name, string $progression, string $courseSyllabus) : bool {
        // If sats för att inte kunna spara tomma text strängar till databasen. 
        if($code !== '' && $name !== '' && $progression !== '' && $courseSyllabus !== '') {
            // Sparar i vardera propertie
            $this->code = $code;
            $this->name = $name;
            $this->progression = $progression;
            $this->courseSyllabus = $courseSyllabus;

            return true;
        } else {
            return false;
        }
    
    }

    function setCourseAndId(string $id, string $code, string $name, string $progression, string $courseSyllabus) {
        $this->code = $code;
        $this->name = $name;
        $this->progression = $progression;
        $this->courseSyllabus = $courseSyllabus;
        $this->id = $id;

        return true;
    }

    function saveCourse () : bool {
        $sql = "INSERT INTO courses(code, name, progression, course_syllabus)VALUES('". $this->code . "', '".$this->name."', '".$this->progression."', '".$this->courseSyllabus."');";
        
        $result = mysqli_query($this->db, $sql);
        return true;
    }

    function getCourses() : array {
        $sql = "SELECT * FROM courses;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function getCourseById($id) {
        $sql = "SELECT * FROM courses WHERE id=$id;";
        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function updateCourse() {
        $sql = "UPDATE courses SET code='".$this->code."', name='".$this->name."', progression='".$this->progression."', course_syllabus='".$this->courseSyllabus."' WHERE id=$this->id;";
        $result = mysqli_query($this->db, $sql);

        return true;
    }

    function deleteCourse($id) {
        $sql ="DELETE FROM courses WHERE id=$id;";
        $result = mysqli_query($this->db, $sql);

        return true;

    }

}

?>