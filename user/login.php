<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/database.php";
include_once "../objects/user.php";

$database = new Database();
$db = $database->connectToDB();

$user = new User($database);

$user->username = isset($_GET['username']) ? $_GET['username'] : die();
$user->password = isset($_GET['password']) ? $_GET['password'] : die();

$user_arr = array();
$user_arr['username'] = $user->username;

$stmt = $user->login();
$nrows = oci_fetch_all($stmt, $res);

if ($nrows == 0) {
    http_response_code(401);
    echo json_encode(array("message" => "Credentials not found."));
} else {
    http_response_code(200);
    $user_arr['message'] = "Login successful.";
    echo json_encode($user_arr);
}

$this->database->disconnectFromDB();
?>
