<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../Config/database.php';
include_once '../Objects/brand.php';


$database = new Database();
$db = $database->getConnection();

$brand = new Brand($db);
$brand->id = $_GET['id'];


$brand->readOne();
if ($brand->name != null) {

    $brand_arr = array(
        "id" => $brand->id,
        "name" => $brand->name,
        "image"=>$brand->image,


    );

    http_response_code(200);
    echo json_encode($brand_arr);

} else {

    http_response_code(404);
    echo json_encode(array("message" => "Brand does not exist."));
}
?>