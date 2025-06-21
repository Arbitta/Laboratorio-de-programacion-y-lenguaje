<?php
$bd = new mysqli("localhost", "root", "", "inmobilaria");
$id = $_GET['id'];

$sql = "SELECT * FROM inmueble WHERE idInmueble = $id";
$res = $bd->query($sql);
$inmueble = $res->fetch_object();

if (isset($_POST['confirmar'])) {
    $sql = "DELETE FROM inmueble WHERE idInmueble = $id";

    if ($bd->query($sql)) {
        header("Location: punto 4.php");
        exit;
    } else {
        echo "❌ Error al eliminar: " . $bd->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmar eliminación</title>
</head>
<body>
    <h2>¿Estás seguro que querés eliminar este inmueble?</h2>
    <ul>
        <li><strong>ID:</strong> <?= $inmueble->idInmueble ?></li>
        <li><strong>Tipo:</strong> <?= $inmueble->tipoInmueble ?></li>
        <li><strong>Domicilio:</strong> <?= $inmueble->domicilio ?></li>
        <li><strong>Dormitorios:</strong> <?= $inmueble->cantidadDormitorios ?></li>
        <li><strong>Mejoras:</strong> <?= $inmueble->mejoras ?></li>
        <li><strong>Baños:</strong> <?= $inmueble->cantidadBanios ?></li>
        <li><strong>Observación:</strong> <?= $inmueble->observacion ?></li>
    </ul>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $inmueble->idInmueble ?>">
        <input type="submit" name="confirmar" value="Eliminar">
        <a href="punto 4.php">Cancelar</a>
    </form>
</body>
</html>
