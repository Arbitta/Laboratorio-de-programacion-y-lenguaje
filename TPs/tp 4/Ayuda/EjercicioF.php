<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio F</title>
</head>
<body>   
    <header><h1>Ejercicio F</h1></header>
    <?php 
    $n = rand(2,15);
    $a =1;
    echo $n."<br><br>";
    do {
        for ($i = 0; $i < $a; $i++) {
            echo $a." ";
        }
        echo "<br>";
        $a++;
    } while ($a <= $n);
    ?>
</body>
</html>