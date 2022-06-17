<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../Config/database.php';
include_once '../Objects/product.php';
include_once '../Objects/category.php';


$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$category=new Category($db);
$category->name=$_GET['category_name'];
$category->readByName();
if($category->id!=null)

$product->category_id=$category->id;
$stmt = $product->readByCategoryId();

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
            "category_id" => $category_id,
            "image_1"=>$image_1,

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
