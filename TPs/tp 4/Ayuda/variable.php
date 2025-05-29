<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>variable con PHP</h1>
    </header>
    <?php
    $val1 = 5;
    $val2 = 6;
    $val3 = 7;
    echo 'el valor de la val1: '.$val1;
    echo '<br>El valor de la val2: '.$val2;
    echo '<br>El valor de val3: '.$val3;
    $val1 = 'padalustro';
    echo '<br> Ahora mi val1 dice esto: '.$val1;
    $val3 += $val2;
    echo '<br>La suma de val2 y val3: '.$val3;
    $val1 .= $val3;
    echo '<br> la concatenacion de val1 con val3: '.$val1;
    ?>
</body>
</html>