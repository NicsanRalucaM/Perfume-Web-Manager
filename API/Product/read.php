<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/product.php';

$database = new Database();
$db = $database->getConnection();


$product = new Product($db);
$stmt = $product->read();

if(true){


    $products_arr=array();
    $products_arr["records"]=array();
    $i=-1;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "brand_id" => $brand_id,
            "image_1"=>$image_1,

        );
        $i=$i+1;
      //  console.log($product_item->id);
        $products_arr["records"][$i] = $product_item;
    }


    http_response_code(200);
    echo json_encode($products_arr);
}
else{

    http_response_code(404);
    echo json_encode(
        array("message" => "No products found.")
    );
}