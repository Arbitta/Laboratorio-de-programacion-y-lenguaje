<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto 3</title>
</head>
<body>
    <header><h1>Punto 3</h1></header>
    <?php
    $numero  =rand(1,10);
    include_once("script.php");
    $tabla_multiplicacion = new Tabla($numero);
    $tabla_multiplicacion ->creacioTabla();
    ?>
</body>
</html>