<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/itemCart.php';

$database = new Database();
$db = $database->getConnection();


$item = new itemFav($db);
$item->user =6;// $_COOKIE['id'];
$stmt = $item->count();
echo $stmt;


