<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'validaciones.php';
    $errores = [];
    $datos = new Suscripcion($_POST);
    $errores = $datos->validar();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Punto 6</title>
</head>
<body>
    <header><h1>Suscripcion de desportes</h1></header>
    <div>
        <form action="" method="post">
            <label>Nombre: </label>
            <input type="text" name="nombre">
            <label>Apellido: </label>
            <input type="text" name="apellido">
            <label>Sexo: 
                <select name="sexo">
                    <option value="">Seleccionar</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </label>
            <label>Fecha de nacimiento: <input type="date" name="fecha_nacimiento"></label>
            <label>Nro. de Telefono: </label>
            <input type="text" name="telefono">
            <label>Correo electronico: </label>
            <input type="email" name="correo">
            <label>Tipo de evento: </label>
            <label>Torneo de tenis <input type="checkbox" name="evento[]" value="Torneo de tenis"></label>
            <label>Campeonato de ajedrez <input type="checkbox" name="evento[]" value="Campeonato de ajedrez"></label>
            <label>Competencia escolares <input type="checkbox" name="evento[]" value="Competencia escolares"></label>
            <label>Fecha de realizacion: <input type="date" name="fecha"></label>
            <label>Lugar: </label>
            <input type="text" name="lugar">
            <input type="submit" value="Enviar">
        </form>
    </div>
    <div>
        <?php 
        if (isset($errores) && !empty($errores)) {
            echo "<h2>Errores encontrados:</h2>";
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo $datos->mensajeExito();
        }
        ?>
    </div>
</body>
</html>