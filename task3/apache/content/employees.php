<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сотрудники ресторана</title>
</head>
<body>
<b>Список работников ресторана: </b>
<ol>
    <?php
    $mysqli = new mysqli("db", "root", "example", "appDB");
    $result = $mysqli->query("SELECT * FROM employee");
    foreach ($result as $row){
        echo "<li>{$row['name']} {$row['job']}</li>";
    }
    ?>
</ol>
<a href="index.html">На главную</a>
<br>
<a href="admin/admin.php">Админам сюда</a>
</body>
</html>