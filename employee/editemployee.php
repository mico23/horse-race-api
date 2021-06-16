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
include_once "../objects/employee.php";

$database = new Database();
$db = $database->connectToDB();

// Instantiate new employee object
$employee = new Employee($database);

// Decode provided data
$data = json_decode(file_get_contents('php://input'), true);

// Instantiate editing data
$employee->username = $data['username'];
$employee->level = $data['level'];
$employee->position = $data['position'];
$employee->salary = $data['salary'];

//Attemp updating employee balance
$stmt = $employee->editEmployee();
$res = oci_execute($stmt);

if(oci_num_rows($stmt) > 0) {
    oci_free_statement($stmt);

    http_response_code(200);
    
    echo json_encode(
        array("message" => "Successfully Updated.")
    );
} else {
    http_response_code(404);

    echo json_encode(
        array("message" => "Error updating Employee.")
    );
}
$database->disconnectFromDB();
?>