<?php

session_start();
include_once '../API/Config/database.php';

$database = new Database();
$db = $database->getConnection();

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$ok = true;
$messages = array();
if (empty($email)) {
    $ok = false;
    $messages[] = 'Email cannot be empty!';
}

if (empty($password)) {
    $ok = false;
    $messages[] = 'Password cannot be empty!';
}
if ($ok) {
    $query = $db->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        $ok = false;
        $messages[] = 'Email doesn`t exists';
    } else {
        if (password_verify($password, $result['password'])) {
            $ok = true;
            $_SESSION['user_id'] = $result['id'];
            $cookie_value = $result['id'];
            setcookie("id", $cookie_value, time() + (86400 * 30), "/");

        } else {
            $ok = false;
            $messages[] = 'Email password combination is wrong!';

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


