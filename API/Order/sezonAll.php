<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/product.php';
include_once '../Objects/brand.php';
include_once '../Objects/order.php';

$database = new Database();
$db = $database->getConnection();

$brand = new Brand($db);

$product = new Product($db);
$order = new Order($db);
$anot = array();
$anot["seasons"] = array();
$vec = array("summer", "winter", "spring", "autumn");

for ($i = 0; $i < 4; $i++) {
    $product->anotimp = $vec[$i];

    $stmt = $product->readByAnotimp();
    if (true) {
        $products_arr = array();
        $products_arr["records"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $brand->id = $brand_id;
            $order->val = $id;
            $product_item = array(
                "id" => $id,
                "name" => $name,
                "brand_id" => $brand_id,
                "price" => $price,
                "stoc" => $stoc,
                "brand" => $brand->getName(),
                "nr" => $order->readProductsVal()

            );

            $products_arr["records"][] = $product_item;

        }
    }

    $anot['seasons'][]=array(
        "season"=>$vec[$i],
         "products"=>$products_arr);

}
echo json_encode($anot);

