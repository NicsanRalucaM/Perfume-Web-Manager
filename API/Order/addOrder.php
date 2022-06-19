<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/order.php';

$database = new Database();
$db = $database->getConnection();


$order = new Order($db);
$order->email=$_GET['email'];
$order->name=$_GET['name'];
$order->price=$_GET['price'];
$order->product1=$_GET['product1'];
$order->product2 = $_GET['product2'];
$order->product3 = $_GET['product3'];
$order->address = $_GET['address'];
$order->user=1;//$_COOKIE['id'];
$stmt = $order->post();
echo $stmt;