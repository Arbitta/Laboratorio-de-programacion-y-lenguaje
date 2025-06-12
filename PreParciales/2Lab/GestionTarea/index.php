<?php 
include_once "funciones.php";
include_once "usuario.class.php";
$listadeUsuario = setcookie("usuarios");
$pantalla = "inicio";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST["inicio"]) {
        $nombre = $_POST['nombre'];
        foreach ($listadeUsuario as $key => $value) {
            $value = serialize($value);
            if ($value->getNombre() === $nombre) {
                $usuario = $value;
            }
        }
        $pantalla = "bienvenida";
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
        bienvenida();
    } elseif ($pantalla === "gestion"){

    }
    ?>
</body>
</html>