<?php 
include_once "servicios.class.php";
if (isset($_GET['origen']) && isset($_GET['destino'])) {
    $listaServicios = Servicios_class::serviciosAmbosFiltros($_GET['idEmpresa'], $_GET['origen'], $_GET['destino']);
    guardarJSON($listaServicios);
} elseif (isset($_GET['origen'])) {
    $listaServicios = Servicios_class::serviciosUnFiltro($_GET['idEmpresa'], $_GET['origen']);
    guardarJSON($listaServicios);
} elseif (isset($_GET['destino'])){
    $listaServicios = Servicios_class::serviciosDosFiltro($_GET['idEmpresa'], $_GET['destino']);
    guardarJSON($listaServicios);
}

function guardarJSON($lista){
    $resultado = [];

    foreach ($lista as $value) {
        $resultado[] = [
            'nroServicio' => $value->getNroServicio(),
            'estacionOrigen' => $value->getEstacionOrigen(),
            'estacionDestino' => $value->getEstacionDestino(),
            'horaSalida' => $value->getHoraSalida(),
            'horaLlegada' => $value->getHoraLlegada(),
            'frecuencia' => $value->getFrecuencia(),
            'precio' => $value->getPrecio()
        ];
    };
    echo json_encode($resultado);
}
?>