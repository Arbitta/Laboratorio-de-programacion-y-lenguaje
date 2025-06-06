<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Punto 4</title>
</head>
<body>
    <header><h1>Aumento salarial</h1></header>
    <?php
    if (isset($_POST['salario']) && isset($_POST['antiguedad']) &&isset($_POST['nombre'])) {
        include_once 'script.php';
        $usuario = new Aumento($_POST['nombre'], $_POST['salario'], $_POST['antiguedad']);
        echo "<h2>Datos recibidos</h2>";
        echo "Nombre: ". $usuario->getNombre()."<br>";
        echo "Salario: " .$usuario ->getSalario()."<br>";
        echo "Antiguedad: ".$usuario->getAntiguedad()."<br>";
        echo "Aumento Total: ".$usuario->calculoSalarial()."<br>"; 
    } else { ?>
    <div class="contenedor">
        <form action="Punto4.php" method="post" name="formulario" id="idFormulario">
            <label>Ingrese su nombre: <input type="text" name="nombre"></label>
            <label>Ingrese su salario: <input type="number" name="salario"></label>
            <label>Ingrese su antiguedad: <input type="number"name="antiguedad"></label>
            <input name ="bntEnviar" type="submit" id="idbtEnviar" value="Enviar">
        </form>
    </div>
    <?php } ?>
</body>
</html>