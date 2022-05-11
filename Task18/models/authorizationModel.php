<?php

class ModelAuthorizzation
{

    public static function ConnectBD()
    {
        global $email, $password,  $result, $user,$mysql;
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
        $password = md5($password . 'egor12345');
        $mysql = new mysqli('localhost', 'root', 'root', 'Task15');
        $result = $mysql->query("SELECT * FROM `users` WHERE `email` ='$email' AND `password`='$password'");
        $user = $result->fetch_assoc();
    }

    public static function Connect()
    {
        global $user;
        global $email;
        global $mysql;
        if (count($user) == 0) {
            setcookie('auto', 'Такой пользователь не найден',time()+300,"/");
            setcookie('email', $email,"/");
            $mysql->close();
            return false;
        } else {
            setcookie('user1', $user['last_name'], time() + 300, "/");
            $mysql->close();
            return true;
        }
    }
}

