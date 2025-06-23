<?php 
include_once "producto.class.php";
$unProdu = Producto_class::buscaUnProducto($_GET["idProducto"]);
if (is_null($unProdu)) {
    $temporal = new stdClass();
    $temporal->idProducto = "Producto no encontrado";
    $temporal->nombre = "-----------";
    $temporal->importe = "-----------";
    $temporal->cantidad = "-----------";
    $myJSON = json_encode($temporal);
} else {
    $arreglo = array('idProducto' => $unProdu->getIdProducto(),
                    'nombre' => $unProdu->getNombre(),
                    'importe' => $unProdu->getImporte(),
                    'cantidad' => $unProdu->getCantidad());
    $myJSON = json_encode($arreglo);
}
echo $myJSON;

?>