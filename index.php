<?php

require_once 'Controller.php';
require_once 'DataBase.php';

$table = new DataBase();
$object = new Controller();
$object->main();


