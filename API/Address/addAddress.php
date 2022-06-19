<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/address.php';

$database = new Database();
$db = $database->getConnection();


$address=new Address($db);
$address->address=$_GET['address'];
$address->state=$_GET['state'];
$address->city=$_GET['city'];
$address->zip=$_GET['zip'];
$address->time=$_GET['time'];
$address->user=1;//$_COOKIE['id'];
$stmt = $address->post();
echo $stmt;