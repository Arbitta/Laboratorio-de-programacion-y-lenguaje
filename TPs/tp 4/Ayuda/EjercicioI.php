<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio I</title>
</head>
<body>
    <header><h1>Ejercicio I</h1></header>
    <?php 
    include_once("calculadora.php");
    $val1 = array(2,-3);
    $val2 = array(3,-4);
    $cuenta = new Calculadora($val1,$val2);
    $cuenta -> binomica();
    $cuenta -> modulo();
    $cuenta -> conjugado();
    $cuenta ->suma();
    ?>
</body>
</html>