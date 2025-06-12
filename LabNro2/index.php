<?php 
include_once 'centroNumerico.php';
include_once 'funciones.php';
session_start();

if (isset($_SESSION['juego'])) {
    $centroNumerico = $_SESSION['juego'];
} else {
    $centroNumerico = new CentroNumerico();
}

$pantalla = "inicio"; // Valor por defecto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['IniciarJuego'])) {
        $pantalla = "jugar";
    } elseif (isset($_POST['jugar'])) {
        if ($centroNumerico->arriesgar($_POST['numero'])) {
            $pantalla = "ganaste";
        } else {
            $pantalla = "jugar"; // Sigue jugando si no acierta
        }
    } elseif (isset($_POST['rendirse'])) {
        session_destroy();
        header("Location: index.php");
        exit();
    } elseif (isset($_POST['volver'])) {
        $centroNumerico = new CentroNumerico(); // Reiniciar juego
        $pantalla = "inicio";
    }
}

$_SESSION['juego'] = $centroNumerico;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio 2</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header><h1>Encuentra el centro numérico</h1></header>

    <?php
    if ($pantalla === "inicio") {
        InicioJuego();
    } elseif ($pantalla === "jugar") {
        mostrarJuego($centroNumerico);
    } elseif ($pantalla === "ganaste") {
        Ganaste();
    }
    ?>
</body>
</html>
