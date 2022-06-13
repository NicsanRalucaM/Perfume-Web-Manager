<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// include database and object files
include_once '../Config/database.php';
include_once '../Objects/product.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$product = new Product($db);
$stmt = $product->read();
//$num =1;

// check if more than 0 record found
if(true){

    // products array
    $products_arr=array();
    $products_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $product_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,

        );

        $products_arr["records"][] = $product_item;
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
echo "da";
    echo json_encode($products_arr);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}