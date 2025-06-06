<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio H</title>
</head>
<body>
    <header><h1>Ejercicio H</h1></header>
    <?php 
    $arreglo = array();
    $cantidad = 0;
    $suma = 0;
    $promedio = 0; 
    $condicion = false;
    $arreglo_Ordenado;

    for ($i = 0; $i < 10; $i++) {
        $random = rand(1,100);
        $arreglo[] = $random;
    }
    echo"Arreglo generado: <br>";
    foreach ($arreglo as $key => $value) {
        echo $value. " ";
    }

    for ($i = 0; $i < 10; $i++) {   
        $cantidad ++;
        $suma += $arreglo[$i];
    }
    echo "<br>Cantidad: ". $cantidad;
    echo "<br>Suma de todos los elementos: ". $suma;

    $copia_arreglo = $arreglo;
    echo "<br>El primer elemento: ".array_shift( $copia_arreglo );
    echo "<br> El ultimo elemento: ".array_pop( $copia_arreglo );
    
    echo "<br>El menor elemento del arreglo: ".min($arreglo);
    echo "<br>El mayor elemento del arreglo: ".max( $arreglo);

    foreach ($arreglo as $key => $value) {
        if (5 === $value) {
            $condicion = true;
        };
    };
    if ($condicion) {
        echo "<br>Se encuentra el numero 5 en el vector";
    } else {
        echo "<br>No se encuentra el numero 5 en el vector";
    };

    echo "<br>Promedio de los valores: ".($promedio = $suma/$cantidad);

    echo "<br> El arreglo ordenado de menor a mayor: <br>";
    sort($arreglo);
    foreach ($arreglo as $key => $value) {
        echo $value." ";
    }
    ?>    
</body>
</html>