<?php

$email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
$password = md5($password . 'egor12345');
$mysql = new mysqli('localhost', 'root', 'root', 'Task15');


$result = $mysql->query("SELECT * FROM `users` WHERE `email` =
'$email' AND `password`='$password'");

$user = $result->fetch_assoc();

if (count($user) == 0) {
    setcookie('auto', 'Такой пользователь не найден ');
    setcookie('email', $email);
    $mysql->close();
    header('Location: authorization.php');
} else {
    setcookie('user1', $user['last_name'], time() + 30, "/");
    $mysql->close();
    header('Location: ../index.php');
}
