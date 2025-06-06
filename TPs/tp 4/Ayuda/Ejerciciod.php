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
    for ($num = 1; $num <= 10; $num++) {
        echo "<table>";
        echo "Tabla de multiplicar del:".$num;
        echo "<tr><th>*</th>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<th>$i</th>";
        }
        echo "</tr><tr><th>".$num."</th>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<td>" . ($num * $i) . "</td>";
        }
        echo "</tr></table><br>";
    }
    ?>  
</body>
</html>