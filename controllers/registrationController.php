<?php

require_once '../models/registrationModel.php';


registrationModel::con();
registrationModel::checkPass();
registrationModel::checkcConfirmationPass();
registrationModel::checkcConfirmationEmail();
registrationModel::checkcEmail();
registrationModel::checkcLetterOfPass();
registrationModel::checkcBigLetterOfPass();
registrationModel::checkcNumberOfPass();
registrationModel::checkcSpecialSymbolOfPass();

registrationModel::hash();
registrationModel::bd();

if (mysqli_query(registrationModel::$mysql)) {
    setcookie('registr', 'Ошибка при добавлении данных!', '/');
} else {
    if (count(registrationModel::$errorArr) > 0) {
        setcookie('registr', registrationModel::$errorArr[0], time() + 300, "/");
        setcookie('name', registrationModel::$name, time() + 300, "/");
        setcookie('surname', registrationModel::$surname, time() + 300, "/");
        setcookie('email', registrationModel::$email, time() + 300, "/");
        registrationModel::$mysql->close();
        header('Location: ../views/registration.php');
    } else {
        setcookie('user1', registrationModel::$surname, time() + 300, "/");
        registrationModel::$mysql->close();
        header('Location: ../views/registration.php');
    }
}
