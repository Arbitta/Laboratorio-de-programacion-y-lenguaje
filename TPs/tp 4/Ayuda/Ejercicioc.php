<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Calculo de numero</h1></header>
    <?php
    $num1 = 10;
    $num2 = 11;
    $potencia = 1;
    $cociente = 0;
    $resto = 0;
    echo "Numero 1: ".$num1;
    echo "<br>Numero 2: ".$num2;
    if ($num1 > $num2){
        for ($i = 0; $i < $num2; $i++){
            $potencia *= $num1;
        }
        echo "<br>Potencia: ".$potencia;
    } else {
        $dividendo = $num2;
        while ($dividendo >= $num1){
            $dividendo-= $num1;
            $cociente++;
        }
        $resto = $dividendo;
        echo "<br>Cociente: ".$cociente;
        echo "<br>Resto: ".$resto;
    };
    ?>
</body>