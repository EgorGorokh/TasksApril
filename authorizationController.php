<?php

require_once 'authorizationModel.php';

ModelAuthorizzation::ConnectBD();
if (!ModelAuthorizzation::Connect()){
    setcookie('auto', 'Такой пользователь не найден ',time()+300,"/");
    header('Location: authorization.php');
} else {
    header('Location: authorization.php');
}