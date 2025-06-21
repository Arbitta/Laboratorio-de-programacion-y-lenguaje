<?php 
session_start();
$pantalla = "inicio";
$bd = new mysqli("localhost", "root", "", "inmobilaria");

if (isset($_POST['Enviar'])) {
    $id = $_POST["idInmueble"];
    $_SESSION['idInmueble'] = $id;
    $query = "SELECT * FROM inmueble WHERE idInmueble = $id";
    $resultado = $bd->query($query) or die ("no se pudo ejecutar la consulta de seleccion");
    $respuesta = $resultado->fetch_object();
    $pantalla = "modificacion";
}
if (isset($_POST['btnModificacion'])) {
    $id = $_SESSION['idInmueble'];
    $tipoInmueble = $_POST['inmueble'];
    $domicilio = $_POST['domicilio'];
    $cantDormitorios = $_POST['cantDormitorios'];
    $mejoras = $_POST['mejoras'];
    $cantBanio = $_POST['cantBaños'];
    $observaciones = $_POST['observaciones'];

    $sql = "UPDATE inmueble SET 
    tipoInmueble = '$tipoInmueble',
    domicilio = '$domicilio',
    cantidadDormitorios = $cantDormitorios,
    mejoras = '$mejoras',
    cantidadBanios = $cantBanio,
    observacion = '$observaciones'
    WHERE idInmueble = $id";
    $bd->query($sql);
    $query = "SELECT * FROM inmueble WHERE idInmueble = $id";
    $resultado = $bd->query($query);
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
    <header><h1>Modificacion de la BD</h1></header>
    <?php if ($pantalla === "inicio") { ?>
        <form action="punto 3.php" method="post">
            <h3>Ingrese la ID del inmueble que quiere modificar</h3>
            <input type="number" name="idInmueble">
            <input type="submit" value="Enviar" name="Enviar">
        </form>

    <?php } elseif ($pantalla === "modificacion"){ ?>
            <form action="punto 3.php" method="post">
        <fieldset>
            <legend>modifique los datos</legend>
            <label>Tipo de inmueble
                <select name="inmueble">
                    <option value="Departamento" <?= $respuesta->tipoInmueble == "Departamento" ? "selected" : "" ?>>Departamento</option>
                    <option value="Casa" <?= $respuesta->tipoInmueble == "Casa" ? "selected" : "" ?>>Casa</option>
                    <option value="Terreno" <?= $respuesta->tipoInmueble == "Terreno" ? "selected" : "" ?>>Terreno</option>
                    <option value="Quinta" <?= $respuesta->tipoInmueble == "Quinta" ? "selected" : "" ?>>Quinta</option>
                </select>
            </label>
            <label>Domicilio: <input type="text" name="domicilio" value="<?= $respuesta->domicilio ?>"></label>
            <label>Cantidad de Dormitorios: <input type="number" name="cantDormitorios" min="0" max="10" value="<?= $respuesta->cantidadDormitorios?>"></label>
            <label>Mejoras: 
                <select name="mejoras" id="">
                    <option value="Garage" <?= $respuesta->mejoras == "Garage" ? "selected" : "" ?>>Garage</option>
                    <option value="Jardin" <?= $respuesta->mejoras == "Jardin" ? "selected" : "" ?>>Jardin</option>
                    <option value="Cercado" <?= $respuesta->mejoras == "Cercado" ? "selected" : "" ?>>Cercado</option>
                    <option value="Piscina" <?= $respuesta->mejoras == "Piscina" ? "selected" : "" ?>>Piscina</option>
                    <option value="Sin cerco" <?= $respuesta->mejoras == "Sin cerco" ? "selected" : "" ?>>Sin cerco</option>
                </select>
            </label>
            <label>Cantidad de baños: <input type="number" name="cantBaños" min="0" max="10" value="<?= $respuesta->cantidadBanios ?>"></label>
            <label>Observaciones <input type="text" name="observaciones" value="<?= $respuesta->observacion ?>"></label>
            <input type="submit" value="Enviar" name="btnModificacion">
        </fieldset>
    <?php } elseif ($pantalla === "resultado"){
        echo "Inmueble: ".$respuesta->idInmueble ."<br>";
        echo "Tipo de inmueble: " .$respuesta->tipoInmueble."<br>";
        echo "Domicilio: ".$respuesta->domicilio. "<br>";
        echo "Cantidad de dormitorios: ".$respuesta->cantidadDormitorios. "<br>";
        echo "Mejoras: ".$respuesta->mejoras ."<br>";
        echo "cantidad de baños: ".$respuesta->cantidadBanios."<br>";
        echo "Observacion: ".$respuesta->observacion ."<br>";
        echo "<hr>";
        $resultado->free();
        $bd->close();
    } ?>

</body>
</html>