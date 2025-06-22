<?php 
include_once "persona.class.php";
$persona = Persona_class::buscarDni($_GET['idDni']);
if (is_null($persona)) {
    $temporal = new stdClass();
    $temporal->documento = "Documento no encontrado";
    $temporal->apellido = "------------";
    $temporal->nombre = "----------";
    $temporal->fechaNacimiento = "---------";
    $temporal->domicilio = "------";
    $temporal->productoComprados = "----------";
    $myJSON = json_encode($temporal);
} else {
    $arreglo = array('documento' => $persona->getDocumento(),
                    'apellido' => $persona->getApellido(),
                    'nombre' => $persona->getNombre(),
                    'fechaNacimiento' => $persona->getFechaNacimiento(),
                    'domicilio' => $persona->getDomicilio(),
                    'productoComprados' => $persona->getProductos());
    $myJSON = json_encode($arreglo);
}
echo $myJSON;
?>