<?php
include_once "producto.class.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Laboratorio 3</title>
</head>
<body>
    <header><h1>busqueda de producto</h1></header>
    <div id="filtros" class="filtros">
        <h3>Ingrese los filtro para realiza la busqueda</h3>
        <select name="" id="primerFiltro" onchange="buscarPrecio();">
            <option value="0">Selecione un producto</option>
            <?php 
            $listaProducto = Producto_class::getProductosBD();
            foreach ($listaProducto as $value) {
                echo '<option value="'.$value->getIdProducto().'">'.$value->getNombreProducto().'</option>';
            }
            ?>
        </select>
        <select name="" id="segundoFiltro" onchange="buscarPrecio();">
            <option value="0">Seleccione una ubicacion</option>
            <?php  
            $bd = new mysqli("localhost", "root", "", "comparador");
            $query = "SELECT DISTINCT s.ubicacion FROM supermercado s;";
            $resultado = $bd->query($query);
            while ($registro = $resultado->fetch_object()) {
                echo '<option value="'.$registro->ubicacion.'">'.$registro->ubicacion.'</option>';
            }
            ?>
        </select>
    </div>

    <div id="tablaPrecio">
        <table id="tabla"></table>
    </div>

    <div id="detalle">
        <table id="tablaDetalle"></table>
    </div>

    <div id="detalleProducto"></div>
    <div id="diferenciaPrecios"></div>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>