<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/itemCart.php';

$database = new Database();
$db = $database->getConnection();


$cart = new itemCart($db);
$cart->user= $_GET['id'];
$stmt = $cart->readUser();

if(true){


    $carts_arr=array();
    $carts_arr["records"]=array();
    $i=-1;


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $cart_item=array(
            "id" => $id,
            "user" => $user,
            "product" => $product,
           

        );

        $i=$i+1;
        //  console.log($cart_item->id);
        $carts_arr["records"][$i] = $cart_item;
    }


    http_response_code(200);
    echo json_encode($carts_arr);
}
else{

    http_response_code(404);
    echo json_encode(
        array("message" => "No carts found.")
    );
}