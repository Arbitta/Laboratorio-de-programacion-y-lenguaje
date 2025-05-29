<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio D</title>
</head>
<body>
    <header><h1>Ejercicio D</h1></header>
    <?php
    $num1 = 1;
    do {
        echo"<br> Tabla de multiplicar del: ".$num1."<br>";
        for ($i = 1; $i <= 10; $i++) {
            echo " ".$i;
        };
        echo "<br>";
        $num1 +=1;
    } while ($num1 <= 10);
    ?>    
</body>
</html>