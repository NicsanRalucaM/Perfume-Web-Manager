<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/itemCart.php';
include_once '../Objects/product.php';

$database = new Database();
$db = $database->getConnection();


$item = new itemCart($db);
$item->product = $_GET['product'];
$item->user=$_COOKIE['id'];
$stmt = $item->post();


echo json_encode($stmt);


