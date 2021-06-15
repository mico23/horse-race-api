<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/database.php";
include_once "../objects/customer.php";

$database = new Database();
$db = $database->connectToDB();

// Instantiate new customer object
$customer = new Customer($database);

// Decode provided data
// $data = json_decode(file_get_contents('php://input'), true);
// echo("*****")
// echo($data)

// Instantiate customer's username
$customer->username = $_POST['username'];
$customer->fund = $_POST['fund'];

//Attemp updating customer balance
$res = $customer->addFund();

if($res != false) {
    http_response_code(200);
    echo json_encode(
        array("message" => "Successfully Updated.")
    );
} else {
    http_response_code(404);

    echo json_encode(
        array("message" => "Error Updating Account Balance.")
    );
}
?>