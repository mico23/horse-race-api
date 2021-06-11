<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/customer.php";

$database = new Database();
$db = $database->connectToDB();

$customer = new Customer($database);

$stmt = $customer->read();
$nrows = oci_fetch_all($stmt, $res);

if ($nrows > 0) {
    $customers_arr = array();
    $customers_arr["records"] = array();

    for ($i = 0; $i < $nrows; $i++) {
        $customer_i = array(
            "accountID" => $res["ACCOUNTID"][$i],
            "name" => $res["NAME"][$i],
            "balance" => $res["BALANCE"][$i],
            "address" => $res["ADDRESS"][$i],
            "memberID" => $res["MEMBERID"][$i],
            "username" => $res["USERNAME"][$i]
        );

        array_push($customers_arr["records"], $customer_i);
    }

    oci_free_statement($stmt);

    http_response_code(200);

    echo json_encode($customers_arr);
} else {
    http_response_code(404);

    echo json_encode(
        array("message" => "No customers found.")
    );
}

$this->database->disconnectFromDB();
?>