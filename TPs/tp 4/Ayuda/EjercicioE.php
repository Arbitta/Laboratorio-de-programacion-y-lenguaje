<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio E</title>
</head>
<body>
    <header><h1>Ejercicio E</h1></header>
    <?php
    srand((double)microtime() *1000000);
    $a = rand(0,3);
    $b = rand(0,3);
    ($a == $b)? ($mensaje = "$a = $b"): ($mensaje = "$a != $b");
    echo $mensaje;
    ?>
    <?php
    srand((double)microtime() *1000000);
    $d = $c = $b = $a = rand(0,10);
    echo '$a = '.$a;
    echo '$<br>$b = ',$b;
    echo '$<br>$c = ',$c;
    echo '$<br>$d = ',$d;
    ?>
</body>
</html>