<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/itemFav.php';

$database = new Database();
$db = $database->getConnection();


$item = new itemFav($db);
$item->product = $_GET['product'];
$item->user=$_COOKIE['id'];
$stmt = $item->post();
echo $stmt;

