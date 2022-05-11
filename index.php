<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task17</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Форма отправки данных</h1>

<form action="Controller.php" method="POST" enctype="multipart/form-data">
    <div class="center">
        <em>файлы не более 2 мегабайт!</em>
    </div>
    <input type="file" id="fileinput" onchange='check_extension(this.value,"submit")' name="filename"><br>
    <input type="button" id="btnload" value="Размер файла" onclick=showFileSize()><br>
    <input type="submit" id="submit" name="upload" value="Загрузить" disabled="disabled"><br>

</form>
<div>
    <span>
        <?php
        if (isset($_COOKIE['name']))
        {
            echo $_COOKIE['name'];
        }
        setcookie('name','',time()-3600);
        ?>
    </span>
</div>

<script src="script.js"></script>
</body>
</html>