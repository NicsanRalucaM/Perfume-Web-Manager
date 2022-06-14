<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/category.php';

$database = new Database();
$db = $database->getConnection();


$category = new Category($db);
$stmt = $category->read();

if(true){


    $category_arr=array();
    $category_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $category_item=array(
            "id" => $id,
            "name" => $name,
            "image" => $image,

        );

        $category_arr["records"][] = $category_item;
    }


    http_response_code(200);
    echo json_encode($category_arr);
}
else{

    http_response_code(404);
    echo json_encode(
        array("message" => "No products found.")
    );}
