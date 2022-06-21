<?php

include_once '../API/Config/database.php';

$database = new Database();
$db = $database->getConnection();

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$password_hash = password_hash($password, PASSWORD_BCRYPT);
$ok = true;
$messages = array();

if ( empty($firstname)) {
    $ok = false;
    $messages[] = 'First name cannot be empty!';
}
if (empty($lastname)) {
    $ok = false;
    $messages[] = 'Last name cannot be empty!';
}
if ( empty($email)) {
    $ok = false;
    $messages[] = 'First name cannot be empty!';
}

if (empty($password)) {
    $ok = false;
    $messages[] = 'Password cannot be empty!';
}

if ($ok) {
    $query = $db->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        $ok = false;
        $messages[] = 'Email already exists';
    } else {
        $query = $db->prepare("INSERT INTO users(firstname,lastname,email,password) VALUES (:firstname,:lastname,:email,:password_hash)");
        $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $result = $query->execute();
        if (!$result) {
            $ok = false;
            $messages[] = 'Something went wrong!';

        }
    }
}
echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    )
);


?>