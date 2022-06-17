<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../Config/database.php';
include_once '../Objects/product.php';


$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$product->id = $_GET['id'];


$product->readOne();
if ($product->name != null) {

    $product_arr = array(
        "id" => $product->id,
        "name" => $product->name,
        "description" => $product->description,
        "price" => $product->price,
        "brand_id" => $product->brand_id,
        "ingredient1" => $product->ingredient1,
        "ingredient2" => $product->ingredient2,
        "ingredient3" => $product->ingredient3,
        "ingredient4" => $product->ingredient4,
        "image_1" => $product->image_1,

    );

    http_response_code(200);
    echo json_encode($product_arr);

} else {

    http_response_code(404);
    echo json_encode(array("message" => "Product does not exist."));
}
?>
