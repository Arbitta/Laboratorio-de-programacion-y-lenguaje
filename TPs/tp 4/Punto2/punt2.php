<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Punto 2</title>
</head>
<body>
    <header><h1>Punto 2</h1></header>
    <?php
    $dias = range(1,31);
    include_once("script.php");
    $calendario = new calendario($dias);
    $calendario-> creacioTabla();

    ?>  
</body>
</html>