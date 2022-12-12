<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Загрузка файлов</title>
</head>
<body>
<form enctype="multipart/form-data" action="loader.php" method="POST">
    <div>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
    <br>
    <label for="file_field">Отправить файл:</label>
    <br>
    <input id="file_field" name="userfile" type="file"/>
    </div>
    <br>
    <input type="submit" value="Отправить файл"/>
</form>


<?php
$files = scandir('./files');
if (count($files) <= 2) {
    echo "<h2>Нет файлов</h2>";
} else {
    echo "<h3>Файлы</h3>";
    foreach ($files as $file) {
        if ($file != "." and $file != "..") {
            echo "<div class='card'><a href='./files/".$file."'>".$file."</a></div>";
        }
    }
}
?>
</body>
</html>
