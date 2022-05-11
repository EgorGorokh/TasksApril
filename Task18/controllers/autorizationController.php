<?php

require_once '../models/authorizationModel.php';

ModelAuthorizzation::ConnectBD();
if (!ModelAuthorizzation::Connect()){
    setcookie('auto', 'Такой пользователь не найден ',time()+300,"/");
    header('Location: ../views/authorization.php');
} else {
    header('Location: ../index.php');
}



