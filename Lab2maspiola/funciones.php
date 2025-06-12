<?php
include_once 'centronumerico.class.php';
function inicio()
{?>
<form action="index.php" method="post">
    <h2>Bienvenido a Encontrar el Centro Numerico</h2>
    <input type="submit" value="Iniciar Juego" name="inicio">
</form>

<?php }

function juego(Centronumerico_class $centro)
{?>
<form action="index.php" method="post">
    <?php 
    echo "Puntaje: ". $centro->getPuntaje()."<br>";
    echo "Nro de Juego: ".$centro->getNrodeJuego()."<br>";
    ?>
    <label>Ingrese un numero: </label>
    <input type="number" name="numero">
    <input type="submit" value="Jugar" name="jugar">
    <input type="submit" value="Rendirse" name="rendirse">
    <?php 
    echo "<br>".$centro->getMensaje();
    echo "<br> Numeros Ingresado: <br>";
    foreach ($centro->getListadeNumeroIngresado() as $key => $value) {
        echo $value. ", ";
    }
    ?>
</form>
<?php }
function vistaGanadora()
{ ?>
<form action="index.php" method="post">
    <label>Encontraste un centro Numerico, felicidades!!!!</label>
    <input type="submit" value="Volver al juego" name="volver">
</form>
<?php } ?>