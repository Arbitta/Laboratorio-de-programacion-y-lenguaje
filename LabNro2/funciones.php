<?php 
include_once 'centroNumerico.php';
function mostrarJuego(CentroNumerico $centroNumerico)
{ ?>
<form action="index.php" method="post">
    <?php 
    echo "Puntaje: " . $centroNumerico->getPuntaje() . "<br>";
    echo "Nro. de juego:  " . $centroNumerico->getNrODeJuego() . "<br>";
    ?>
    <label for="">Ingrese un numero: </label>
    <input type="number" name="numero" id="numero">
    <input type="submit" name="jugar" value="Jugar">
    <input type="submit" name="rendirse" value="Rendirse">
    <label>Distancia: </label>
    <label>Numero Ingresado: </label>
</form>
<?php
} 
function InicioJuego ()
{ ?> 
<form action="index.php" method="post">
    <h2>Bienvenido al juego de centro Numerico!!!</h2>
    <input type="submit" name="IniciarJuego" value="Iniciar Juego">
</form>
<?php }
function Ganaste()
{ ?>
<form action="index.php" method="post">
    <label>GANASTE!!!!! ENCONTRASTE EL CENTRO NUMERICO</label>
    <input type="submit" value="Volver" name="volver">
</form>
<?php } ?>