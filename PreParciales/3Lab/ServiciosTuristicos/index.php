<?php 
include_once "servicios.class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header><h1>RAIL EUROPE</h1></header>
    <div id="filtros" class="filtros">
        <h3>Consulta de servicios de tren</h3>
        <select name="" id="primerFiltro" onchange="listadoEmpresa();">
            <option value="0">Seleccione una ciudad de origen</option>
            <?php 
            $lista = Servicios_class::getServicioOrigenBD();
            foreach ($lista as  $value) {
                echo '<option value="'.$value->getCiudadOrigen().'">'.$value->getCiudadOrigen().'</option>';
            }
            ?>
        </select>
        <select name="" id="segundoFiltro" onchange="listadoEmpresa();">
            <option value="0">Selecciones una ciudad de destino</option>
            <?php 
            $lista = Servicios_class::getServicioDestinoBD();
            foreach ($lista as $value) {
                echo '<option value="'.$value->getCiudadDestino().'">'.$value->getCiudadDestino().'</option>';
            }
            ?>
        </select>
    </div>
    <div id="resultadoPrincipales" class="resultadoPrincipales">
        <table id="tablasEmpresa">
        </table>
    </div>

    <div id="resultadoSecundarios" class="resultadoSecundarios">
    </div>
    <script type="text/javascript" src="app.js"></script>
</body>
</html>