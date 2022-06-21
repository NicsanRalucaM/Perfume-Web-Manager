<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/user.php';
include_once '../Objects/product.php';
include_once '../Objects/brand.php';
include_once '../Objects/order.php';

$database = new Database();
$db = $database->getConnection();

$brand = new Brand($db);
$user = new User($db);
$order = new Order($db);

$productt1 = new Product($db);
$productt2 = new Product($db);
$productt3 = new Product($db);
$productt4 = new Product($db);
$productt5 = new Product($db);
$productt6 = new Product($db);
$productt7 = new Product($db);
$productt8= new Product($db);
$productt9 = new Product($db);
$productt10 = new Product($db);

$stmt2 = $user->getId();
$orders_arr = array();
$orders_arr["records"] = array();
$ord=array();

while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $order->user = $user_id;
    $ord=array(
        "firstName"=>$user_firstname,
        "lastName"=>$user_lastname);


    $stmt = $order->read();
    if (true) {

        $ords = array();
        $ords["orders"] = array();



        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $productt1->id=$product1;

            $order_item = array(
                "id_comanda" => $id,

                "p1" => $productt1->getName(),
                "p2" => $productt2->getName(),
                "p3" => $productt3->getName(),
                "p4" => $productt4->getName(),
                "p5" => $productt5->getName(),
                "p6" => $productt6->getName(),
                "p7" => $productt7->getName(),
                "p8" => $productt8->getName(),
                "p9" => $productt9->getName(),
                "p10" => $productt10->getName()


            );

            $ords["orders"][] = $order_item;
        }
        $ord[3]=$ords;


    }
    $orders_arr['records'][] = $ord;
}
echo json_encode($orders_arr);
