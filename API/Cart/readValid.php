<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/itemCart.php';
include_once '../Objects/product.php';

$database = new Database();
$db = $database->getConnection();


$cart = new itemCart($db);
$product = new Product($db);
$cart->user = $_GET['id'];
$stmt = $cart->readDistinct();
$verif=0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $product->id = $row['id'];
    if ($product->getStock() < $row['nr'])
        $verif=1;
}
echo $verif;

