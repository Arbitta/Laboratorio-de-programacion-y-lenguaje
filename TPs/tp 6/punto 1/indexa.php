<?php 
include_once "paises.class.php";
$unPais = paises::getPaisBD($_GET['idPais']);
if (is_null($unPais)) {
    $objetoTemporal = new stdClass();
    $objetoTemporal->idPais = "Pais no encontrado";
    $objetoTemporal->pais = "----";
    $objetoTemporal->ciudades = "----";
} else{
    $arreglo = array('idPais' => $unPais->getIdPais(),
                    'pais' => $unPais->getPais(),
                    'ciudades' => $unPais->getCiudades());
    $myJSON = json_encode($arreglo);

}
echo $myJSON;
?>