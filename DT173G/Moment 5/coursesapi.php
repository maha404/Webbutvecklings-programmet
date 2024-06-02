<?php
include("config.php");
/*Headers med inställningar för din REST webbtjänst*/

//Gör att webbtjänsten går att komma åt från alla domäner (asterisk * betyder alla)
header('Access-Control-Allow-Origin: *');

//Talar om att webbtjänsten skickar data i JSON-format
header('Content-Type: application/json');

//Vilka metoder som webbtjänsten accepterar, som standard tillåts bara GET.
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');

//Vilka headers som är tillåtna vid anrop från klient-sidan, kan bli problem med CORS (Cross-Origin Resource Sharing) utan denna.
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//Läser in vilken metod som skickats och lagrar i en variabel
$method = $_SERVER['REQUEST_METHOD'];

//Om en parameter av id finns i urlen lagras det i en variabel
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

$course = new Courses();

switch($method) {
    case 'GET':

        if(isset($id)) {
            $response = $course->getCourseById($id);
        } else {
            $response = $course->getCourses();
        }
        
        if(count($response) === 0) {
            $response = array("message" => "Databasen är tom!");
            http_response_code(404); //Fel hos klienten, not found
        } else {
            http_response_code(200); //Ok - The request has succeeded
        }
        
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

        if($course->setCourse($data['code'], $data['name'], $data['progression'], $data['course_syllabus'])) {
            if($course->saveCourse()) {
                $response = array("message" => "Kurs tillagd");
                http_response_code(201); //Created
            } else {
                http_response_code(500); // Internal server error
                $response = array("message" => "Fel vid lagring av kursen i databasen");
            }
        } else {
            $response = array("message" => "Kurs inte tillagd");
            http_response_code(400);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);

        if($course->setCourseAndId($data['id'], $data['code'], $data['name'], $data['progression'], $data['course_syllabus'])) {
            if($course->updateCourse()) {
                $response = array("message" => "Kurs uppdaterad");
                http_response_code(200); // ok
            } else {
                http_response_code(500); // Internal server error
                $response = array("message" => "Fel vid uppdatering av kursen i databasen");
            }
        } else {
            $response = array("message" => "Kurs inte uppdaterad");
            http_response_code(400);
        }

        break;
    case 'DELETE':
        if(!isset($id)) {
            http_response_code(400);
            $response = array("message" => "No id is sent");  
        } else {
            if($course->deleteCourse($id)) {
                http_response_code(200);
                $response = array("message" => "Post with id=$id is deleted");
            }
        }
        break;
        
}

//Skickar svar tillbaka till avsändaren
echo json_encode($response);