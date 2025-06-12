<?php 
include_once 'centronumerico.class.php';
include_once 'funciones.php';
session_start();
/// cookie
$conta = 0;
if (isset($_COOKIE['nroJuego'])) {
    $conta = $_COOKIE['nroJuego'];
}
$expira = mktime(23,59,59,12,31,2025);
setcookie("nroJuego", $conta, $expira);

//si hay una sesion
if (isset($_SESSION['juego'])) {
    $centro = $_SESSION['juego'];
} else {
    $centro = new Centronumerico_class();
}
/////
$pantalla = "inicio"; //para el comienzo :v

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['inicio'])) {
        $pantalla = 'juego';
    } elseif (isset($_POST['jugar'])){
        if ($centro->esCentroNumerico($_POST['numero'])) {
            $conta++;
            setcookie("nroJuego", $conta, $expira);
            $centro->setNrodeJuego($conta);
            $centro->setTodo();
            $pantalla = 'gano';
        } else {
            if ($centro->getPuntaje() > 0) {
                $centro->jugar($_POST['numero']);
                $pantalla = 'juego';
            } else {
                $pantalla = null;
                $conta ++;
                setcookie("nroJuego", $conta, $expira);
                $centro->setNrodeJuego($conta);
                $centro->setTodo();
                echo "Perdiste, utilizaste todo los intentos :c";
                echo "<a href='index.php'>Intentar De nuevo</a>";
            }
        }
    } elseif (isset($_POST['rendirse'])){
        $conta++;
        setcookie("nroJuego", $conta, $expira);
        $centro->setNrodeJuego($conta);
        $centro->setTodo();
        $pantalla = "juego";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Lab 2</title>
</head>
<body>
    <header><h1>Encuentra el centro numerico</h1></header>
    <?php 
    if ($pantalla === "inicio") {
        inicio();
    } elseif ($pantalla === "juego"){
        juego($centro);
    } elseif ($pantalla === "gano"){
        vistaGanadora();
    }
    $_SESSION['juego'] = $centro;
    ?>
</body>
</html>