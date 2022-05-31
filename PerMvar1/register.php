<?php
session_start();
include_once 'config.php';

$database=new Database();
$db=$database->getConnection();
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$errors = array();
if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $db->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        array_push($errors, "Username already exists");
    }
    if ($query->rowCount() == 0) {
        $query = $db->prepare("INSERT INTO users(firstname,lastname,email,password) VALUES (:firstname,:lastname,:email,:password_hash)");
        $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam("lastname", $lastname, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            echo '<p class="success">Your registration was successful!</p>';
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
    if(!empty($error))
    {
        header("location:register.html");
    }
    else
        header("location:login.html");

}


?>
