<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio G</title>
</head>
<body>
    <header><h1>Ejercicio G</h1></header>
    <?php
    $num1 = 3;
    $num2 = 5;
    $vec_potencia = array();
    echo $num1."<br>";
    echo $num2."<br><br>";
    for ($i = 0; $i < $num2; $i++) {
        $vec_potencia[] = $num1 **$i. " ";
    };

    foreach ($vec_potencia as $key => $value) {
        echo $value;
    }
    ?>
</body>
</html>