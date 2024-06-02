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

switch($method) {
    case 'GET':

        if(isset($week)) {
            $response = $menu->getWeekMenu($week);
        } elseif(isset($id)) {
            $response = $menu->getMenuId($id);
        } elseif(isset($weeks)) {
           $response = $menu->getWeeks();
        } else {
             $response = $menu->getMenu();
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

        
            if($order->setOrder($data['name'], $data['phonenumber'], $data['description'])) {
                if($order->saveOrder()) {
                    $response = array("message" => "Order tillagd");
                    http_response_code(201); //Created
                } else {
                    http_response_code(500); // Internal server error
                    $response = array("message" => "Fel vid lagring av ordern i databasen");
                }
            } else {
                $response = array("message" => "Order inte tillagd");
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