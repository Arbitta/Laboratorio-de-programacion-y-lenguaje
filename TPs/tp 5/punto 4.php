<?php
$bd = new mysqli("localhost", "root", "", "inmobilaria");

$sql = "SELECT * FROM inmueble LIMIT 0, 30";
$resultado = $bd->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Listado de Inmuebles</title>
</head>
<body>
    <h1>Listado de Inmuebles</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Domicilio</th>
            <th>Dormitorios</th>
            <th>Mejoras</th>
            <th>Baños</th>
            <th>Observación</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= $fila['idInmueble'] ?></td>
                <td><?= $fila['tipoInmueble'] ?></td>
                <td><?= $fila['domicilio'] ?></td>
                <td><?= $fila['cantidadDormitorios'] ?></td>
                <td><?= $fila['mejoras'] ?></td>
                <td><?= $fila['cantidadBanios'] ?></td>
                <td><?= $fila['observacion'] ?></td>
                <td><a href="punto%203.php?id=<?= $fila['idInmueble'] ?>">Modificar</a></td>
                <td><a href="eliminarInmueble.php?id=<?= $fila['idInmueble'] ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
