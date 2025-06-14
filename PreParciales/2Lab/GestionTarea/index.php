<?php 
include_once "usuario.class.php";
include_once "funciones.php";
session_start();

$expira = mktime(23,59,59,12,31,2025);
$pantalla = "inicio"; // valor predeterminado :v

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["inicio"])) {
        $nombre = $_POST['nombre'];
        if (isset($_COOKIE[$nombre])) {
            $usuarios = unserialize($_COOKIE[$nombre]);
            $usuarios->actualizarVisita();
            setcookie($nombre, serialize($usuarios), $expira);
            $_SESSION['usuario'] = $usuarios;
        } else{
            $usuarioNuevo = new Usuario_class($nombre);
            $usuarios = $usuarioNuevo;
            $_SESSION['usuario'] = $usuarios;
            $usuarioNuevo = serialize($usuarioNuevo);
            setcookie($nombre, $usuarioNuevo, $expira );
        }
        $pantalla = "bienvenida";
    } elseif (isset($_POST["continuar"])){
        $pantalla = "gestion";
    } elseif (isset($_POST['salir'])) {
        $pantalla = "inicio";
    } elseif (isset($_POST['agregarTarea'])){
        $usuarioActual = $_SESSION['usuario'];
        $tarea = $_POST['tarea'];
        $usuarioActual->agregarTareaPendiente($tarea);
        setcookie($usuarioActual->getNombre(), serialize($usuarioActual), $expira);
        $pantalla = "gestion";
    } elseif (isset($_POST['limpiarTarea'])) {
        $usuarioActual = $_SESSION['usuario'];
        $usuarioActual->limpiarTareas();
        setcookie($usuarioActual->getNombre(), serialize($usuarioActual), $expira);
        $pantalla = "gestion";
    } elseif (isset($_POST['terminarTarea'])) {
        $usuarioActual = $_SESSION['usuario'];
        $seleccionados = $_POST['tareaPendiente'];
        foreach ($seleccionados as $key => $value) {
            $usuarioActual->agregarTareaFinalizada($value);
        }
        setcookie($usuarioActual->getNombre(), serialize($usuarioActual), $expira);
        $pantalla = "gestion";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Gestion de Tarea</title>
</head>
<body>
    <header><h1>Gestion de Tarea</h1></header>
    <?php 
    if ($pantalla === "inicio") {
        logueo();
    } elseif ($pantalla === "bienvenida") {
        bienvenida($usuarios);
    } elseif ($pantalla === "gestion"){
        gestionTarea($_SESSION['usuario']);
    }
    ?>
</body>
</html>