<?php
$bd = new mysqli("localhost", "root", "", "inmobilaria");

$sql = "SELECT i.tipoInmueble, i.domicilio, o.FechaInicio, o.importe 
        FROM inmueble i 
        INNER JOIN operacion o ON i.idInmueble = o.idInmueble 
        WHERE o.tipoOperacion LIKE 'Alquiler' 
        LIMIT 0, 30";

$resultado = $bd->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Inmuebles en Alquiler</title>
</head>
<body>
    <h1>Listado de Inmuebles en Alquiler</h1>

    <table>
        <tr>
            <th>Tipo de Inmueble</th>
            <th>Domicilio</th>
            <th>Fecha de Inicio</th>
            <th>Importe</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= $fila['tipoInmueble'] ?></td>
                <td><?= $fila['domicilio'] ?></td>
                <td><?= $fila['FechaInicio'] ?></td>
                <td>$<?= number_format($fila['importe'], 2, ',', '.') ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
