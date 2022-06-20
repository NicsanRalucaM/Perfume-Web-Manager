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
$order->product4 = $_GET['product4'];
$order->product5 = $_GET['product5'];
$order->product6 = $_GET['product6'];
$order->product7 = $_GET['product7'];
$order->product8 = $_GET['product8'];
$order->product9 = $_GET['product9'];
$order->product10 = $_GET['product10'];
$order->address = $_GET['address'];
$order->user=1;//$_COOKIE['id'];
$stmt = $order->post();
echo $stmt;