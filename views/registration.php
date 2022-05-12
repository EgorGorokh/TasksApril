<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Task18_Registration</title>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Форма регистрации</h1>


            <form action="../controllers/registrationController.php" method="post">
                <?php
                if (!isset($_COOKIE['registr'])) {
                    echo '
                <input type="text" class="form-control" name="name" id="name" placeholder="Имя" required="required"> <label for="name">имя</label> <br><br>
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Фамилия" required="required"> <label for="surname">фамилия</label><br><br>
                <input type="email" class="form-control" name="email" id="email" placeholder="email" required="required"><label for="email">email</label> <br><br>
                <input type="email" class="form-control" name="confirmation_email" id="confirmation_email" placeholder="Подтвердите email" required="required"><label for="confirmation_email">подтвердить email</label><br><br>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль" required="required"> <label for="pass">пароль</label><br><br>
                <input type="password" class="form-control" name="confirmation_pass" id="confirmation_pass" placeholder="Подтвердите пароль" required="required"> <label for="confirmation_pass">подтвердить пароль</label><br><br>
                <button type="submit"  name="submit" onclick="erasingEmail()">Зарегестрироваться</button>
                
                ';
                } else {
                    $name= $_COOKIE['name'];
                    $surname= $_COOKIE['surname'];
                    $email= $_COOKIE['email'];
                    echo '
                <input type="text" class="form-control" name="name" id="name" placeholder="Имя" required="required" value='.$name.'> <label for="name">имя</label> <br><br>
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Фамилия" required="required" value='.$surname.'> <label for="surname">фамилия</label><br><br>
                <input type="email" class="form-control" name="email" id="email" placeholder="email" required="required" value='.$email.'><label for="email" >email</label> <br><br>
                <input type="email" class="form-control" name="confirmation_email" id="confirmation_email" placeholder="Подтвердите email" required="required" value='.$email.'><label for="confirmation_email">подтвердить email</label><br><br>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль" required="required"> <label for="pass">пароль</label><br><br>
                <input type="password" class="form-control" name="confirmation_pass" id="confirmation_pass" placeholder="Подтвердите пароль" required="required"> <label for="confirmation_pass">подтвердить пароль</label><br><br>
                <button type="submit"  name="submit" onclick="erasingEmail()">Зарегестрироваться</button> ';
                } ?>

            </form>


        </div>
    </div>
</div>
<div >
    <?php
    if (isset($_COOKIE['registr'])) {
        echo $_COOKIE['registr'];
    }
    setcookie('registr', '', time() - 3600);
    ?>
</div>
<script src="../js/registration.js"></script>
<script src="js/jq.js"></script>
</body>
</html>