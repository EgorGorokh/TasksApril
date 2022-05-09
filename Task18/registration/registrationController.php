<?php

require_once 'checks.php';

$name = filter_var(
    trim($_POST['name']),
    FILTER_SANITIZE_STRING
);
$surname = filter_var(
    trim($_POST['surname']),
    FILTER_SANITIZE_STRING
);
$pass = filter_var(
    trim($_POST['pass']),
    FILTER_SANITIZE_STRING
);
$confirmationPass = filter_var(
    trim($_POST['confirmation_pass']),
    FILTER_SANITIZE_STRING
);
$email = filter_var(
    trim($_POST['email']),
    FILTER_SANITIZE_STRING
);
$confirmationEmail = filter_var(
    trim($_POST['confirmation_email']),
    FILTER_SANITIZE_STRING
);

Checks::checkPass($pass);
Checks::checkcConfirmationPass($pass, $confirmationPass);
Checks::checkcConfirmationEmail($email, $confirmationEmail);
Checks::checkcEmail($email);
Checks::checkcLetterOfPass($pass);
Checks::checkcBigLetterOfPass($pass);
Checks::checkcNumberOfPass($pass);
Checks::checkcSpecialSymbolOfPass($pass);
$pass = md5($pass . 'egor12345');

$mysql = new mysqli('localhost', 'root', 'root', 'Task15');
$mysql->query("INSERT INTO `users` (`email`,`first_name`,`last_name`,`password`)
VALUES ('$email','$name','$surname','$pass')");


if (mysqli_query($mysql)) {
    setcookie('registr', 'Ошибка при добавлении данных!');
} else {
    if (count(Checks::$errorArr) > 0) {
        setcookie('registr', Checks::$errorArr[0]);
        $mysql->close();
        header('Location: registration.php');
    } else {
        setcookie('user1', $surname, time() + 30, "/");
        $mysql->close();
        header('Location: ../index.php');
    }
}






