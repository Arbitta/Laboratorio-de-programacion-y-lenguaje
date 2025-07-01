<?php
include_once "supermercado.class.php";

if (isset($_GET['idProducto']) && isset($_GET['ubicacion'])) {
    $listaInformacion = Supermercado_class::getAmbosFiltros($_GET['idProducto'], $_GET['ubicacion']);
    guardarJSON($listaInformacion);
} elseif (isset($_GET['idProducto'])) {
    $listaInformacion = Supermercado_class::getFiltroProducto($_GET['idProducto']);
    guardarJSON($listaInformacion);
} elseif(isset($_GET['ubicacion'])){
    $listaInformacion = Supermercado_class::getFiltroUbicacion($_GET['ubicacion']);
    guardarJSON($listaInformacion);
}

function guardarJSON($lista){
    $resultado = [];
    foreach ($lista as $value) {
        $resultado[] = [
            'nombreProducto' => $value->getProducto(),
            'precio' => $value->getPrecio(),
            'nombreSupermercado' => $value->getSupermercado(),
            'ubicacion' => $value->getUbicacion()
        ];
    };
    echo json_encode($resultado);
}
 
?>