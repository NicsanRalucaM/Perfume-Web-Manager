<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../Config/database.php';
include_once '../Objects/address.php';


$database = new Database();
$db = $database->getConnection();

$address = new Address($db);
$address->id = $_GET['id'];


$address->read();
if (true) {


    $address_item = array(
        "address" => $address->address,
        "city" => $address->city,
        "state" => $address->state,
        "user" => $address->user,
        "time" => $address->time,
        "zip" => $address->zip

    );

    http_response_code(200);
    echo json_encode($address_item);

} else {

    http_response_code(404);
    echo json_encode(array("message" => "address does not exist."));
}
?>
