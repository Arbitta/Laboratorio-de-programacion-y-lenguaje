<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funciones de fecha y hora</title>
</head>
<body>
<header>
    <h1>Funciones de fecha y hora</h1>
</header>
<section>
<article>
<?php
if (checkdate(12,25,2023)) {
    echo "La fecha es correcta<br>";
} else {
    echo "La fecha es incorrecta<br>";
}
if (checkdate(2,29,2023)) {
    echo "La fecha es correcta<br>";
} else {
    echo "La fecha es incorrecta<br>";
}
$fecha_nac = date("d/m/Y", mktime(0,0,0,2,13,2004));
echo "Yo nací el ".$fecha_nac."<br>";
$fecha = getdate();
echo "Hoy es el día ".$fecha['weekday']." ".$fecha['mday']." de ".$fecha['month']." de ".$fecha['year']."<br>";
echo "<hr>";
echo time();
echo "<pre>";
print_r($fecha);
echo "</pre>";
?>
</article>
</section>
<footer>
    <p>Archivo: Codigo_34.php</p>
</footer>
</body>
</html>
