<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Draw</title>
//     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h3>Практическая работа 2, часть 1</h3>
<?php
if (isset($_GET['num'])) {
    /*
    num = b'sscccaa'
    s - shape
    c - color
    a - size
    */
    $num = $_GET['num'];
    $size = ($num & 3) + 1;
//     $size = ($num & 131) << 2;
    $red = ($num >> 4) & 1;
    $green = ($num >> 3) & 1;
    $blue = ($num >> 2) & 1;
    $shape = ($num >> 5);
    $color = "\"#".($red == 1 ? "ff" : "00").($green == 1 ? "ff" : "00").($blue == 1 ? "ff" : "00")."\"";
    $shape_tag = "";
    $scale = 50;
    echo "<h4>Цвет фигуры: ".$color."</h4>";
    switch ($shape) {
        case 0:
            $r = ($size * $scale / 2);
            $shape_tag = "circle cx=".($r + 50)." cy=".($r + 50)." r=".$r." ";
            break;
        case 1:
            $shape_tag = "rect x=50 y=50 width=".($size * $scale * 2)." height=".($size * $scale)." ";
            break;
        case 2:
            $shape_tag = "rect x=50 y=50 width=".($size * $scale)." height=".($size * $scale)." ";
            break;
        case 3:
            $side = $size * $scale / 2;
            $shape_tag = "polygon points='".($side * 2).",0 ".($side).",".($side)." ".($side*2).",".($side*2)." ".($side*3).",".($side)."'";
    }
    echo "<h3>".$shape_tag."</h3>";
    echo "<svg width='1500' height='1500'>";
    echo "  <".$shape_tag."fill=".$color." style='stroke:black' />";
    echo "</svg>";
} else {
    echo "<p>Задайте число от 0 до 127 в параметре, чтобы нарисовать фигуру</p>
<pre>
    http:localhost:8080/drawer.php?num=...
</pre>";
}
?>
</body>
</html>