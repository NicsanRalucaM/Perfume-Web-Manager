<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';

include_once '../Objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$product->id = $_GET['product'];
if ($product->getStock() == 0)
    echo 0;
else {
    $stmt = $product->decreasesStock();
    echo $stmt;
}


