<?php
include_once 'config.php';

$database=new Database();
$db=$database->getConnection();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $db->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Email password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            header("location: news.html");
        } else {
            echo '<p class="error">Email password combination is wrong!</p>';
            header("location: login.html");
        }
    }
}
?>
