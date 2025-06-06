<?php 
include_once 'Script.php';
session_start();
if (isset($_POST['Cerrar'])) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto 11</title>
</head>
<body>
    <header><h1>Punto 11 con session</h1></header>
    <?php
    if (isset($_POST['usuario'])) {
        if (!isset($_SESSION['contador'])){
            $contador = new Contador();
        } else {
            $contador = $_SESSION['contador'];
        }
        $contador->incrementar();
        echo "<h2>Hola ". $_POST['usuario'] ."</h2>";
        if($contador->getVisitas() <= 1){
            echo "<label>Es tu primera visita en esta pagina</label>";
        } else {
            echo "<label>Ya has visitado esta página ".$contador->getVisitas()." veces.</label>";
        }
        $_SESSION['contador'] = $contador;
    ?>
    <form method="post">
    <input type="submit" name="Cerrar" value="Cerrar Sesión">
    </form>
    <?php 
    } else {
    ?>
    <form action="" method="post">
        <label>Ingrese su nombre: <input type="text" name="usuario"></label>
        <input type="submit" value="Enviar">
    </form>
    <?php 
    }
    ?>
</body>
</html>