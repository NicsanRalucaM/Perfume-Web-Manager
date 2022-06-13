
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../Config/database.php';
include_once '../Objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$user = new user($db);

// set ID property of record to read
$user->id = $_GET['id'];


$user->readOne();
if($user->firstname!=null){
// create array
$product_arr = array(
"id" =>  $user->id,
"firstname" => $user->firstname,
"lastname" => $user->lastname,
"email" => $user->email
);

// set response code - 200 OK
http_response_code(200);

// make it json format

echo $user->firstname;

}

else{

// set response code - 404 Not found
http_response_code(404);

// tell the user product does not exist
echo json_encode(array("message" => "Product does not exist."));
}
?>