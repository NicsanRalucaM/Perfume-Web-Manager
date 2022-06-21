<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/product.php';
include_once '../Objects/brand.php';
include_once '../Objects/order.php';

$database = new Database();
$db = $database->getConnection();

$brand=new Brand($db);

$product = new Product($db);
$order =new Order($db);

$product->anotimp= $_GET['sez'];
$stmt = $product->readByAnotimp();
if(true){


    $products_arr=array();
    $products_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $brand->id=$brand_id;
        $order->val=$id;
        $product_item=array(
            "id" => $id,
            "name" => $name,
            "brand_id" => $brand_id,
            "stoc" => $stoc,
            "brand" => $brand->getName(),
            "nr" => $order->readProductsVal()

        );

        $products_arr["records"][] = $product_item;
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