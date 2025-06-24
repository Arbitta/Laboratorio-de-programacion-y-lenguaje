<?php 
include_once "empresas.class.php";

if (isset($_GET['filtro1']) && isset($_GET['filtro2'])) {
    //cuando presione los 2 select
    $listaEmpresa = Empresas_class::getListaAmbosFiltros($_GET['filtro1'], $_GET['filtro2']);
    guardarJSON($listaEmpresa);
} elseif (isset($_GET['filtro1'])) {
    //cuando activo el primero filtro
    $listaEmpresa = Empresas_class::getListaTrenesUnFiltro($_GET['filtro1']);
    guardarJSON($listaEmpresa);
} elseif (isset($_GET['filtro2'])){
    $listaEmpresa = Empresas_class::getListaTrenesDosFiltro($_GET['filtro2']);
    guardarJSON($listaEmpresa);
}

function guardarJSON($lista){
    $resultado = [];

    foreach ($lista as  $value) {
    $resultado[] = [
        'idEmpresa' => $value->getIdEmpresa(),
        'nombreEmpresa' => $value->getNombreEmpresa(),
        'paisEmpresa' => $value->getPaisEmpresa(),
        'webEmpresa' => $value->getWebEmpresa(),
        'logoEmpresa' => $value->getLogoEmpresa()
    ];
    };
echo json_encode($resultado);
}
?>