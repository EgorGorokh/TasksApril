<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Форма аутентификации</h1>

<?php
if (!isset($_COOKIE['auto'])) {
    echo '
<form action="../controllers/autorizationController.php" method="POST" enctype="multipart/form-data">
    <input type="email" class="form-control" name="email" id="email" placeholder="Введите email"
           required="required"><br>
    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"
           required="required"><br>
    <button class="btn btn-success" type="submit" id="submit">Авторизоваться</button>
</form>
';
} else {
    $email = $_COOKIE['email'];
    echo '<form action="../controllers/autorizationController.php" method="POST" enctype="multipart/form-data">
    <input type="email" class="form-control" name="email" id="email" placeholder="Введите email"
           required="required" value=' . $email . '><br>
    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"
           required="required"><br>
    <button class="btn btn-success" type="submit" id="submit">Авторизоваться</button>
</form>';
} ?>

<div>
    <?php
    if (isset($_COOKIE['auto'])) {
        echo $_COOKIE['auto'];
    }
    setcookie('auto', '', time() - 3600);
    ?>
</div>

<script src="../js/authorization.js"></script>
</body>
</html>

