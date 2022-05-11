<?php

require_once "../models/sendingModel.php";

class sendingController
{
    static function checks()
    {
        if (!in_array(sendingModel::$format, sendingModel::$validFormat)) {
            sendingModel::$errorArray[]='Формат файла не допустимый!';
        }

        if ($_FILES['filename']['size'] > 2 * 1024 * 1024) {
            sendingModel::$errorArray[]='Размер файла превышает 2 мегабайта!';
        }

        if (is_executable($_FILES['filename']['tmp_name'])) {
            sendingModel::$errorArray[]='Файл является исполняемым!';
        }
    }

    static function checkFile()
    {
        if (!is_dir(sendingModel::$files)) {
            @mkdir('files');
        }
    }

    static function checkPlace()
    {
        if ((disk_free_space('files/')) < $_FILES['filename']['size']) {
            sendingModel::$errorArray[]='Недостаточно места для сохранения!';
        }
    }

    static function checkLog()
    {
        if (!is_dir(sendingModel::$dir)) {
            mkdir('logs');
        }
    }
}

sendingModel::setArray();
sendingModel::setFormat();
sendingModel::setdd();
sendingModel::setlog();
sendingController::checks();
sendingController::checkFile();
sendingController::checkPlace();
sendingController::checkLog();
sendingModel::morecordFiles();
sendingModel::meta();
sendingModel::fileIn600();
sendingModel::coatingWatermark();
sendingModel::fileIn50();

header('Location: ../views/sending.php');