<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto 1</title>
</head>
<body>
    <header><h1>Punto 1</h1></header>
    <?php
    $num1 = range(0,1000);
    include_once("script1.php");
    $objeto = new script1($num1);
    $objeto ->par();
    $objeto -> impar();
    $objeto -> primos();
    ?>
</body>
</html>