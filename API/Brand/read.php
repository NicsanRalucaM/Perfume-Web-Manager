<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/brand.php';

$database = new Database();
$db = $database->getConnection();


$brand = new Brand($db);
$stmt = $brand->read();

if(true){


    $brand_arr=array();
    $brand_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $brand_item=array(
            "id" => $id,
            "name" => $name,
            "image" => $image,

        );

        $brand_arr["records"][] = $brand_item;
    }


    http_response_code(200);
    echo json_encode($brand_arr);
}
else{

    http_response_code(404);
    echo json_encode(
        array("message" => "No brands found.")
    );}
