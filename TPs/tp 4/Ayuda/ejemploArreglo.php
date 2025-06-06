<!--Codigo_27.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Creación de arreglos</title>
</head>
<body>
<h1>Arreglos</h1>
<article>
<?php
//Creo un arreglo vacío
$vec_enum = array();
//Creo el arreglo enumerado (1,5,8)
$vec_enum2 = array(1,5,8);
//Creo el arreglo enumerado de strings
$vec_enum3 = array('AEP','EEZ','CRD','COR');
//Creo el arreglo asociativo tráfico
$trafico = array('AEP' => 21, 'EEZ' => 22.4,
                 'CRD' => 2.5, 'COR' => 4.9,
                 'HDZ' => 30.6, 'TORS' => 46.3);
//Creo un arreglo multidimensional
$trafico2 = array('AEP' => array(8,9,5),
                  'EEZ' => array(6,5,4),
                  'CRD' => array(0,2,7,1),
                  'COR' => array(1,0,2),
                  'MDZ' => array(1,4,1,5));
?>
</article>
<section></section>
<footer>
<p>Archivo: Codigo_27.php</p>
</footer>
</body>
</html>
