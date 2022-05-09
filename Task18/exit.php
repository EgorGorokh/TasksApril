<?php

$name=$_COOKIE['user1'];
setcookie('user1', '', time() - 3600, "/");

header('Location: index.php');