<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../Config/database.php';
include_once '../Objects/product.php';
include_once '../Objects/brand.php';


$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$brand=new Brand($db);
$brand->name=$_GET['brand_name'];
$brand->readByName();
if($brand->id!=null)

$product->brand_id=$brand->id;
$stmt = $product->readByBrandId();

if(true){


    $products_arr=array();
    $products_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "brand_id" => $brand_id,
            "image_1"=>$image_1,
            "stoc"=>$stoc

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
?>
