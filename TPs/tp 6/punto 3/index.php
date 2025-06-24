<?php 
include_once "producto.class.php";
include_once "pais.class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>punto 3</title>
</head>
<body>
    <header><h1>Busqueda por producto</h1></header>
    <label>Seleccione un producto <select name="" id="idProductoSelect" onchange="buscoProducto();">
        <option value="0">-------</option>
        <?php 
        $listaProducto = Producto_class::buscaTodoProducto();
        foreach ($listaProducto as $value) {
            echo '<option value="'.$value->getIdProducto().'">'.$value->getNombre().'</option>';
        }
        ?>
    </select></label>
    <div id="infoProducto"></div>
    <div id="compra" class="compra">
        <h3>Compra</h3>
        <label>Ingrese la cantidad que quiere comprar: <input type="number" name="" id="idCompra" onchange="calculoCompra();"></label>
        <label id="resultado"></label>
    </div>
    <div id="paises" class="paises">
        <h3>Impuesto por pais</h3>
        <label>Seleccione un pais</label>
        <select name="" id="idPaisSelect" onchange="mostrarCiudad();">
            <option value="0">-------</option>
            <?php 
            $listaPaises = Pais_class::getPaisBD();
            foreach ($listaPaises as $value) {
                echo '<option value="'.$value->getIdPais().'">'.$value->getNombrePais().'</option>';
            }
            ?>
        </select>
        <label>Seleccione una ciudad</label>
        <select name="" id="idCiudadesSelect" onchange="calculoTotal();">
            <option value="">Seleccione una ciudad</option>
        </select>
    </div>
    <div id="total" class="total">
        <h3>Total</h3>
        <label id="resultadoTotal"></label>
    </div>
    <script type="text/javascript" src="app.js"></script>
</body>
</html>