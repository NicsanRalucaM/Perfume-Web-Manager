<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../Config/database.php';
include_once '../Objects/category.php';


$database = new Database();
$db = $database->getConnection();

$category = new Category($db);
$category->id = $_GET['id'];


$category->readOne();
if ($category->name != null) {

    $category_arr = array(
        "id" => $category->id,
        "name" => $category->name,
        "image"=>$category->image,


    );

    http_response_code(200);
    echo json_encode($category_arr);

} else {

    http_response_code(404);
    echo json_encode(array("message" => "Category does not exist."));
}
?>