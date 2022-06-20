<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../Config/database.php';
include_once '../Objects/comment.php';


$database = new Database();
$db = $database->getConnection();

$comment = new Comment($db);
$comment->product = $_GET['product'];
$stmt=$comment->readData();
if (true) {



    $com_arr=array();
    $com_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $comment_item = array(
            "product"=>$product,
            "comment" => $comment,
            "name" => $name

        );


        $com_arr["records"][] = $comment_item;
    }
    http_response_code(200);
    echo json_encode($com_arr);

} else {

    http_response_code(404);
    echo json_encode(array("message" => "comment does not exist."));
}
?>
