<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/itemCart.php';
include_once '../Objects/product.php';

$database = new Database();
$db = $database->getConnection();


$item = new itemCart($db);
$product = new Product($db);
$item->product = $_GET['product'];
// $item->user = $_GET['user'];
$product->id = $_GET['product'];
$item->user = $_COOKIE['id'];

$item->price=$product->getPrice();

if ($item->count() < 10) {
    if ($item->getProdCurCount() < $product->getStock()) {
        $stmt = $item->post();
        echo json_encode($stmt);
    } else
        echo "stock empty";

}else
    echo "limit 10 products";