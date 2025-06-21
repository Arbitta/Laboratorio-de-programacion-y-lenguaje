<?php 
$pantalla = "formulario";
if (isset($_POST['Enviar'])) {
    $tipoInmueble = $_POST['inmueble'];
    $domicilio = $_POST['domicilio'];
    $cantDormitorios = $_POST['cantDormitorios'];
    $mejoras = $_POST['mejoras'];
    $cantBanio = $_POST['cantBaños'];
    $observaciones = $_POST['observaciones'];

    $baseDato = new mysqli("localhost", "root", "", "inmobilaria" ) or die ("no es posible conectar al motod de BD");
    $query = "INSERT INTO inmueble (tipoInmueble, domicilio, cantidadDormitorios, mejoras, cantidadBanios, observacion) VALUES 
    ('$tipoInmueble','$domicilio',$cantDormitorios,'$mejoras',$cantBanio,'$observaciones')";
    $baseDato->query($query) or die ("no se pudo ejecutar la consulta de seleccion");
    $query = "SELECT * FROM inmueble ORDER BY idInmueble DESC LIMIT 1";
    $resultado = $baseDato->query($query);
    $respuesta = $resultado->fetch_object();
    $pantalla = "resultado";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header><h1>Formulario de inmueble</h1></header>
    <?php if ($pantalla === "formulario") { ?>

    <form action="punto 2.php" method="post">
        <fieldset>
            <legend>Ingrese los Datos</legend>
            <label>Tipo de inmueble
                <select name="inmueble">
                    <option value="Departamento">Departamento</option>
                    <option value="Casa">Casa</option>
                    <option value="Terreno">Terreno</option>
                    <option value="Quinta">Quinta</option>
                </select>
            </label>
            <label>Domicilio: <input type="text" name="domicilio"></label>
            <label>Cantidad de Dormitorios: <input type="number" name="cantDormitorios" min="0" max="10"></label>
            <label>Mejoras: 
                <select name="mejoras" id="">
                    <option value="Garaje">Garaje</option>
                    <option value="Jardin">Jardin</option>
                    <option value="Cercado">Cercado</option>
                    <option value="Piscina">Piscina</option>
                </select>
            </label>
            <label>Cantidad de baños: <input type="number" name="cantBaños" min="0" max="10"></label>
            <label>Observaciones <input type="text" name="observaciones" id=""></label>
            <input type="submit" value="Enviar" name="Enviar">
        </fieldset>
    </form>
    <?php }elseif ($pantalla = "resultado") {
        echo "Inmueble: ".$respuesta->idInmueble ."<br>";
        echo "Tipo de inmueble: " .$respuesta->tipoInmueble."<br>";
        echo "Domicilio: ".$respuesta->domicilio. "<br>";
        echo "Cantidad de dormitorios: ".$respuesta->cantidadDormitorios. "<br>";
        echo "Mejoras: ".$respuesta->mejoras ."<br>";
        echo "cantidad de baños: ".$respuesta->cantidadBanios."<br>";
        echo "Observacion: ".$respuesta->observacion ."<br>";
        echo "<hr>";
        $resultado->free();
        $baseDato->close();
     } ?>
</body>
</html>