<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/itemCart.php';

$database = new Database();
$db = $database->getConnection();


$item = new itemCart($db);
$item->id = $_GET['id'];
$item->user=1;//$_COOKIE['id'];
$stmt = $item->remove();
echo $stmt;


