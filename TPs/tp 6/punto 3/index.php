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
        include_once "producto.class.php";
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
    <div id="paises">
        <h3>Impuesto por pais</h3>
        
    </div>
    <script type="text/javascript" src="app.js"></script>
</body>
</html>