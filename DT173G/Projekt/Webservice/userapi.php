<?php
// include("config.php");
include("classes/Menu.class.php");
include("classes/Orders.class.php");
include("classes/User.class.php");
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


if(isset($_GET['week'])) {
    $week = $_GET['week'];
}

if(isset($_GET['weeks'])) {
    $weeks = $_GET['weeks'];
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

if(isset($_GET['orders'])) {
    $orders = $_GET['orders'];
}

$menu = new Menus();
$order = new Orders();
$user = new User();

switch($method) {
    case 'GET':
        
        $response = $user->getUser();
        
        if(count($response) === 0) {
            $response = array("message" => "Databasen är tom!");
            http_response_code(404); //Fel hos klienten, not found
        } else {
            http_response_code(200); //Ok - The request has succeeded
        }
        
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

            if($user->setUser($data['username'], $data['password'], $data['api_key'])) {
                if($user->logIn($data['username'], $data['password'], $data['api_key'])) {
                    $response = array("message" => "Inloggning lyckades!");
                    http_response_code(200);
                } else {
                    $response = array("message" => 'Fel vid inloggning!');
                    http_response_code(500);
                }
            } else {
                $response = array("message" => "Fel vid lagring av ordern i databasen");
                http_response_code(400);
            }
        
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);


        break;

    case 'DELETE':
        
        break;
        
}

//Skickar svar tillbaka till avsändaren
echo json_encode($response);