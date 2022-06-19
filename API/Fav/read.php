<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Config/database.php';
include_once '../Objects/itemFav.php';

$database = new Database();
$db = $database->getConnection();


$fav = new itemFav($db);
$fav->user= $_GET['id'];
$stmt = $fav->readUser();

if(true){


    $favs_arr=array();
    $favs_arr["records"]=array();
    $i=-1;


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $fav_item=array(
            "id" => $id,
            "user" => $user,
            "product" => $product,


        );

        $i=$i+1;
        //  console.log($fav_item->id);
        $favs_arr["records"][$i] = $fav_item;
    }


    http_response_code(200);
    echo json_encode($favs_arr);
}
else{

    http_response_code(404);
    echo json_encode(
        array("message" => "No favs found.")
    );
}