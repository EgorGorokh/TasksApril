<?php

class Model
{
    public static $log;
    public static $errorArray = [];
    public static $validFormat = ['jpeg', 'jpg', 'gif', 'png', 'txt'];
    public static $dir = 'logs';
    public static $format;
    public static $array;
    public static $dd ;
    public static $files='files';



    static public function setFormat(){
        Model::$format=end(Model::$array);
    }

    static public function setArray()
    {
        Model::$array = explode('.', $_FILES['filename']['name']);
    }
    static public function setdd()
    {
       Model::$dd='/logs/upload_' . date('Ymd') . '.log';
    }
    static public function setlog()
    {
        Model::$log=@date('Y-m-d H:i:s') . "\t" . $_FILES['filename']['name'] . "\t" . $_FILES['filename']['size'] . "\t";
    }



    static function morecordFiles()
    {
        file_put_contents(__DIR__ . Model::$dd, Model::$log . PHP_EOL, FILE_APPEND);
    }

    static function meta()
    {
        if (count(Model::$errorArray) > 0) {
            setcookie('name', 'файл не был загружен!', time() + 3600);
            for ($i = 0; $i < count(Model::$errorArray); $i++) {
                echo Model::$errorArray[$i] . '<br>';
                setcookie('name',Model::$errorArray[0]);
            }
        } else {
            if (move_uploaded_file($_FILES['filename']['tmp_name'], 'files/' . $_FILES['filename']['name'])) {
                $w1 = $_FILES['filename']['type'];
                $w2 = $_FILES['filename']['size'];
                $w3 = $_FILES['filename']['name'];
                setcookie('name', 'Файл загружен!' . '<br>' . 'Размер файла:' . $w2 . '<br>' . 'Имя файла:' . $w3 . '<br>' . 'Мето:' . $w1);
            }
        }
    }

    static function fileIn600()
    {
        if (Model::$format == 'jpeg') {
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

    static function coatingWatermark()
    {
        if (Model::$format == 'jpeg') {
            $filename = 'files/' . $_FILES['filename']['name'];
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

    static function fileIn50()
    {
        if (Model::$format == 'jpeg') {
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
            $path_parts = pathinfo($filename);
            imagejpeg($thumb, $dir_thumbnails . '/' . $path_parts['filename'] . '_50.' . $path_parts['extension']);
        }
    }
}