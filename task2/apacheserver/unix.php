<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unix</title>
</head>
<body>
<?php
function print_command($command) {
    $lines = array();
    exec($command, $lines);
    echo "<pre> > ".$command."</pre>";
    echo "<pre>".implode("\n", $lines)."</pre>";
}

$command_list = array("ls", "ps", "whoami", "id");
foreach ($command_list as $command) {
    print_command($command);
}
?>
</body>
</html>