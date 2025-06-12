<?php 
include_once 'centroNumerico.php';

function mostrarJuego(CentroNumerico $centroNumerico)
{ ?>
<form action="index.php" method="post">
    <?php 
    echo "Puntaje: " . $centroNumerico->getPuntaje() . "<br>";
    echo "Nro. de juego:  " . $centroNumerico->getIntentos() . "<br>";
    ?>
    <label for="">Ingrese un numero: </label>
    <input type="number" name="numero" id="numero">
    <input type="submit" name="jugar" value="Jugar">
    <input type="submit" name="rendirse" value="Rendirse">
</form>
<?php
}
?>