<?php 
include_once 'jugador.class.php';
session_start();
$pantalla = "juego"; // para que se vea solo el juego 
$dadoJugador  = 0;
//sessioones de jugadores
if (isset($_SESSION['usuario']) && isset($_SESSION['oponente'])) {
    $usuario = $_SESSION['usuario'];
    $oponente = $_SESSION['oponente'];
} else {
    $usuario = new jugador("Usuario");
    $oponente = new Jugador("Maquina");
}

//cookie de ultimo acceso y partidas ganadas
if (isset($_COOKIE['ultimo_acceso']) && isset($_COOKIE['partidas_ganadas'])) {
    $ultimo_acceso = $_COOKIE['ultimo_acceso'];
    $partidas_ganadas = $_COOKIE['partidas_ganadas'];
} else {
    $ultimo_acceso = date("Y-m-d H:i:s");
    $partidas_ganadas = 0;
    setcookie('ultimo_acceso', $ultimo_acceso, time() + (86400 * 30));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['tirar'])) {
        $dadoJugador = rand(1, 6);
        $usuario->jugar($dadoJugador, $oponente);
        $dado = rand(1, 6);
        $oponente->jugar($dado, $usuario);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['oponente'] = $oponente;
    }
    if (isset($_POST['nuevo'])) {
        $usuario->seteaDatos();
        $oponente->seteaDatos();
        $usuario->setNroDeJuego($usuario->getNroDeJuego() + 1);
        $pantalla = "juego";
        $_SESSION['usuario'] = $usuario;
        $_SESSION['oponente'] = $oponente;
    }
    if (isset($_POST['salir'])) {
        session_destroy();
        $pantalla = "abandono";
    }
    if (isset($_POST['volver'])) {
        $usuario->seteaDatos();
        $oponente->seteaDatos();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['oponente'] = $oponente;
        $pantalla = "juego";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header><h1>Juego de dados</h1></header>
    <?php
    if ($pantalla === "juego") {
    if ($usuario->getPuntuacion() > 0 && $oponente->getPuntuacion() > 0) { ?>
    <form action="index.php" method="post">
        <?php
        echo "Fecha de ultimo acceso: " . $ultimo_acceso . ". Partidas ganadas: " . $partidas_ganadas . "<br>";
        ?>
        <h2><?php echo "Nro. De Juego:" . $usuario->getNroDeJuego() ;?></h2>
        <label><?php echo "Nro. De Tiradas: " . $usuario->getTiradas() ;?></label>
        <label><?php echo "Jugador Usuario: ". $usuario->getPuntuacion() . " puntos";?></label>
        <label><?php echo "Jugador Maquina: ". $oponente->getPuntuacion() . " puntos";?></label>
        <input type="submit" name="tirar" value="Tirar dado">
        <input type="submit" name="salir" value="Abandonar">
        <input type="submit" name="nuevo" value="Nuevo Juego">
        <?php
        echo "<label> Turno de usuario: " . $usuario->getMensaje() . "</label>";
        echo "<label> Turno de maquina: " . $oponente->getMensaje() . "</label>"; 
        switch ($dadoJugador) {
            case '1':
                echo "<img src='img/dado-1.png' alt='dado1'></img>";
                break;
            case '2':
                echo "<img src='img/dado-2.png' alt='dado2'></img>"; 
                break;
            case '3':
                echo "<img src='img/dado-3.png' alt='dado3'></img>";
                break;
            case '4':
                echo "<img src='img/dado-4.png' alt='dado4'></img>";
                break;
            case '5':
                echo "<img src='img/dado-5.png' alt='dado5'></img>";
                break;
            case '6':
                echo "<img src='img/dado-6.png' alt='dado6'></img>";
                break;
            default:
                break;
        }
        ?>
    </form>

    <?php } else {
        if ($usuario->getPuntuacion() < 0) {
            $ganador = $oponente;
        } else{
            $ganador = $usuario;
            $partidas_ganadas++;
            setcookie('partidas_ganadas', $partidas_ganadas, time() + (86400 * 30));
        } ?>
        <form action="index.php" method="post">
            <h2>Juego Terminado</h2>
            <label><?php echo "Jugador " . $ganador->getNombreJugador() . " Ganaste " . $ganador->getPuntuacion() . " puntos en " . $ganador->getTiradas() . " tiradas"; ?></label>
            <input type="submit" name="volver" value="Volver">
        </form>
        <?php 
    } 
} elseif ($pantalla ==="abandono") {
    echo "Capo abandonaste el juego <br>";
    echo "<a href='index.php'>Volver al inicio</a>";
}?>
</body>
</html>