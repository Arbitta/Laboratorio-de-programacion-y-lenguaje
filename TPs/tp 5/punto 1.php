<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $con = new mysqli("localhost", "root", "", "inmobilaria") or die ("no es psoble conectar al motod de BD");
    $query = "SELECT * FROM inmueble LIMIT 0, 30";
    $resultado = $con->query($query) or die ("no se pudo ejecutar la consulta de seleccion");
    if ($resultado) {    
        while ($respuesta = $resultado->fetch_object()) {
        echo "Inmueble: ".$respuesta->idInmueble ."<br>";
        echo "Tipo de inmueble: " .$respuesta->tipoInmueble."<br>";
        echo "Domicilio: ".$respuesta->domicilio. "<br>";
        echo "Cantidad de dormitorios: ".$respuesta->cantidadDormitorios. "<br>";
        echo "Mejoras: ".$respuesta->mejoras ."<br>";
        echo "cantidad de baños: ".$respuesta->cantidadBanios."<br>";
        echo "Observacion: ".$respuesta->observacion ."<br>";
        echo "<hr>";
        }
    } else {
        echo "no se pudo ejecutar la consulta de seleccion";
    }
    $resultado->free();
    $con->close();
    ?>
</body>
</html>