<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Официанты ресторана</title>
</head>
<body>
<b>Список официантов ресторана: </b>
<ol>
    <?php
    $mysqli = new mysqli("db", "root", "example", "appDB");
    $result = $mysqli->query("SELECT * FROM employee WHERE job='Waiter' ");
    foreach ($result as $row){
        echo "<li>{$row['name']} </li>";
    }
    ?>
</ol>
<a href="index.html">На главную страницу</a>
<br>
<a href="admin/admin.php">Страница администратора</a>
</body>
</html>