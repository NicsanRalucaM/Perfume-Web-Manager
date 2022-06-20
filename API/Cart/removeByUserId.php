<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/itemCart.php';

$database = new Database();
$db = $database->getConnection();


$item = new itemCart($db);
$item->user = $_GET['user'];
$stmt = $item->removeByUser();
echo json_encode($stmt);


