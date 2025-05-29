<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header><h1>Ejercicio b</h1></header>
    <?php
    $palabra = "Padalustro Cotrolano Permatrago";
     echo "palabra: ".$palabra;
     $cantidad = strlen($palabra);   
     echo "<br>Cantidad de palabra: ".$cantidad;
     $mayuscula = strtoupper($palabra);  
     echo "<br> todo mayuscula: ".$mayuscula;
     $cantA = substr_count($palabra,"a");
     echo "<br>Cantidad de a: ".$cantA;
     $invertido = strrev($palabra);
     echo "<br>Invertido: ".$invertido;
    ?>
</body>
</html>