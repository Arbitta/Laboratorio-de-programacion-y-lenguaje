<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Operadores con PHP</h1></header>
    <?php
    $val1 = 15;
    $val2 = 10;
    $val3 = 1;
    $val4 = 0;
    echo "<br>Val1 = ".$val1;
    echo "<br>Val2 = ".$val2;
    echo "<br>Val3 = ".$val3;
    echo "<br>Val4 = ".$val4;
    if ($val1 == $val2) {
        echo "<br> val1 es igual a val2";
    } else {
        echo "<br> val1 es distinto a val2";
    };
    ?>
</body>
</html>