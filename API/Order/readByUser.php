<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../Config/database.php';
include_once '../Objects/order.php';


$database = new Database();
$db = $database->getConnection();

$order = new order($db);
$order->user = $_GET['user'];


$stmt=$order->read();
if (true) {

    $orders_arr=array();
    $orderss_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $order_item=array(
            "id" => $id,
            "name" => $name,
            "address" =>$address,
            "price" =>$price,
            "email" =>$email,
            "user" =>$user,
            "product1" =>$product1,
            "product2" =>$product2,
            "product3" =>$product3,
            "product4" =>$product4,
            "product5" =>$product5,
            "product6" =>$product6,
            "product7" =>$product7,
            "product8" =>$product8,
            "product9" =>$product9,
            "product10" =>$product10

        );

        $orders_arr["records"][] = $order_item;
    }


    http_response_code(200);
    echo json_encode($orders_arr);

} else {

    http_response_code(404);
    echo json_encode(array("message" => "order does not exist."));
}
?>
