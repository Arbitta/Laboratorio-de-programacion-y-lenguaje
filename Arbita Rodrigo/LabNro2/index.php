<?php 
session_start();
include_once 'funciones.php';
include_once 'centroNumerico.php';
$_SESSION['CentroNumerico'] = new CentroNumerico();
$centroNumerico = $_SESSION['CentroNumerico'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Laboratorio 2</title>
</head>
<body>
    <header><h1>Encuentra el centro numerico</h1></header>
    <?php
    if (!isset($_POST['IniciarJuego']) && !isset($_POST['jugar'])) {
        ?> <form action="" method="post">
            <h2>Bienvenido al juego de centro Numerico!!!</h2>
            <input type="submit" name="IniciarJuego" value="Iniciar Juego">
        </form>
        <?php
        $_SESSION['CentroNumerico'] = new CentroNumerico();
    } else {
        if (isset($_POST['jugar']) && isset($_POST['numero'])) {
            $_SESSION['CentroNumerio'] = $centroNumerico;
            $puntaje = $centroNumerico->getPuntaje();
            if($centroNumerico->esCentroNumerico($_POST['numero'])) {
                echo "<label>¡Felicidades! Has encontrado el centro numérico.</label>";
            } else {
                $mensaje = $centroNumerico->distancia($_POST['numero']);
                echo "<label>El número ingresado está " . $mensaje . ".</label>";
            } 
        } elseif (isset($_POST['rendirse'])) {
            session_destroy();
        }       
        mostrarJuego($centroNumerico);
    }?>
</body>
</html>