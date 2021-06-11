<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/database.php";
include_once "../objects/user.php";

$database = new Database();
$db = $database->connectToDB();

$user = new User($database);

$user->username = isset($_GET['username']) ? $_GET['username'] : die();
$user->password = isset($_GET['password']) ? $_GET['password'] : die();

$stmt = $user->login();
$nrows = oci_fetch_all($stmt, $res);

if (empty($credentials->username) && empty($credentials->password)) {
    http_response_code(401);
    echo json_encode(array("message" => "Credentials not found."));
}



$this->database->disconnectFromDB();
?>