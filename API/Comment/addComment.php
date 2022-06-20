<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/comment.php';

$database = new Database();
$db = $database->getConnection();


$comment=new Comment($db);
$comment->product=$_GET['product'];
$comment->comment=$_GET['comment'];
$comment->name=$_GET['name'];
$stmt = $comment->post();
echo $stmt;