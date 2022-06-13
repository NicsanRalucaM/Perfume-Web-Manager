<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');


include_once '../Config/database.php';
include_once '../Objects/user.php';


$database = new Database();
$db = $database->getConnection();

$user = new user($db);

$user->id = $_GET['id'];

$user->readData();
if ($user->firstname != null) {

    $product_arr = array(
        "id" => $user->id,
        "firstname" => $user->firstname,
        "lastname" => $user->lastname,
        "email" => $user->email
    );

    http_response_code(200);
    echo $user->email;
} else {

    http_response_code(404);

    echo json_encode(array("message" => "User does not exist."));
}
?>