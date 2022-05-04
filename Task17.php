<?php

$errorArray = [];
$validFormat = ['jpeg', 'jpg', 'gif', 'png', 'txt'];
$array = explode('.', $_FILES['filename']['name']);
$format = end($array);
$err = 0;
$dir = 'logs';
$dd = '/logs/upload_' . date('Ymd') . '.log';
$log = @date('Y-m-d H:i:s') . "\t" . $_FILES['filename']['name'] . "\t" . $_FILES['filename']['size'] . "\t";

function recordFiles()
{
    global $dd, $log;
    file_put_contents(__DIR__ . $dd, $log . PHP_EOL, FILE_APPEND);
}

function meta()
{
    global $errorArray;
    if (count($errorArray) > 0) {
        echo 'файл не был загружен!' . '<br>';
        for ($i = 0; $i < count($errorArray); $i++) {
            echo $errorArray[$i] . '<br>';
        }
    } else {
        if (move_uploaded_file($_FILES['filename']['tmp_name'], 'files/' . $_FILES['filename']['name'])) {
            //echo 'Файл загружен!<br>';
            // echo 'Размер файла:' . $_FILES['filename']['size'] / (1024) . 'mb<br>';
            // echo 'Имя файла:' . $_FILES['filename']['name'] . '<br>';
            //  echo 'Мето:' . $_FILES['filename']['type'] . '<br>';
            $w1 = $_FILES['filename']['type'];
            $w2 = $_FILES['filename']['size'];
            $w3 = $_FILES['filename']['name'];

            echo <<<EOT
           <br>
            Файл загружен! 
            <br>
            Размер файла:"$w1"
            <br>
            Имя файла:"$w2"
            <br>
             Мето:"$w3"
           EOT;

        }
    }
}

//------------ изменяем разрешение до 600px
function fileIn600()
{
    global $format, $filename;
    if ($format == 'jpeg') {
        $filename = 'files/' . $_FILES['filename']['name'];
        list($width, $height) = getimagesize($filename);
        $newWidth = 600;
        $newHeight = 600;
        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        $source = imagecreatefromjpeg($filename);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $dir600 = 'files600';
        if (!is_dir($dir600)) {
            mkdir('files600');
        }
        imagejpeg($thumb, $dir600 . '/new' . $_FILES['filename']['name']);
    }
}

// водяной
function water()
{
    global $format, $filename;
    if ($format == 'jpeg') {


        $im = imagecreatefromjpeg($filename);
        $stamp = imagecreatetruecolor(100, 70);
        imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
        imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
        imagestring($stamp, 5, 20, 20, 'Innowise', 0x0000FF);
        imagestring($stamp, 3, 20, 40, 'Minsk', 0x0000FF);
        $margeRight = 10;
        $margeBottom = 10;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);
        imagecopymerge($im, $stamp, imagesx($im) - $sx - $margeRight, imagesy($im) - $sy - $margeBottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);
        $path_parts = pathinfo($filename);
        $dirWaterMark = 'fileswatermark';
        if (!is_dir($dirWaterMark)) {
            mkdir('fileswatermark');
        }
        imagepng($im, $dirWaterMark . '/' . $path_parts['filename'] . '.png');
        imagedestroy($im);
    }
}

//делаем миниатюру в 50 пикселей
function fileIn50()
{
    global $format;

    if ($format == 'jpeg') {
        $filename = 'files/' . $_FILES['filename']['name'];
        list($width, $height) = getimagesize($filename);
        if ($width > $height) {
            $count = $width / $height;
            $newWidth = 50;
            $newHeight = 50 / $count;
        } else {
            $count = $height / $width;
            $newHeight = 50;
            $newWidth = 50 / $count;
        }
        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        $source = imagecreatefromjpeg($filename);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $dir_thumbnails = 'thumbnails';
        if (!is_dir($dir_thumbnails)) {
            mkdir('thumbnails');
        }
        $path_parts = pathinfo($filename);;
        imagejpeg($thumb, $dir_thumbnails . '/' . $path_parts['filename'] . '_50.' . $path_parts['extension']);
    }
}
