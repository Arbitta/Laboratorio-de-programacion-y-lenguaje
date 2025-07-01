<?php 
include_once "producto.class.php";
$lista = Producto_class::getFiltroProducto($_GET['nombreProducto']);
if (is_null($lista)) {
    $objTemp = new stdClass();
    $objTemp->supermercado = 'Producto no encontrado';
    $objTemp->precio = '---';
    $objTemp->ubicacion = '---';
    $myJSON = json_encode($objTemp);
    echo $myJSON;
} else{
    $resultado = [];
    foreach ($lista as $value) {
        $resultado[] = [
            'supermercado' => $value->getSupermercado(),
            'precio' => $value->getPrecio(),
            'ubicacion' => $value->getUbicacion()
        ];
    }
    echo json_encode($resultado);
}
?>