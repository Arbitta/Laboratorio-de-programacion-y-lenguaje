<?php
include_once("ciudades.class.php");
    $idPais = $_GET["idPais"];
    $listaCiudades = Ciudades_class::getCiudadesBD($idPais);
    $resultado = [];

    foreach ($listaCiudades as $ciudad) {
        $resultado[] = [
            "id" => $ciudad->getIdeCiudad(),
            "nombre" => $ciudad->getNombreCiudad(),
            "importe" => $ciudad->getImporte()
        ];
    }

    echo json_encode($resultado);
?>
